<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Local SEO Company | Local Search Engine Optimization Services</title>
<meta name="description" content="Local SEO offers local SEO services to small and medium business. Our Local SEO services can help any local business acquire new customers through digital marketing, Google Local business marketing, small business SEO and online directories.">

<!-- Responsive and mobile friendly stuff -->
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Stylesheets -->
<link rel="stylesheet" href="css/col.css" media="all">
<link rel="stylesheet" href="css/2cols.css" media="all">
<link rel="stylesheet" href="css/3cols.css" media="all">
<link rel="stylesheet" href="css/4cols.css" media="all">
<link rel="stylesheet" href="css/1024.css" media="all">
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/layout.css">
<script src="js/vendor/modernizr-2.6.2.min.js"></script>

<!--[if lt IE 9]>
          <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->

<link href='http://fonts.googleapis.com/css?family=Alef:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<script type="text/javascript">
var email1 = '';
var email2 = '';
var errorActive = false;
var validEmail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

function valideForm1(form)
    {
        $(".error_message1").html('');
        errorActive = false;
        first_name1 = $('#first_name1').val();
        last_name1 = $('#last_name1').val();
        email1 = $('#email1').val();
        phone1 = $('#phone1').val();
        city1 = $('#city1').val();
        state1 = $('#state1').val();

        var dataString1 = 'first_name1='+ first_name1 + '&last_name1=' + last_name1 + '&email1=' + email1 + '&phone1=' + phone1 + '&city1=' + city1 + '&state1=' + state1;  

      if(first_name1 == ''){
       errorActive = true;
       $(".error_message1").fadeIn('slow').html('First Name is required.');   
       $('#first_name1').focus();
      }else if(last_name1 == ''){
       errorActive = true;
       $(".error_message1").fadeIn('slow').html('Last Name is required.');   
       $('#last_name1').focus();
      }else if(email1 == '') {
       errorActive = true;
       $(".error_message1").fadeIn('slow').html('Email Address is required.');  
       $('#email1').focus();
      }else if(!validEmail.test(email1)){
       errorActive = true;
       $(".error_message1").fadeIn('slow').html('Email Address must be a valid email address.');  
       $('#email1').focus();
      }else if(phone1 == ''){
       errorActive = true;
       $(".error_message1").fadeIn('slow').html('Phone is required.');   
       $('#phone1').focus();
      }else if(city1 == ''){
       errorActive = true;
       $(".error_message1").fadeIn('slow').html('City is required.');   
       $('#city1').focus();
      }else if(state1 == ''){
       errorActive = true;
       $(".error_message1").fadeIn('slow').html('State is required.');   
       $('#state1').focus();
      }else if(errorActive!=true){
        $.ajax({  
            type: "POST",  
            url: "insert_business_report.php",  
            data: dataString1,  
            success: function(response)
            {
                $(".error_message1").fadeIn('slow').html('Thanks, your information has been submited.'); 
                blank_inputs();
                $("#form1 input").attr('disabled', 'disabled');
            }
        });         

    }else {
        return false;  
    }
    return false;       
} /*End form validation */

function valideForm2(form)
    {
        $(".error_message2").html('');
        errorActive = false;
        first_name2 = $('#first_name2').val();
        last_name2 = $('#last_name2').val();
        email2 = $('#email2').val();
        phone2 = $('#phone2').val();
        city2 = $('#city2').val();
        state2 = $('#state2').val();

        var dataString2 = 'first_name2='+ first_name2 + '&last_name2=' + last_name2 + '&email2=' + email2 + '&phone2=' + phone2 + '&city2=' + city2 + '&state2=' + state2;  

      if(first_name2 == ''){
       errorActive = true;
       $(".error_message2").fadeIn('slow').html('First Name is required.');   
       $('#first_name2').focus();
      }else if(last_name2 == ''){
       errorActive = true;
       $(".error_message2").fadeIn('slow').html('Last Name is required.');   
       $('#last_name2').focus();
      }else if(email2 == '') {
       errorActive = true;
       $(".error_message2").fadeIn('slow').html('Email Address is required.');  
       $('#email2').focus();
      }else if(!validEmail.test(email2)){
       errorActive = true;
       $(".error_message2").fadeIn('slow').html('Email Address must be a valid email address.');  
       $('#email2').focus();
      }else if(phone2 == ''){
       errorActive = true;
       $(".error_message2").fadeIn('slow').html('Phone is required.');   
       $('#phone2').focus();
      }else if(city2 == ''){
       errorActive = true;
       $(".error_message2").fadeIn('slow').html('City is required.');   
       $('#city2').focus();
      }else if(state2 == ''){
       errorActive = true;
       $(".error_message2").fadeIn('slow').html('State is required.');   
       $('#state2').focus();
      }else if(errorActive!=true){
        form.submit();        

    }else {
        return false;  
    }
    return false;       
} /*End form validation */
</script>
<style type="text/css">
.blue {
	color: #117CCD;
}
.red {
	color: #CC0000 !important;
}
.green {
	color: #68982F !important;
}
.redButtton i {
	color: #FFFFFF !important;
	font-size: 29px;
	text-decoration: none;
}
</style>
</head>
<body onload="init();">

