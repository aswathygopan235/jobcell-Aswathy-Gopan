<?php
require("../connection.php");
session_start();
$user_email=$_REQUEST["user_email"];
$user_password=$_REQUEST["user_password"];
$query1=$con->prepare("SELECT id,student_code,first_name,last_name,course_code FROM student WHERE email=? AND password=?");
$query1->bind_param("ss",$user_email,$user_password);/*bind parameters to prepared statement*/
$query1->execute();/*executing statement*/
$query1->store_result();
if($query1->num_rows<=0){
		header("location:student_login_register.php?result=fail");

}else{

	$query1->bind_result($id,$student_code,$first_name,$last_name,$course_code);
	$query1->fetch();
	$_SESSION["user_student_id"]=$id;
	$_SESSION["user_student_code"]=$student_code;
	$_SESSION["user_first_name"]=$first_name;
	$_SESSION["user_last_name"]=$last_name;
	$_SESSION["user_student_course_code"]=$course_code;
	header("location:../Dashboards/student_dashboard/index.php?result=success");
}
   /*
   All $_SESSION variables
  $_SESSION["user_id"]
	$_SESSION["user_student_code"]
	$_SESSION["user_first_name"]
	$_SESSION["user_last_name"]
	$_SESSION["user_student_course_code"]
	$_SESSION["user_student_course_name"]
	$_SESSION["user_student_no_of_sems"]

    */

?>
