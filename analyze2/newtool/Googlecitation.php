<?php

//echo '<h3>Google Citation Competition</h3>';
//echo "<h3>Zip Code is  ".$searchInZip."</h3>";
$CSR   =   customsearch($forCustomSearch);
//printarray($CSR);
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
        $CSR   =   customsearch($forCustomSearch,($i*10+1),10);
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
    $findbusnesName   = $BusinessName;
    $posState = strpos($mystring, $findstate);
    $businessArray = explode(' ', $findbusnesName);
    foreach($businessArray as $Each){  // Means if in any website in description the full given business name is found, it means that is the link we need
       if(strpos($htmlSnippet,$Each) === false)
               $flag = false;
    }
//    $posBusinessName    = strpos($mystring, $findbusnesName);
    if (!isset($flag)) {
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
        $checkQuery = "SELECT * FROM citation WHERE `mainID` = '".$mainID."' AND `website_link` = '".stripslashes($last['website_link'])."' AND `specific_link` = '".stripslashes($last['specific_link'])."'";
        if(runquery_count($checkQuery) == '0'){
            $InsertCitation = "INSERT INTO citation SET
                                    `mainID` = '".$mainID."',
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
?>