<!-- Google Tag Manager -->
<noscript>
<iframe src="//www.googletagmanager.com/ns.html?id=GTM-PGGHV6"
height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PGGHV6');</script> 
<!-- End Google Tag Manager -->

<div id="container">
<?php include('header.php'); ?>
<div id="post-head"></div>
<div id="hero" class="full-w">
  <div> <span style="color: rgb(17, 124, 205); white-space: nowrap; text-decoration: none; text-transform: uppercase; font-size: 24px; font-weight: normal;">Our Local SEO Solution</span>
    <h1><span class="black">Strategy</span> <i>+</i> <span class="black">Local business listings</span> <i>+</i><br>
      <span class="black">Local Seo</span> <i>+</i> <span class="black">Real time Reporting</span> <i>=</i> <br />
      <span class="first red">Your Company’s Success</span><br />
      <!--<span class="second">More Customers, More Sales, <br />More Phone Calls</span>--></h1>
    <!-- <a href="packages.php" style="text-decoration: none;"><div class="redButtton"><span>Pick your package <br /><i style="color:#000 important;">today!</i></span></div></a> --> 
  </div>
  
</div>
<div class="colo_border" style="margin:0 auto; max-width: 1000px;"><img src="img/colouredborder.png"> </div>
<div id="act-boxes" class="cont-w" style="height: 225px;">
  <div class="shade first col span_1_of_3"> <img src="img/grid1.png">
   
    <a href="listing-precheck.php">Check Now</a> </div>
  <div class="shade second col span_1_of_3"> <img src="img/grid2.png">
    
    <a href="analyze.php">Analyze</a> </div>
  <div class="shade third col span_1_of_3">
    <div class="learnmore"><a class="lmore" href="local-seo-grant.php">Learn More</a></div>
    <img src="img/grid3.png">
   
    <a id="poplink-2">Apply Now</a> </div>
</div>


<div id="main-content" class="cont-w clear">
<div class="colo_border"><img src="img/colouredborder.png"> </div>
  <div class="cnt_space1">
    <div class="subject_thumb"> <img src="img/onmap.png"> </div>
    <div class="subject_txt">
      <h2>We Put Your Business On The Map, Literally.</h2>
      <p>Today’s online marketplace demands solutions that fit potential customers’ needs now, more than ever.  
        With traditional media taking a back seat to online strategies and mobile optimization, it is crucial to the 
        success of businesses to be present when users are searching for their products or services. </p>
      <p>There are daily hurdles associated with marketing and advertising budgets for a business; however, if you are not 
        allocating dollars towards an online campaign and a customer can’t find you, you can be certain they are finding 
        your competitors.</p>
      </h2>
    </div>
    <div class="colo_border"><img src="img/colouredborder.png"> </div>
    <div class="clear"></div>
  </div>
  <div class="cnt_space2">
  <div class="colo_border"><img src="img/colouredborder.png"> </div>
    <div class="subject_thumb"> <img src="img/riseabove.png"> </div>
    <div class="subject_txt">
      <h2>Rise Above Your Competition</h2>
      <p>Local SEO takes the time to research and understand your business to be sure we are developing a strategy aimed 
        at your target demographics.  We live in a time where consumers are far more educated than they’ve ever been; they are 
        reading up on products, reviews and information to be sure they are making the right purchase decision each, and every, time.  
        As a result of the time spent researching, you cannot afford to be absent when they are actively looking.</p>
      <p>Our specialty at Local SEO is to ensure those customers looking for your products and services are finding you over your competition.  
        By implementing strategies and tactics that are preferred by the search engines for your map data and business listings, 
        we are able to maximize your exposure and success across all fronts.  We combine the work we do with your directories and map 
        listings with revolutionary SEO technology to increase your visibility organically as well as the relevancy to searches being done 
        on a daily basis.</p>
    </div>
    <div class="colo_border"><img src="img/colouredborder.png"> </div>
    <div class="clear"></div>
  </div>
  <div class="cnt_space3">
  <div class="colo_border"><img src="img/colouredborder.png"> </div>
    <div class="subject_thumb"> <img src="img/morebusiness.png"> </div>
    <div class="subject_txt">
      <h2>Ready For More Business?</h2>
      <p>Local SEO is an online search engine optimization company that was established in 2005 on the bare foundation of improving others’ businesses through organic tactics and website optimization.  
        Our organic SEO agency offers search engine and directory optimization, consulting and other online search engine marketing services that are beneficial to businesses large and small.</p>
      <p>Our firm will carry out an SEO strategy that will increase your exposure, boost credibility and generate a higher relevancy in order to build a stronger client base for years to come!.</p>
      </h2>
    </div>
    <div class="colo_border"><img src="img/colouredborder.png"> </div>
    <div class="clear"></div>
  </div>
  </div>
  <?php include('footer.php'); ?>
