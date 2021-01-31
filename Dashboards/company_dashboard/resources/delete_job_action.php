<?php
session_start();
include '../../../connection.php';
$job_id=$_REQUEST["hidden_job_id"];
$query=$con->prepare("UPDATE jobs SET job_status='Deleted' WHERE company_code=? and id=?");
$query->bind_param("ss",$_SESSION["user_company_code"],$job_id);
$query->execute();
$count=$con->affected_rows;
if($count>0){
	header("location:../company_job_postings.php?result=success");
}else{
	header("location:../company_job_postings.php?result=fail");
}
?>