<?php
$query=$con->prepare("SELECT COUNT(*) FROM job_application WHERE student_code=? and application_status=?");
$status="Shortlisted";
$query->bind_param("ss",$_SESSION["user_student_code"],$status);
$query->execute();
$query->bind_result($student_shortlisted_job_count);
$query->fetch();
$query->free_result();
$query->close();

?>