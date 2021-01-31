<?php
$query=$con->prepare("SELECT COUNT(id) FROM job_application");
$query->execute();
$query->bind_result($no_of_applications);
$query->fetch();
$query->free_result();
$query->close();

?>