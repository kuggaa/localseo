<?php
include "include/db_conection.php";

$con=connect_bd();

if (isset ($_POST['first_name2'])) { $first_name2=$_POST['first_name2']; } else { $first_name2=''; }
if (isset ($_POST['last_name2'])) { $last_name2=$_POST['last_name2']; } else { $last_name2=''; }
if (isset ($_POST['email2'])) { $email2=$_POST['email2']; } else { $email2=''; }
if (isset ($_POST['phone2'])) { $phone2=$_POST['phone2']; } else { $phone2=''; }
if (isset ($_POST['city2'])) { $city2=$_POST['city2']; } else { $city2=''; }
if (isset ($_POST['state2'])) { $state2=$_POST['state2']; } else { $state2=''; }

mysql_query("INSERT INTO free_local_sweepstakes (first_name, last_name, email, phone, city, state) VALUES ('$first_name2', '$last_name2', '$email2', '$phone2', '$city2', '$state2')")
			or die(mysql_error());

mysql_close($con);

?>
