<?php
$query=$con->prepare("SELECT COUNT(id) FROM jobs");
$query->execute();
$query->bind_result($no_of_jobs);
$query->fetch();
$query->free_result();
$query->close();

?>