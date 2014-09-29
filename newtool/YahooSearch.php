<?php

$Query_Y_Select = "SELECT * FROM yahoo_data WHERE mainID = '".$mainID."'";
if(runquery_count($Query_Y_Select) == '0'){ // Check if Yahoo Data For Current Website exists or not
$YahooResults = getYahooSearch($BusinessName,$searchInZip);

//printarray($YahooResults);

//echo "<h3>Yahoo Search Results For Your Business are Following</h3>";
//echo "<div>Your Yahoo Name is <strong> : ".$YahooResults['yahoo_name']." </strong></div>";
//echo "<div>Categories <strong> : ".$YahooResults['num_categories']." </strong></div>";
//echo "<div>Yahoo Location Link <strong> : ".$YahooResults['yahoo_link']." </strong></div>";
//echo "<div>Website Registered in Yahoo is  <strong> : ".$YahooResults['website']." </strong></div>";
//echo "<div>Total Reviews on Yahoo are  <strong> : ".$YahooResults['total_reviews']." </strong></div>";
//echo "<div>Average Ratings on Yahoo are  <strong> : ".$YahooResults['average_rating']." </strong></div>";


    $Query_Y_Insert = "INSERT INTO yahoo_data SET 
                                `mainID`      = '".addslashes($mainID)."',
                                `Y_name` = '".addslashes($YahooResults['yahoo_name'])."',
                                `Y_numcat` = '".addslashes($YahooResults['num_categories'])."',
                                `Y_link` = '".addslashes($YahooResults['yahoo_link'])."',
                                `Y_website` = '".addslashes($YahooResults['website'])."',
                                `Y_reviews` = '".addslashes($YahooResults['total_reviews'])."',
                                `Y_rating` = '".addslashes($YahooResults['average_rating'])."'
                            ";
    runquery($Query_Y_Insert);
}


?>
