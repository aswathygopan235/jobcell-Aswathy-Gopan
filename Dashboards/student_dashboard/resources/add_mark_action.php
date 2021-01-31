<?php
session_start();
include_once '../../../connection.php';
$student_semester=$_REQUEST["student_semester"];
$student_new_marks=$_REQUEST["student_new_marks"];
$user_student_no_of_sems=$_REQUEST["no_of_sems"];


$query=$con->prepare("INSERT INTO marks (student_code,course_code,sem,marks) VALUES (?,?,?,?)");
$query->bind_param("ssss",$_SESSION["user_student_code"],$_SESSION["user_student_course_code"],$student_semester,ROUND($student_new_marks,2));
$query->execute();
$count=$con->affected_rows;

if($count>0){
		header("location:../student_mark_view_edit.php?result=success");
	echo '<script type="text/javascript" >toastr.success("Mark added successfully");</script>';
}else{
	header("location:../student_mark_view_edit.php?result=fail");
	
 
}

?>