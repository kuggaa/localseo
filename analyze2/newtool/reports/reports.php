<!DOCTYPE html>
<head>
  <title>Free Website Analysis</title>

  <!-- Mobile viewport optimized: h5bp.com/viewport 
  <meta name="viewport" content="width=device-width"> -->
 
  <!---Google Open Sans--->
  <link href="css/main.css" rel="stylesheet">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
  <script src="js/preload.js"></script>
  
  <!--<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">-->
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" href="css/table.css" type="text/css"/>	
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    
    <!--Rating css and js-->
    <script src="js/jquery.rateit.js" type="text/javascript"></script>
    <link href="css/rateit.css" rel="stylesheet" type="text/css"/>
    <!--Rating css and js-->
  
     
</head>

<body data-twttr-rendered="true" id="overview" class="resultsPage">

    <?php
        include_once '../config.php';
        include_once '../functions.php';
        $mainID         = base64_decode($_GET['MI']);
        $query          = "SELECT * FROM main_data WHERE id = '".$mainID."'";
        $mainResults    = mysql_fetch_assoc(runquery($query));
        $Valid_address_format = $mainResults['street_address'].", ".$mainResults['city'].", ".$mainResults['state'].", United States";
//         Get The Google data of the current report from database
        $query_gdata    = "SELECT * FROM google_data WHERE mainID = '".$mainID."'";
        $google_count    = runquery_count($query_gdata);
        $GoogleResults  = mysql_fetch_assoc(runquery($query_gdata));
//         Get The Yahoo data of the current report from database
        $query_ydata    = "SELECT * FROM yahoo_data WHERE mainID = '".$mainID."'";
        $yahoo_count    = runquery_count($query_ydata);
        $YahooResults   = mysql_fetch_assoc(runquery($query_ydata));
//         Get The Bing data of the current report from database
        $query_bdata    = "SELECT * FROM bing_data WHERE mainID = '".$mainID."'";
        $bing_count    = runquery_count($query_bdata);
        $BingResults   = mysql_fetch_assoc(runquery($query_bdata));
//        if($bing_count != 0  && intval($BingResults['B_numcat']) < 5)
//        echo "Bing count is ".$bing_count." and its numcat is ".gettype($BingResults['B_numcat']);
        
    ?>

 <header class="site" style="height:110px;">
                <div style="height:110px; width:1053px; margin:auto;">
                    <div style="float:left;; margin-left:113px">
                        <img src="http://img.bitpixels.com/getthumbnail?code=84851&size=200&url=<?php echo urlencode(stripslashes($mainResults['website'])); ?>" style=
                        "max-width:142px;"/>
                    </div>
                    <div style="margin-left:268px;">
                        <div style="font-size:18px; font-weight:400; margin-top:10px; float:left; width:195px; ">
                            <?php echo $mainResults['street_address']; ?>
                            <br>
                            <?php echo $mainResults['city'].", ".$mainResults['state']; ?>
                            <br>
                            <?php echo $mainResults['phone_num']; ?>
                            
                        <?php //echo $mainResults['website']; ?>
                        </div>
                        
                        <div style="font-size:30px; color:#2567A4; width:270px; font-weight:400; margin-top:30px; float:left; text-shadow: 1px 1px 
                        1px #000, 3px 3px 5px #CFCFCF;">
                        >> Overall Score >>
                        </div> 
                                                
                        <div class="pbarouter" style="float:right;">
                        	<div class="pbarinner">
                                <div style="padding:10px 110px;">
	                                <span id="totalscore"></span>
                                </div>
                            </div>
                        </div>
                        
                       
                    </div>
                </div>
</header>

