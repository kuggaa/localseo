<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Seo Reporting</title>

<meta name="description" content="Makes a Locally SEO Report for your Business" />

<meta name="keywords" content="Local SEO, business, Google place, SEO, Place, business, Yahoo, Microsoft, Bing " />

<meta name="author" content="SEO Reporting" />

<script src="js/jquery-1.7.1.js"></script> <!--jquery library-->
<!--Bootstrap html template css  and js-->
<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen"/>
<!--Bootstrap html template css  and js-->

</head>
  <body style="margin: 0 auto; width:800px;border:2px solid #ccc;padding:10px;border-radius: 4px;">
    <?php include_once 'topmenu.php';
    
    function random_captcha() {
        $length = 5;
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars), 0, $length);
    }
    ?>