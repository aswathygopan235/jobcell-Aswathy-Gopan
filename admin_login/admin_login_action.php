<?php
session_start();
include '../connection.php';
$username=$_REQUEST["username"];
$user_password=$_REQUEST["user_password"];
$query=$con->prepare("SELECT id,username FROM admin_table WHERE username=? AND password=?");
$query->bind_param("ss",$username,$user_password);
$query->execute();
$query->store_result();
$query->bind_result($admin_id,$admin_name);
$query->fetch();
if($query->num_rows<=0){
		header("location:../Dashboards/admin_login_page.php?result=fail");
}else{

	header("location:../Dashboards/admin_dashboard?result=success");
	$_SESSION["user_admin_name"]=$admin_name;
	$_SESSION["user_admin_id"]=$admin_id;
	

}



?>