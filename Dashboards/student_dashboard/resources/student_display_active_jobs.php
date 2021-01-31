<?php
    /*selecting the all jobs query*/
 /*   session_start();*/
    include '../../../connection.php';            
	$query1=$con->prepare("SELECT a.*,b.id,b.company_name FROM jobs AS a LEFT JOIN company as B on a.company_code=b.company_code WHERE job_status='Active'");
	$query1->execute();
	$output='';
	$query1->store_result();
	$query1->bind_result($job_id,$job_code,$company_code,$job_position_name,$job_location,$salary,$field,$job_info,$job_status,$posted_on,$expires_on,$company_id,$company_name);
	if($query1->num_rows===0){	
		$output='
		<div class="card card-default">
			<div class="card-body">
				<p>No records found</p>
			</div>
		</div>';
	}else{
	while($query1->fetch()){
		$posted_on=new DateTime($posted_on);
		$expires_on=new DateTime($expires_on);
		$output.='
	<div class="card card-default">
		<div class="card-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2"><label>Job Code</label></div>
					<div class="col-md-2">'.$company_code.'</div>
				</div>
				<div class="row">
					<div class="col-md-2"><label>Job Position name</label></div>
					<div class="col">'.$job_position_name.'</div>
				</div>
				<div class="row">
					<div class="col-md-2"><label>Posted by</label></div>
					<div class="col">'.$company_name.'</div>
				</div>
				
				
				<div class="row">
					<div class="col-md-2"><label>Job field</label></div>
					<div class="col">'.$field.'</div>
				</div>
				
				<div class="row">
					<div class="col-md-2"><label>Job status</label></div>
					<div class="col">'.$job_status.'</div>
				</div>
				
				
			
				<div class="row">
					<div class="col-md-2"><label>Actions</label></div>
					<div class="col-sm-1"> 
						<a type="button" name="viewJobBtn" id="viewJobBtn" value="view_jobs" job_id='.$job_id.' class="view_jobs action_icon" data-toggle="modal" data-target="#company_job_view_modal">
                			<span class="fa fa-eye view_job_icon action_icon" data-toggle="tooltip" title="View job"></span>
            			</a>
            		</div>
            		<div class="col-sm-1"> 
						<a type="button" name="viewCompanyBtn" id="viewCompanyBtn" value="view_company" company_id='.$company_id.' class="view_company action_icon" data-toggle="modal" data-target="#student_company_view_modal">
                			<span class="fa fa-building view_company_icon action_icon" data-toggle="tooltip" title="View company"></span>
            			</a>
            		</div>

            		';
            		 if ($job_status==='Active'){
          $output.=' <div class="col-sm-1"> 
						<a type="button" name="applyJobBtn" id="applyJobBtn" value="apply_jobs" job_id='.$job_id.' class="apply_jobs action_icon" data-toggle="modal" data-target="#student_job_apply_modal">
                			<span class="fa fa-paper-plane apply_icon action_icon" data-toggle="tooltip" title="Apply for the job"></span>
            			</a>
            		</div>                   
           ';
			}
 $output.='</div></div>
            	
            	</div>            	
            	</div>';
}
}	
echo $output;
	
?>