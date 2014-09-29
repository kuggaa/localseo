<?php

function temp_password() {
    $length = 8;
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars), 0, $length);
}


function getYahooSearch($ToSearch,$zip){
    global $YahooApiKey;
    $ToSearch = urlencode($ToSearch);
    $RequestYahooResults = "http://local.yahooapis.com/LocalSearchService/V3/localSearch?appid=".$YahooApiKey."&query=".$ToSearch."&zip=".$zip."&results=1&output=php";
    $SearchResults = unserialize(file_get_contents($RequestYahooResults));
//    printarray($SearchResults);
    $YahooSearchResults['yahoo_name'] = $SearchResults['ResultSet']['Result']['Title'];
    $YahooSearchResults['num_categories'] = count($SearchResults['ResultSet']['Result']['Categories']['Category']);
    $YahooSearchResults['yahoo_link'] = $SearchResults['ResultSet']['Result']['Url'];
    $YahooSearchResults['website'] = $SearchResults['ResultSet']['Result']['BusinessUrl'];
    $YahooSearchResults['total_reviews'] = $SearchResults['ResultSet']['Result']['Rating']['TotalReviews'];
    $YahooSearchResults['average_rating'] = $SearchResults['ResultSet']['Result']['Rating']['AverageRating'];
    return $YahooSearchResults;
}

function latlonfromzip($zip) {
    if ($zip == '')
        return "Wrong zip code";
    else {
        $URL = "http://maps.google.co.uk/maps/geo?q=" . urlencode($zip . ",USA") . "&output=csv";
        $data = file_get_contents($URL);

        if ($data) {
            $data = explode(",", $data);
            if ($data[0] != 200) {
                $long = "";
                $lat = "";
            } else {
                $long = $data[3];
                $lat = $data[2];
            }
        }
        
        if($long=='' || $lat == ''){
            $nextURL = 'http://maps.googleapis.com/maps/api/geocode/json?address='.$zip.'+USA&sensor=false&output=json';
            $data_next = json_decode(file_get_contents($nextURL));
            $lat  = $data_next->results[0]->geometry->location->lat;
            $long = $data_next->results[0]->geometry->location->lng;
        }

        $latlon_arr = array("longitude" => $long, "latitude" => $lat);
        return $latlon_arr;
    }
}

function getZipFromlatlon($latlon=''){
    if ($latlon == '')
        return "";
    else {
          $URL = "http://maps.google.co.uk/maps/geo?q=" . urlencode($latlon);
          $data = json_decode(file_get_contents($URL));
          
          $zipcode = $data->Placemark['0']->AddressDetails->Country->AdministrativeArea->SubAdministrativeArea->Locality->DependentLocality->PostalCode->PostalCodeNumber;
          
          if($zipcode=='' || !isset($zipcode)){
          $zipcode = $data->Placemark['0']->AddressDetails->Country->AdministrativeArea->Locality->PostalCode->PostalCodeNumber;
          }
          
          if($zipcode=='' || !isset($zipcode)){
           $zipcode = $data->Placemark['0']->AddressDetails->Country->AdministrativeArea->Locality->DependentLocality->PostalCode->PostalCodeNumber;
          }
          
          if($zipcode=='' || !isset($zipcode)){
           $zipcode = $data->Placemark['0']->AddressDetails->Country->AdministrativeArea->SubAdministrativeArea->Locality->PostalCode->PostalCodeNumber;
           
          }
          
          if($zipcode=='' || !isset($zipcode))
          $zipcode = $data->Placemark['0']->AddressDetails->Country->AdministrativeArea->Locality->PostalCode->PostalCodeNumber;
          
          if($zipcode=='' || !isset($zipcode))
          $zipcode = $data->Placemark['0']->AddressDetails->Locality->PostalCode->PostalCodeNumber;
          
//         if($zipcode=='' || !isset($zipcode)){
//           $zipcode = $data;
//           printarray($zipcode);
//          }
                    
          return $zipcode;
              
          
    }
}

function getfulllocation($zipcode = '') {
    global $default_search_zip;
//    $zipcode  = $zipcode  = '' ?  $zipcode   :  $default_search_zip;
    if ($zipcode == '')
        return "Zip code is empty";
    else {
          $URL = "http://maps.google.co.uk/maps/geo?q=" . urlencode($zipcode . ",USA");
          $data = json_decode(file_get_contents($URL));
         return $data->Placemark['0']->address;
    }
}

