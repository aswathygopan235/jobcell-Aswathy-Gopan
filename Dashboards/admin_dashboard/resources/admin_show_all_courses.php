<?php
include '../../../connection.php';
$query=$con->prepare("SELECT * FROM course");
$query->execute();
$output="";
	$result=$query->get_result();
	$count=$result->num_rows;
	if($count<=0){
		$output.='
		<div class="callout callout-info">                
           <p class="lead">No Records found.</p>
        </div>';
	}else{
	while($row=$result->fetch_assoc()){
		$output.='
	
		<div class="callout callout-success"> 
		<div class="row">
		<div class="col-md-3 ">
		 <strong><i class="fas fa-qrcode mr-1"></i>Course code</strong>
                <p class="text-muted">
                '.$row["course_code"].'
                </p>
        </div>
        <div class="col-md-6">
		 <strong></i>Course Name</strong>
                <p class="text-muted">
                '.$row["course_name"].'
                </p>
        	</div>
        	 <div class="col-md-3">
		 <strong></i>Number of semesters</strong>
                <p class="text-muted">
                '.$row["no_of_sems"].'
                </p>
        	</div>
        </div>
        <hr>
        <div class="row">
        	<div class="col-md-3 border-right">
		 <strong><i class="fas fa-pencil-alt mr-1"></i>Actions</strong>
		</div>
		<div class="col-sm-2">
					<a type="button" name="viewCourseBtn" id="viewCourseBtn" value="view_course"  class="view_course action_icon" href="admin_view_one_course.php?id='.$row["id"].'">
                			<span class="fas fa-book-reader view_course_icon action_icon" data-toggle="tooltip" title="View course profile"></span>
            			</a>
					</div>
			
			</div>
			</div>
        </div>
    
     
		';
	}
}
echo $output;
?>