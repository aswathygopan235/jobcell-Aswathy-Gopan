<?php  
// include_once'../connection.php';
$query2=$con->prepare("SELECT ROUND(AVG(marks),2) FROM marks WHERE student_code=?");
$query2->bind_param("s",$_SESSION["user_student_code"]);
$query2->execute();
$query2->bind_result($student_overall_mark);
$query2->fetch();
$query2->free_result();
$query2->close();
/*End of Average mark calculation query*/
?>