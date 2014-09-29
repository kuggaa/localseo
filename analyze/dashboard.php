
<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="Local SEO provides all of our clients with 24/7 accessible reporting. Find information regarding the Local SEO Custom Dashboard and analytical reporting, here!">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LocalSEO</title>

  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/layout.css">
  <link href='http://fonts.googleapis.com/css?family=Alef:400,700' rel='stylesheet' type='text/css'>
  <script src="js/modernizr-2.6.2.min.js"></script>
  <script src="js/jquery-latest.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function(){
      if (jQuery('#mobileClass').is(':visible')) {
        window.location = '#mobileClass';
      }
    });
  </script>
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script type='text/javascript' src="js/bootstrap-progressbar.js"></script>
  <!--[if IE]><script type="text/javascript" src="excanvas.js"></script><![endif]-->
  <script src="js/jquery.knob.js"></script>
  <script>
    $(function($) {
      $(".knob").knob();
    });
  </script>
</head>

<body>

  <div class="container-full block">

    <a href="#mobileClass" id="anchor">.</a>
    <?php include ('header.php'); ?>
    <div id="post-head"></div>
    <div id="mobileClass"></div>
    <div id="main-container">
      <div class="container blocc">
        <div class="row">
          <div class="row">
            <div class="span6 offset2 block11">
              <form name="analyze" action="result.html" method="get" class="form-inline form-domain">
                <div class="input-group">
                  <input class="form-control" id="domainInput" type="text" name="analyze" placeholder="domain.com">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-primary">Analyze!</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>


        <div class="container navtabs">
          <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="dashboardtab"><a class="ntabsa" href="#Dashboard" data-toggle="tab"><span class="datatabcenter">Dashboard</span></a></li>
            <li class="codetab active"><a class="ntabsa" href="#Code" data-toggle="tab"><span class="datatabcenter">Code</span></a></li>
            <li class="searchenginestab"><a class="ntabsa" href="#SearchEngines" data-toggle="tab"><span class="datatabcenter">Search Engines</span></a></li>
            <li class="seotab"><a class="ntabsa" href="#SEO" data-toggle="tab"><span class="datatabcenter">SEO</span></a></li>
            <li class="socialmediatab"><a class="ntabsa last" href="#SocialMedia" data-toggle="tab"><span class="datatabcenter">Social Media</span></a></li>
          </ul>
          <script type="text/javascript">
          $("#tabs li").click(function() {
            var $this = $(this);
            if(!$this.hasClass('active'))
            {
              $this.addClass('active');
              $('#tabs li').not($this).removeClass('active');
            }
          });
          </script> 
        </div>
        <div id="my-tab-content" class="tab-content">                 
          <div class="tab-pane" id="Dashboard">
          123                                  
          </div>
          <div class="tab-pane active" id="Code">
            <div class="span4 searchenginesblock">
              <span class="seblockhead">Search Engines:</span>
              <div class="radial-progress2">
                <input class="knob" data-bgColor="#FFFFFF" data-fgColor="#0073cc" data-thickness=".4" data-width="200" data-readOnly=true value="64">
              </div>
              <p class="sengtext">Our link analysis algorithm reviews the link</br>
                popularity of your website, and then</br>
                analyzes the quality of those links. Links to</br>
                a website are like votes, and the more</br>
                votes a website has, the better it typically</br>
                performs. The quality of those votes is also</br>
                considered as not all websites are viewed</br>
                equally.</p>
                <form class="nothappyscore" name="score" action="index.html" method="get">
                  <button type="submit" class="btn btn-nhwys">Not happy with your score?</button>
                </form>
              </div>
              <div class="span8 new_lifted panelcode3">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    Google Pagespeed Score
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <span class="redaction">Action needed:</span>
                    </div>
                    <div class="row">
                      <span class="blackaction">Optimize the performance of your website.</span>
                    </div>
                    <div class="row">    
                      <div class="span3 pargps">
                       <p>The speed at which a site loads. The
                         longer a page takes to load, the more
                         likely a user is to click away and find
                         another site while browsing. Page speed
                         can be influenced by the format of the
                         content and the amount of tich content,
                         such as videos, audio players, and
                         praphics.<p>
                       </div>
                       <div class="span3">
                        <div id="progressbardashboard1">
                         <div id="bardashboard1" style="width: 21%"></div><div class="indpargps">51/100</div>
                       </div>
                       <div class="roundp rndandashboard"><p>21%</p></div>
                       <span class="sourcegm">SOURCE: GTMETRIX.COM</span>
                       <span class="influence">INFLUENCE:</span>
                       <img class="influence" src="img/plus.jpg" alt="influence+">
                       <img class="influenceic" src="img/plus.jpg" alt="influence+">
                       <img class="influenceic" src="img/minus.jpg" alt="influence-">
                       <img class="influenceic" src="img/minus.jpg" alt="influence-">
                       <img class="influenceic" src="img/minus.jpg" alt="influence-">
                     </div>
                   </div>
                 </div>
               </div>
             </div>

             <div class="span8 new_lifted panelcode4">
              <div class="panel panel-default">
                <div class="panel-heading">
                  Google Pagespeed Score
                </div>
                <div class="panel-body">
                  <div class="row">
                    <span class="redaction">Action needed:</span>
                  </div>
                  <div class="row">
                    <span class="blackaction">Optimize the performance of your website.</span>
                  </div>
                  <div class="row">    
                    <div class="span3 pargps">
                     <p>The speed at which a site loads. The
                       longer a page takes to load, the more
                       likely a user is to click away and find
                       another site while browsing. Page speed
                       can be influenced by the format of the
                       content and the amount of tich content,
                       such as videos, audio players, and
                       praphics.<p>
                     </div>
                     <div class="span3">
                      <div id="progressbardashboard1">
                       <div id="bardashboard1" style="width: 21%"></div><div class="indpargps">51/100</div>
                     </div>
                     <div class="roundp rndandashboard"><p>21%</p></div>
                     <span class="sourcegm">SOURCE: GTMETRIX.COM</span>
                     <span class="influence">INFLUENCE:</span>
                     <img class="influence" src="img/plus.jpg" alt="influence+">
                     <img class="influenceic" src="img/plus.jpg" alt="influence+">
                     <img class="influenceic" src="img/minus.jpg" alt="influence-">
                     <img class="influenceic" src="img/minus.jpg" alt="influence-">
                     <img class="influenceic" src="img/minus.jpg" alt="influence-">
                   </div>
                 </div>
               </div>
             </div>
           </div>

           <div class="span8 new_lifted  panelcode5">
            <div class="panel panel-default">
              <div class="panel-heading">
                Google Pagespeed Score
              </div>
              <div class="panel-body">
                <div class="row">
                  <span class="redaction">Action needed:</span>
                </div>
                <div class="row">
                  <span class="blackaction">Optimize the performance of your website.</span>
                </div>
                <div class="row">    
                  <div class="span3 pargps">
                   <p>The speed at which a site loads. The
                     longer a page takes to load, the more
                     likely a user is to click away and find
                     another site while browsing. Page speed
                     can be influenced by the format of the
                     content and the amount of tich content,
                     such as videos, audio players, and
                     praphics.<p>
                   </div>
                   <div class="span3">
                    <div id="progressbardashboard1">
                     <div id="bardashboard1" style="width: 21%"></div><div class="indpargps">51/100</div>
                   </div>
                   <div class="roundp rndandashboard"><p>21%</p></div>
                   <span class="sourcegm">SOURCE: GTMETRIX.COM</span>
                   <span class="influence">INFLUENCE:</span>
                   <img class="influence" src="img/plus.jpg" alt="influence+">
                   <img class="influenceic" src="img/plus.jpg" alt="influence+">
                   <img class="influenceic" src="img/minus.jpg" alt="influence-">
                   <img class="influenceic" src="img/minus.jpg" alt="influence-">
                   <img class="influenceic" src="img/minus.jpg" alt="influence-">
                 </div>
               </div>
             </div>
           </div>
         </div>

       </div>

       <div class="tab-pane" id="SearchEngines">                      
       </div>

       <div class="tab-pane" id="SEO">                                               
       </div>

       <div class="tab-pane" id="SocialMedia">                                              
       </div>
       <script type="text/javascript">
       jQuery(document).ready(function ($) {
        $('#tabs').tab();
      });
       </script> 


     </div>



      <?php include ('footer.php'); ?>
    </div>
  </body>
</html>



