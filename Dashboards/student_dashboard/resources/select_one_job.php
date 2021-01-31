<!---Displaying the data of a specific record-->
<?php
/*session_start();*/
if (isset($_REQUEST["job_id"])) {
    $output = '';
   include'../../../connection.php'; // MySQL Connection
   $query1=$con->prepare("SELECT a.*,b.id,b.company_name FROM jobs AS a LEFT JOIN company as B on a.company_code=b.company_code WHERE a.id=?");
    $query1->bind_param("s",$_REQUEST["job_id"]);   
    $query1->execute();  
    $query1->store_result();
    $query1->bind_result($job_id,$company_code,$job_code,$job_position_name,$job_location,$salary,$field,$job_info,$job_status,$posted_on,$expires_on,$company_id,$company_name);

    $output .= '  
      <div class="table-responsive">  
           <table class="table table-hover table-bordered">';
    while ($query1->fetch()) {
        $posted_on= new DateTime($posted_on);
        $expires_on=new DateTime($expires_on);
        if ($job_status==='Active'){
            $ribbon_value='Active';
            $ribbon_class='bg-success';
            $stat='Active';
        }else{
            $ribbon_value='Expired';
            $ribbon_class='bg-danger';
            $stat='Expired';
        }
        $output.='  
                <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon '.$ribbon_class.' text-xl">
                          '.$ribbon_value.'
                        </div>
                      </div>                
                <tr>  
                     <td width="30%"><label>Job Code</label></td>  
                     <td width="70%">'.$job_code.'</td>  
                </tr>               
                <tr>  
                     <td width="30%"><label>Job position name</label></td>  
                     <td width="70%">'.$job_position_name.'</td>  
                </tr>
                 <tr>  
                     <td width="30%"><label>Posted by</label></td>  
                     <td width="70%">'.$company_name.'</td>  
                </tr>     
                <tr>  
                     <td width="30%"><label>Location</label></td>  
                     <td width="70%">'.$job_location.'</td>                      
                </tr>
                <tr>  
                     <td width="30%"><label>Salary</label></td>  
                     <td width="70%">'.$salary.'</td>  
                </tr>    
                <tr>  
                     <td width="30%"><label>Field</label></td>  
                     <td width="70%">'.$field.'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Information</label></td>  
                     <td width="70%">'.$job_info.'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Job status</label></td>  
                     <td width="70%">'.$stat.'</td>  
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