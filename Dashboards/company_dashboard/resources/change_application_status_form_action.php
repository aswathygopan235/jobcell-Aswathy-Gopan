<?php
include '../../../connection.php';
$application_id=$_REQUEST["hidden_application_id"];
$application_status=$_REQUEST["status_radio"];
$query=$con->prepare("UPDATE job_application SET application_status=? WHERE id=?");
$query->bind_param("ss",$application_status,$application_id);

$query->execute();
$count=$con->affected_rows;


if($count>0){
	header("location:../company_view_one_application.php?id=$application_id&result=success");
}else{
	header("location:../company_view_one_application.php?id=$application_id&result=fail");
}




?>