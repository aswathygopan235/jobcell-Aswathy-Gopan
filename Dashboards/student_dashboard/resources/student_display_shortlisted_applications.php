<?php
    /*selecting the all jobs query*/
   session_start();
    include '../../../connection.php';            
	$query1=$con->prepare("SELECT a.*,b.id,b.job_position_name,b.job_location,c.id,c.company_name FROM job_application AS a LEFT JOIN jobs AS b ON a.job_code=b.job_code LEFT JOIN company AS c ON a.company_code=c.company_code WHERE a.student_code=? AND a.application_status='Shortlisted'");
	$query1->bind_param("s",$_SESSION["user_student_code"]);
	$query1->execute();
	$output='';
	$query1->store_result();
	$query1->bind_result($application_id,$application_code,$received_on,$job_code,$company_code,$student_code,$student_apply_info,$application_status,$job_id,$job_position_name,$job_location,$company_id,$company_name);
	if($query1->num_rows===0){	
		$output.='
		<div class="card card-default">
			<div class="card-body">
				<p>No records found</p>
			</div>
		</div>';
	}else{
	while($query1->fetch()){
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
					<div class="col-md-2"><label>Job position name</label></div>
					<div class="col-md-2">'.$job_position_name.'</div>
				</div>
				<div class="row">
					<div class="col-md-2"><label>Company name</label></div>
					<div class="col-md-2">'.$company_name.'</div>
				</div>
				<div class="row">
					<div class="col-md-2"><label>Actions</label></div>
					<!--<div class="col-sm-1">
					<a type="button" name="viewApplicationBtn" id="viewApplicationBtn" value="view_applications"  class="view_applications action_icon" href="student_view_one_application.php?id='.$application_id.'">
                			<span class="far fa-address-card view_application_icon action_icon" data-toggle="tooltip" title="View application"></span>
            			</a>
					</div>-->

					<div class="col-sm-1">
					<a type="button" name="viewJobsBtn" id="viewJobsBtn" value="view_jobs" job_id='.$job_id.' class="view_jobs action_icon" data-toggle="modal" data-target="#student_job_view_modal">
                			<span class="far fa-eye view_job_icon action_icon" data-toggle="tooltip" title="View job"></span>
            			</a>
					</div>
					
					<div class="col-sm-1">
					<a type="button" name="viewApplicationStatsBtn" id="viewApplicationBtn" value="view_application_stats" application_id='.$application_id.' class="view_application_stats action_icon" data-toggle="modal" data-target="#student_application_stats_view_modal">
                			<span class="far fa-chart-bar view_application_stats_icon action_icon" data-toggle="tooltip" title="View application stats"></span>
            			</a>
					</div>

					<div class="col-sm-1"> 
						<a type="button" name="viewCompanyBtn" id="viewCompanyBtn" value="view_company" company_id='.$company_id.' class="view_company action_icon" data-toggle="modal" data-target="#student_company_view_modal">
                			<span class="far fa-building view_company_icon action_icon" data-toggle="tooltip" title="View company"></span>
            			</a>
            		</div>
							
				</div>
				</div>
				</div>
				</div>';
	
}
}	
echo $output;
	
?>