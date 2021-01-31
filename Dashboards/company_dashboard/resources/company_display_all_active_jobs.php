<?php
   
    session_start();
    include '../../../connection.php';            
	$query1=$con->prepare("SELECT * FROM jobs WHERE company_code=? AND job_status=?");
	$status="Active";
	$query1->bind_param("ss",$_SESSION["user_company_code"],$status);
	$query1->execute();
	$output="";
	$result=$query1->get_result();
	$count=$result->num_rows;
	if($count<=0){
		$output='
		<div class="card card-default">
		<div class="card-body">
		<p>No records found</p>
		</div>
		</div>';
	}else{
	while($row=$result->fetch_assoc()){
		$posted_on=new DateTime($row["posted_on"]);
		$expires_on=new DateTime($row["expires_on"]);
	$output.='
	 <div class="card card-default">
		<div class="card-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2"><label>Job Code</label></div>
					<div class="col-md-2">'.$row["job_code"].'</div>
				</div>
				<div class="row">
					<div class="col-md-2"><label>Job Position name</label></div>
					<div class="col">'.$row["job_position_name"].'</div>
				</div>
				
				
				<div class="row">
					<div class="col-md-2"><label>Job field</label></div>
					<div class="col">'.$row["field"].'</div>
				</div>
				
				<div class="row">
					<div class="col-md-2"><label>Job status</label></div>
					<div class="col">'.$row["job_status"].'</div>
				</div>
				
				<div class="row">
					<div class="col-md-2"><label>Actions</label></div>
					<div class="col-sm-1"> <a type="button" name="viewJobBtn" id="viewJobBtn" value="view_jobs" job_id="'.$row["id"].'" class="view_jobs action_icon" data-toggle="modal" data-target="#company_job_view_modal">
                <span class="fa fa-eye view_icon action_icon" data-toggle="tooltip" title="View Job"></span>
            		</a></div>
            		<div class="col-sm-1">
            		<a type="button" name="editJobBtn" id="editJobBtn" value="edit_jobs" job_id='.$row["id"].' class="edit_jobs action_icon" data-toggle="modal" data-target="#company_job_edit_modal"> 
                    <span class="fa fa-pencil edit_job_icon action_icon" data-toggle="tooltip" title="Edit Job">
                    </span>
            </a></div>
            <div class="col-sm-1">
            		<a type="button" name="jobProfileBtn" id="jobProfileBtn" value="job_profile" href="company_view_one_job.php?id='.$row["id"].'" class="job_profile action_icon" > 
                    <span class="fa fa-tag job_profile_icon action_icon" data-toggle="tooltip" title="Job Profile">
                    </span>
            </a></div>
            	</div>
				</div>				
			</div>	
		</div>
	</div>
		';
	}
}
	echo $output;
?>