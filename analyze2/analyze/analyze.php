<?php session_start() ?>
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
<link rel="stylesheet" href="../css/col.css" media="all">
<link rel="stylesheet" href="../css/2cols.css" media="all">
<link rel="stylesheet" href="../css/3cols.css" media="all">
<link rel="stylesheet" href="../css/4cols.css" media="all">
<link rel="stylesheet" href="../css/1024.css" media="all">
<link rel="stylesheet" href="../css/normalize.css">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/layout.css">
<script src="../js/vendor/modernizr-2.6.2.min.js"></script>

<!--[if lt IE 9]>
          <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->

<link href='http://fonts.googleapis.com/css?family=Alef:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
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
	<script>
		var url;
		var counter = 0;
		var counter_end = 19;
	    function ajax_submit(form) {
	    	$('body').css('background-image', '');
	    	$('#domain-input')[0].style.display='none';
	    	$('#processing')[0].style.display='block';
		    url = form.elements["url"].value;
	    	$('#domainInput2')[0].value=url;
	    	$('#processing h1')[0].innerHTML = "Analyzing "+url+' ...';
		    check();
		}
		function check() {
			var array = new Array( "validate", "hasRobots", "hasSitemaps", "getGoogleToolbarPageRank", "getGoogleBacklinksTotal", 
        "getGooglePlusOnes", "getPagespeedAnalysis", "getPagespeedScore", "getSiteindexTotal", "getSiteindexTotalBing", "getFacebookInteractions", 
        "getTwitterMentions", "parser")
			for(var i = 0; i < array.length; i++){
				//alert("url="+url+"service="+array[i])
				$("#"+array[i]).show();
				$.ajax({
					type: "POST",
					url: "service.php",
					data: "url="+url+"&service="+array[i],
					success: function(msg){
						//alert(this.data);
						//alert( "Data Saved: " + msg );
						var result = $.parseJSON(msg);
						for(key in result) {
							$("#"+key+"_img")[0].style.display='none';
							$("#"+key+"_img2")[0].style.display='block';
							counter++;
							$('#barmain')[0].style.width=counter/counter_end*100+'%';
							if(counter == counter_end)window.location.href = 'result.php';
						}
					}
				});
			}
		}
	</script>
