<?php 


$db['hostname'] = "localhost";
$db['username'] = "root";
$db['password'] = "";
$db['dbname'] = "cms";


foreach ($db as $key => $value) {
	
	define(strtoupper($key),$value);
	
}

$connection = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);

if(!$connection){

	die("not connected".msqli_error());
}


?>