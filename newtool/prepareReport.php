<div id="loading" style="width:500px;margin:0 auto;">
<h3>Preparing Report, Please Wait.....</h3>
<img src="loading.gif"/>
</div>
<?php

if(isset($_POST['prepareReport']) && $_POST['prepareReport'] == '4/3'){
//    printarray($_POST);
    $searchForGoogle = $_POST['businessname']." ".$_POST['street_address']." ".$_POST['city'].", ".$_POST['state']." ".$_POST['zipcode'];
    $BusinessName    = $_POST['businessname'];
    $street_address  = $_POST['street_address'];
    $telephone       = $_POST['telephone'];
    $main_keyword    = $_POST['main_keyword'];
    $searchInZip     = $_POST['zipcode'];
    $full_name       = $_POST['fullname'];
    $resemail        = $_POST['resemail'];
    $website         = $_POST['website'];
    $account_type    = $_POST['account_type'];
    $city            = $_POST['city'];
    $state           = $_POST['state'];
    $Valid_address_format = $street_address.", ".$city.", ".$state.", United States";
//    $mainimage       = 'http://img.bitpixels.com/getthumbnail?code=84851&size=200&url='.urlencode($website);
    $forCustomSearch   =   $_POST['businessname'].' in '.$_POST['city'];
    
    $query = "SELECT * FROM main_data WHERE website = '".addslashes($website)."'";
    if(runquery_count($query) == '0'){
       $Insert_Query = "INSERT INTO main_data SET
                            `business_name`  = '".addslashes($BusinessName)."',
                            `street_address` = '".addslashes($street_address)."',
                            `city`           = '".addslashes($city)."',
                            `state`          = '".addslashes($state)."',
                            `website`        = '".addslashes($website)."',
                            `phone_num`      = '".addslashes($telephone)."',
                            `main_keyword`   = '".addslashes($main_keyword)."',
                            `zipcode`        = '".addslashes($searchInZip)."',
                            `full_name`      = '".addslashes($full_name)."',
                            `email`          = '".addslashes($resemail)."',
                            `account_type`   = '".addslashes($account_type)."'
                        ";
        runquery($Insert_Query);
    }
    
    $query = "SELECT * FROM main_data WHERE website = '".addslashes($website)."'";
    
    $rs_query  = mysql_fetch_assoc(runquery($query));
    $mainID = $rs_query['id'];
    
//    echo $Query_test = "TRUNCATE table main_data";    
//        if(runquery($Query_test))
//        echo "Test Query Ran Successfully";
//    die;
    
//    echo "Main ID is ".$mainID;
//    echo "<div>Following is the data for <strong>".$BusinessName."</strong></div>";
   // echo '<img style="max-width:155px;" alt="'.$_POST['businessname'].'" src="'.$mainimage.'">';
    include_once('GoogleSearch.php');
    include_once('Googlecitation.php');
    include_once('YahooSearch.php');
    include_once('BingSearch.php');
    include_once('GoogleNearSearch.php');
    include_once('WebMentions.php');
//    echo "<h4>Your Report Link is Here <span style='color:green;'>http://lttestingserver.com/reports/reports.php?MI=".base64_encode($mainID)."</span>  <a class='btn btn-primary' target='_blank' href='reports/reports.php?MI=".base64_encode($mainID)."'>See it Here</a></h4>";
//    echo '<script type="text/javascript" language="Javascript">window.open("https://www.lttestingserver.com/reports/reports.php?MI='.base64_encode($mainID).'","_blank");</script>';
//    header('Location:reports/reports.php?MI='.base64_encode($mainID));
    echo "<script>$(document).ready(function(){
$('#loading').hide(); window.location='reports/reports.php?MI=".base64_encode($mainID)."'; });</script>";
}
?>
