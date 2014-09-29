<?php

function db_connect()
{
  global $db_Host, $db_User, $db_Pass, $db_Name;
    $connection = mysql_connect($db_Host, $db_User, $db_Pass);
    mysql_select_db($db_Name, $connection);
    return $connection;
}

function runquery($dml_command)
{
	 $conn = db_connect();
	 $var = mysql_query($dml_command) or die(mysql_error()." and the query is <br/><br/>".$dml_command."<br/><br/>");
	 mysql_close($conn);
	 return $var;
}

function runquery_count($sql)
{
	$conn = db_connect();
	$var = mysql_num_rows(mysql_query($sql));
	mysql_close($conn);
	return $var;
}


function db_execute_return($sql)
{
	$conn = db_connect();
	$var = mysql_query($sql);
	mysql_close($conn);
	return $var;
}

function getNextId($table, $column)
{
	//echo "SELECT MAX($column) as Value FROM $table";
	$query = db_execute_return("SELECT MAX($column) as Value FROM $table");
	if(mysql_num_rows($query) > 0)
	{
		$result = mysql_fetch_array($query);
		$nextval = $result[0];
		return $nextval;
	}
	else
		return 1;
}

function get_last_insert_id($dml_command){
	
	 $conn = db_connect();
	 mysql_query($dml_command);
	 $var = mysql_insert_id();
	 mysql_close($conn);
	 return $var;
}

function gd_escape_string($string){
    $conn = db_connect();
    $toreturn = mysql_real_escape_string($string,$conn);
    mysql_close($conn);
    return $var;
}


function BS_alert($type='info',$heading = 'Well Done',$description='Good to go',$close=true){
  echo '<div class="alert alert-'.$type.'">';
  if($close)
  echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
  echo '<strong> '.$heading.' ! </strong> '.$description.' </div>';
}


function printArray($array,$die=false){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
    if($die == true)
        die;
}



?>