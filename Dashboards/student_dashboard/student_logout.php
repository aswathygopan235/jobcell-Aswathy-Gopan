
<?php
session_start();
session_destroy();
header("location:../../student_company_login_register/student_login_register.php?result=logout");
?>



