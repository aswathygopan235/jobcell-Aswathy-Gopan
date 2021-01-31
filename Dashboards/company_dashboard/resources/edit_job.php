<!--Edit modal the data of a specific record-->
<?php
//session_start();
if (isset($_REQUEST["job_id"])) {
	$output='';
 
   include_once '../../../connection.php'; // MySQL Connection
    $query  =$con->prepare("SELECT * FROM jobs WHERE id = ?");
    $query->bind_param("s",$_REQUEST["job_id"] );
    $query->execute();
    $result=$query->get_result();
    $row=$result->fetch_assoc();
    $current_expires_on=new DateTime($row["expires_on"]);
    $output.='<div class="container">
    					<input type="text" name="hidden_job_id" hidden id="hidden_job_id" value="'.$row["id"].'">	
    					<input type="text" name="hidden_expires_on" hidden id="hidden_expires_on" value="'.$row["expires_on"].'">		        	
			        					        					        				
			        		<div class="row modalrow">
			        			<div class="col-sm-3">
			        				<label>Job Code</label>
			        			</div>
			        			<div class="col-sm-3">
			        				'.$row["job_code"].'
			        			</div>
			        		</div>	
			        		<div class="row modalrow">
			        			<div class="col-sm-3">
			        				<label for="job_position_name">Job position name</label>
			        			</div>
			        			<div class="col-sm-6">
			        				<input type="text" name="job_position_name" required id="job_position_name" value="'.$row["job_position_name"].'">
			        			</div>
			        		</div>
			        		<div class="row modalrow">
			        			<div class="col-sm-3">
			        				<label for="job_location">Location</label>
			        			</div>
			        			<div class="col-sm-6">
			        				<input type="text" name="job_location" id="job_location" required value="'.$row["job_location"].'">
			        			</div>
			        		</div>
			        		<div class="row modalrow">
			        			<div class="col-sm-3">
			        				<label for="job_salary">Salary per month</label>
			        			</div>
			        			<div class="col-sm-6">
			        				<input type="text" name="job_salary_in" id="job_salary_in" required value="'.$row["salary"].'">
			        			</div>
			        		</div>
			        		<div class="row modalrow">
			        			<div class="col-sm-3">
			        				<label for="job_field">Job field</label>
			        			</div>
			        			<div class="col-sm-6">
			        				<input type="text" name="job_field" id="job_field" required value="'.$row["field"].'">
			        			</div>
			        		</div>
			        		<div class="row modalrow">
			        			<div class="col-sm-3">
			        				<label for="job_info">Information</label>
			        			</div>
			        			<div class="col-sm-6">
			        				<textarea name="job_info" id="job_info" cols="60" rows="5" required>'.$row["job_info"].'</textarea>
			        			</div>
			        		</div>
			        		<div class="row modalrow">
			        			<div class="col-sm-3">
			        				<label>Current expiry date</label>
			        			</div>
			        			<div class="col-sm-6">
			        				'.$current_expires_on->format("d-M-Y,l h:i:s a").'
			        			</div>
			        		</div>
			        		<div class="row modalrow">
                        		<div class="col-sm-3">
                        		</div>
                        	<div class="col-sm-6">
                          		<input type="datetime-local" name="new_expires_on" id="new_expires_on">
                          		<p class="text-muted">Choose a new expiry date here </p>
                       		 </div>
                     		</div>  
			        </div>';	  
	}

 echo $output;
?>