<!--Fetching the data of a specific record-->
<?php
// include '../../../connection.php'; // MySQL
if (isset($_POST["sem_id"])) {
    $query  = "SELECT * FROM marks WHERE id = ?";
    $query->bind_param("s",$_POST["sem_id"] );
    $query->execute();
    $result =$query1->get_result();
    $row=$result->fetch_assoc();   
    echo json_encode($row);
}
?>