<?php
error_reporting(E_ERROR | E_PARSE);
if (isset($_POST["url"]) && isset($_POST["service"])) {
	$serv = $_POST["service"];
	$url = trim(strtolower($_POST["url"]));
	session_start();
	$_SESSION["url"] = $url;
	$output = array();
	//$output = $_SESSION["url"];
	if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
		$url = "http://" . $url;
	}
	//if(!filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED)) {
	//    $output['error'] =  "URL is not valid";
	//} else {
	if($serv == 'parser'){
		require_once('PageParser.php');
		$pageParser = new PageParser($url);
		$pageParser->parsePage();
		$_SESSION["countImagesAltTexts"] = $output['countImagesAltTexts'] = $pageParser->countImagesAltTexts();
		$_SESSION['checkTitle'] = $output['checkTitle'] = $pageParser->checkTitle();
		$_SESSION['checkMetaDescription'] = $output['checkMetaDescription'] = $pageParser->checkMetaDescription();
		$_SESSION['checkMetaKeywords'] = $output['checkMetaKeywords'] = $pageParser->checkMetaKeywords();
		$_SESSION['countWords'] = $output['countWords'] = $pageParser->countWords();
		$_SESSION['getMostMeetWords'] = $output['getMostMeetWords'] = $pageParser->getMostMeetWords();
		$_SESSION['checkCleanUrls'] = $output['checkCleanUrls'] = $pageParser->checkCleanUrls();
	}else if($serv == 'validate'){
		require_once('W3CValidator.php');
		$validator = new W3CValidator($url);
		$_SESSION['validate'] = $output['validate'] = $validator->validate();
	}else if($serv == 'getGoogleToolbarPageRank' || $serv == 'getGoogleBacklinksTotal' || $serv == 'getGooglePlusOnes' || 
		$serv == 'getFacebookInteractions' || $serv == 'getTwitterMentions' || $serv == 'getPagespeedAnalysis' || 
		$serv == 'getPagespeedScore' || $serv == 'getSiteindexTotal'){
		require_once('SEO.php');
		$seo = new SEO($url);
		if($serv == 'getGoogleToolbarPageRank'){
			$pr = $seo->getGoogleToolbarPageRank();
			if (strpos($pr,'Failed') !== false) {
			    $_SESSION['getGoogleToolbarPageRank'] = $output['getGoogleToolbarPageRank'] = 0;
			} else {
				$_SESSION['getGoogleToolbarPageRank'] = $output['getGoogleToolbarPageRank'] = $seo->getGoogleToolbarPageRank();
			}
		}else if($serv == 'getGoogleBacklinksTotal'){
			$_SESSION['getGoogleBacklinksTotal'] = $output['getGoogleBacklinksTotal'] = $seo->getGoogleBacklinksTotal();
		}else if($serv == 'getGooglePlusOnes'){
			$_SESSION['getGooglePlusOnes'] = $output['getGooglePlusOnes'] = $seo->getGooglePlusOnes();
		}else if($serv == 'getFacebookInteractions'){
			$_SESSION['getFacebookInteractions'] = $output['getFacebookInteractions'] = $seo->getFacebookInteractions();
		}else if($serv == 'getTwitterMentions'){
			$_SESSION['getTwitterMentions'] = $output['getTwitterMentions'] = $seo->getTwitterMentions();
		}else if($serv == 'getPagespeedAnalysis'){
			$_SESSION['getPagespeedAnalysis'] = $output['getPagespeedAnalysis'] = $seo->getPagespeedAnalysis();
		}else if($serv == 'getPagespeedScore'){
			$_SESSION['getPagespeedScore'] = $output['getPagespeedScore'] = $seo->getPagespeedScore();
		}else if($serv == 'getSiteindexTotal'){
			$_SESSION['getSiteindexTotal'] = $output['getSiteindexTotal'] = $seo->getSiteindexTotal();
		}else{
			$output['error'] = 'Service not Found';
		}
	}else if ($serv == 'getSiteindexTotalBing'){
		require_once('BING.php');
		$seo = new BING($url);
		$_SESSION['getSiteindexTotalBing'] = $output['getSiteindexTotalBing'] = $seo->getCountIndexedPageBing();
	}else if($serv == 'hasRobots' || $serv == 'hasSitemaps'){
		require_once('SiteUtils.php');
		$siteutils = new SiteUtils($url);
		if($serv == 'hasRobots'){
			$_SESSION['hasRobots'] = $output['hasRobots'] = ($siteutils->hasRobots())?"true":"false";
		}else if($serv == 'hasSitemaps'){
			$_SESSION['hasSitemaps'] = $output['hasSitemaps'] = ($siteutils->hasSitemaps())?"true":"false";
		}else{
			$output['error'] = 'Service not Found';
		}
	}else{
		$output['error'] = 'Service not Found';
	}
	}else{
		$output['error'] = 'Service not Found';
	}
	$output = json_encode($output);
	echo $output;
?>