function google_search($tosearch = '', $zipcode = '') { // range in meters
    global $googleapikey;
    if ($zipcode == '')
        return "Zip code is empty";
    else {
        $tosearch   = urlencode($tosearch);
        $zipdetails = latlonfromzip($zipcode);
        $latitude   = $zipdetails['latitude'];
        $longtitude = $zipdetails['longitude'];

        $toget = "https://maps.googleapis.com/maps/api/place/textsearch/json?query=" . $tosearch . "&sensor=false&key=" . $googleapikey;
        $toreturn = json_decode(file_get_contents($toget));
//        printarray($toreturn);
        if($toreturn->status == 'OK')
            return $toreturn; 
        else
            return '0'; // something wrong happened
    }
}

function places_details($reference) {
    global $googleapikey;
    $toget = "https://maps.googleapis.com/maps/api/place/details/json?reference=" . $reference . "&sensor=true&key=" . $googleapikey;
    $results = json_decode(file_get_contents($toget));
    $results = $results->result;
//    printarray($results);
//    return $results;
    $types = $results->types;
    $reviews = $results->reviews;
    if(property_exists($results, 'photos')){
        $photos  = $results->photos;
        $num_photos = count($photos);
    }
    else
        $num_photos = 0;
     
//    echo "Total photos are  ".count($photos);
    $placedetails = array(
        'Name' 	     => $results->name,
        'Address' => $results->formatted_address,
//        'uniqueid' => $results->id,
        'Phone' => $results->international_phone_number,
        'gplus' => $results->url,
        'Rating' => $results->rating,
        'website' => $results->website,
        'num_photos' => $num_photos,
//        'url' => $results->url,
//        'lat' => $results->geometry->location->lat,
//        'lng' => $results->geometry->location->lng,
        'num_cat' => count($types),
//        'reviews'  => $reviews
    );
//    printarray($reviews,'die');
    return $placedetails;
}


function google_NearBy_search($tosearch = '', $zipcode = '', $range = '') { // range in meters
    global $googleapikey;
    if($range == '') $range = '20000';
    if ($zipcode == '')
        return "Zip code is empty";
    else {
        $tosearch = urlencode($tosearch);
        $zipdetails = latlonfromzip($zipcode);
        $latitude   = $zipdetails['latitude'];
        $longtitude = $zipdetails['longitude'];

        $toget    = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?rankby=distance&location=" . $latitude . "," . $longtitude . "&keyword=" . $tosearch . "&sensor=false&key=" . $googleapikey;
        $results = json_decode(file_get_contents($toget));
//        echo "I am here";
//        printarray($results,'die');
        $i = 0;
        $toreturn = array();
        foreach($results->results as $OneResult){
            if($i==1) $location = 'A';else $location = 'B';
            if($i >=2 ) break;
            $businessName  = $OneResult->name;
            $lat  = $OneResult->geometry->location->lat;
            $lng  = $OneResult->geometry->location->lng;
            $referenceID  = $OneResult->reference;
            $placeDetails = places_details($referenceID);
            $curr_address = $placeDetails['Address'];
            
            $toreturn[$location] = array(
                                    'BN' => $businessName,
                                    'BA' => $curr_address,
                               );
//            $distance = number_format(distance($lat,$lng,$latitude,$longtitude,'M'), 2, '.', '');
//            echo "Business Name is  ".$businessName." and its distance is <strong>".$distance."</strong> Meters";
//            echo "<br/><br/><br/>";
            $i++;
        }
        return $toreturn;
    }
}



function getPlacePhoto($photoreference, $height = '50', $width = '50') {
    global $googleapikey;
    $toget = "https://maps.googleapis.com/maps/api/place/photo?photoreference=" . $photoreference . "&sensor=false&maxheight=" . $height . "&maxwidth=" . $width . "&key=" . $googleapikey;
    return $photo = "<img src='" . $toget . "'/>";
    // return $image =  file_get_contents($toget);
}

