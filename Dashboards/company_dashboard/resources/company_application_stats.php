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
		$text_class='text-primary';	
		$text_value='Reviewing';
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
               <span class="lead"> Status of this application is <span class="'.$text_class.' lead">'.$text_value.' </span></span>
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
              <a type="button" class="btn btn-primary" href="company_view_one_application.php?id='.$application_id.'">Go to application</a>
            </div>


	';


echo $output;
}

?>
	