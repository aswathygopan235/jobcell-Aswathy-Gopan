<?php
session_start();
include_once '../../../connection.php';
$sem_count=$_REQUEST["hidden_sem_count"];
$query=$con->prepare("DELETE FROM marks WHERE student_code=? and sem=?");
$query->bind_param("ss",$_SESSION["user_student_code"],$sem_count);
$query->execute();
$count=$con->affected_rows;
if($count>0){
		header("location:../student_mark_view_edit.php?result=success");
}else{
	header("location:../student_mark_view_edit.php?result=fail");
}
?>