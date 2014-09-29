<?php set_time_limit(0);
session_start();
//error_reporting(0);

?>

<?php
include_once 'config.php';   
include_once 'functions.php';
include_once("header.php");

//redirectTohttps() ; // check if browsing is secure or not ( https )

if (isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'] . ".php";
    if ($page != '' && file_exists($page)) {
        $page = $page;        
            include_once($page);
    }
    else{
        	 include_once('home.php');
    }
}
else{
    include_once('home.php');
}

include_once("footer.php");
?>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="js/customScript.js"></script>