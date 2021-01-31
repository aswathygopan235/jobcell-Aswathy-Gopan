<?php
session_start();
if (isset($_REQUEST["job_id"])) {
    $output = '';
    include_once '../../../connection.php'; // MySQL Connection
    $query=$con->prepare("SELECT job_code FROM jobs WHERE id=?");
    $query->bind_param("s",$_REQUEST["job_id"]);   
    $query->execute();  
    $query->store_result();
    $query->bind_result($found_job_code);
    $query->fetch();
    $query1  =$con->prepare("SELECT * FROM job_application WHERE job_code = ? AND student_code= ?");
    $query1->bind_param("ss",$found_job_code,$_SESSION["user_student_code"]);
    $query1->execute();
    $result1 =$query1->get_result();
    $count=$result1->num_rows;

    if($count<=0){
		$ribbon_value='Not Applied';
	    $ribbon_class='bg-maroon';
	    $apply_status='Not Applied';
        }
    else{
	$ribbon_value='Applied';
    $ribbon_class='bg-teal';
    $apply_status='Applied';       
	}
	 $query2=$con->prepare("SELECT a.*,b.id,b.company_name FROM jobs AS a LEFT JOIN company as B on a.company_code=b.company_code WHERE a.id=?");
    $query2->bind_param("s",$_REQUEST["job_id"]);   
    $query2->execute();  
    $query2->store_result();
    $query2->bind_result($job_id,$company_code,$job_code,$job_position_name,$job_location,$salary,$field,$job_info,$job_status,$posted_on,$expires_on,$company_id,$company_name);
      $query2->fetch();
 $posted_on= new DateTime($posted_on);
        $expires_on=new DateTime($expires_on);
    if($apply_status==='Not Applied'){    
        $output.=' 
         <input type="hidden" name="job_code" value="'.$job_code.'">
                 <input type="hidden" name="company_code" value="'.$company_code.'"> 
        <div class="modal-header">
                <h4 class="modal-title">
                  <span class="fa fa-envelope-open-text fa-2x"></span>
                Apply job
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>          
            <!-- Modal body -->
            <div class="modal-body" id="job_apply_body">
             <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon '.$ribbon_class.' text-xl">
                          '.$ribbon_value.'
                        </div>
                      </div>  
                      <table class="table bordered">     
                     
                <tr>  
                     <td width="30%"><label>Job Code</label></td>  
                     <td width="70%">'.$job_code.'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Posted by</label></td>  
                     <td width="70%">'.$company_name.'</td>  
                </tr>    
                <tr>  
                     <td width="30%"><label>Job position name</label></td>  
                     <td width="70%">'.$job_position_name.'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Location</label></td>  
                     <td width="70%">'.$job_location.'</td>                      
                </tr>
                
                <tr>  
                     <td width="30%"><label>Field</label></td>  
                     <td width="70%">'.$field.'</td>  
                </tr>               
                <tr>  
                     <td width="30%"><label for="student_apply_info">Please enter a short description telling why you are suitable for the job</label><p class="text-muted">You CANNOT change it after you apply</p></td>  
                     <td width="70%">
                         <textarea name="student_apply_info" id="student_apply_info" cols="50" rows="5" placeholder="Enter description here"></textarea>
                    </td>  
                </tr>
                        
               
                </table>
             </div>  
                     
            </div>                      
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="submit" class="btn btn-success">Apply</button> 
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>          ';
    }

        if($apply_status==='Applied') {
           $query3=$con->prepare("SELECT application_code,received_on,application_status from job_application WHERE student_code=? AND job_code=?");
    $query3->bind_param("ss",$_SESSION["user_student_code"],$found_job_code);   
    $query3->execute();  
    $query3->store_result();
    $query3->bind_result($application_code,$received_on,$application_status);
    $query3->fetch();
    if ($application_status==='Reviewing' || $application_status==='Rejected') {
        /*$ribbon_value='Reviewing';
        $ribbon_class='bg-purple';*/
        $stat='Reviewing';
    }
            
    if ($application_status==='Shortlisted') {
     /*   $ribbon_value='Shortlisted';
        $ribbon_class='bg-navy';*/
         $stat='Shortlisted';           
            
    }
    $received_on=new DateTime($received_on);
         $output.=' 
        <div class="modal-header">
                <h4 class="modal-title">
                  <span class="fa fa-envelope-open-text fa-2x"></span>
                Apply job
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>          
            <!-- Modal body -->
            <div class="modal-body" id="job_apply_body">
             <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon '.$ribbon_class.' text-xl">
                          '.$ribbon_value.'
                        </div>
                      </div>  
                      <table class="table bordered">
                <tr>  
                     <td width="30%"><label>Application Code</label></td>  
                     <td width="70%">'.$application_code.'</td>  
                </tr>                 
                <tr>  
                     <td width="30%"><label>Job Code</label></td>  
                     <td width="70%">'.$job_code.'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Posted by</label></td>  
                     <td width="70%">'.$company_name.'</td>  
                </tr>    
                <tr>  
                     <td width="30%"><label>Job position name</label></td>  
                     <td width="70%">'.$job_position_name.'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Location</label></td>  
                     <td width="70%">'.$job_location.'</td>                      
                </tr>
                <tr>  
                     <td width="30%"><label>Applied on</label></td>  
                     <td width="70%">' . $received_on->format("d-M-Y,l  h:i:s a").'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Application Status</label></td>  
                     <td width="70%">'.$stat.'</td>                      
                </tr>
                </table>
             </div>                      
            </div>                      
            <!-- Modal footer -->
            <div class="modal-footer">
           
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>          ';

    }



    } 
echo $output;
?>