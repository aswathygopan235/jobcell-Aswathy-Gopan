<?php
$query1=$con->prepare("SELECT * FROM jobs");
$query1->execute();
$result=$query1->get_result();

while ($row=$result->fetch_assoc()) {

	$current_date_time=new DateTime();
	$exp_date=new DateTime($row["expires_on"]);
	
	
	if($exp_date<$current_date_time){
		$status="Expired";
	}else{
		$status="Active";
	}
		$query2=$con->prepare("UPDATE jobs SET job_status=? WHERE id=?");
		$query2->bind_param("ss",$status,$row["id"]);
		$query2->execute();
	
	}
	$query1->free_result();
	$query1->close();
	$query2->free_result();
	$query2->close();
		
	
?>