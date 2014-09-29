<?php
$QueryNearby  = "SELECT * FROM nearby_data WHERE mainID = '".$mainID."'";
//echo runquery_count($QueryNearby);
if(runquery_count($QueryNearby) < 2){
    $NearByResults = google_NearBy_search($main_keyword,$searchInZip);
    foreach($NearByResults as $One){
        $Query_Nearby = "INSERT INTO nearby_data SET mainID = '".$mainID."',`name` = '".$One['BN']."',`address` = '".$One['BA']."'";
        runquery($Query_Nearby);
    }
}
else{
    $QueryNearby  = "SELECT * FROM nearby_data WHERE mainID = '".$mainID."'";
    $rs_QueryNearby = runquery($QueryNearby);
    $NearByResults = array();
    $i = 0;
        while($nearby = mysql_fetch_assoc($rs_QueryNearby)){
            if($i==0) $location = 'A'; else $location = 'B';
            $NearByResults[$location] = array('BA' => $nearby['address'], 'BN' => $nearby['name'], 'nearbyID' => $nearby['id']);
            $i++;
        }    
    
}
//echo '<img alt="Competitors Locations" src="http://maps.googleapis.com/maps/api/staticmap?zoom=auto&amp;size=700x600&amp;maptype=roadmap&amp;markers=color:red|label:A|'.urlencode($NearByResults['A']['BA']).'&amp;markers=color:green|label:B|'.urlencode($NearByResults['B']['BA']).'&amp;markers=color:blue|label:C|'.urlencode($Valid_address_format).'&amp;sensor=false&amp;key=AIzaSyDYFeaEYzpT0TvDQgqy9qyzRCbMFwFet6k">';

if(count($NearByResults)>0){ // Some Results Exists
//echo '<h3>Near By Citation Results</h3>';

foreach($NearByResults as $One){ // foreach nearby results
$CSR   =   customsearch($One['BN']." in ".$_POST['city']);
//echo "Busines Name is ".$One['BN'];
//printarray($CSR,'die');
$totalresults = $CSR->queries->request[0]->totalResults;
//echo "total results are ".$totalresults;
//die;

if($totalresults <= 100)
  $loopTotal = $totalresults;
else
  $loopTotal = 100;
$total_pages = ceil($loopTotal/10);

$finalResults = array();

for($i=0;$i<10;$i++){
    if($i!=0) // for next pages
        $CSR   =   customsearch($One['BN']." in ".$_POST['city'],($i*10+1),10);
//        printarray($CSR->items);
foreach($CSR -> items as $Results){ // Go through all results 
    $website_link  = $Results -> displayLink;
    $specific_link = $Results -> link;
    if(property_exists($Results, 'pagemap')){ // If the specific site contains the pagemap or not
     if(property_exists($Results->pagemap, 'review')){ // If the specific site contains the reviews or not
        $specific_reviews   = $Results -> pagemap -> review[0]->ratingcount ;
        $specific_ratestars = $Results -> pagemap -> review[0]->ratingstars ;
     }
    }
    $mystring = $htmlSnippet = $Results -> htmlSnippet;
    $findstate   = $state;
    $findbusnesName   = $One['BN'];
    $posState = strpos($mystring, $findstate);
    $businessArray = explode(' ', $findbusnesName);
    foreach($businessArray as $Each){
       if(strpos($htmlSnippet,$Each) === false)
            $flag = false;
    }

    if (!isset($flag)) {
        $website_link;
        if(!array_key_exists($website_link, $finalResults)){ // For duplication removal
        $finalResults[$website_link]['website_link']  = $website_link;
        $finalResults[$website_link]['specific_link'] = $specific_link;
//        echo "In ".$website_link ." The desired link is <a target='_blank' href='". $specific_link ."'>". $specific_link ."</a>";
        if(property_exists($Results, 'pagemap')){
            if(property_exists($Results->pagemap, 'review')){
                $finalResults[$website_link]['specific_ratestars'] = $specific_ratestars;
                $finalResults[$website_link]['specific_reviews']   = $specific_reviews;
//             echo " and its rating stars are ".$specific_ratestars." and # of reviews are ".$specific_reviews;
            }
        }
    } // For duplication removal
    }
}
}

foreach($finalResults as $last){
//        echo "In ".$last['website_link'] ." The desired link is <a target='_blank' href='". $last['specific_link'] ."'>". $last['specific_link']."</a>";
        $checkQuery = "SELECT * FROM nearby_citation WHERE `mainID` = '".$mainID."' AND nearbyID = '".$One['nearbyID']."' AND `website_link` = '".stripslashes($last['website_link'])."' AND `specific_link` = '".stripslashes($last['specific_link'])."'";
        if(runquery_count($checkQuery) == '0'){
            $InsertCitation = "INSERT INTO nearby_citation SET
                                    `mainID` = '".$mainID."',
                                    `nearbyID` = '".$One['nearbyID']."',
                                    `website_link`  = '".addslashes($last['website_link'])."',
                                    `specific_link` = '".addslashes($last['specific_link'])."'
            ";
        }
        if(array_key_exists('specific_ratestars', $last)){
//             echo " and its rating stars are ".$last['specific_ratestars']." and # of reviews are ".$last['specific_reviews'];
             if(runquery_count($checkQuery) == '0'){
             $InsertCitation.= ",`specific_ratestars` = '".addslashes($last['specific_ratestars'])."',`specific_reviews` = '".addslashes($last['specific_reviews'])."'";
             }
        }
        if(runquery_count($checkQuery) == '0'){
            runquery($InsertCitation);
        }
//        echo "<hr/>";
        
}
} // foreach nearby data
} // if some record exists
?>
