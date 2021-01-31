<!---Displaying the data of a specific record-->
<?php
//session_start();
if (isset($_REQUEST["job_id"])) {
    $output = '';
   include'../../../connection.php'; // MySQL Connection
    $query  =$con->prepare("SELECT * FROM jobs WHERE id = ? ORDER BY posted_on ASC");
    $query->bind_param("s",$_POST["job_id"] );
    $query->execute();
    $result =$query->get_result();
    $output .= '  
      <div class="table-responsive">  
           <table class="table table-hover table-bordered">';
    while ($row = $result->fetch_assoc()) {
        $posted_on= new DateTime($row["posted_on"]);
        $expires_on=new DateTime($row["expires_on"]);
        if ($row["job_status"]==='Active'){
            $ribbon_value='Active';
            $ribbon_class='bg-success';
        }else{
            $ribbon_value='Expired';
            $ribbon_class='bg-danger';
        }
        $output.='  
                <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon '.$ribbon_class.' text-xl">
                          '.$ribbon_value.'
                        </div>
                      </div>                
                <tr>  
                     <td width="30%"><label>Job Code</label></td>  
                     <td width="70%">'.$row["job_code"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Job position name</label></td>  
                     <td width="70%">'.$row["job_position_name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Location</label></td>  
                     <td width="70%">'.$row["job_location"].'</td>                      
                </tr>
                <tr>  
                     <td width="30%"><label>Salary per month</label></td>  
                     <td width="70%">'.$row["salary"].'</td>  
                </tr>    
                <tr>  
                     <td width="30%"><label>Field</label></td>  
                     <td width="70%">'.$row["field"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Information</label></td>  
                     <td width="70%">'.$row["job_info"].'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Job status</label></td>  
                     <td width="70%">'.$row["job_status"].'</td>  
                </tr>       
                <tr>  
                     <td width="30%"><label>Posted on</label></td>  
                     <td width="70%">' . $posted_on->format("d-M-Y,l h:i:s a").'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Expires on</label></td>  
                     <td width="70%">' . $expires_on->format("d-M-Y,l h:i:s a").'</td>  
                </tr> 
                 ' 
              ;
          }

    
    $output.='</table>
    </div>';
}
    echo $output;

?>