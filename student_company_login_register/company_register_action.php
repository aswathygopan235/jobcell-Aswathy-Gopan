<?php
require("../connection.php");
session_start();
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
$company_name=$_REQUEST["company_name"];
$company_email=$_REQUEST["company_email"];
$company_contact_email=$_REQUEST["company_contact_email"];
$company_website=$_REQUEST["company_website"];
$company_contact_no=$_REQUEST["company_contact_no"];
$company_info=$_REQUEST["company_info"];
$password=$_REQUEST["crt_password"];

/*Inserting the new record*/
$query1=$con->prepare("INSERT INTO company (company_name,company_email,company_contact_email,company_website,company_contact_no,company_info,password) VALUES (?,?,?,?,?,?,?)");
$query1->bind_param("sssssss",$company_name,$company_email,$company_contact_email,$company_website,$company_contact_no,$company_info,$password);
$query1->execute();
$count=$con->affected_rows;
 $query1->free_result();
   /* close statement */
   $query1->close();


if($count>0){
/*inserting the job code*/

$query2=$con->prepare("UPDATE company SET company_code=CONCAT('cy',LPAD((SELECT LAST_INSERT_ID()),5,0)) WHERE id=(SELECT LAST_INSERT_ID())");


$query2->execute();

 $query2->free_result();
   /* close statement */
   $query2->close();

header("location:company_login_register.php?result=success");
	
}else{
	header("location:company_login_register.php?result=fail");	
}
$con.close();
?>