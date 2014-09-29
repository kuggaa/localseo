<?php

$package_value = $_POST['package_value'];

$fname = $_POST['fname'];

$lname = $_POST['lname'];

$url = $_POST['url'];

$email = $_POST['email'];

$buisness = $_POST['buisness'];

$keyword = $_POST['keyword'];

$goals = $_POST['goals'];

$comp1 = $_POST['comp1'];

$comp2 = $_POST['comp2'];

$comp3 = $_POST['comp3'];

$acname = $_POST['acname'];

$ccard = $_POST['ccard'];

$cvv = $_POST['cvv'];


				
			$to = 'accounting@nativerank.com';	
				
			$sender = $email;
			$msg = 'Thank you for applying.';
			$headers = 'From: ' . $sender. "\r\n";
			$headers .= 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";			
			$subject = 'Apply For LocalSEO';
			$message = "Hi,<br /> Please provide my package";
			$message .= "<br /><table>";
			$message .= "<tr><td>Name: </td><td>".$fname."</td></tr>";
			$message .= "<tr><td>Last Name: </td><td>".$lname."</td></tr>";
			$message .= "<tr><td>URL: </td><td>".$url."</td></tr>";
			$message .= "<tr><td>Package: </td><td>".$package_value."</td></tr>";
			$message .= "<tr><td>Email: </td><td>".$email."</td></tr>";
			$message .= "<tr><td>Buisness: </td><td>".$buisness."</td></tr>";
			$message .= "<tr><td>Keyword: </td><td>".$keyword."</td></tr>";
			$message .= "<tr><td>Goals: </td><td>".$goals."</td></tr>";
			$message .= "<tr><td>Competitiors-1: </td><td>".$comp1."</td></tr>";
			$message .= "<tr><td>Competitiors-2: </td><td>".$comp2."</td></tr>";
			$message .= "<tr><td>Competitiors-3: </td><td>".$comp3."</td></tr>";
			$message .= "<tr><td>Account Name: </td><td>".$acname."</td></tr>";
			$message .= "<tr><td>Credit Card Number: </td><td>".$ccard."</td></tr>";
			$message .= "<tr><td>CVV Number: </td><td>".$cvv."</td></tr></table>";	
			$message .= "<br />Regards,<br />" .$name;						
			mail($to, $subject, $message, $headers);			
			
		header("Location:http://localseo.com/thankyou.php");

?>