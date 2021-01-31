<?php
$query=$con->prepare("SELECT COUNT(id) FROM company");
$query->execute();
$query->bind_result($no_of_companies);
$query->fetch();
$query->free_result();
$query->close();

?>