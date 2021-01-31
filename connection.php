<?php
$servername="localhost";
$username="root";
$dbpassword="";
$database="placementcell";
date_default_timezone_set('Asia/Kolkata');
$con=new mysqli($servername,$username,$dbpassword,$database);
if(!$con){
	die("Connection error");
}
?>