<!--Update job action page-->
<?php
//session_start();
include '../../../connection.php'; // MySQL
$hidden_job_id=$_REQUEST['hidden_job_id'];
$hidden_expires_on=$_REQUEST['hidden_expires_on'];
$new_job_position_name=$_REQUEST['job_position_name'];
$new_job_location=$_REQUEST['job_location'];
$new_job_salary=$_REQUEST['job_salary_in'];
$new_job_field=$_REQUEST['job_field'];
$new_job_info=$_REQUEST['job_info'];
$new_expires_on=$_REQUEST['new_expires_on'];
if($new_expires_on!==''){
	$input_expires_on=$new_expires_on;
}else{
	$input_expires_on=$hidden_expires_on;
}

$query=$con->prepare("UPDATE jobs SET job_position_name=?,job_location=?,salary=?,field=?,job_info=?,expires_on=? WHERE id=?");
$query->bind_param("sssssss",$new_job_position_name,$new_job_location,$new_job_salary,$new_job_field,$new_job_info,$input_expires_on,$hidden_job_id);
$query->execute();
$count=$con->affected_rows;
if($count<=0){
	header('location:../company_job_postings.php?result=fail');
}else{
	header('location:../company_job_postings.php?result=success');
}
?>