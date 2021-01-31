<?php
$query=$con->prepare("SELECT COUNT(*) FROM jobs WHERE company_code=? and job_status=?");
$status="Active";
$query->bind_param("ss",$_SESSION["user_company_code"],$status);
$query->execute();
$query->bind_result($company_active_job_count);
$query->fetch();
$query->free_result();
$query->close();

?>