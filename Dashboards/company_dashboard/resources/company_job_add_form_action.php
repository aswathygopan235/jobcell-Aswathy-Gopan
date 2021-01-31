<?php  
session_start();
include '../../../connection.php';
$job_position_name=$_REQUEST["job_position_name"];
$job_location=$_REQUEST["job_location"];
$job_salary=$_REQUEST["job_salary"];
$job_field=$_REQUEST["job_field"];
$job_info=$_REQUEST["job_info"];
$expires_on=$_REQUEST["expires_on"];

$job_post_query=$con->prepare("INSERT INTO jobs (company_code,job_position_name,job_location,salary,field,job_info,expires_on) VALUES (?,?,?,?,?,?,?)");

$job_post_query->bind_param("sssssss",$_SESSION["user_company_code"],$job_position_name,$job_location,$job_salary,$job_field,$job_info,$expires_on);
$job_post_query->execute();
$count=$con->affected_rows;
echo $count;
if($count<=0){
	echo $con->error;
	header("location:../company_job_postings.php?result=fail");
}else{
	$query2=$con->prepare("UPDATE jobs SET job_code=CONCAT('job',LPAD((SELECT LAST_INSERT_ID()),5,0)) WHERE id=(SELECT LAST_INSERT_ID())");
$query2->execute();

 $query2->free_result();
   /* close statement */
   $query2->close();

	header("location:../company_job_postings.php?result=success");
}
$job_post_query->free_result();
$job_post_query->close();
?>