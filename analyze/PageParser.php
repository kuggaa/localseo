<?php
require_once 'simple_html_dom.php';
class PageParser
{
	public $page;
	public $dom;
	private $words = '';
	private $page2;
	private $stopwords = array("a","the","quot","nbsp", "about", "above", "above", "across", "after", "afterwards", "again", "against", "all", "almost", "alone", "along", "already", 
		"also","although","always","am","among", "amongst", "amoungst", "amount", "an", "and", "another", "any","anyhow","anyone","anything","anyway", "anywhere", "are", "around", 
		"as", "at", "back","be","became", "because","become","becomes", "becoming", "been", "before", "beforehand", "behind", "being", "below", "beside", "besides", "between", 
		"beyond", "bill", "both", "bottom","but", "by", "call", "can", "cannot", "cant", "co", "con", "could", "couldnt", "cry", "de", "describe", "detail", "do", "done", "down", 
		"due", "during", "each", "eg", "eight", "either", "eleven","else", "elsewhere", "empty", "enough", "etc", "even", "ever", "every", "everyone", "everything", "everywhere", 
		"except", "few", "fifteen", "fify", "fill", "find", "fire", "first", "five", "for", "former", "formerly", "forty", "found", "four", "from", "front", "full", "further", "get", 
		"give", "go", "had", "has", "hasnt", "have", "he", "hence", "her", "here", "hereafter", "hereby", "herein", "hereupon", "hers", "herself", "him", "himself", "his", "how", 
		"however", "hundred", "ie", "if", "in", "inc", "indeed", "interest", "into", "is", "it", "its", "itself", "keep", "last", "latter", "latterly", "least", "less", "ltd", "made", 
		"many", "may", "me", "meanwhile", "might", "mill", "mine", "more", "moreover", "most", "mostly", "move", "much", "must", "my", "myself", "name", "namely", "neither", "never", 
		"nevertheless", "next", "nine", "no", "nobody", "none", "noone", "nor", "not", "nothing", "now", "nowhere", "of", "off", "often", "on", "once", "one", "only", "onto", "or", 
		"other", "others", "otherwise", "our", "ours", "ourselves", "out", "over", "own","part", "per", "perhaps", "please", "put", "rather", "re", "same", "see", "seem", "seemed", 
		"seeming", "seems", "serious", "several", "she", "should", "show", "side", "since", "sincere", "six", "sixty", "so", "some", "somehow", "someone", "something", "sometime", 
		"sometimes", "somewhere", "still", "such", "system", "take", "ten", "than", "that", "the", "their", "them", "themselves", "then", "thence", "there", "thereafter", "thereby", 
		"therefore", "therein", "thereupon", "these", "they", "thickv", "thin", "third", "this", "those", "though", "three", "through", "throughout", "thru", "thus", "to", "together", 
		"too", "top", "toward", "towards", "twelve", "twenty", "two", "un", "under", "until", "up", "upon", "us", "very", "via", "was", "we", "well", "were", "what", "whatever", 
		"when", "whence", "whenever", "where", "whereafter", "whereas", "whereby", "wherein", "whereupon", "wherever", "whether", "which", "while", "whither", "who", "whoever", 
		"whole",  "whom", "whose", "why", "will", "with", "within", "without", "would", "yet", "you", "your", "yours", "yourself", "yourselves", "the");

	public function __construct($url) {
		$ch = curl_init();
		$timeout = 20;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0');
		$page = curl_exec($ch);
		curl_close($ch);
		$this->page = $page;
	}

	public function getPage() {
		return $this->page;
	}

	public function parsePage() {
		$this->dom = new simple_html_dom();
		$this->dom->load($this->page);
		$this->page2 = $this->dom->plaintext;
		$this->text2words(); 
		$this->gen_words();
		//$index = array_flip($b);
		for($i=0;$i < count($this->stopwords);$i++){
		    if (array_key_exists($this->stopwords[$i], $this->words)) {
			unset($this->words[$this->stopwords[$i]]);
		    }
		}
		//echo $this->dom->save();
	}

