<?php
include "include/db_conection.php";

$con=connect_bd();

if (isset ($_POST['first_name1'])) { $first_name1=$_POST['first_name1']; } else { $first_name1=''; }
if (isset ($_POST['last_name1'])) { $last_name1=$_POST['last_name1']; } else { $last_name1=''; }
if (isset ($_POST['email1'])) { $email1=$_POST['email1']; } else { $email1=''; }
if (isset ($_POST['phone1'])) { $phone1=$_POST['phone1']; } else { $phone1=''; }
if (isset ($_POST['city1'])) { $city1=$_POST['city1']; } else { $city1=''; }
if (isset ($_POST['state1'])) { $state1=$_POST['state1']; } else { $state1=''; }

mysql_query("INSERT INTO free_business_report (first_name, last_name, email, phone, city, state) VALUES ('$first_name1', '$last_name1', '$email1', '$phone1', '$city1', '$state1')")
			or die(mysql_error());

mysql_close($con);

?>