</head>
<body style="background-image: url(img/bg.jpg) !important;">
	<div class="container-full block">
		<a href="#mobileClass" id="anchor">.</a>
		<?php include ('../header.php'); ?>
		<div id="post-head"></div>
		<div id="mobileClass"></div>
		<div class="container blocc">
			<div class="row">
				<div id="domain-input">
					<div class="span12 block5">
						<h1>
							Enter domain name<br/>you want to analyze
						</h1>
					</div>
					<div class="span6 offset2 block6">
						<form name="form" method="post" onsubmit="ajax_submit(this);return false;" class="form-inline form-domain">
							<div class="input-group">
								<input class="form-control" id="domainInput" type="text" name="url" placeholder="domain.com">
								<div class="input-group-btn">
									<button type="submit" class="btn btn-primary">Analyze!</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="blocc" id="processing" style="display:none">
			<div class="block13">
				<form name="analyze" action="result.html" method="get" class="form-inline form-domain">
					<div class="input-group">
						<input class="form-control" id="domainInput2" type="text" name="analyze" placeholder="domain.com" disabled>
						<div class="input-group-btn">
							<button type="submit" class="btn btn-primary" disabled="disabled">Analyze!</button>
						</div>
					</div>
				</form>
				<h1>Analyzing ...</h1>
				<h3>wait a minute or so, please</h3>
				<div id="progressbarmain">
					<div id="barmain" style="width: 0%"></div>
				</div>

				<h3>LocalSEO.com is collecting and analyzing information about website.</h3>
			</div>

			<div class="block9">
				<div class="row">
					<div class="span3 new_lifted panelcode">
						<div class="panel panel-default code">
							<div class="panel-heading">Code:</div>
							<div class="panel-body">
								<div class="span1 ckeckblock">
									<img id="validate_img" class="check" src="img/ajax-loader.gif" alt="check"><img id="validate_img2" class="check" src="img/check.jpg" alt="check" style="display:none">
									<img id="getPagespeedScore_img" class="check" src="img/ajax-loader.gif" alt="check"><img id="getPagespeedScore_img2" class="check" src="img/check.jpg" alt="check" style="display:none">
									<img id="getPagespeedAnalysis_img" class="check" src="img/ajax-loader.gif" alt="check"><img id="getPagespeedAnalysis_img2" class="check" src="img/check.jpg" alt="check" style="display:none">
									<img id="countImagesAltTexts_img" class="check" src="img/ajax-loader.gif" alt="check"><img id="countImagesAltTexts_img2" class="check" src="img/check.jpg" alt="check" style="display:none">
									<img id="checkCleanUrls_img" class="check" src="img/ajax-loader.gif" alt="check"><img id="checkCleanUrls_img2" class="check" src="img/check.jpg" alt="check" style="display:none">
								</div>
								<div class="checkedtextblock">
									<span class="loadtext">W3C Validator</span>
									<span class="loadtext">Google Pagespeed Score</span>
									<span class="loadtext">Google Pagespeed Analysis</span>
									<span class="loadtext">Images Alt Text Count</span>
									<span class="loadtext">Clean Urls Count</span>
								</div>
							</div>
						</div>
					</div>
					<div class="span3 new_lifted  panelcode">
						<div class="panel panel-default code">
							<div class="panel-heading">Search Engines Stats:</div>
							<div class="panel-body">
								<div class="span1 ckeckblock">
									<img id="getSiteindexTotal_img" class="check" src="img/ajax-loader.gif" alt="check"><img id="getSiteindexTotal_img2" class="check" src="img/check.jpg" alt="check" style="display:none">
									<img id="getSiteindexTotalBing_img" class="check" src="img/ajax-loader.gif" alt="check"><img id="getSiteindexTotalBing_img2" class="check" src="img/check.jpg" alt="check" style="display:none">
									<img id="getGoogleToolbarPageRank_img" class="check" src="img/ajax-loader.gif" alt="check"><img id="getGoogleToolbarPageRank_img2" class="check" src="img/check.jpg" alt="check" style="display:none">
									<img id="getGoogleBacklinksTotal_img" class="check" src="img/ajax-loader.gif" alt="check"><img id="getGoogleBacklinksTotal_img2" class="check" src="img/check.jpg" alt="check" style="display:none">
								</div>
								<div class="checkedtextblock">
									<span class="loadtext">Google Index Count</span>
									<span class="loadtext">Bing Index Count</span>
									<span class="loadtext">Google PageRank</span>
									<span class="loadtext">Google Backlinks Count</span>
								</div>
							</div>
						</div>
					</div>
					<div class="span3 new_lifted  panelcode">
						<div class="panel panel-default code">
							<div class="panel-heading">SEO:</div>
							<div class="panel-body">
								<div class="span1 ckeckblock">
									<img id="hasRobots_img" class="check" src="img/ajax-loader.gif" alt="check"><img id="hasRobots_img2" class="check" src="img/check.jpg" alt="check" style="display:none">
									<img id="hasSitemaps_img" class="check" src="img/ajax-loader.gif" alt="check"><img id="hasSitemaps_img2" class="check" src="img/check.jpg" alt="check" style="display:none">
									<img id="checkTitle_img" class="check" src="img/ajax-loader.gif" alt="check"><img id="checkTitle_img2" class="check" src="img/check.jpg" alt="check" style="display:none">
									<img id="checkMetaDescription_img" class="check" src="img/ajax-loader.gif" alt="check"><img id="checkMetaDescription_img2" class="check" src="img/check.jpg" alt="check" style="display:none">
									<img id="checkMetaKeywords_img" class="check" src="img/ajax-loader.gif" alt="check"><img id="checkMetaKeywords_img2" class="check" src="img/check.jpg" alt="check" style="display:none">
									<img id="countWords_img" class="check" src="img/ajax-loader.gif" alt="check"><img id="countWords_img2" class="check" src="img/check.jpg" alt="check" style="display:none">
									<img id="getMostMeetWords_img" class="check" src="img/ajax-loader.gif" alt="check"><img id="getMostMeetWords_img2" class="check" src="img/check.jpg" alt="check" style="display:none">
								</div>
								<div class="checkedtextblock">
									<span class="loadtext">Has Robots</span>
									<span class="loadtext">Has Sitemap</span>
									<span class="loadtext">Title Length</span>
									<span class="loadtext">Meta Description Length</span>
									<span class="loadtext">Meta Keywords Length</span>
									<span class="loadtext">Words Count</span>
									<span class="loadtext">Most Used Words</span>
								</div>
							</div>
						</div>
					</div>
					<div class="span3 new_lifted  panelcode">
						<div class="panel panel-default code">
							<div class="panel-heading">Social Media:</div>
							<div class="panel-body">
								<div class="span1 ckeckblock">
									<img id="getGooglePlusOnes_img" class="check" src="img/ajax-loader.gif" alt="check"><img id="getGooglePlusOnes_img2" class="check" src="img/check.jpg" alt="check" style="display:none">
									<img id="getFacebookInteractions_img" class="check" src="img/ajax-loader.gif" alt="check"><img id="getFacebookInteractions_img2" class="check" src="img/check.jpg" alt="check" style="display:none">
									<img id="getTwitterMentions_img" class="check" src="img/ajax-loader.gif" alt="check"><img id="getTwitterMentions_img2" class="check" src="img/check.jpg" alt="check" style="display:none">
								</div>
								<div class="checkedtextblock">
									<span class="loadtext">Google +1's</span>
									<span class="loadtext">Facebook Interactions</span>
									<span class="loadtext">Twitter Mentions</span>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<h3>If you encounter any issues, please <a href="/contact.php">let us know</a></h3>
		</div>
		<?php include ('../footer.php'); ?>
	</div>

</body>
</html>