function redirectTohttps() {
    if ($_SERVER['HTTPS'] != "on") {
        global $ServerPath;
        echo "<script type='text/javascript'>top.location.href = '$ServerPath';</script>";
        exit;
//        return '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Warning! You are browsing unsecurely</strong>  <a href="' . $FBpage . '" target="_top">Browse with https</a>.</div>';
    }
//    else
//        return 1;
}


function customsearch($tosearch,$start=1,$num=10){
    
    global $googleapikey;
//    $googleapikey = 'AIzaSyAjq5aT9iOWISa0977y557UBUL3lUU48yQ';
    global $CSEK;
    $tosearch   = urlencode($tosearch);
    $link       =    'https://www.googleapis.com/customsearch/v1?key='.$googleapikey.'&cx='.$CSEK.'&q='.$tosearch."&start=".$start."&num=".$num;
    try {
    $contents = @file_get_contents($link);
        if($contents === FALSE)
            echo "There is some problem creating the report. Please contact Administrator";
        else
            return $results    = json_decode($contents);
    }
    catch (Exception $e) {
        echo $e->getMessage();
    }
    
}

function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}


function getimage($bool){
    if($bool == '0')
        echo '<img title="Deactive" src="images/x.png" style="padding:0px 15px;">';
    else
        echo '<img title="Active" src="images/check.png" style="padding:0px 15px;">';
        
}

function RightImage(){
    echo '<img title="Active" src="images/check.png">';
}

function WrongImage(){
    return '<img title="Active" src="images/x.png">';
}

function getSmallSentiment($value,$width = '30',$height = '30'){
    switch(true){
        case ($value <= 2 ):
                return '<img width="'.$width.'" height="'.$height.'" title="Angry" alt="Angry Sentiment" src="http://www.nengine.d4s.me/sentiment/Face-Angry.PNG">';
                break;
        case ($value <= 3 ):
                return '<img width="'.$width.'" height="'.$height.'" title="Smile" alt="Smile Sentiment" src="http://www.nengine.d4s.me/sentiment/Face-Smile.PNG">';
                break;
        case ($value <= 4 ):
                return '<img width="'.$width.'" height="'.$height.'" title="Wink"  alt="Wink Sentiment" src="http://www.nengine.d4s.me/sentiment/Face-Wink.PNG">';
                break;
        case ($value <= 5 ):
                return '<img width="'.$width.'" height="'.$height.'" title="Smile" alt="Smile Big Sentiment" src="http://www.nengine.d4s.me/sentiment/Face-Smile-Big.PNG">';
                break;

        default:
                return '<img title="Default" width="50" height="50" alt="Default Sentiment" src="http://www.nengine.d4s.me/sentiment/Face-Angry.PNG">';
        } 
}

function getgooglepercentage($numcat,$numkeywords,$numreviews,$numphotos,$website){
    $total = 0;
    if($numcat >= 2)  $total += 1;
    if($numkeywords >= 5) $total += 1;
    if($numreviews >= 10) $total += 1;
    if($numphotos >= 10)  $total += 1;
    if($website != '') $total += 1;
    $average = ($total * 100)/5;
    if($average == 0)
        echo "<span id='googlepercentage' rel='0' style='font-size:22px;'>Not Present</span>";
    else
        echo "<span rel='".$average."' id='googlepercentage'>".$average."</span>%";
}

function getYahoopercentage($numcat,$numreviews,$numphotos,$website,$claimed){
    $total = 0;
    if($numcat >= 2)  $total += 1;
    if($numreviews >= 10) $total += 1;
    if($numphotos != '0')  $total += 1;
    if($website != '') $total += 1;
    if($claimed != '0') $total += 1;
    $average = ($total * 100)/5;
    if($average == 0)
        echo "<span id='yahoopercentage' rel='0' style='font-size:22px;'>Not Present</span>";
    else
        echo "<span rel=".$average." id='yahoopercentage'>".$average."</span>%";
}

function getBingpercentage($numcat,$numreviews,$numphotos,$website){
    $total = 0;
    if($numcat >= 5)  $total += 1;
    if($numreviews >= 10) $total += 1;
    if($numphotos == 1)  $total += 1;
    if($website != '') $total += 1;
    $average = ($total * 100)/4;
    if($average == 0)
        echo "<span style='font-size:22px;' rel='0' id='bingpercentage'>Not Present</span>";
    else
        echo "<span rel=".$average." id='bingpercentage'>".$average."</span>%";
}


?>