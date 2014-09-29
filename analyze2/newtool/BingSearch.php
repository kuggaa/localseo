<?php 
$Query_B_Select = "SELECT * FROM bing_data WHERE mainID = '".$mainID."'";
if(runquery_count($Query_B_Select) == '0'){ // Check if the Bing data for current Website exists or not
include_once('simple_html_dom.php');

//$html = file_get_html('http://www.bing.com/local/default.aspx?where=seattle&what=Stetner+Auto+body');
$tofind = urlencode($BusinessName);

$findIn = urlencode($city);

$requestLinkBing = 'http://www.bing.com/local/default.aspx?where='.$findIn.'&what='.$tofind;

$html = file_get_html($requestLinkBing);

foreach($html->find('ol#srs_orderedList li') as $element){
    $photoexists = false;

    $title = $element->find('div.ecHeader',0)->plaintext;
    $link = "http://www.bing.com".$element->find('a.ecHeaderLink',0)->href;
//    echo "<a href='$link' target='_blank'>$title</a>";
//    echo "<br/><br/>";
    if($link){ // for finding photo
        $forPhoto = file_get_html($link);
        if($forPhoto){ // If this link worked then the code will execute
        $Checkfindphoto = $forPhoto -> find('div#atAGlance img',0);
        if($Checkfindphoto)
        $findphoto = $forPhoto -> find('div#atAGlance img',0)->src;
        $findme = 'noimg';
        $posNoimage = strpos($findphoto,$findme);
        if($posNoimage === false){
//            echo "<img src='".$findphoto."' width='50' height='50'/>";
            $photoexists = true;
        }
        }
    }
//    die;
    $address = $element->find('div.ecAddress',0)->plaintext;
//    echo "<strong>Address :- </strong>$address";
//    echo "<br/><br/>";
    if($element->find('span.rating',0)){
    $B_rating = $element->find('span.rating',0)->title;
//    echo "<strong>Rating :- </strong>$B_rating";
    }
//    echo "<br/><br/>";
    if($element->find('div.ecSingleLine a',0)){
    $B_reviews = $element->find('div.ecSingleLine a',0)->plaintext;
//    echo "<strong>Reviews :- </strong>$B_reviews";
    }
//    echo "<br/><br/>";
    $forwebsite = $element->find('div.ecActionLinks',0)->getAttribute('class');
    if($forwebsite == 'ecActionLinks'){
        if($element->find('div.ecActionLinks a',0)->plaintext == 'Website'){
            $B_website = $element->find('div.ecActionLinks a',0)->href;
//            echo "<strong>Website :- </strong><a href='$B_website'>$B_website</a>";
        }
    }
    else{
        $forwebsite = $element->find('div.ecActionLinks',1);
//        echo $forwebsite->find('a',0)->plaintext;
        if($forwebsite->find('a',0)->plaintext == 'Website'){
            $B_website = $forwebsite->find('a',0)->href;
//            echo "<strong>Website :- </strong><a href='$B_website'>$B_website</a>";
        }
        
    }
//    echo $element->find('div.ecActionLinks a',0)->plaintext;
//    echo "<br/><br/>";
    
    if($title == $BusinessName || $website == $B_website){ // Either Title is equal to businessName or the website matches
        
            $Query_B_Insert = "INSERT INTO bing_data SET 
                                            `mainID`      = '".addslashes($mainID)."',
                                            `B_name`      = '".addslashes($title)."',
                                            `B_link`      = '".addslashes($link)."',
                                            `B_website`   = '".addslashes($B_website)."',
                                            `B_reviews`   = '".addslashes($B_reviews)."',
                                            `B_rating`    = '".addslashes($B_rating)."'
                                        ";
           if(isset($photoexists) && $photoexists == true) // if Photo exists actually on bing
               $Query_B_Insert .= ",B_numphoto = '1'";
                runquery($Query_B_Insert);
//                
//    echo "<a href='$link' target='_blank'>$title</a>";
//    echo "<br/><br/>";
//    echo "<strong>Address :- </strong>$address";
//    echo "<br/><br/>";
//    echo "<strong>Rating :- </strong>$B_rating";
//    echo "<br/><br/>";
//    echo "<strong>Reviews :- </strong>$B_reviews";
//    echo "<br/><br/>";
//    echo "<strong>Website :- </strong><a href='$B_website'>$B_website</a>";
                
        }
    }
//    echo "<hr>";
  }

?>