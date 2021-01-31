<?php 
session_start();
include '../../../connection.php';
$job_code=$_REQUEST["job_code"];
$company_code=$_REQUEST["company_code"];
$student_apply_info=$_REQUEST["student_apply_info"];
$query1=$con->prepare("INSERT INTO job_application (job_code,company_code,student_code,student_apply_info) VALUES (?,?,?,?)");
$query1->bind_param("ssss",$job_code,$company_code,$_SESSION["user_student_code"],$student_apply_info);
$query1->execute();
$count=$con->affected_rows;
if($count<=0){
	header('location:../../../student_job_listings_page.php?result=fail');
}else{
	$query2=$con->prepare("UPDATE job_application SET application_code=CONCAT('apl',LPAD((SELECT LAST_INSERT_ID()),5,0)) WHERE id=(SELECT LAST_INSERT_ID())");

$query2->execute();
 $query2->free_result();
   /* close statement */
   $query2->close();


header("location:.../../../student_job_listings_page.php");
}

?>