<?php 
$query1=$con->prepare("SELECT COUNT(*) FROM job_application WHERE company_code=?");

$query1->bind_param("s",$_SESSION["user_company_code"]);
$query1->execute();
$query1->bind_result($application_count);
$query1->fetch();
$query1->free_result();
$query1->close();
 ?>