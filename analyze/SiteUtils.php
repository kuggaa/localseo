<?php
class SiteUtils{
	private $page;
	private $robotstxt;
	
	public function __construct($page){
	    $this->page = $page;
	}
	
	public function hasRobots(){
	    $parsed = parse_url($this->page);
		//error_log(implode("\n", $parsed)."\n", 3, "/var/www4seo/error.log");
	    $robotstxt = @file("{$parsed['scheme']}://{$parsed['host']}/robots.txt");
		//error_log("{$parsed['scheme']}://{$parsed['host']}/robots.txt"."\n", 3, "/var/www4seo/error.log");
		//error_log(empty($robotstxt)."\n", 3, "/var/www4seo/error.log");
	    if(empty($robotstxt)){
	        return false;
	    }else{
	    $this->robotstxt = $robotstxt;
		return true;
	    }
	}
	
	public function hasSitemaps(){
	    $str;
	    $parsed = parse_url($this->page);
	    $sitemap = @file("{$parsed['scheme']}://{$parsed['host']}/sitemap.xml");
	    if(empty($sitemap)){
	        if($this->hasRobots()){
	    	    $arr = $this->robotstxt;
	    	    for($i = 0;$i<count($arr);$i++){
		    		if(!preg_match("/Sitemap:/i",$arr[$i]))continue;
		    		$str = $arr[$i];
		    		$str = trim(substr($str,8));
		    		$sitemap = @file($str);
		    		if(empty($sitemap)){
		    		    return false;
		    		}else{
		    		    return true;
		    		}
	    	    }
	        }
	    }else{
			return true;
	    }
	}
}
    
    //$a = new SiteUtils("https://developer.mozilla.org/");
    //$a = new SiteUtils("http://seo.bevolved.net/");
    //$a = new SiteUtils("http://yaltakino.com/");
    //$a = new SiteUtils("php.net");
    //print_r($b = ($a->hasRobots())?"true":"false");
    //echo '<br/>';
    //print_r($b = ($a->hasSitemaps())?"true":"false");
?>