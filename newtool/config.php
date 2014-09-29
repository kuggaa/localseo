<?php

// JUST CHANGE THE BELOW DATABASE SETTINGS AND NO OTHER CHANGES NEED. IT WILL WORK.

$googleapikey = "AIzaSyD4jzo_kgEdT3yS87CMBYNOuM8kBfqtsMQ"; // Google Api key can be obtained from here https://code.google.com/apis/console/

$YahooApiKey   = "dj0yJmk9TU1IcWJZTnVqcHUwJmQ9WVdrOVFYaGxNVWswTTJNbWNHbzlNVEV6T1RNek1qazJNZy0tJnM9Y29uc3VtZXJzZWNyZXQmeD03YQ--";
// Yahoo Api key can be get from here http://developer.yahoo.com/

$CSEK  =  '006542820062285865863:hrahlcl197w';

$db_Host = '192.168.13.33';
$db_User = 'localseotooluser';
$db_Pass = 'vB9T4txg';
$db_Name = 'localseotool1';

 /*
 mysql_connect("localhost", "localseo_newtool", "ntool@123") or die(mysql_error()); 
 mysql_select_db("localseo_newtool") or die(mysql_error()); 
 $data = mysql_query("SELECT * FROM main_data") 
 or die(mysql_error()); 
 Print "<table border cellpadding=3>"; 
 while($info = mysql_fetch_array( $data )) 
 { 
 Print "<tr>"; 
 Print "<th>Name:</th> <td>".$info['business_name'] . "</td> "; 
 Print "<th>Pet:</th> <td>".$info['street_address'] . " </td></tr>"; 
 } 
 Print "</table>"; 
 */ 

include_once('globaldatabase.php');
?>