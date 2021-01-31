<?php
$query=$con->prepare("SELECT COUNT(*) FROM jobs WHERE company_code=?");
$query->bind_param("s",$_SESSION["user_company_code"]);
$query->execute();
$query->bind_result($company_all_job_count);
$query->fetch();
$query->free_result();
$query->close();
