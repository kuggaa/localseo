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

        <script type="text/javascript">
            var email1 = '';
            var email2 = '';
            var errorActive = false;
            var validEmail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

            function valideForm(form)
                {
                    $(".error_message").html('');
                    errorActive = false;
                    name = $('#name').val();
                    email = $('#email').val();
                    subject = $('#subject').val();
                    message = $('#message').val();

                    var dataString1 = 'name='+ name + '&email=' + email + '&subject=' + subject + '&message=' + message;  

                  if(name == ''){
                   errorActive = true;
                   $(".error_message").fadeIn('slow').html('Name is required.');   
                   $('#name').focus();
                  }else if(email == '') {
                   errorActive = true;
                   $(".error_message").fadeIn('slow').html('Email Address is required.');  
                   $('#email').focus();
                  }else if(!validEmail.test(email)){
                   errorActive = true;
                   $(".error_message").fadeIn('slow').html('Email Address must be a valid email address.');  
                   $('#email').focus();
                  }else if(subject == ''){
                   errorActive = true;
                   $(".error_message").fadeIn('slow').html('Subject is required.');   
                   $('#subject').focus();
                  }else if(message == ''){
                   errorActive = true;
                   $(".error_message").fadeIn('slow').html('Message is required.');   
                   $('#message').focus();
                  }else if(errorActive!=true){
                    $.ajax({  
                        type: "POST",  
                        url: "mailer/send_contact.php",  
                        data: dataString1,  
                        success: function(response)
                        {
                            $(".error_message").fadeIn('slow').html('Message send.'); 
                            blank_inputsContact();
                            $("#form1 input, #form1 textarea").attr('disabled', 'disabled');
                        }
                    });         

                }else {
                    return false;  
                }
                return false;       
            } /*End form validation */
    </script>

<style type="text/css">
    .error_message {
      color: #FF0000;
      float: left;
      font-size: 13px;
      margin-left: 3px;
      padding-top: 5px;
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
            <div id="contact">
                <div>
                    <h3>Contact Us</h3>
                    <p>At LocalSEO, it is our mission to make it easy for your customers to find your business online. We do everything we can to ensure you dominate the search results for your industry in your local area in order to help your business grow and prosper. We are constantly working to offer the most up-to-date, innovative services so our clients are always a few steps ahead of their competitors.</p>

                    <form id="form1" onSubmit="return valideForm(this);">
                        <div class="inputWrap">
                            <label>Name</label>
                            <input type="text" name="name" id="name">
                        </div>

                        <div class="clear"></div>
                        
                        <div class="inputWrap">
                            <label>E-Mail</label>
                            <input type="text" name="email" id="email">
                        </div>
                        
                        <div class="clear"></div>
                        
                        <div class="inputWrap">
                            <label>Subject</label>
                            <input type="text" name="subject" id="subject">
                        </div>

                        <div class="clear"></div>
                        
                        <div class="inputWrap">
                            <label>Message</label>
                            <textarea id="message" name="message"></textarea>
                        </div>
                        <div class="clear"></div>
                        <input class="submit" type="submit" value="Send">
                        <div class="error_message"></div>
                    </form>
                    
                </div>
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

    jQuery("input, select").val('');      

    jQuery("input, textarea").focus(function(srcc)
      {
          jQuery(this).prev("label").hide();
      });

    jQuery("label").focus(function(srcc)
      {
          jQuery(this).hide();
      });
      
      jQuery("input, textarea").blur(function()
      {
          if (jQuery(this).val() == "")
          {
            jQuery(this).prev("label").show()
          }
      });

      jQuery("#terms").click(function()
      {
        if ($('#terms').is(":checked"))
        {
           termsChecked = 1;
        }else{
           termsChecked = 0;
        }
      });

      jQuery("input").blur();
});

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

        <script type="text/javascript">
            $(document).ready(function(){
                blank_inputsContact();
            });
        </script>

    </body>
</html>
