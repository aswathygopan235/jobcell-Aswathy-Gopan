<?php 

  $query2=$con->prepare("SELECT course_name,no_of_sems FROM course WHERE course_code=?");
  $query2->bind_param("s",$_SESSION["user_student_course_code"]);
  $query2->execute();
  $query2->store_result();
  $query2->bind_result($course_name,$no_of_sems);
  $query2->fetch();
  $_SESSION["user_student_course_name"]=$course_name;
  $_SESSION["user_student_no_of_sems"]=$no_of_sems;
  $query2->free_result();
  $query2->close();

?>