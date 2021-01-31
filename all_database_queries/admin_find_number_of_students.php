<?php
$query=$con->prepare("SELECT COUNT(id) FROM student");
$query->execute();
$query->bind_result($no_of_students);
$query->fetch();
$query->free_result();
$query->close();

?>