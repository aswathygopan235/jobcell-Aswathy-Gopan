<?php 
$query1=$con->prepare("SELECT COUNT(*) FROM jobs WHERE job_status=?");
$status="Active";
$query1->bind_param("s",$status);
$query1->execute();
$query1->bind_result($active_job_count);
$query1->fetch();
$query1->free_result();
$query1->close();
 ?>