</div>
<div id="pop-1" class="popup">
  <div class="shade">
    <h1>Get a FREE Business Report</h1>
    <div class="wrapForm">
      <form id="form1" onSubmit="return valideForm1(this);">
        <label>First Name:</label>
        <input type="text" name="first_name1" id="first_name1">
        <br>
        <div class="clear"></div>
        <label>Last Name:</label>
        <input type="text" name="last_name1" id="last_name1">
        <br>
        <div class="clear"></div>
        <label>Email:</label>
        <input type="text" name="email1" id="email1">
        <br>
        <div class="clear"></div>
        <label>Phone:</label>
        <input type="text" name="phone1" id="phone1">
        <br>
        <div class="clear"></div>
        <label>City:</label>
        <input type="text" name="city1" id="city1">
        <br>
        <div class="clear"></div>
        <label>State:</label>
        <input type="text" name="state1" id="state1">
        <br>
        <div class="clear"></div>
        <input class="submit" type="submit" value="GO">
      </form>
      <div class="error_message1"></div>
      <div class="close shade">X</div>
    </div>
  </div>
</div>
<div id="pop-2" class="popup">
  <div class="shade">
    <h1>Pre-Qualify for Local Seo Business Grant</h1>
    <div class="wrapForm">
      <form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST" id="form2" onSubmit="return valideForm2(this);">
        <input type="hidden" name="oid" value="00DC0000000Q2jr">
        <input type="hidden" name="retURL" value="http://localseo.com/thankyou.php">
        <!--  ----------------------------------------------------------------------  --> 
        <!--  NOTE: These fields are optional debugging elements. Please uncomment    --> 
        <!--  these lines if you wish to test in debug mode.                          --> 
        <!--  <input type="hidden" name="debug" value=1>                              --> 
        <!--  <input type="hidden" name="debugEmail" value="daniel@nativerank.com">   --> 
        <!--  ----------------------------------------------------------------------  -->
        <label for="first_name">First Name</label>
        <input  id="first_name2" maxlength="40" name="first_name" size="20" type="text" />
        <br>
        <div class="clear"></div>
        <label for="last_name">Last Name</label>
        <input  id="last_name2" maxlength="80" name="last_name" size="20" type="text" />
        <br>
        <div class="clear"></div>
        <label for="email">Email</label>
        <input  id="email2" maxlength="80" name="email" size="20" type="text" />
        <br>
        <div class="clear"></div>
        <label for="phone">Phone</label>
        <input  id="phone2" maxlength="40" name="phone" size="20" type="text" />
        <br>
        <div class="clear"></div>
        <label for="city">City</label>
        <input  id="city2" maxlength="40" name="city" size="20" type="text" />
        <br>
        <div class="clear"></div>
        <label for="state">State/Province</label>
        <input  id="state2" maxlength="20" name="state" size="20" type="text" />
        <br>
        <div class="clear"></div>
        <input type="submit" id="submit" name="submit" value="Go"  style="float: right; clear: both;">
      </form>
      <div class="error_message2"></div>
      <div class="close shade">X</div>
    </div>
  </div>
</div>
<div id="info_ww" style="display:none;">?</div>
<!-- <div id="info_wh" style="display:none;">?</div> --> 

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.3.min.js"><\/script>')</script> 
<script src="js/plugins.js"></script> 
<script src="js/jquery.filter_input.js"></script> 
<script src="js/main_home.js"></script> 
<script type="text/javascript">
jQuery(document).ready(function(){
  jQuery('#submit').val('Go');
    // if (jQuery('#mobileClass').is(':visible')) {
    //     window.location = '#mobileClass';
    // } else {
       
    // }
});

$( window ).resize(function() {
  init();
});

function init() {
  var uniwin = {
    width: window.innerWidth || document.documentElement.clientWidth
      || document.body.offsetWidth,
    height: window.innerHeight || document.documentElement.clientHeight
      || document.body.offsetHeight
  };

  $("#info_ww").text(uniwin.width);
  $("#info_wh").text(uniwin.height);
}

</script> 
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-21171343-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
