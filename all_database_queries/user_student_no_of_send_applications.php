<?php
$query=$con->prepare("SELECT COUNT(*) FROM job_application WHERE student_code=?");
$status="Active";
$query->bind_param("s",$_SESSION["user_student_code"]);
$query->execute();
$query->bind_result($student_send_application_count);
$query->fetch();
$query->free_result();
$query->close();

?>