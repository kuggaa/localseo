<?php
//die('hello');
$Query_G_Select = "SELECT * FROM google_data WHERE `mainID` = '".$mainID."'";
if(runquery_count($Query_G_Select) == '0'){ // Check if the current website data exists in google_data table of databse or not
$googleResults = google_search($searchForGoogle, $searchInZip);
//echo $first = "https://maps.googleapis.com/maps/api/place/textsearch/json?query=".urlencode('Northwestern Memorial Hospital 201 E Huron Ste #105 Chicago, IL 60611')."&sensor=false&key=AIzaSyDKtNcxljNFqN6N5igAiwW_cSpHprbsgC0";
//$test = json_decode(file_get_contents($first));
//printArray($googleResults,true);
//die;
foreach($googleResults->results as $OneResult){
  if($googleResults != '0'){ // If something wrong returned from Google api
//      echo "Results address is ".$OneResult->formatted_address."  and the current address is ".$Valid_address_format;
    $posBusinessName    = strpos($OneResult->name, $BusinessName);
//    if($OneResult->name == $BusinessName){
        $referenceID  = $OneResult->reference;
        $placedetails = places_details($referenceID);
        $posAddress   = strpos($placedetails['Address'], $street_address);
//        printarray($placedetails);
    if ($posBusinessName!== false || $posAddress !== false ) { // if provided address is a part of the result from Google Search

//        echo "<h3>Google grabbed data is following</h3>";
//        echo "Your Google Registered Name is   <strong>".$placedetails['Name']."</strong><br/>";
//        echo "Your Google Registered Address is   <strong>".$placedetails['Address']."</strong><br/>";
//        echo "Your Google Registered Phone is   <strong>".$placedetails['Phone']."</strong><br/>";
//        echo "Your Google Registered gplus link  is   <strong>".$placedetails['gplus']."</strong><br/>";
//        echo "Your Google Registered website  is   <strong>".$placedetails['website']."</strong><br/>";
//        echo "Your Google Registered # of Photos  are   <strong>".$placedetails['num_photos']."</strong><br/>";
//        echo "Your Google Rating  is <strong>".$placedetails['Rating']."</strong><br/>";
//        echo "Your Google num of categories are <strong>".$placedetails['num_cat']."</strong><br/>";

            $Query_G_Insert = "INSERT INTO google_data SET 
                                    `mainID`      = '".addslashes($mainID)."',
                                    `G_name`      = '".addslashes($placedetails['Name'])."',
                                    `G_address`   = '".addslashes($placedetails['Address'])."',
                                    `G_phone`     = '".addslashes($placedetails['Phone'])."',
                                    `G_pluslink`  = '".addslashes($placedetails['gplus'])."',
                                    `G_website`   = '".addslashes($placedetails['website'])."',
                                    `G_numphotos` = '".addslashes($placedetails['num_photos'])."',
                                    `G_rating`    = '".addslashes($placedetails['Rating'])."',
                                    `G_numcat`    = '".addslashes($placedetails['num_cat'])."'
                               ";
       
        include_once('simple_html_dom.php');

        $html = file_get_html($placedetails['gplus']);

        $total_reviews = $html->find('span.qja',0)->plaintext;
        if(!$total_reviews){
            $total_string = $html->find('div.gza',0)->plaintext;
            if($total_string){
                $first_remove = $html->find('div.gza',0)->children(0)->plaintext;
                $second_remove = $html->find('div.gza',0)->children(1)->plaintext;
                $final = str_replace($first_remove, '', $total_string);
                $final = str_replace($second_remove, '', $final);
                $total_reviews = str_replace('from everyone', '', $final);
            }
        }
        if($total_reviews  && runquery_count($Query_G_Select) == '0'){
            $Query_G_Insert.= ",`G_reviews` = '".addslashes($total_reviews)."'";
        }
        if(runquery_count($Query_G_Select) == '0'){
            runquery($Query_G_Insert);
        }
        
//        echo "Your Total Google Reviews are  <strong>".$total_reviews."</strong><br/>";
        if($placedetails['num_photos']){
            $PhotoID = $googleResults->results[0]->photos[0]->photo_reference;
            $photo = getPlacePhoto($PhotoID,'100','100');
//            echo "Google Registered Image for This business is ".$photo."<br/>";
        }
        break;
    } // basic if ends here
    else
      echo "No Results Found";
  } // if some thing wrong happended with google api call
  else
      echo "Some thing wrong happened with Google api";
} // end of foreach
}
?>