	public function countImagesAltTexts() {
		$images =  $this->dom->find('img');
		$imageCount = count($images);
		$imagesWithAlt =  $this->dom->find('img[alt]');
		$imagesWithAltCount = count($imagesWithAlt);
		return $imagesWithAltCount.'/'.$imageCount;
	}

	public function checkTitle() {
		$title = $this->dom->find('head title');
		if (!$title) {
			return 0;
		}
		$titleText = $title[0]->plaintext;
		return strlen($titleText);
	}
	
	public function checkMetaDescription() {
	    $bool = 0;
	    try{
		$descriptionDom = $this->dom->find("meta[name='description']",0);
		if(!(bool)is_null($descriptionDom))$bool = strlen($descriptionDom->content);
	    } catch (Exception $e){
		$bool = 0;
	    }
		return $bool;
	}
	
	public function checkMetaKeywords() {
	    $bool = 0;
	    try{
		$keywordsDom = $this->dom->find("meta[name='keywords']", 0);
		if(!is_null($keywordsDom))$bool = strlen($keywordsDom->content);
	    } catch (Exception $e){
		$bool = 0;
	    }
		return $bool;
	}
	
	public function countWords() {
	    $i = 0;
	    foreach ($this->words as $key => $value) {
		$i = $i + $value;
	    }
	    //echo str_word_count($this->page2);
	    return $i;
	}
	
	public function getMostMeetWords() {
	    $tmpArr = array();
	    $index = 0;
	    foreach ($this->words as $key => $value) {
		    if (strlen($key) < 3) {
		        break;
		    }
			if($index == 10)
				break;
			$tmpArr[$key] = $value;
			$index++;
	    }
	    return $tmpArr;
	}
	
	public function checkCleanUrls(){
	    $output = $this->getAllLinks();
	    $arr_bad = array();
	    $arr_good = array();
	    for($i = 0; $i < count($output);$i++){
		if((preg_match("/\=/i", $output[$i])) || (preg_match("/\?/i", $output[$i])) || (preg_match("/\&/i", $output[$i]))){
		    $arr_bad[] = $output[$i];
		}else{
		    $arr_good[] = $output[$i];
		}
	    }
	    return count($arr_good).'/'.count($output);
	    
	}
	
	private function getAllLinks(){
	    // Find all links 
	    $arr = array();
	    foreach($this->dom->find('a') as $element) 
	           $arr[] =  $element->href;
	           return $arr;
	}
	
	private function text2words() {
	    preg_match_all ('/(\w+)/i', $this->page2, $this->words); 
	    $this->words = $this->words ['0']; 
	}
	
	private function gen_words() { 
		$this->words = array_map('strtolower', $this->words);
		$this->words = array_count_values ($this->words); 
	    arsort ($this->words); 
	} 

}

//$a = new PageParser('http://oknaplus.org/');
//$a = new PageParser('http://www.php.net/download-docs.php');
//$a = new PageParser('http://seo.bevolved.net/test.html');
//$a = new PageParser('http://www.yahoo.com/');
//$a = new PageParser('http://en.wikipedia.org/wiki/Primecoin#Mining_programs');


//$a->parsePage();
//$b = $a->checkCleanUrls();
//echo $b;

/*echo 'Count Words of this site: '.$a->countWords();
echo '<br/>';
echo 'Most meeting Words of this site: ';echo "<xmp>";print_r($a->getMostMeetWords());echo "</xmp>";
echo '</br>';
echo 'This site have meta keywords: '.$a->checkMetaKeywords();
echo '</br>';
echo 'This site have meta description: '.$a->checkMetaDescription();
echo '</br>';
echo 'This site have title: '.$a->checkTitle();
echo '</br>';
echo 'This site have : '.$a->countImagesAltTexts().' count alt text!';
//echo "<xmp>"; print_r($a->countWords()); echo "</xmp>";
//echo "<xmp>"; print_r($a->countWords()); echo "</xmp>";
*/