<div id="content-wrap">
 
    <nav style="position: fixed; top: 110px;" id="tab-navigation">
        <i style="margin-top: 149.6px;" class="navigation-arrow sprite navigation_selector"></i>
        <ul>
            <li class="overview on">
                <a href="#overview" class="smoothScroll">
                    <i class="icon sprite"></i>
                    <span class="text">
                        Local
                    </span>
                </a>
            </li>
            <li class="geo">
                <a href="#geo" class="smoothScroll">
                    <i class="icon sprite"></i>
                    <span class="text">
                        Directories
                    </span>
                </a>
            </li>
            <li class="referrals">
                <a href="#referrals" class="smoothScroll">
                    <i class="icon sprite"></i>
                    <span class="text">
                        Competition
                    </span>
                </a>
            </li>
            <li class="search">
                <a href="#search" class="smoothScroll">
                    <i class="icon sprite"></i>
                    <span class="text">
                        Location 
                    </span>
                </a>
            </li>
            <li class="social">
                <a href="#social" class="smoothScroll">
                    <i class="icon sprite"></i>
                    <span class="text">
                        Reputation
                    </span>
                </a>
            </li>
            <li class="alsoVisited">
                <a href="#alsoVisited" class="smoothScroll">
                    <i class="icon sprite"></i>
                    <span class="text">
                        Mentions 
                    </span>
                </a>
            </li>
            <li class="similarSites">
                <a href="#similarSites" class="smoothScroll">
                    <i class="icon sprite"></i>
                    <span class="text">
                        Keyword Rank
                    </span>
                </a>
            </li>
        </ul>
    </nav>
    
    <div class="wrap stickyheader">
        <div class="stickyheader-fixed">
			<article class="compare component">
				  <div class="bluebar">
                	  Free Website Analysis :- 
                      <div class="innerblue"><?php echo stripslashes($mainResults['website']); ?></div>
                  </div>    
            </article>
        </div>
        
        <div class="content">
            <div class="content-page overview" id="overview" >
                <div class="graybar" style="margin-top:20px; color:#2D2D2D;">
                    Local Scores
                </div>   
                
                <div class="roundbg" style="color:#2D2D2D;">
                    <b>Local Walkthrough</b><br>
                    On the Local Report we are analyzing the local listings on Google, Yahoo and Bing.
                    Based on the phone number we are able to scan and identify listings in Google Places, Yahoo Local, and Bing Local. If there is a duplicate listing 
                    this can affect score. In addition we have identified factors that seem to influence rankings. These factors are based on analyzing over 4000 Local 
                    Business Listings and understanding how to get them to rank higher in the SERPS. These factors are how we assign a score to each section. We simply 
                    check the category titles like: Is your listing claimed, do you have 5 categories, and do you have enough reviews to see if your listing meets the 
                    criteria we have deemed important. *** In addition we are able to monitor your google places listing. Google + Local (and previously Google Places) 
                    has been notoriously buggy.
                </div>    
        
                <div style="height:220px; width:auto; margin-top:10px;">
                
                    <div style="float:left; width:440px; height:165px;">
                        <div class="pbarouter" style="width:120px; float:left; padding: 5px 5px; height:92px; ">
                            <div class="pbarinner" style="width:120px; height:92px;">
                            <div style="padding:25px 35px; line-height:20px; color:#2D2D2D;">    
                            <?php getgooglepercentage($GoogleResults['G_numcat'],'0',$GoogleResults['G_reviews'],$GoogleResults['G_numphotos'],$GoogleResults[
							'G_website
							']);?>
                            </div>
                            </div>
                        </div>
                        <div class="localScore">
                            <img src="images/gpluslocalsumm.png" style=" float:left">
                            <span style="float:right; font-size:14px; padding:5px 10px;  color:#2D2D2D;">
                                <?php if($GoogleResults['G_name'] != '') echo "<a target='_blank' href=".$GoogleResults['G_pluslink'].">".$GoogleResults['G_name']."</a>"; 
                                      else echo "Not Present"; ?></span> 
                        </div>
                        <div style="float:right; width:290px;">
                            <table style="margin:0px 10px; float:right; width:290px; font-size:9px; border:#B6C7FA 1px solid;">
                            <tr style="border:#999999 1px solid;">
                                <td>2-Categoriies</td>
                                <td>5-Keywords</td>
                                <td>10-Reviews</td>
                                <td>10-Photos</td>                    
                                <td>Website</td>
                            </tr>                 
                            <tr>
                                <td><?php if($GoogleResults['G_numcat'] < 2) getimage('0'); else getimage('1'); ?></td>
                                <td><img src="images/x.png" style="padding:0px 15px;"></td>
                                <td><?php if($GoogleResults['G_reviews'] < 10) getimage('0'); else getimage('1'); ?></td>
                                <td><?php if($GoogleResults['G_numphotos'] < 10) getimage('0'); else getimage('1'); ?></td>
                                <td><?php if($GoogleResults['G_website'] == '') getimage('0'); else getimage('1'); ?></td>
                            </tr>                                
                            </table>
                        </div>
                        
                    </div> 
            
                    <div style="float:left; width:440px; height:165px;">
                        <div class="pbarouter" style="width:120px; float:left; padding: 5px 5px; height:92px; ">
                            <div class="pbarinner" style="width:120px; height:92px;">
                            <div style="padding:25px 35px; line-height:20px; color:#2D2D2D;">
                                <?php getYahoopercentage($YahooResults['Y_numcat'],$YahooResults['Y_reviews'],'0',$YahooResults['Y_website'],'0');?>
                            </div>
                            </div>
                        </div>
                        <div class="localScore">
                            <img src="images/ylocalsumm.gif" style=" float:left">
                            <span style="float:right; font-size:14px; padding:5px 10px;  color:#2D2D2D;">
                                <?php if($YahooResults['Y_name'] != '') echo "<a target='_blank' href=".$YahooResults['Y_link'].">".$YahooResults['Y_name']."</a>";
                                      else echo "Not Present"; ?></span> 
                        </div>
                        
                        <div style="float:right; width:290px; color:#2D2D2D;">
                            <table style="margin:0px 10px; float:right; width:290px; font-size:9px; border:#B6C7FA 1px solid;">
                            <tr style="border:#999999 1px solid;">
                                <td>2-Categoriies</td>
                                <td>10-Reviews</td>
                                <td>Photo</td>
                                <td>Website</td>                    
                                <td>Claimed</td>
                            </tr>                 
                            <tr>
                                <td><?php if($YahooResults['Y_numcat'] < 2) getimage('0'); else getimage('1'); ?></td>
                                <td><?php if($YahooResults['Y_reviews'] < 10) getimage('0'); else getimage('1'); ?></td>
                                <td><img src="images/x.png" style="padding:0px 15px;"></td>
                                <td><?php if($YahooResults['Y_website'] == '') getimage('0'); else getimage('1'); ?></td>
                                <td><img src="images/x.png" style="padding:0px 15px;"></td>
                            </tr>                                
                            </table>
                        </div>
                    </div> 
                    
                    <div style="float:left; width:440px; margin-top:2px;">
                        <div class="pbarouter" style="width:120px; float:left; padding: 5px 5px; height:92px; ">
                            <div class="pbarinner" style="width:120px; height:92px;">
                            <div style="padding:25px 35px; line-height:20px; color:#2D2D2D;">
                                <?php 
                                    getBingpercentage('0',$BingResults['B_reviews'],$BingResults['B_numphoto'],$BingResults['B_website']);
                                ?>
                            </div>
                            </div>
                        </div>
            
                        <div class="localScore">
                            <img src="images/blocalside.gif" style=" float:left">
                            <span style="float:right; font-size:14px; padding:5px 10px; color:#2D2D2D;">
							<?php if($BingResults['B_name'] != '') echo "<a target='_blank' href=".$BingResults['B_link'].">".$BingResults['B_name']."</a>"; 
                                                        else echo "Not Present"; ?>
                            </span> 
                        </div>
                        <div style="float:right; width:290px;">
                            <table style="margin:0px 10px; float:right; width:290px; font-size:9px; border:#B6C7FA 1px solid;">
                            <tr style="border:#999999 1px solid;">
                                <td>5-Categories</td>
                                <td>10-Reviews</td>
                                <td>Photos</td>
                                <td>Website</td>                    
                            </tr>                 
                            <tr>
                                <td><?php if($BingResults['B_numcat'] < 5) getimage('0'); else getimage('1'); ?></td>
                                <td><?php if($BingResults['B_reviews'] < 10) getimage('0'); else getimage('1'); ?></td>
                                <td><?php if($BingResults['B_numphoto'] != 1) getimage('0'); else getimage('1'); ?></td>
                                <td><?php if($BingResults['B_website'] == '') getimage('0'); else getimage(''); ?></td>
                            </tr>                                
                            </table>
                        </div>
                    </div>         
                        
                    <div style="float:right; width:440px; font-size:12px; padding:10px 0px; text-align:justify; margin-top:2px;">
                        NOTE: The Consistency of your NAP is important to Google as well to other Search Engines like Yahoo and Bing.<br>
                        If your NAP does not match on all directories and social networks this could hurt your rankings as it confuses the search engines and the 
                        end-user. Please make sure this is the EXACT NAP you wish to check. We will tell where your NAP does not match so you can fix it.
                    </div>
                </div>
            
            </div>
  
            
            <div id="geo" class="content-page geo" name="geo">

                <div class="directories">
                    Directories
                </div>   
                
                <div class="roundbg" style="color:#066086">
                    <b>Directories Walkthrough</b><br>
                    The Directories Report shows where your business is listed, how its listed and also where you are not listed. The premiss of this report is to 
                    identify problems in your citation acquisition so you can fix them.
        
                    Google looks at the consistency of your NAP( Name, Address and Phone #). The more consistent it is the more trust google has in your business and 
                    this will typically result in a higher ranking. Creating consistencies across all directories has proven to be difficult given all the different 
                    data aggregators and data entry points.
        
                    Its important that your NAP matches exactly across all directories. We have identified any inconsistencies in your nap by highlighting them in the 
                    Name column address column or phone column. To remedy any inconsistencies simply go that particular directory or site and edit your data.
        
                    If we do not find a business directory, it is because we could not find your NAP data or the NAP data was so inaccurate we could not identify the 
                    listing as belonging to you. There are circumstances where a site might just post your name and URL and not an address or phone #. This is not 
                    considered a true 
                    citation so in this case we would report a red X or "not present" even though a partial NAP exists.
                </div>

				<?php 
                $active_dir = 0;
                
                $Review = array();
                
                if($google_count){
                    $Review['www.google.com'] = array(
                        'ratestars' => $GoogleResults['G_rating'],
                        'reviews'   => $GoogleResults['G_reviews']
                    );
                }
                
                if($yahoo_count){
                    $Review['www.yahoo.com'] = array(
                        'ratestars' => $YahooResults['Y_rating'],
                        'reviews'   => $YahooResults['Y_reviews']
                    );
                    
                    $allcitations['www.yahoo.com'] = $YahooResults['Y_link'];
                    $active_dir = $active_dir + 1;
                    
                }
                
                if($bing_count){
                    $Review['www.bing.com'] = array(
                        'ratestars' => $BingResults['B_rating'],
                        'reviews'   => $BingResults['B_reviews']
                    );
                    
                    $allcitations['www.bing.com'] = $BingResults['B_link'];
                    $active_dir = $active_dir + 1;
                
                }
                
                $QueryCitation = "SELECT * FROM citation WHERE mainID = '".$mainID."'";
                $rs_Citation = runquery($QueryCitation);
                $total_dir  = 26;
                $active_dir = $active_dir + runquery_count($QueryCitation);
                $missing_dir = $total_dir - $active_dir;
                while($citationdata = mysql_fetch_assoc($rs_Citation)){
                    if($citationdata['specific_ratestars'] != '' && $citationdata['specific_reviews'] != ''){
                    $Review[$citationdata['website_link']] = array(
                            'ratestars' => $citationdata['specific_ratestars'],
                            'reviews'   => $citationdata['specific_reviews']
                        );
                    }
                    
                    $allcitations[$citationdata['website_link']] = $citationdata['specific_link'];
                    
                }
                
                $QueryNearbyCitation  = "SELECT * FROM nearby_citation WHERE mainID = '".$mainID."' limit 2";
                if(runquery_count($QueryNearbyCitation) == '2'){
                    $rs_QueryNearbyCitation = runquery($QueryNearbyCitation);
                    $NearbyCitationResults = array();
                    $i = 0;
                while($nearby = mysql_fetch_assoc($rs_QueryNearbyCitation)){
                    if($i==0) $location = 'A'; else $location = 'B';
                    $NearbyCitationResults[$location] = array($nearby['website_link'] => $nearby['specific_link']);
                    $i++;
                }
                }
                else{
                    $NearbyCitationResults['A'] = array();
                    $NearbyCitationResults['B'] = array();
                }
                
                ?>
                        <div style="width:910px; height:100px;">
                            <div class="pbarouter" style="width:225px; float:left; padding: 5px 5px; height:70px; margin:5px; ">
                                <div class="pbarinner" style="width:225px; height:70px;">
                                      <div style="padding:10px 35px; font-size:18px; text-align:center; ">Active Directories<br>
                                      <span style="font-size:24px;"><?php echo $active_dir; ?></span>
                                      </div>
                                </div>
                            </div>
                            <div class="pbarouter" style="width:225px; float:left; padding: 5px 5px; height:70px; margin:5px;">
                                <div class="pbarinner" style="width:225px; height:70px;">
                                      <div style="padding:10px 35px; font-size:18px; text-align:center; ">Missing Directories<br>
                                      <span style="font-size:24px;"><?php echo $missing_dir; ?></span>
                                      </div>
                                </div>
                            </div>
                            <div class="pbarouter" style="width:225px; float:left; padding: 5px 5px; height:70px; margin:5px; ">
                                <div class="pbarinner" style="width:225px; height:70px;">
                                     <div style="padding:10px 5px; font-size:18px; text-align:center; ">Local Directories Checked<br>
                                      <span style="font-size:24px;"><?php echo $total_dir; ?></span>
                                      </div>
                                </div>
                            </div>    
                            <div class="pbarouter" style="width:130px; float:left; padding: 5px 5px; height:70px; margin:5px; ">
                                <div class="pbarinner" style="width:130px; height:70px;">
                                    <div style="padding:10px 15px; font-size:11px; text-align:center; font-weight:600;">Directories Score<br>
                                        <span style="font-size:24px;" rel="<?php echo round(($active_dir * 100)/$total_dir); ?>" id="directories"><?php echo round((
										$active_dir * 100)/$total_dir); ?>%</span>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                        
                    <div>
                        <div class="CSSTableGenerator">
                                <table>
                                    <tr>
                                        <td>Fevicon</td>
                                        <td>Name</td>
                                        <td>Business Name/Address</td>
                                        <td>Phone</td>
                                        <td>Website</td>
                                        <td>Status</td>
                                    </tr>
                                   <?php
                                   if($active_dir == '0'){
                //                       echo "<tr><td colspan='6'>No Record Found</td></tr>";
                                       $allcitations = array();
                                   }
                                   else{
                //                       print_r($allcitations);
                                   foreach($allcitations as $key => $value) {
                                    $website_link  = $key;
                                    $specific_link = $value;
                                   ?>
                                    <tr>
                                        <td><img title="<?php echo $mainResults['business_name']." IN ".$website_link; ?>" src="http://g.etfv.co/<?php echo 
										$specific_link; ?>"></td>
                                        <td><?php echo $website_link; ?></td>
                                        <td><?php echo $mainResults['business_name']; ?></td>
                                        <td><?php echo $mainResults['phone_num']; ?></td>
                                        <td><a title="<?php echo $mainResults['business_name']." IN ".$website_link; ?>" target="_blank" href="<?php echo 
										$specific_link
										; ?>">Visit Link</a></td>                        
                                        <td><?php RightImage(); ?></td>                        
                                    </tr>
                                    <?php } 
                                         }

                                       if(!array_key_exists('www.superpages.com', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.superpages.com'/></td>
                                               <td>superpages.com</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";

											   
                                       if(!array_key_exists('www.citysearch.com', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.citysearch.com'/></td>
                                               <td>citysearch.com</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";
                                      
                                       if(!array_key_exists('www.foursquare.com', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.foursquare.com'/></td>
                                               <td>foursquare.com</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";

                                       if(!array_key_exists('www.ezlocal.com', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.ezlocal.com'/></td>
                                               <td>ezlocal.com</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";									   

                                       if(!array_key_exists('www.infogroup.com', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.infogroup.com'/></td>
                                               <td>infogroup.com</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";									   

                                       if(!array_key_exists('www.yelp.com', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.yelp.com'/></td>
                                               <td>yelp.com</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";

                                       if(!array_key_exists('www.hotfrog.com', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.hotfrog.com'/></td>
                                               <td>hotfrog.com</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";
                                       
                                       if(!array_key_exists('www.nokia.com', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.nokia.com'/></td>
                                               <td>nokia.com</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";

										/*

									   if(!array_key_exists('www.manta.com', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.manta.com'/></td>
                                               <td>manta.com</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";
                                       
                                       if(!array_key_exists('www.merchantcircle.com', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.merchantcircle.com'/></td>
                                               <td>merchantcircle.com</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";
                                       

                                       
                                       if(!array_key_exists('www.getfave.com', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.getfave.com'/></td>
                                               <td>getfave.com</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";
                                       
                                       if(!array_key_exists('www.ziplocal.com', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.ziplocal.com'/></td>
                                               <td>ziplocal.com</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";
                                       
                                       if(!array_key_exists('www.yellowmoxie.com', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.yellowmoxie.com'/></td>
                                               <td>yellowmoxie.com</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";
                                       
                                       if(!array_key_exists('www.yellowbot.com', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.yellowbot.com'/></td>
                                               <td>yellowbot.com</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";
                                       
                                       if(!array_key_exists('www.yellowbook.com', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.yellowbot.com'/></td>
                                               <td>yellowbook.com</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";
                                       
                                       if(!array_key_exists('www.yellowee.com', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.yellowee.com'/></td>
                                               <td>yellowee.com</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";
                                       
                                       if(!array_key_exists('www.uscity.net', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.uscity.net'/></td>
                                               <td>uscity.net</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";
                                       
                                       if(!array_key_exists('www.company.com', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.company.com'/></td>
                                               <td>company.com</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";
                                       
                                       if(!array_key_exists('www.matchpoint.com', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.matchpoint.com'/></td>
                                               <td>matchpoint.com</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";
                                       
                                       if(!array_key_exists('www.brownbook.net', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.brownbook.net'/></td>
                                               <td>brownbook.net</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";
                                       

                                       
                                       if(!array_key_exists('www.insiderpages.com', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.insiderpages.com'/></td>
                                               <td>insiderpages.com</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";
                                       
                                       if(!array_key_exists('www.local.com', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.local.com'/></td>
                                               <td>local.com</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";
                                       
                                       if(!array_key_exists('www.theusaexplorer.com', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.theusaexplorer.com'/></td>
                                               <td>theusaexplorer.com</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";
                                       
                                       if(!array_key_exists('www.justclicklocal.com', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.justclicklocal.com'/></td>
                                               <td>justclicklocal.com</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";
											  
											   */

                //                      if($yahoo_count!= '0'){
                //                          echo "<tr>
                //                               <td> <img src='http://g.etfv.co/http://www.yahoo.com'/></td>
                //                               <td> yahoo.com</td>
                //                               <td>" . $YahooResults['Y_name'] . "</td>
                //                               <td>" . $mainResults['phone_num'] . "</td>
                //                               <td><a title='". $mainResults['business_name'] . " IN yahoo.com' target='_blank' href='" . $YahooResults['Y_link'] . "'>Visit Link</a></td>
                //                               <td>" . '<img title="Active" src="images/check.png">' . "</td>                        
                //                        </tr>";
                //                      }
                //                      else{
                //                           echo "<tr>
                //                               <td><img src='http://g.etfv.co/http://www.yahoo.com'/></td>
                //                               <td>yahoo.com</td>
                //                               <td colspan='3'><a href='#'>Signup</a></td>
                //                               <td>".WrongImage()."</td>
                //                               </tr>";
                //                       }

									/*
                                       if(!array_key_exists('www.bing.com', $allcitations))
                                           echo "<tr>
                                               <td><img src='http://g.etfv.co/http://www.bing.com'/></td>
                                               <td>bing.com</td>
                                               <td colspan='3'><a href='#'>Signup</a></td>
                                               <td>".WrongImage()."</td>
                                               </tr>";
                                      */ 
                                    ?>
                                </table>
                            </div>
                        </div>
            </div>
         
            
            <div id="referrals" class="content-page referrals" name="referrals">
                <div class="competition">
                    Competition Citation Comparison
                </div>   
                
                <div class="roundbg" style=" color:#377F01;">
                    <b>Competition Walkthrough</b><br>
                    The Competition Report looks at how visible your company is compared to your most optimized competition online.
                    The competitors shown are based on doing a query on google for the primary keyword used in Google Places. This keyword is typically also the most 
                    competitive to rank for. By understanding what your competition is doing you can then determine what you need to do to catch and beat your 
                    competition. We analyze the presence of each competitor on the big 3 search engines and then also dissever citations that are highly related to 
                    your area, industry as well as the most important local directories. We then show you exactly how well each business is optimized and then also 
                    discover additional citation sources for you to add your NAP data (Name, Address, and Phone #). This report gives you a nice snapshot of what you 
                    need to do to start to build an online marketing campaign designed to outrank your competitors.
                </div>
                
                
                <style>
                table {
                    font: 10px Verdana, Arial, Helvetica, sans-serif;
                    border-collapse: collapse;
                    width: 880px;
                    }
                
                td {
                    border-bottom: 1px solid #CCC;
                    height:30px;
                    }
                
                td+td {
                    border-left: 1px solid #CCC;
                    text-align: center;
                    }
                </style>
	<?php
	$QueryNearby  = "SELECT * FROM nearby_data WHERE mainID = '".$mainID."'";
	if(runquery_count($QueryNearby) == '2'){
		$rs_QueryNearby = runquery($QueryNearby);
		$NearbyResults = array();
		$i = 0;
	while($nearby = mysql_fetch_assoc($rs_QueryNearby)){
		if($i==0) $location = 'A'; else $location = 'B';
		$NearbyResults[$location] = array('BA' => $nearby['address'], 'BN' => $nearby['name']);
		$i++;
	}
	}
	
	
	?>
				
                <div style="height:auto; margin-top:10px;">
                        <table>
                            <tr style="background-color:#EAEAEA; width:880px; font-weight:600;">
                                <td></td>
                                <td><img src="https://chart.googleapis.com/chart?chst=d_map_pin_letter_withshadow&chld=A|fe6256|000000">0%</td>
                                <td><img src="https://chart.googleapis.com/chart?chst=d_map_pin_letter_withshadow&chld=B|65ba4a|000000">0%</td>
                                <td><img src="https://chart.googleapis.com/chart?chst=d_map_pin_letter_withshadow&chld=C|43aafd|000000"><span rel="<?php echo round((
								$active_dir * 100)/$total_dir); ?>" id="directoriespercentage"><?php echo round(($active_dir * 100)/$total_dir); ?></span>%</td>
                            </tr>                
                            <tr style="font-size:14px; height:40px;">
                                <td></td>
                                <td><?php if(isset($NearbyResults)) echo $NearbyResults['A']['BN'];else echo "<span style='color:red;'>Name Not Available</span>"; 
									?></td>
                                <td><?php if(isset($NearbyResults)) echo $NearbyResults['B']['BN'];else echo "<span style='color:red;'>Name Not Available</span>"; 
									?></td>
                                <td><?php echo $mainResults['business_name']; ?></td>
                            </tr>
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.manta.com">Manta</td>
                                <td><?php if(array_key_exists('www.manta.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>
                                <td><?php if(array_key_exists('www.manta.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>
                                <td><?php if(array_key_exists('www.manta.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr>
                           <tr>
                                <td><img src="http://g.etfv.co/http://www.merchantcircle.com">MerchantCircle</td>
                                <td><?php if(array_key_exists('www.merchantcircle.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>
                                <td><?php if(array_key_exists('www.merchantcircle.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>
                                <td><?php if(array_key_exists('www.merchantcircle.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr>
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.ezlocal.com">EzLocal</td>
                                <td><?php if(array_key_exists('www.ezlocal.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.ezlocal.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.ezlocal.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>                        
                            </tr>
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.getfave.com">GetFave</td>
                                <td><?php if(array_key_exists('www.getfave.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.getfave.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.getfave.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>                        
                            </tr>
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.ziplocal.com">ZipLocal</td>
                                <td><?php if(array_key_exists('www.ziplocal.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.ziplocal.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.ziplocal.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr>  
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.yellowmoxie.com">YellowMoxie</td>
                                <td><?php if(array_key_exists('www.yellowmoxie.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>   
                                <td><?php if(array_key_exists('www.yellowmoxie.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.yellowmoxie.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr>  
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.yellowbot.com">YellowBot</td>
                                <td><?php if(array_key_exists('www.yellowbot.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.yellowbot.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.yellowbot.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr>  
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.yellowbook.com">YellowBook</td>
                                <td><?php if(array_key_exists('www.yellowbook.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.yellowbook.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.yellowbook.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr> 
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.yellowee.com">YellowWee</td>
                                <td><?php if(array_key_exists('www.yellowee.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>   
                                <td><?php if(array_key_exists('www.yellowee.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.yellowee.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr>   
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.uscity.net">UsCity</td>
                                <td><?php if(array_key_exists('www.uscity.net',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>    
                                <td><?php if(array_key_exists('www.uscity.net',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.uscity.net',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr>                                           
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.company.com">Company</td>
                                <td><?php if(array_key_exists('www.company.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.company.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.company.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr>                       
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.matchpoint.com">MatchPoint</td>
                                <td><?php if(array_key_exists('www.matchpoint.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.matchpoint.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.matchpoint.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr>   
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.brownbook.net">BrownBook</td>
                                <td><?php if(array_key_exists('www.brownbook.net',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.brownbook.net',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.brownbook.net',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr>                       
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.superpages.com">SuperPages</td>
                                <td><?php if(array_key_exists('www.superpages.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.superpages.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.superpages.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr>                       
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.insiderpages.com">InsiderPages</td>
                                <td><?php if(array_key_exists('www.insiderpages.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>   
                                <td><?php if(array_key_exists('www.insiderpages.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>   
                                <td><?php if(array_key_exists('www.insiderpages.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr>   
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.citysearch.com/world">CitySearch</td>
                                <td><?php if(array_key_exists('www.citysearch.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.citysearch.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.citysearch.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr>
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.local.com">Local</td>
                                <td><?php if(array_key_exists('www.local.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.local.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.local.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr>
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.theusaexplorer.com">TheUSAExplorer</td>
                                <td><?php if(array_key_exists('www.theusaexplorer.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.theusaexplorer.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.theusaexplorer.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr>
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.justclicklocal.com">JustClickLocal</td>
                                <td><?php if(array_key_exists('www.justclicklocal.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.justclicklocal.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.justclicklocal.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr>
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.yahoo.com">Yahoo</td>
                                <td><?php if(array_key_exists('www.yahoo.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.yahoo.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.yahoo.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr>                                                                                
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.bing.com">Bing</td>
                                <td><?php if(array_key_exists('www.bing.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.bing.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.bing.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr>                    
                            
                            
                            
                            <tr>
                                <td><img src="http://g.etfv.co/https://foursquare.com">Foursquare</td>
                                <td><?php if(array_key_exists('www.foursquare.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.foursquare.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.foursquare.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr>                    
                            
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.infogroup.com">Infogroup</td>
                                <td><?php if(array_key_exists('www.infogroup.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.infogroup.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.infogroup.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr>                    
                            
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.yelp.com">Yelp</td>
                                <td><?php if(array_key_exists('www.yelp.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.yelp.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.yelp.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr>                    
                            
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.hotfrog.com">Hotfrog</td>
                                <td><?php if(array_key_exists('www.hotfrog.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.hotfrog.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.hotfrog.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr>                    
                            
                            <tr>
                                <td><img src="http://g.etfv.co/http://www.nokia.com">Nokia</td>
                                <td><?php if(array_key_exists('www.nokia.com',$NearbyCitationResults['A'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.nokia.com',$NearbyCitationResults['B'])) getimage('1'); else getimage('0'); ?></td>  
                                <td><?php if(array_key_exists('www.nokia.com',$allcitations)) getimage('1'); else getimage('0'); ?></td>
                            </tr>                    
                            
                            
                            
                        </table>
                  </div>
            
            </div>

            
            <div id="search" class="content-page search" name="search">
                <div class="location">
                    Competition Location
                </div>  

                        <div style="width:890px; height:590px; margin:10px;">
                            <div style="height:600px; width:280px; float:left; font-size:16px;">
                                <div style="height:200px;">
                                    <img src="https://chart.googleapis.com/chart?chst=d_map_pin_letter_withshadow&chld=A|fe6256|000000">
                                    <b style="color:#FF3A00;"><?php if(isset($NearbyResults)) echo $NearbyResults['A']['BN'];else echo "<span style='color:red;'>Nearby 									Location Not Available
									</span>"; ?></b><br>
                                    <?php if(isset($NearbyResults)) echo $NearbyResults['A']['BA'];else echo "<span style='color:red;'>Address Not Available</span>"; 
									?>
                                    <br>
                                </div>
                                <div style="height:200px;">
                                    <img src="https://chart.googleapis.com/chart?chst=d_map_pin_letter_withshadow&chld=B|65ba4a|000000">
                                    <b style="color:#FF3A00;"><?php if(isset($NearbyResults)) echo $NearbyResults['B']['BN'];else echo "<span style='color:red;'>Nearby 
									Location Not Available
									</span>"; ?></b><br>
                                    <?php if(isset($NearbyResults)) echo $NearbyResults['B']['BA'];else echo "<span style='color:red;'>Address Not Available</span>"; 
									?>
                                    <br>
                                </div>
                                <div style="height:200px;">
                                    <img src="https://chart.googleapis.com/chart?chst=d_map_pin_letter_withshadow&chld=C|43aafd|000000">
                                    <b style="color:#FF3A00;"><?php echo $mainResults['business_name'] ?></b><br>
                                       <?php echo $Valid_address_format; ?>
                                </div>
                            </div>
                
                            <div style="height:590px; float:right; margin-right:10px;">
                <?php
                
                if(runquery_count($QueryNearby) == '2'){
                    echo '<img alt="Competitors and Current Site Locations" title="Current Website and Its Nearest Competitors Locations on Google map" 
					src="http://maps.googleapis.com/maps/api/staticmap?zoom=auto&amp;size=600x540&amp;maptype=roadmap&amp;markers=color:red|label:A|'.urlencode(
					$NearbyResults['A']['BA']).'&amp;markers=color:green|label:B|'.urlencode($NearbyResults['B']['BA']).'&amp;markers=color:blue|label:C|'.urlencode(
					$Valid_address_format).'&amp;sensor=false&amp;key=AIzaSyDYFeaEYzpT0TvDQgqy9qyzRCbMFwFet6k">';
                }
                else{
                //    echo '<img src="images/staticmap.png">';
                    echo '<img alt="Competitors and Current Site Locations" title="Current Website and Its Nearest Competitors Locations on Google map" 
					src="http://maps.googleapis.com/maps/api/staticmap?zoom=auto&amp;size=600x540&amp;maptype=roadmap&amp;markers=color:blue|label:C|'.urlencode(
					$Valid_address_format).'&amp;sensor=false&amp;key=AIzaSyDYFeaEYzpT0TvDQgqy9qyzRCbMFwFet6k">';
                }
                ?>
                                
                            </div>
                        </div>
            </div>
            
            
            <div id="social" class="content-page social" name="social">
                <div class="reputation">
                    Reputation
                </div>   
      			
				<?php // printarray($NearbyResults); ?>		
                <div class="roundbg" style="color:#128CFE;">
                    <b>Reputation Walkthrough</b><br>
                    The Reputation report scans several review sites and reports back on those reviews. We look for your business on various search engines and local 
                    directories and review sites, analyze your 5 star reviews on each, display the last 10 reviews, report on the overall sentiment from each review 
                    site and then display the average.
                    You can grab important data from this report to discover possible reputation management issues so you can take action.
                    In addition we are finding mentions of your business and displaying those as well. These mentions are also given a sentiment score. The overall 
                    sentiment is displayed in the top section as a summary of all sentiment scores.
                </div>
              
                <div class="reputation">
                    Review Management
                </div>        
        
                <div style="width:910px; height:100px;">
                    <div class="pbarouter" style="width:225px; float:left; padding: 5px 5px; height:70px; margin:5px; ">
                        <div class="pbarinner" style="width:225px; height:70px;">
                              <div style="padding:10px 35px; font-size:18px; text-align:center; ">Star Score<br>
                              <span style="font-size:24px;">
                                  <?php
                                  $totalstars = $totalreviews =  0;
                                  foreach($Review as $key => $value){
                                      $totalstars = $totalstars + $value['ratestars'];
                                      $totalreviews = $totalreviews + $value['reviews'];
                                  }
                                  $totalall = count($Review);
                                  $forstarnew = round($totalstars*20/$totalall);
                                  $totalstars = $totalstars/2;
                                  echo "<div title='".$totalstars."' class='rateit' data-rateit-value='".$totalstars."' data-rateit-ispreset='true' data-rateit-readonly='true'></div>";
//                                  echo "<span id='totalstars'><img title='".$totalstars."' src='http://businessreport.localseo.com/stars-".$forstarnew."-a.png'/>"."</span>";
                                  
                                  ?>
                                  
                              </span>
                              </div>
                        </div>
                        </div>
                    
                    <div class="pbarouter" style="width:225px; float:left; padding: 5px 5px; height:70px; margin:5px;">
                        <div class="pbarinner" style="width:225px; height:70px;">
                              <div style="padding:10px 35px; font-size:18px; text-align:center; ">Sentiment<br>
                              <span style="font-size:24px;"><?php echo getSmallSentiment($totalstars/$totalall,'30','30'); ?></span>
                              </div>
                        </div>
                    </div>
                    <div class="pbarouter" style="width:225px; float:left; padding: 5px 5px; height:70px; margin:5px; ">
                        <div class="pbarinner" style="width:225px; height:70px;">
                             <div style="padding:10px 5px; font-size:18px; text-align:center; ">Total Review Count<br>
                              <span style="font-size:24px;"><?php echo $totalreviews; ?></span>
                              </div>
                        </div>
                    </div>    
                    <div class="pbarouter" style="width:120px; float:left; padding: 5px 5px; height:70px; margin:5px; ">
                        <div class="pbarinner" style="width:120px; height:70px;">
                            <div style="padding:10px 15px; font-size:11px; text-align:center; font-weight:600;">
                                Reputation Score<br><span style="font-size:24px;" rel="<?php echo $forstarnew; ?>" id="reputation"><?php echo $forstarnew; ?>%</span>
                            </div>
                        </div>
                    </div>                        
                </div>      
              
                <div style="height:auto; margin-top:10px;">
                        <table>
                            <tr style="background-color:#EAEAEA; width:910px; font-weight:600; font-size:12px; text-align:center; color:#128CFE; ">
                                <td>Website</td>
                                <td >Average</td>
                                <td># of Reviews</td>
                                <td>Average Sentiment</td>
                            </tr> 
                            <?php if(empty($Review)){ ?>
                            <tr style="font-size:12px; height:40px;">
                                <td>There is no Reviews this time</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php }else{ foreach($Review as $key => $value){
                             $ratestars = $value['ratestars'];   
                             $reviews   = $value['reviews'];
                             ?>
                            <tr style="font-size:12px; height:40px;">
                                <td style="text-align: center;"><?php echo $key; ?></td>
                                <td><?php echo "<div title='".$ratestars."' class='rateit' data-rateit-value='".$ratestars."' data-rateit-ispreset='true' data-rateit-readonly='true'></div>"; ?>
                                </td>
                                <td><?php echo $reviews." Reviews"; ?></td>
                                <td>
                                 <?php
                                        echo getSmallSentiment($ratestars);
                                 ?>
                                 
                                </td>
                            </tr>
        
                             <?php } } ?>
                        </table>
                 </div>
            </div>
            
            
            <div id="alsoVisited" class="content-page alsovisited" name="alsoVisited">
                <div class="webmentions" style="">
                    Web Mentions
                </div>  
              
                <div style="height:auto; margin-top:10px;">
                        <table>
                            <tr style="background-color:#EAEAEA; width:910px; font-weight:600; font-size:12px; text-align:center; ">
                                <td>Source</td>
                                <td>Date</td>
                                <td>Title</td>
                                <td>Description</td>
                            </tr> 
						<?php
                        $QueryWebMention = "SELECT * FROM web_mentions WHERE mainID = '".$mainID."'";
                        if(runquery_count($QueryWebMention) == 0){
                        ?>
                                            <tr style="font-size:12px; height:40px;">
                                                <td colspan="4">No Web Mentions found</td>
                                            </tr>
                                            
                        <?php } else {
                        $rs_webmentions = runquery($QueryWebMention);
                        while($WebMentions = mysql_fetch_assoc($rs_webmentions)){    
                        ?>
                                            <tr style="font-size:12px; height:40px;">
                                                <td><img src="http://g.etfv.co/<?php echo $WebMentions['link'] ?>"></td>
                                                <td><?php echo $WebMentions['date'] ?></td>
                                                <td title="<?php echo $WebMentions['title'] ?>"><a target="_blank" href='http://<?php echo $WebMentions['link'] ?>'>
												<?php echo substr($WebMentions['title'],0,40)."..."; ?></a></td>
                                                <td title="<?php echo $WebMentions['description'] ?>"><?php echo substr($WebMentions['description'],0,50)."..."; ?></td
                                                >
                                            </tr>
                        <?php } } ?>
        
                        </table>
                 </div>
            </div>


			<?
            /*
                This is a simple script for intergating data
                from SEMRush.com API.
                Please, find more information at http://www.semrush.com/api.html
            */
                
                set_time_limit ( 0 );
                
            /* ######################################################################
               ################# Set some parameters ################################
               ###################################################################### */
                
                // 1) $query - Your request. This can be one of three:
                // 		1) domain name, e.g.: ebay.com
                // 		2) keyphrase, e.g.: money
                // 		3) URL, e.g.: http://www.ebay.com/
                $query		= stripslashes($mainResults['website']);
                
                // 2) $type - Type of report. This can take different values, depending on the query.
                // 
                // If your query is a domain name, the $type can be:
                // 		1) domain_organic
                // 		2) domain_adwords
                // 		3) domain_organic_organic
                // 		4) domain_adwords_adwords
                // 		5) domain_organic_adwords
                // 		6) domain_adwords_organic
                // 		7) domain_rank
                // 
                // If your query is a keyphrase, the $type can be:
                //		1) phrase_related
                //		2) phrase_this
                // 
                // If your query is URL, the $type can be:
                //		1) url_organic
                //		2) url_adwords
                $type		= 'domain_organic';
                
                // 3) $request_type - type of the request. This shows what type of query you are using.
                // This can be, depending on your query:
                //		1) domain
                //		2) phrase
                //		3) url
                $request_type = 'domain';
                
                // 4) $api_key - Your unique SEMRush API key
                //
                $api_key	= 'eb8148a9bc0385722a040b8fecc33342';
                
                // 5) $db - Database (for the moment can be: en, uk, ru, de, fr, es)
                $db			= 'us';
                
                // 6) $limit - How many results to return
                $limit		= 10;
                
                // 7) $offset - How many results to skip from the beginning
                $offset		= 0;
                
                // 8) $export_columns - which columns should be returened in what order
                // Values, replicating SEMRush web interface by report type:
                // 		1) for domain_organic - $export_columns=Ph,Po,Nq,Cp,Ur,Tr,Tc,Co,Nr,Td
                // 		2) for domain_adwords - $export_columns=Ph,Po,Nq,Cp,Vu,Tr,Tc,Co,Nr,Td
                // 		3) for domain_organic_organic - $export_columns=Dn,Np,Or,Ot,Oc,Ad
                // 		4) for domain_adwords_adwords - $export_columns=Dn,Np,Ad,At,Ac,Or
                // 		5) for domain_organic_adwords - $export_columns=Dn,Np,Ad,At,Ac,Or
                // 		6) for domain_adwords_organic - $export_columns=Dn,Np,Or,Ot,Oc,Ad
                // 		7) for domain_rank - $export_columns=Dn,Rk,Or,Ot,Oc,Ad,At,Ac
                //		8) for phrase_related - $export_columns=Ph,Nq,Cp,Co,Nr,Td
                //		9) for phrase_this - $export_columns=Ph,Nq,Cp,Co,Nr
                //		10) for url_organic - $export_columns=Ph,Po,Nq,Cp,Co,Tr,Tc,Nr,Td
                //		11) for url_adwords - $export_columns=Ph,Po,Nq,Cp,Co,Tr,Tc,Nr,Td
                $export_columns = 'Ph,Ur,Tr,Nq';
                
            /* ######################################################################
               ################# End setting parameters #############################
               ###################################################################### */
                
                
                function performRequest ( $params )
                {
                    $url				 = 'http://' . $params [ 'db' ] . '.api.semrush.com/?action=report&type=' . $params [ 'type' ] . '&' . $params [ 'request_type' ] . '=' . $params [ 'q' ] . '&key=' . $params [ 'key' ] . '&display_limit=' . $params [ 'limit' ] . '&display_offset=' . $params [ 'offset' ] . '&export=api&export_columns=' . $params [ 'export_columns' ];
                    $cUrl				 = curl_init			();
                                           curl_setopt			( $cUrl, CURLOPT_URL, $url );
                                           curl_setopt			( $cUrl, CURLOPT_RETURNTRANSFER, 1 );
                                           curl_setopt			( $cUrl, CURLOPT_TIMEOUT, 30 );
                                           curl_setopt			( $cUrl, CURLOPT_HTTPHEADER, array ( 'X-Real-IP', $params [ 'uip' ] ) );
                    $answer				 = curl_exec			( $cUrl );
                    if ( curl_getinfo ( $cUrl, CURLINFO_HTTP_CODE ) == 200 )
                    {
                                           curl_close			( $cUrl );
                        return $answer;	// Return request results
                    }
                    elseif ( curl_errno ( $cUrl ) && curl_errno ( $cUrl ) != 28 )
                    {
                                           curl_close			( $cUrl );
                        return false;	// Error occured during request
                    }
                                           curl_close			( $cUrl );
                    return false;		// Request timed out
                }
                
                $ip_address	= $_SERVER['SERVER_ADDR'];
                
                $params = Array
                (
                    'request_type'		=> $request_type,
                    'type'				=> $type,
                    'q'					=> urlencode ( $query ),
                    'key'				=> $api_key,
                    'uip'				=> $ip_address,
                    'db'				=> $db,
                    'limit'				=> $limit,
                    'offset'			=> $offset,
                    'export_columns'	=> $export_columns
                );
           		?>
                
                
                <div id="similarSites" class="content-page similarSites" name="similarSites">
                
	                <div class="graybar" style="margin-top:20px; color:#2D2D2D;">
    	                Keyword Rankings
        	        </div>   
            	    
                	<div class="roundbg" style="color:#2D2D2D;">
                    	<b>Keyword Ranking Walkthrough</b><br>
                    	The <b>Keyword Ranking</b> tool shows you where your keywords rank on Google, Google+ Local, Yahoo, Yahoo Local, Bing, and Bing Local.
                	</div>
                
           	    	<div class="graybar" style="margin-top:40px;">
                    	Google Keyword Rankings
                    </div> 
                
                <?
		        if ( false !== ( $result = performRequest ( $params ) ) )
                {
                    if ( preg_match ( "/^ERROR\s[0-9]+\s::[a-zA-Z0-9\s]+/i", $result ) )
                    { //echo "###  ".$result;  
                    ?>
 
                    
                    <div style="height:50px; width:880px;">
                      <div class="CSSTableGenerator">
                         <table>
                            <tr>
                              <td> Keyword </td>
                              <td> URL </td>
                              <td> Organic Rank </td>
                              <td> Local Rank </td>
                            </tr>
                            <tr>
                              <td><?php echo $mainResults['main_keyword']; ?> </td>
                              <td><?php echo stripslashes($mainResults['website']); ?></td>
                              <td>n/a</td>
                              <td>n/a</td>
                            </tr>
                             </table>
                      </div>
                    </div>
                    
                    <?}
                    else
                    {
                        $data = explode ( "\n", trim ( $result ) );
                        $fields = explode ( ";", array_shift ( $data ) );
                        
                        if ( count ( $data ) > 0 )
                        {
            ?>
       
			       <div style="height:50px; width:880px;">
                      <div class="CSSTableGenerator">
                         <table>
                            <tr>
                            	<td> Keyword </td>
                              	<td> URL </td>
                              	<td> Organic Rank </td>
                              	<td> Local Rank </td>
                            </tr>
       
            				<?
                            	foreach ( $data as $line )
                            	{
                                $values = explode ( ";", $line, count ( $fields ) );
                            ?>
                		    <tr>
            				<?
                                foreach ( $values as $value )
                                {
            				?>
                        		<td><?= $value; ?></td>
            				<?
                                }
            				?>
                    		</tr>
           					 <?
                   				 break;		}
           					 ?>
              			</table>
                      </div>
                    </div>
            <?
                        }
                        else
                        {
            ?>
            <!-- No data found for your request-->
                    <div style="height:50px; width:880px;">
                      <div class="CSSTableGenerator">
                         <table>
                            <tr>
                              <td> Keyword </td>
                              <td> URL </td>
                              <td> Organic Rank </td>
                              <td> Local Rank </td>
                            </tr>
                            <tr>
                              <td><?php echo $mainResults['main_keyword']; ?> </td>
                              <td><?php echo stripslashes($mainResults['website']); ?></td>
                              <td>n/a</td>
                              <td>n/a</td>
                            </tr>
                             </table>
                      </div>
                    </div>
            <?
                        }
                    }
                }
                else
                {
            ?>
            <!-- Error occured during request or connection timed out. -->
                    <div style="height:50px; width:880px;">
                      <div class="CSSTableGenerator">
                         <table>
                            <tr>
                              <td> Keyword </td>
                              <td> URL </td>
                              <td> Organic Rank </td>
                              <td> Local Rank </td>
                            </tr>
                            <tr>
                              <td><?php echo $mainResults['main_keyword']; ?> </td>
                              <td><?php echo stripslashes($mainResults['website']); ?></td>
                              <td>n/a</td>
                              <td>n/a</td>
                            </tr>
                             </table>
                      </div>
                    </div>
            <?
                }
            ?>
            
            
            <div class="graybar" style="margin-top:40px;">
	            Bing Keyword Rankings
            </div>  

            <?
            // ***************  BING BING BING BING BING BING BING 
            $db			= 'us.bing';
            $params = Array
            (
                    'request_type'		=> $request_type,
                    'type'				=> $type,
                    'q'					=> urlencode ( $query ),
                    'key'				=> $api_key,
                    'uip'				=> $ip_address,
                    'db'				=> $db,
                    'limit'				=> $limit,
                    'offset'			=> $offset,
                    'export_columns'	=> $export_columns
            );
                if ( false !== ( $result = performRequest ( $params ) ) )
                {
                    if ( preg_match ( "/^ERROR\s[0-9]+\s::[a-zA-Z0-9\s]+/i", $result ) )
                    { //echo "###  ".$result;  
                    ?>
                    <div style="height:50px; width:880px;">
                      <div class="CSSTableGenerator">
                         <table>
                            <tr>
                              <td> Keyword </td>
                              <td> URL </td>
                              <td> Organic Rank </td>
                              <td> Local Rank </td>
                            </tr>
                            <tr>
                              <td><?php echo $mainResults['main_keyword']; ?> </td>
                              <td><?php echo stripslashes($mainResults['website']); ?></td>
                              <td>n/a</td>
                              <td>n/a</td>
                            </tr>
                             </table>
                      </div>
                    </div>
                        
                    <?}
                    else
                    {
                        $data = explode ( "\n", trim ( $result ) );
                        $fields = explode ( ";", array_shift ( $data ) );
                        
                        if ( count ( $data ) > 0 )
                        {
            ?>
               		<div style="height:50px; width:880px;">
                      <div class="CSSTableGenerator">
                         <table>
                            <tr>
                            	<td> Keyword </td>
                              	<td> URL </td>
                              	<td> Organic Rank </td>
                              	<td> Local Rank </td>
                            </tr>
       
            				<?
                            	foreach ( $data as $line )
                            	{
                                $values = explode ( ";", $line, count ( $fields ) );
                            ?>
                		    <tr>
            				<?
                                foreach ( $values as $value )
                                {
            				?>
                        		<td><?= $value; ?></td>
            				<?
                                }
            				?>
                    		</tr>
           					 <?
                   				 break;		}
           					 ?>
              			</table>
                      </div>
                    </div>
                <?
                        }
                        else
                        {
            ?>
            <!-- No data found for your request -->
                    <div style="height:50px; width:880px;">
                      <div class="CSSTableGenerator">
                         <table>
                            <tr>
                              <td> Keyword </td>
                              <td> URL </td>
                              <td> Organic Rank </td>
                              <td> Local Rank </td>
                            </tr>
                            <tr>
                              <td><?php echo $mainResults['main_keyword']; ?> </td>
                              <td><?php echo stripslashes($mainResults['website']); ?></td>
                              <td>n/a</td>
                              <td>n/a</td>
                            </tr>
                             </table>
                      </div>
                    </div>
            <?
                        }
                    }
                }
                else
                {
            ?>
            <!-- Error occured during request or connection timed out. -->
                    <div style="height:50px; width:880px;">
                      <div class="CSSTableGenerator">
                         <table>
                            <tr>
                              <td> Keyword </td>
                              <td> URL </td>
                              <td> Organic Rank </td>
                              <td> Local Rank </td>
                            </tr>
                            <tr>
                              <td><?php echo $mainResults['main_keyword']; ?> </td>
                              <td><?php echo stripslashes($mainResults['website']); ?></td>
                              <td>n/a</td>
                              <td>n/a</td>
                            </tr>
                             </table>
                      </div>
                    </div>
            <?
                }
            ?>
            
            <div class="graybar" style="margin-top:40px;">
	    	   Yahoo Keyword Rankings
            </div>  
            
            <?
            //************** YAHOO YAHOO YAHOO YAHOO YAHOO YAHOO YAHOO
            $db			= 'us.yahoo';
            $params = Array
            (
                    'request_type'		=> $request_type,
                    'type'				=> $type,
                    'q'					=> urlencode ( $query ),
                    'key'				=> $api_key,
                    'uip'				=> $ip_address,
                    'db'				=> $db,
                    'limit'				=> $limit,
                    'offset'			=> $offset,
                    'export_columns'	=> $export_columns
            );
                if ( false !== ( $result = performRequest ( $params ) ) )
                {
                    if ( preg_match ( "/^ERROR\s[0-9]+\s::[a-zA-Z0-9\s]+/i", $result ) )
                    { //echo "###  ".$result;  
                    ?>
                    <div style="height:50px; width:880px;">
                      <div class="CSSTableGenerator">
                         <table>
                            <tr>
                              <td> Keyword </td>
                              <td> URL </td>
                              <td> Organic Rank </td>
                              <td> Local Rank </td>
                            </tr>
                            <tr>
                              <td><?php echo $mainResults['main_keyword']; ?> </td>
                              <td><?php echo stripslashes($mainResults['website']); ?></td>
                              <td>n/a</td>
                              <td>n/a</td>
                            </tr>
                             </table>
                      </div>
                    </div>
                        
                    <?}
                    else
                    {
                        $data = explode ( "\n", trim ( $result ) );
                        $fields = explode ( ";", array_shift ( $data ) );
                        
                        if ( count ( $data ) > 0 )
                        {
            ?>
					<div style="height:50px; width:880px;">
                      <div class="CSSTableGenerator">
                         <table>
                            <tr>
                            	<td> Keyword </td>
                              	<td> URL </td>
                              	<td> Organic Rank </td>
                              	<td> Local Rank </td>
                            </tr>
       
            				<?
                            	foreach ( $data as $line )
                            	{
                                $values = explode ( ";", $line, count ( $fields ) );
                            ?>
                		    <tr>
            				<?
                                foreach ( $values as $value )
                                {
            				?>
                        		<td><?= $value; ?></td>
            				<?
                                }
            				?>
                    		</tr>
           					 <?
                   				 break;		}
           					 ?>
              			</table>
                      </div>
                    </div>
            <?
                        }
                        else
                        {
            ?>
            <!-- No data found for your request -->
                    <div style="height:50px; width:880px;">
                      <div class="CSSTableGenerator">
                         <table>
                            <tr>
                              <td> Keyword </td>
                              <td> URL </td>
                              <td> Organic Rank </td>
                              <td> Local Rank </td>
                            </tr>
                            <tr>
                              <td><?php echo $mainResults['main_keyword']; ?> </td>
                              <td><?php echo stripslashes($mainResults['website']); ?></td>
                              <td>n/a</td>
                              <td>n/a</td>
                            </tr>
                             </table>
                      </div>
                    </div>
            <?
                        }
                    }
                }
                else
                {
            ?>
            <!-- Error occured during request or connection timed out. -->
                    <div style="height:50px; width:880px;">
                      <div class="CSSTableGenerator">
                         <table>
                            <tr>
                              <td> Keyword </td>
                              <td> URL </td>
                              <td> Organic Rank </td>
                              <td> Local Rank </td>
                            </tr>
                            <tr>
                              <td><?php echo $mainResults['main_keyword']; ?> </td>
                              <td><?php echo stripslashes($mainResults['website']); ?></td>
                              <td>n/a</td>
                              <td>n/a</td>
                            </tr>
                             </table>
                      </div>
                    </div>
            <?
                }
            ?>
            

            </div>
        </div>
</div>

<footer id="footer" style="background:none; border:none;">
</footer>

<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/main_002.js"></script>
</body>
</html>


<script>

$(document).ready(function(){
    var grade = 'F';
    var reputation = $('#reputation').attr('rel');
    var googlepercentage = $('#googlepercentage').attr('rel');
    var yahoopercentage  = $('#yahoopercentage').attr('rel');
    var bingpercentage   = $('#bingpercentage').attr('rel');
    var directoriespercentage   = parseInt($('#directoriespercentage').attr('rel'))/2;
    var totalscore = parseInt(reputation) + parseInt(googlepercentage) + parseInt(yahoopercentage) + parseInt(bingpercentage) + parseInt(directoriespercentage) ;
    var average = totalscore/5;
    if(average<=100) grade = "A";
    if(average<=85)  grade = "B";
    if(average<=70)  grade = "C";
    if(average<=40)  grade = "D";
    if(average<30)   grade = "F";
    $('#totalscore').html(grade);
//    alert('Reputation is '+reputation+" and google is "+googlepercentage+' and yahoo is '+yahoopercentage+' and bing is '+bingpercentage+' and directories is '+directoriespercentage);
//    alert("Average is "+average);
});    
</script>

