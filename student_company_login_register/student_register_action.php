<?php
session_start();
require("../connection.php");
/*
function random_str(
    int $length = 64,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}

$year=date("Y");
$student_code="st".$year.random_str(5);*/
$first_name=$_REQUEST["first_name"];
$last_name=$_REQUEST["last_name"];
$gender=$_REQUEST["gender"];
$dob=$_REQUEST["dob"];
$course=$_REQUEST["course"];
$grad_month_year=$_REQUEST["grad_month_year"];
$email=$_REQUEST["email"];
$contact_no=$_REQUEST["contact_no"];
$skills=$_REQUEST["skills"];
$password=$_REQUEST["crt_password"];

/*Inserting the new record*/
$query1=$con->prepare("INSERT INTO student (first_name,last_name,gender,course_code,date_of_birth,email,contact_no,grad_month_year,skills,password) VALUES (?,?,?,?,?,?,?,?,?,?)");
$query1->bind_param("ssssssssss",$first_name,$last_name,$gender,$course,$dob,$email,$contact_no,$grad_month_year,$skills,$password);
$query1->execute();
$count=$con->affected_rows;
 $query1->free_result();
   /* close statement */
   $query1->close();


if($count>0){
/*inserting the student code*/

$query2=$con->prepare("UPDATE student SET student_code=CONCAT('st',LPAD((SELECT LAST_INSERT_ID()),5,0)) WHERE id=(SELECT LAST_INSERT_ID())");

$query2->execute();
 $query2->free_result();
   /* close statement */
   $query2->close();


header("location:student_login_register.php?result=success");
	
}else{
  echo $con->error;
	// header("location:student_login_register.php?result=fail");	
}
$con.close();
?>