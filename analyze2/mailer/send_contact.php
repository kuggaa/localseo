<?php
$to = 'info@nativerank.com';
$subject = 'Contact Form - LocalSEO';
$contenido ='';
$headers = 'de: info@nativerank.com' . "\r\n" .
    'Reply-To: info@nativerank.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

  if (isset ($_POST['name'])) { $name=$_POST['name']; } else { $name=''; }
  if (isset ($_POST['email'])) { $email=$_POST['email']; } else { $email=''; }
  if (isset ($_POST['subject'])) { $subject=$_POST['subject']; } else { $subject=''; }
  if (isset ($_POST['message'])) { $message=$_POST['message']; } else { $message=''; }

  //armamos el html
  $contenido = '<html><body>';
  $contenido .= '<h2>Contact Form - LocalSEO</h2>';
  $contenido .= '<p>Date: '.date("d M Y").'</p>';
  $contenido .= '<hr />';
  $contenido .= '<p>Name: <strong>'.$name.'</strong>';
  $contenido .= '<p>Email: <strong>'.$email.'</strong>';
  $contenido .= '<p>Subject: <strong>'.$subject.'</strong>';
  $contenido .= '<p>Message: <strong>'.$message.'</strong>';
  $contenido .= '<hr />';
  $contenido .= '</body></html>';

  // To send HTML mail, the Content-type header must be set
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

  $headers .= 'From: LocalSEO - Contact Form; <info@nativerank.com>' . "\r\n";

  # Attempt to send email
  if(mail($to, $subject, $contenido, $headers))
    echo "Mail sent";
  else
    echo "Mail send failure - message not sent";
?>