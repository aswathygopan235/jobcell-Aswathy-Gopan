<?php
$query=$con->prepare("SELECT COUNT(id) FROM course");
$query->execute();
$query->bind_result($no_of_courses);
$query->fetch();
$query->free_result();
$query->close();

?>