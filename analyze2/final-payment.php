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
        <h1>Thanks! For Choosing Us</h1>
       
        <p>After we receive your payment and business information, you should receive a confirmation email to address you have provided.</p>

<p>Local SEO will begin the process of website analysis and optimization, submitting your business information to pertinent directories and fully optimizing your business listings across Google, Bing and Yahoo!</p>

<p>If you have further questions or concerns, please contact xxxx, and we'll get back to you as soon as possible.</p>
        <br/>
        <p align="center"><img src="img/success.png" alt="Success" /></p>       
      </div>
      <div class="perso_form">
       <div class="form_container fl">
      <div class="pers_txt">
        <h1>Enter Payment Information</h1>
        <br>
        <form action="sendmail-1.php" method="post" class="orderform">
          <input type="hidden" name="package_value" value="<?php echo $package_value; ?>" />
        <input type="hidden" name="fname" value="<?php echo $fname; ?>" />
        <input type="hidden" name="lname" value="<?php echo $lname; ?>" />
        <input type="hidden" name="url" value="<?php echo $url; ?>" />
        <input type="hidden" name="email" value="<?php echo $email; ?>" />
        <input type="hidden" name="buisness" value="<?php echo $buisness; ?>" />
        <input type="hidden" name="keyword" value="<?php echo $keyword; ?>" />
        <input type="hidden" name="goals" value="<?php echo $goals; ?>" />
        <input type="hidden" name="comp1" value="<?php echo $comp1; ?>" />
        <input type="hidden" name="comp2" value="<?php echo $comp2; ?>" />
        <input type="hidden" name="comp3" value="<?php echo $comp3; ?>" />
        <label class="lbl">ACCOUNT FIRST NAME</label>
          <input placeholder="" required type="text" name="acname">
          <br>
          <br>
          <label class="lbl">CREDIT CARD NUMBER</label>
          <input placeholder="4179xxxx1228xxx1234" required type="text" name="ccard">
          <br>
          <br>
          <label class="lbl">CVV NUMBER</label>
          <input placeholder="" required type="text" name="cvv">
          <br>
          <br>
          
          
          <div class="sub_btn">
          <input value="SUBMIT" type="submit">
          </div>
        </form>
      </div>
      
      
      
      </div>
    </div>
  </div>
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

