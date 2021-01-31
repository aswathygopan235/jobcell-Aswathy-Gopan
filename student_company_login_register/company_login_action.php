<?php
require("../connection.php");
session_start();
$user_email=$_REQUEST["user_email"];
$user_password=$_REQUEST["user_password"];
$query1=$con->prepare("SELECT id,company_code,company_name FROM company WHERE company_email=? AND password=?");
$query1->bind_param("ss",$user_email,$user_password);/*bind parameters to prepared statement*/
$query1->execute();/*executing statement*/
$query1->store_result();


if($query1->num_rows<=0){
	header("location:company_login_register.php?result=fail");
	

}else{
	$query1->bind_result($id,$company_code,$company_name);
	$query1->fetch();
	$_SESSION["user_company_id"]=$id;
	$_SESSION["user_company_code"]=$company_code;
	$_SESSION["user_company_name"]=$company_name;
	
	header("location:../Dashboards/company_dashboard/index.php?result=success");

}

/* free results */
   $query1->free_result();

   /* close statement */
   $query1->close();

   /*close connection*/
   $con->close();

?>