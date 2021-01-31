<?php
//session_start();
include '../../../connection.php';
if (isset($_REQUEST["job_id"])) {
$output='';
 $query=$con->prepare("SELECT job_code,job_position_name,job_location FROM jobs WHERE id =?");
 $query->bind_param("s",$_REQUEST["job_id"]);
 $query->execute();
 $query->bind_result($job_code,$job_position_name,$job_location);
 $query->fetch();
 
 $output.='
 	<input type="text" name="hidden_job_id" hidden id="hidden_job_id" value='.$_REQUEST["job_id"].'>	
 	Are you sure you want to delete the following job?<br>
 	<table>
 		<tr>  
            <td width="30%"><label>Job Code</label></td>  
            <td width="50%">'.$job_code.'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Job position name</label></td>  
            <td width="50%">'.$job_position_name.'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Job location</label></td>  
            <td width="50%">'.$job_location.'</td>  
        </tr>      
 	</table>
  ';

}

echo $output;

?>