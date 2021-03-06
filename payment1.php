<?php 

$package_value = $_POST['package_value'];
$fname = $_POST['fname'];

$lname = $_POST['lname'];

$url = $_POST['url'];

$email = $_POST['email'];

?>

<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->

<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->

<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Local SEO Packages | Local SEO Pricing & Package Information</title>

        <meta name="description" content="Local SEO supplies packages for every type of budget and local business. Determine which pricing strategy and package would be best for your business, here!">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">



        <link rel="stylesheet" href="css/normalize.css">

        <link rel="stylesheet" href="css/main.css">

        <link rel="stylesheet" href="css/layout.css">

        <script src="js/vendor/modernizr-2.6.2.min.js"></script>



        <link href='http://fonts.googleapis.com/css?family=Alef:400,700' rel='stylesheet' type='text/css'>

        <style type="text/css">

        .parentUl {

          float: left;

          padding-left: 36px;

          width: 46%;

        }

        .parentUl > li.parent {

          font-size: 10px;

        }

        .parentUl li.parent > a {

          font-size: 16px;

          font-weight: bold;

        }

        .parentUl li ul {

          margin-bottom: 25px;

        }

        .parentUl li ul li {

          font-size: 15px;

          font-weight: normal;

          list-style: disc outside none;

          margin-bottom: 7px;

        }

        .parentUl li ul li a{

          font-size: 17px;

        }

        #packages.cont-w {

          height: 360px !important;

        }

        div.AuthorizeNetSeal {

          float: right;

          margin: 15px 0 !important;

          clear: both;

        }

        #packages.cont-w .pricesBox a.getstarted {

          cursor: pointer;

          position: relative;

          z-index: 99999999;

        }

        .pricesBox .small, .pricesBox .starter {

          border: 1px solid #B6C2CB;

        }

        .pricesBox {

          

        }

        form {

          

        }

        #packages.cont-w h3 {

          font-size: 20px;

          font-style: normal;

          font-weight: bold;

        }

        h3.title {

          clear: both;

          float: left;

        }

        

        tr {

          margin-bottom: 20px;

        }

        td font {

          font-size: 15px;

          font-weight: bold;

          margin-right: 200px;

        }

        #year {

          width: 142px;

        }

        #month {

          width: 142px;

        }

        span.separator {

          font-weight: bold;

          padding-left: 3px;

        }

        span.return {

          font-size: 12px;

          font-weight: bold;

        }

        .error_message {

          color: #FF0000;

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

            

            <div id="main-content" class="cont-w clear">
    <div class="personal">
      <div class="perso_content">
        <h3>We have a package to fit every budget!</h3>
        <p><strong>Bronze Package - $99/month + $99 Setup Fee</strong></p>
        <p>Our Bronze package provides you with <strong>3</strong> keywords to optimize your search engine rankings and local directory listings. You will have a dedicated account manager to provide support and monthly reporting for your business. As part of your individualized local strategy, you will receive website analysis and optimization, submissions to major business directories, and full optimization of your listings on Google, Yahoo, and Bing. </p>
        <p><strong>Silver Package - $199/month + $99 Setup Fee</strong></p>
        <p>If you want a little more, our Silver package includes <strong>5</strong> keywords that allows for optimization within different service offerings to enhance your competitive edge in search and directories. You will have a dedicated account manager to provide support and monthly reporting for your business. As part of your individualized local strategy, you will receive website analysis and optimization, submissions to major business directories, and full optimization of your listings on Google, Yahoo, and Bing. 
</p>
       <p><strong>Gold - $299/month + Free Setup</strong></p>
        <p>Our most popular package, Gold provides you with <strong>10</strong> keywords for online optimization. This allows you to broaden your online presence and be more competitive for specific services and locations. You will have a dedicated account manager to provide support and monthly reporting for your business. As part of your individualized local strategy, you will receive website analysis and optimization, submissions to major business directories, and full optimization of your listings on Google, Yahoo, and Bing. </p>
       
      </div>
      <div class="perso_form">
       <div class="form_container fl">
      <div class="pers_txt">
        <h1>Enter Business Information</h1>
        <br>
        <form action="final-payment.php" method="post" class="orderform">
         <input type="hidden" name="package_value" value="<?php echo $package_value; ?>" />
        <input type="hidden" name="fname" value="<?php echo $fname; ?>" />
        <input type="hidden" name="lname" value="<?php echo $lname; ?>" />
        <input type="hidden" name="url" value="<?php echo $url; ?>" />
        <input type="hidden" name="email" value="<?php echo $email; ?>" />
        <label class="lbl">BUSINESS TYPE</label>
          <input placeholder="" required type="text" name="buisness">
          <br>
          <label class="lbl">PRIMARY KEYWORDS</label>
          <input placeholder="" required type="text" name="keyword">
          <br>
          <label class="lbl">GOALS OF WEBSITE</label>
          <input placeholder="" required type="text" name="goals">
          <br>
          <label class="lbl">3 COMPETITORS</label>
          <input placeholder="" required type="text" name="comp1">
          <br><br>
          <input placeholder="" required type="text" name="comp2"><br><br>
          <input placeholder="" required type="text" name="comp3">
          <br><br>
          <div class="sub_btn">
          <input value="SUBMIT" type="submit">
          </div>
        </form>
      </div>
      
      
      
      </div>
    </div>
  </div>
  <div class="clear"></div>
  <br/>
<div class="AuthorizeNetSeal" style="float:left;"> <script type="text/javascript" language="javascript">var ANS_customer_id="ca1fd18c-174e-40e7-89fe-491070a55f9f";</script> <script type="text/javascript" language="javascript" src="//verify.authorize.net/anetseal/seal.js" ></script> <a href="http://www.authorize.net/" id="AuthorizeNetText" target="_blank">Merchant Services</a> </div>
 <p style="border: 2px none; bottom: 0px; float: right; width: 78%; line-height:26px;">Do you own a business that has a physical location and is dependent on a local customer base? Local SEO is for you. We offer specialized online marketing that focuses exclusively on organically reaching local clients in your geographic area by targeting geo-modified keywords that best suit your business.</p>
             <div class="clear"></div>
</div>    



            <?php include('footer.php'); ?>

            

        </div>



        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="js/plugins.js"></script>

        <script src="js/main.js"></script>



<script type="text/javascript">

jQuery(document).ready(function(){

    if (jQuery('#mobileClass').is(':visible')) {

        window.location = '#mobileClass';

    } else {

       

    }

});



  function valideForm(form)

    {

        $(".error_message").html('');

        errorActive = false;

        refId = $('#refId').val().trim();

        name = $('#name').val().trim();

        length = $('#length').val().trim();

        unit = $('#unit').val().trim();

        startDate = $('#startDate').val().trim();

        totalOccurrences = $('#totalOccurrences').val().trim();

        trialOccurrences = $('#trialOccurrences').val().trim();

        trialAmount = $('#trialAmount').val().trim();

        amount = $('#amount').val().trim();

        firstName = $('#firstName').val().trim();

        lastName = $('#lastName').val().trim();

        cardNumber = $('#cardNumber').val().trim();

        year = $('#year').val().trim();

        month = $('#month').val().trim();



        var dataString = '&refId=' + refId + '&name=' + name + '&length=' + length + '&unit=' + unit + '&startDate=' + startDate + '&totalOccurrences=' + totalOccurrences + '&trialOccurrences=' + trialOccurrences +'&trialAmount=' + trialAmount + '&amount=' + amount +'firstName='+ firstName + '&lastName=' + lastName + '&cardNumber=' + cardNumber + '&year=' + year + '&month=' + month;  



      if((firstName.trim() == '')){

       errorActive = true;

       $(".error_message").fadeIn('slow').html('First Name is required.');   

       $('#firstName').focus();

      }else if((lastName.trim() == '')){

       errorActive = true;

       $(".error_message").fadeIn('slow').html('Last Name is required.');  

       $('#lastName').focus();

      }else if((cardNumber.trim() == '')){

       errorActive = true;

       $(".error_message").fadeIn('slow').html('Card Number is required.');   

       $('#cardNumber').focus();

      }else if((year.trim() == '')){

       errorActive = true;

       $(".error_message").fadeIn('slow').html('Year of expiration is required.');   

       $('#year').focus();

      }else if((month.trim() == '')){

       errorActive = true;

       $(".error_message").fadeIn('slow').html('Month of expiration is required.');   

       $('#month').focus();

      }else if(errorActive!=true){

        $.ajax({  

            type: "POST",  

            url: "subscription_create.php",  

            data: dataString,  

            success: function(response)

            {

                

                //alert(response);

                window.location="thankyou.php";

            }

        });         

      }else {

        return false;  

    }

    return false;       

} /*End form validation */



function expireDate(){

  year = jQuery('#year').val();

  month = jQuery('#month').val();

  jQuery('#expDate').attr('value',year+'-'+month);

  exp_date = jQuery('#expDate').val();

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

