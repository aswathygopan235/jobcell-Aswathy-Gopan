<?php
session_start();
session_destroy();
header("location:../../admin_login/admin_login_page.php?result=logout");
?>