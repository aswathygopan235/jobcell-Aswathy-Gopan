<?php
if(isset($_REQUEST["application_id"])){
	$output='';
	include '../../../connection.php';
	$query=$con->prepare("SELECT a.*,b.job_position_name,b.job_location,c.first_name,c.last_name FROM job_application AS a LEFT JOIN jobs AS b ON a.job_code=b.job_code LEFT JOIN student AS c ON a.student_code=c.student_code WHERE a.id=?");
	$query->bind_param("i",$_REQUEST["application_id"]);
	$query->execute();
$query->store_result();
$query->bind_result(
$application_id,
$application_code,
$received_on,
$job_code,
$company_code,
$student_code,
$student_apply_info,
$application_status,
$job_position_name,
$job_location,
$first_name,
$last_name);
$query->fetch();
switch ($application_status) {
		case 'Reviewing':
		$ribbon_value='Reviewing';
		$ribbon_class='bg-purple';
			break;
		case 'Shortlisted':
		$ribbon_value='Shortlisted';
		$ribbon_class='bg-navy';
		$text_class='text-success';	
		$text_value='Shortlisted';		
			break;
		case 'Rejected':
		$ribbon_value='Rejected';
		$ribbon_class='bg-maroon';
		$text_class='text-danger';	
		$text_value='Rejected';				
			break;		
		default:			
			break;
	}
if($application_status==='Reviewing'){
	$output.='
<div class="modal-header">
                <h4 class="modal-title">
                  <span class="fa fa-envelope-open-text fa-2x"></span>
              Change Application Status
                </h4>             
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
             <!-- Modal body -->
            <div class="modal-body" id="job_apply_body">
            <input type="hidden" id="hidden_application_id" name="hidden_application_id" value="'.$application_id.'">
             <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon '.$ribbon_class.' text-xl">
                          '.$ribbon_value.'
                        </div>
                      </div>
                <p>Change Status of the following application?</p>
                   <table class="table table-borderless">
                <tr>  
                     <td width="30%"><label>Application Code</label></td>  
                     <td width="70%">'.$application_code.'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Student name</label></td>  
                     <td width="70%">'.$first_name.' '.$last_name.'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Job position name</label></td>  
                     <td width="70%">'.$job_position_name.'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Job location</label></td>  
                     <td width="70%">'.$job_location.'</td>  
                </tr> 
                <tr>  
                    <td width="30%"><label class="lead text-muted">Choose status</label></td>                       
                </tr>
                <tr>
                	<td>
                	 <div class="custom-control custom-radio">
      <input type="radio" class="custom-control-input" id="shortlist_radio" name="status_radio" value="Shortlisted">
      <label class="custom-control-label lead" for="shortlist_radio">Shortlist</label>
    </div> 
    </td>
    <td>
     <div class="custom-control custom-radio">
      <input type="radio" class="custom-control-input" id="reject_radio" name="status_radio" value="Rejected">
      <label class="custom-control-label lead" for="reject_radio">Reject</label>
    </div>       
                	</td>
                </tr>                
                
                </table>      
            </div> 
        <!-- Modal footer -->
            <div class="modal-footer">
            <button type="submit" class="btn btn-success">Change Status</button> 
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

	';
}
else{
	$output.='
<div class="modal-header">
                <h4 class="modal-title">
                  <span class="fa fa-envelope-open-text fa-2x"></span>
              Change Application Status
                </h4>             
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
             <!-- Modal body -->
            <div class="modal-body" id="job_apply_body">
            <input type="hidden" id="hidden_application_id" name="hidden_application_id" value="'.$application_id.'">
             <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon '.$ribbon_class.' text-xl">
                          '.$ribbon_value.'
                        </div>
                      </div>
               <span class="lead"> You have already <span class="'.$text_class.' lead">'.$text_value.' </span>this application</span>
                   <table class="table table-borderless">
                <tr>  
                     <td width="30%"><label>Application Code</label></td>  
                     <td width="70%">'.$application_code.'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Student name</label></td>  
                     <td width="70%">'.$first_name.' '.$last_name.'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Job position name</label></td>  
                     <td width="70%">'.$job_position_name.'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Job location</label></td>  
                     <td width="70%">'.$job_location.'</td>  
                </tr> 
                
                
                </table>      
            </div> 
        <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

	';
}



}
echo $output;

?>