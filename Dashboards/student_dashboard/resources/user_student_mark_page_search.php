<?php
    include_once '../../../connection.php';
    $key=$_REQUEST["key"];
    $key=trim($key);
    $key="%{$key}%";
    $array = array();
    $query=$con->prepare("select * from marks where student_code LIKE ? OR marks LIKE ?");
    $query->bind_param("ss",$key,$key);
    $query->execute();
    $result=$query->get_result();
    $count=0;
    while($row=$result->fetch_assoc()){      
    $array[$count++]=$row['sem'];
    $array[$count++]=$row['marks'];
    }
    arsort($array);
    echo json_encode($array);
   
   /* $key=$_REQUEST['key'];
    $key=trim($key);
    $key="%{$key}%";


    $array = array();
    $con= new mysqli("localhost","root","","sampledbtest");
    $query=$con->prepare("select * from student_application_test where student_code LIKE ? OR company_code LIKE ? OR job_code LIKE ? OR student_apply_status LIKE ?");
    $query->bind_param("ssss",$key,$key,$key,$key);
    $query->execute();
    $result=$query->get_result();
    $count=0;
    while($row=$result->fetch_assoc())
    {
       
    $array[$count++]=$row['student_code'];
    $array[$count++]=$row['company_code'];
    $array[$count++]=$row['job_code'];
    $array[$count++]=$row['student_apply_status']; 
 
    }
    arsort($array);
    echo json_encode($array);
    mysqli_close($con); */
   
?>