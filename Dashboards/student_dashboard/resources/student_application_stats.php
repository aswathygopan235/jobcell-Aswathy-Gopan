<?php 
session_start();
if (isset($_REQUEST["application_id"])) {
$output='';
include_once '../../../connection.php';
$query=$con->prepare("SELECT a.*,b.id,b.job_position_name,b.job_location,c.id,c.company_name FROM job_application AS a LEFT JOIN jobs AS b ON a.job_code=b.job_code LEFT JOIN company AS c ON a.company_code=c.company_code WHERE a.student_code=? AND a.id=?");
$query->bind_param("si",$_SESSION["user_student_code"],$_REQUEST["application_id"]);
$query->execute();  
$query->store_result();
$query->bind_result($application_id,$application_code,$received_on,$job_code,$company_code,$student_code,$student_apply_info,$application_status,$job_id,$job_position_name,$job_location,$company_id,$company_name);

while($query->fetch()){
	$received_on=new DateTime($received_on);
	if ($application_status==='Reviewing' || $application_status==='Rejected') {
		$ribbon_value='Reviewing';
		$ribbon_class='bg-purple';
        $stat='Reviewing';
    }
			
	if ($application_status==='Shortlisted') {
		$ribbon_value='Shortlisted';
		$ribbon_class='bg-navy';
         $stat='Shortlisted';			
			
	}

	$output.='<div class="modal-header">
                <h4 class="modal-title">
                 <span class="fa fa-envelope-open-text fa-2x"></span>
                 
                Application
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
                 <tr>  
                     <td width="30%"><label>Bio</label></td>  
                     <td width="70%">'.$student_apply_info.'</td>                      
                </tr>
                </table>
             </div>                      
            </div>                      
            <!-- Modal footer -->
            <div class="modal-footer">
           
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>          ';
}
echo $output;
}

?>