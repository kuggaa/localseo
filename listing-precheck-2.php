<?php
if (isset ($_POST['bname'])) { $bname=$_POST['bname']; } else { $bname=''; }
if (isset ($_POST['bzip'])) { $bzip=$_POST['bzip']; } else { $bzip=''; }
if (isset ($_POST['baddr'])) { $baddr=$_POST['baddr']; } else { $baddr=''; }
if (isset ($_POST['bphone'])) { $bphone=$_POST['bphone']; } else { $bphone=''; }

$b_name = $bname;
$b_addr = $baddr;
$b_phone = $bphone;

$bname = urlencode($bname);
$baddr = urlencode($baddr);
$bzip = urlencode($bzip);
$bphone = urlencode($bphone);

$api_url = "http://search.ubl.org/service.php?bname=".$bname."&bzip=".$bzip."&baddr=".$baddr."&bphone=".$bphone."&v=3";
$api_ch = curl_init();
curl_setopt($api_ch, CURLOPT_URL, $api_url);
curl_setopt($api_ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($api_ch, 
CURLOPT_REFERER,'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'');
$api_res = curl_exec($api_ch);
curl_close($api_ch);
?>
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
            .listing-ul {
                display: none;
            }
            .searchresult {
              display: none;
            }
            #listings-table td:first-of-type {
              width: 228px;
            }
            #listings-table td:last-of-type {
              width: 394px;
            }
            #compare li {
              min-height: 13px;
            }
            .listing ul li {
              min-height: 16px;
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

            <div class="sub-menu-bar">
                <ul class="submenu second">
                    <li class="current"><a href="what-is-local-seo.php">What is Local SEO?</a></li>
                    <li><a href="how-local-seo-works.php">How Local SEO Works</a></li>
                    <li><a href="local-seo-case-studies.php">Local SEO Case Studies</a></li>
                    <li><a href="industry-specific-seo.php">Industry Specific SEO</a></li>
                </ul>
            </div>

            <div id="post-head"></div>

            <div class="listing">
                <div id="mobileClass"></div>
                <div class="cont-w">
                    <div>
                        <div id="listing-sidebar" style="float:left; margin-right:60px;">
                            <div id="listing-match">
                                <h4>Matching Results against:</h4>
                                <ul style="display:block;" class="listing-ul" id="compare">
                                    <li><?php echo $b_name; ?></li>
                                    <li><?php echo $b_addr; ?></li>
                                    <li><?php echo $b_phone; ?></li>
                                </ul>
                                <div id="listing-improve">
                                    <h4>Start Improving Your Business<br>Visibility Today!</h4>
                                    <a href="packages.php">IMPROVE NOW!</a>
                                </div>
                            </div>
                            <div id="listing-form">
                                <form action="listing-precheck-2.php" id="precheckform" method="POST">
                                    <h2><span style="color:#99d547;">FREE</span> Listing Precheck</h2>
                                    <p>Place your profile on major search engines, yellow pages sites, business directories, social sites, mobile devices, and 411 services.</p>
                                    <h3><span style="color:#f00;">Is Your Business Visible?</span><br>
                                    Get your FREE Listing Precheck</h3>
                                    <h4>Business Name:</h4>
                                    <input type="text" value="" id="bname" name="bname" class="text busname">
                                    <h4>Business Phone Number:</h4>
                                    <input type="text" value="" id="bphone" name="bphone" class="text busphone">
                                    <h4>Business Street Address:</h4>
                                    <input type="text" value="" id="baddr" name="baddr" class="text busaddress">
                                    <h4>Business ZIP Code:</h4>
                                    <input type="text" value="" id="bzip" name="bzip" class="text buszip">
                                    <input type="submit" value="CHECK NOW">
                                    <p style="color:#f00;">*Required Fields</p>
                                </form>
                            </div>
                        </div>
                        <h2>Listing Precheck Report</h2>
                        <p>Our report shows how your business listing appears on top internet sites (not representative of our database). Sign up with Local SEO and improve your online visibility!</p>

                        <div class="searchresult"><?php print_r($api_res); ?></div>

                        <table id="listings-table">
                            <tr id="google">
                                <td><img src="img/list-google.jpg"></td></td>
                                <td>
                                    <ul class="listing-ul">
                                        <li class="list-check bname"></li>
                                        <li class="list-check baddress"></li>
                                        <li class="list-check bphone"></li>
                                    </ul>
                                    <img class="loading" src="img/loading.gif">
                                    <a  class="not-found"></a>
                                </td>
                            </tr>
                            <tr id="yahoo">
                                <td><img src="img/list-yahoo.jpg"></td>
                                <td>
                                    <ul class="listing-ul">
                                        <li class="list-check bname"></li>
                                        <li class="list-check baddress"></li>
                                        <li class="list-check bphone"></li>
                                    </ul>
                                    <img class="loading" src="img/loading.gif">
                                    <a class="not-found"></a>
                                </td>
                            </tr>
                            <tr id="bing">
                                <td><img src="img/list-bing.jpg"></td>
                                <td>
                                    <ul class="listing-ul">
                                        <li class="list-check bname"></li>
                                        <li class="list-check baddress"></li>
                                        <li class="list-check bphone"></li>
                                    </ul>
                                    <img class="loading" src="img/loading.gif">
                                    <a class="not-found"></a>
                                </td>
                            </tr>
                            <tr id="local">
                                <td><img src="img/list-local.jpg"></td>
                                <td>
                                    <ul class="listing-ul">
                                        <li class="list-check bname"></li>
                                        <li class="list-check baddress"></li>
                                        <li class="list-check bphone"></li>
                                    </ul>
                                    <img class="loading" src="img/loading.gif">
                                    <a class="not-found"></a>
                                </td>
                            </tr>
                            <tr id="yellowbot">
                                <td><img src="img/list-yellow.jpg"></td>
                                <td>
                                    <ul class="listing-ul">
                                        <li class="list-check bname"></li>
                                        <li class="list-check baddress"></li>
                                        <li class="list-check bphone"></li>
                                    </ul>
                                    <img class="loading" src="img/loading.gif">
                                    <a class="not-found"></a>
                                </td>
                            </tr>
                            <tr id="foursquare">
                                <td><img src="img/list-foursquare.jpg"></td>
                                <td>
                                    <ul class="listing-ul">
                                        <li class="list-check bname"></li>
                                        <li class="list-check baddress"></li>
                                        <li class="list-check bphone"></li>
                                    </ul>
                                    <img class="loading" src="img/loading.gif">
                                    <a class="not-found"></a>
                                </td>
                            </tr>
                            <tr id="citysearch">
                                <td><img src="img/list-citysearch.jpg"></td>
                                <td>
                                    <ul class="listing-ul">
                                        <li class="list-check bname"></li>
                                        <li class="list-check baddress"></li>
                                        <li class="list-check bphone"></li>
                                    </ul>
                                    <img class="loading" src="img/loading.gif">
                                    <a class="not-found"></a>
                                </td>
                            </tr>
                            <tr id="superpages">
                                <td><img src="img/list-superpages.jpg"></td>
                                <td>
                                    <ul class="listing-ul">
                                        <li class="list-check bname"></li>
                                        <li class="list-check baddress"></li>
                                        <li class="list-check bphone"></li>
                                    </ul>
                                    <img class="loading" src="img/loading.gif">
                                    <a class="not-found"></a>
                                </td>
                            </tr>
                            <tr id="whitepages">
                                <td><img src="img/list-whitepages.jpg"></td>
                                <td>
                                    <ul class="listing-ul">
                                        <li class="list-check bname"></li>
                                        <li class="list-check baddress"></li>
                                        <li class="list-check bphone"></li>
                                    </ul>
                                    <img class="loading" src="img/loading.gif">
                                    <a class="not-found"></a>
                                </td>
                            </tr>
                        </table>
                    </div>
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
    var counter = 0;
    jQuery('searchresult').each(function(){
        
        result_msg = jQuery('searchresult:eq('+counter+')').attr('msg');
        result_site = jQuery('searchresult:eq('+counter+')').attr('site');
        result_url = jQuery('searchresult:eq('+counter+')').attr('resulturl');
        result_bname = jQuery('searchresult:eq('+counter+') result').attr('businessname');
        result_address = jQuery('searchresult:eq('+counter+') result address').text();
        result_city = jQuery('searchresult:eq('+counter+') result city').text();
        result_state = jQuery('searchresult:eq('+counter+') result state').text();
        result_phone = jQuery('searchresult:eq('+counter+') result phone').text();
        if(result_msg == 'Results Found'){
            jQuery('#'+result_site+' .listing-ul').fadeIn();
            jQuery('.loading').fadeOut();
            jQuery('#'+result_site+' .listing-ul .bname').text(result_bname);
            jQuery('#'+result_site+' .listing-ul .baddress').text(result_address);
            jQuery('#'+result_site+' .listing-ul .bphone').text(result_phone);
            jQuery('#'+result_site+' a').text('View listing >').attr('href',unescape(result_url)).attr('target','_blank').removeClass('not-found');
        } else {
            jQuery('.loading').fadeOut();
            jQuery('#'+result_site+' a').text(result_msg);
        }
        counter = counter + 1;
    });

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

    </body>
</html>
