<?php
class BingSERP{
    private $words;
    private $site;
    private $lang;
    private $AccKEY = 'wCmt1KVXhF4ggHozCO7iAEv8bE0JitnIJ8lf14wxZds';
    
    public function __construct($words, $site, $lang){
	$this->words = $words;
	$this->site = $site;
	$this->lang = $lang;
    }
    
    public function check(){
	$output = $this->b_serp($this->words, $this->site, $this->lang, $this->AccKEY);
	return $output;
    }
    
    //this is the main function
    private function b_serp($keyword, $site, $market, $api_key)
    {
	$found=FALSE;
	$theweb='';
	$pos=0;
	$ret=array();
	$limit=1;
 
	$site=str_replace(array('http://'), '', $site);
 
	$context = stream_context_create(array(
		'http' => array(
		    'request_fulluri' => true,
		    'header'  => "Authorization: Basic " . base64_encode($api_key . ":" . $api_key)
			)
		)
	);
 
 
	$pos=1;
	while ((!$found)&&($pos<=100)) {
		$skip=($limit-1)*50;
 
		//this is the end point of microsoft azure datamarket that we should call  -- only take data from web results
		$end_point='https://api.datamarket.azure.com/Data.ashx/Bing/SearchWeb/v1/Web?Query='.urlencode("'".$keyword."'").'&Market='.urlencode("'".$market."'").'&$format=JSON&$top=50&$skip='.$skip;
 
		//I'm using generic file_get_contents because cURL CURLOPT_USERPWD didn't work (no idea why)
		$response=file_get_contents($end_point, 0, $context);
 
		$json_data=json_decode($response);
 
		foreach ($json_data->d->results as $res) {
			$theweb=parse_url($res->Url);
 
			if (substr_count(strtolower($theweb['host']), $site))
		        {
				$found=TRUE;
				$ret['position']=$pos;
				$ret['title']=$res->Title;
				$ret['url']=$res->Url;
		                return $ret;
		        }
 
			$pos++;
		}
 
		$limit++;
	}
 
	if (!$found)
	{
		return NULL;
	}
    }
}

$b_serp = new BingSERP('how to upload mp3 to youtube', 'mp32u.net', 'en-US');
$output = $b_serp->check();
print_r($output);
?>