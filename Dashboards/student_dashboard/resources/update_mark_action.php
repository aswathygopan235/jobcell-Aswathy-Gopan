<?php
/*session_start();*/
include_once '../../../connection.php';
$sem_id=$_REQUEST["hidden_sem_id"];
$new_mark=$_REQUEST["student_new_marks"];
$mark_update_query=$con->prepare("UPDATE marks SET marks=?, updated_on=CURRENT_TIMESTAMP WHERE id=?");
$mark_update_query->bind_param("ss",ROUND($new_mark,2),$sem_id);
$mark_update_query->execute();
$count=$con->affected_rows;

if($count>0){
		header("location:../student_mark_view_edit.php?result=success");
}else{


	
 header("location:../student_mark_view_edit.php?result=fail");
}

?>
