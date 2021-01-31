<!---Displaying the data of a specific semester-->
<?php
session_start();
if (isset($_REQUEST["sem_id"])) {
    $output = '';
   include_once '../../../connection.php'; // MySQL Connection
    $query  =$con->prepare("SELECT * FROM marks WHERE id = ?");
    $query->bind_param("s",$_POST["sem_id"] );
    $query->execute();
    $result =$query->get_result();
    $output .= '  
      <div class="table-responsive">  
           <table class="table table-hover table-bordered">';
    while ($row = $result->fetch_assoc()) {
        $updated_on= new DateTime($row["updated_on"]);
        $output.='  
                <tr>  
                     <td width="30%"><label>Student code</label></td>  
                     <td width="70%">'.$_SESSION["user_student_code"].'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Course code</label></td>  
                     <td width="70%">'.$_SESSION["user_student_course_name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Semester</label></td>  
                     <td width="70%">'.$row["sem"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Marks</label></td>  
                     <td width="70%">'.$row["marks"].'<b> %</b></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Last updated on</label></td>  
                     <td width="70%">' . $updated_on->format("d-M-Y,l h:i:s a").'</td>  
                </tr> ' 
              ;

    }
    $output.='</table>
    </div>';
  
    echo $output;
}
?>