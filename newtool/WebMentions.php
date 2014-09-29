<?php
include_once('simple_html_dom.php');

$tosearch = urlencode($main_keyword);

$SelectWebMentions = "SELECT * FROM web_mentions WHERE main_keyword = '".stripslashes($main_keyword)."'";
if(runquery_count($SelectWebMentions) == 0) // If this keyword is not in database , then insert it
{
$mainpage = 'http://www.bing.com/search?q='.$tosearch;
$firstpage = $mainpage."&first=11&FORM=PERE";
$secondpage = $mainpage."&first=21&FORM=PERE1";
$basicResults = file_get_html($mainpage);
$firstResults = file_get_html($firstpage);
$secondResults = file_get_html($secondpage);

// Find all links
 foreach($basicResults->find('div.sa_mc') as $element){
            $title = $element->find('h3 a',0)->plaintext;
            $link = $element->find('cite',0)->plaintext;
            $desc = $element->find('p',0)->plaintext;
            $keywordsArray = explode(' ',$main_keyword);
			$intitle = $inlink = $indesc =  true;
            foreach($keywordsArray as $onekey){
			
                $findme = $onekey;
                if(strpos(strtolower($title),strtolower($findme)) === false)
					$intitle = false;
					
                if(strpos(strtolower($link),strtolower($findme)) === false)
					$inlink = false;
					
                if(strpos(strtolower($desc),strtolower($findme)) === false)
					$indesc = false;
            }
			if($intitle === true || $inlink === true || $indesc === true){
                          $today_date = date('d-M-Y');
//			  echo "TITLE :- ".$title."<br/>";
//			  echo "LINK  :- ".$link."<br/>";
//			  echo "DESC  :- ".$desc."<br/>";
//			  echo "DATE  :- ".$today_date."<br/>";
//			  echo "<br/><br/>";
                          $Query_Web_Mentions = "INSERT INTO web_mentions SET
                                                    `mainID` = '".addslashes($mainID)."',
                                                    `main_keyword` = '".addslashes($main_keyword)."',
                                                    `title`        = '".addslashes($title)."',
                                                    `link`         = '".addslashes($link)."',
                                                    `description`  = '".addslashes($desc)."',
                                                    `date`         = '".addslashes($today_date)."'
                          ";
                          runquery($Query_Web_Mentions);
			}
	}

// Find all links
 foreach($firstResults->find('div.sa_mc') as $element){
            $title = $element->find('h3 a',0)->plaintext;
            $link = $element->find('cite',0)->plaintext;
            $desc = $element->find('p',0)->plaintext;
            $keywordsArray = explode(' ',$main_keyword);
			$intitle = $inlink = $indesc =  true;
            foreach($keywordsArray as $onekey){
			
                $findme = $onekey;
                if(strpos(strtolower($title),strtolower($findme)) === false)
					$intitle = false;
					
                if(strpos(strtolower($link),strtolower($findme)) === false)
					$inlink = false;
					
                if(strpos(strtolower($desc),strtolower($findme)) === false)
					$indesc = false;
            }
			if($intitle === true || $inlink === true || $indesc === true){
                          $today_date = date('d-M-Y');
//			  echo "TITLE :- ".$title."<br/>";
//			  echo "LINK  :- ".$link."<br/>";
//			  echo "DESC  :- ".$desc."<br/>";
//                          echo "DATE  :- ".$today_date."<br/>";
//			  echo "<br/><br/>";
                          $Query_Web_Mentions = "INSERT INTO web_mentions SET
                                                    `mainID` = '".addslashes($mainID)."',
                                                    `main_keyword` = '".addslashes($main_keyword)."',
                                                    `title`        = '".addslashes($title)."',
                                                    `link`         = '".addslashes($link)."',
                                                    `description`  = '".addslashes($desc)."',
                                                    `date`         = '".addslashes($today_date)."'
                          ";
                          runquery($Query_Web_Mentions);
			}
	}
	
	
// Find all links
 foreach($secondResults->find('div.sa_mc') as $element){
            $title = $element->find('h3 a',0)->plaintext;
            $link = $element->find('cite',0)->plaintext;
            $desc = $element->find('p',0)->plaintext;
            $keywordsArray = explode(' ',$main_keyword);
			$intitle = $inlink = $indesc =  true;
            foreach($keywordsArray as $onekey){
			
                $findme = $onekey;
                if(strpos(strtolower($title),strtolower($findme)) === false)
					$intitle = false;
					
                if(strpos(strtolower($link),strtolower($findme)) === false)
					$inlink = false;
					
                if(strpos(strtolower($desc),strtolower($findme)) === false)
					$indesc = false;
            }
			if($intitle === true || $inlink === true || $indesc === true){
                          $today_date = date('d-M-Y');
//			  echo "TITLE :- ".$title."<br/>";
//			  echo "LINK  :- ".$link."<br/>";
//			  echo "DESC  :- ".$desc."<br/>";
//                          echo "DATE  :- ".$today_date."<br/>";
//			  echo "<br/><br/>";
                          $Query_Web_Mentions = "INSERT INTO web_mentions SET
                                                    `mainID` = '".addslashes($mainID)."',
                                                    `main_keyword` = '".addslashes($main_keyword)."',
                                                    `title`        = '".addslashes($title)."',
                                                    `link`         = '".addslashes($link)."',
                                                    `description`  = '".addslashes($desc)."',
                                                    `date`         = '".addslashes($today_date)."'
                          ";
                          runquery($Query_Web_Mentions);
			}
	}
}		
?>