<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Local Search Engine Optimization | Search Solutions | Local SEO</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/layout.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>

        <link href='http://fonts.googleapis.com/css?family=Alef:400,700' rel='stylesheet' type='text/css'>

<style type="text/css">
	#precheckform {
	  background: url("img/form_bg.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
	  height: 533px;
	  margin-left: 250px;
	  margin-top: 24px;
	  position: relative;
	  width: 326px;
	}
	#precheckform input.text {
	  background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
	  border: medium none;
	  color: #777777;
	  font-size: 14px;
	  height: 19px;
	  left: 29px;
	  padding: 3px;
	  position: absolute;
	  width: 262px;
	}
	#precheckform input.busname {
	  top: 198px;
	}
	#precheckform input.busphone {
	  top: 250px;
	}
	#precheckform input.busaddress {
	  top: 302px;
	}
	#precheckform input.buszip {
	  top: 354px;
	}
	#precheckform input.checknow {
	  background: url("img/button-checknow.png") no-repeat scroll center bottom rgba(0, 0, 0, 0);
	  bottom: 83px;
	  height: 34px;
	  left: 50%;
	  margin-left: -136px;
	  position: absolute;
	  width: 272px;
	}
	#container {
	  min-height: 1080px;
	}
</style>
    </head>
    <body>

    	<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PGGHV6"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PGGHV6');</script>
<!-- End Google Tag Manager -->


<a href="#mobileClass" id="anchor">.</a>
        <div id="container">
                        
            <?php include('header.php'); ?>

            <div id="post-head"></div>
            <div id="mobileClass"></div>

<form action="results.php" id="precheckform" method="POST">
    <input type="text" value="" id="bname" name="bname" class="text busname">
    <input type="text" value="" id="bphone" name="bphone" class="text busphone">
    <input type="text" value="" id="baddr" name="baddr" class="text busaddress">
    <input type="text" value="" id="bzip" name="bzip" class="text buszip">
    <input type="image" onclick="return validateForm()" value=" " src="img/button-checknow-over.png" class="checknow">
    <br clear="all">
    <div style="position: absolute; top: 450px; left: 30px; width: 250px; color: #ff0000; font-weight: bold;" class="timer" id="errorDiv"></div>
    <br clear="all">
</form>

            <?php include('footer.php'); ?>
            
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
