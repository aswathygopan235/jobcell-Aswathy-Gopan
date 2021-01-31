<?php 
session_start();
include '../../../connection.php';
$query=$con->prepare("SELECT a.*,b.id,b.job_position_name,b.job_location,c.first_name,c.last_name FROM job_application  AS a LEFT JOIN jobs AS b ON a.job_code=b.job_code LEFT JOIN student AS c ON a.student_code=c.student_code WHERE a.company_code=? AND a.application_status='Shortlisted' ");

$query->bind_param("s",$_SESSION["user_company_code"]);
$query->execute();
$output='';
$query->store_result();
$query->bind_result($application_id,$application_code,$received_on,$job_code,$company_code,$student_code,$student_apply_info,$application_status,$job_id,$job_position_name,$job_location,$first_name,$last_name);
if($query->num_rows===0){	
		$output.='
		<div class="card card-default">
			<div class="card-body">
				<p>No records found</p>
			</div>
		</div>';
	}else{
	while($query->fetch()){
		$received_on=new DateTime($received_on);
	
		$output.='
		<div class="card card-default">
		<div class="card-body">
			<div class="container-fluid">
			<div class="row">
					<div class="col-md-2"><label>Application Code</label></div>
					<div class="col-md-2">'.$application_code.'</div>
				</div>
			<div class="row">
								<div class="col-md-2"><label>Candidate name</label></div>
								<div class="col-md-2">'.$first_name.' '.$last_name.'</div>
						</div>
		<div class="row">
					<div class="col-md-2"><label>Job position name</label></div>
					<div class="col-md-2">'.$job_position_name.'</div>
			</div>
			<div class="row">
					<div class="col-md-2"><label>Actions</label></div>
					<div class="col-sm-1">
					<a type="button" name="viewApplicationBtn" id="viewApplicationBtn" value="view_applications"  class="view_applications action_icon" href="company_view_one_application.php?id='.$application_id.'">
                			<span class="far fa-address-card view_application_icon action_icon" data-toggle="tooltip" title="View application"></span>
            			</a>
					</div>
					<div class="col-sm-1"> <a type="button" name="viewJobBtn" id="viewJobBtn" value="view_jobs" job_id="'.$job_id.'" class="view_jobs action_icon" data-toggle="modal" data-target="#company_job_view_modal">
                <span class="fa fa-eye view_job_icon action_icon" data-toggle="tooltip" title="View job"></span>
            		</a></div>
				
			<div class="col-sm-1"> <a type="button" name="viewApplicationBtn" id="viewApplicationBtn" value="view_application" application_id="'.$application_id.'" class="view_application action_icon" data-toggle="modal" data-target="#company_application_stat_modal">
                <span class="fa fa-user-edit application_stat_icon action_icon" data-toggle="tooltip" title="Review job application"></span>
            		</a></div>
            		 <div class="col-sm-1">
            		<a type="button" name="jobProfileBtn" id="jobProfileBtn" value="job_profile" href="company_view_one_job.php?id='.$job_id.'" class="job_profile action_icon" > 
                    <span class="fa fa-tag job_profile_icon action_icon" data-toggle="tooltip" title="Job Profile">
                    </span>
            </a></div>
				</div>


	</div>
</div>					
</div>';
}
}
echo $output;				

?>