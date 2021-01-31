<?php
include '../../../connection.php';
$query=$con->prepare("SELECT a.*,b.id,b.course_name FROM student as a LEFT JOIN course AS b ON a.course_code=b.course_code");
$query->execute();
$output="";
$query->store_result();
$query->bind_result(
$student_id,
$student_code,
$first_name,
$last_name,
$gender,
$course_code,
$date_of_birth,
$email,
$contact_no,
$grad_month_year,
$date_time_of_join,
$skills,
$password,
$course_id,
$course_name);
$query->fetch();
	
	if($query->num_rows<=0){
		$output.='
		<div class="callout callout-warning">                
           <p class="lead">No Records found.</p>
        </div>';
	}else{
	while($query->fetch()){
		$output.='
		<ol>
		<div class="container-fluid">
		<div class="callout callout-warning" style="width:75%;"> 	
		<div class="row">
		<div class="col-md-3 ">
		 <strong><i class="fas fa-qrcode mr-1"></i>Student code</strong>
                <p class="text-muted">
                '.$student_code.'
                </p>
              
        </div>
        <div class="col-md-3">
		 <strong></i>First Name</strong>
                <p class="text-muted">
                '.$first_name.'
                </p>
               
        	</div>
        	 <div class="col-md-3">
		 <strong></i>Last Name</strong>
                <p class="text-muted">
                '.$last_name.'
                </p>
             
        	</div>
        	  	 <div class="col-md-3">
		 <strong></i>Course Name</strong>
                <p class="text-muted">
                '.$course_name.'
                </p>
             
        	</div>
        </div>
        <hr>
        <div class="row">
        	<div class="col-md-3 border-right">
		 <strong><i class="fas fa-pencil-alt mr-1"></i>Actions</strong>
		</div>
		<div class="col-sm-1">
					<a type="button" name="viewStudentBtn" id="viewStudentBtn" value="view_student"  class="view_student action_icon" href="admin_view_one_student.php?id='.$student_id.'">
                			<span class="fas fa-user-graduate view_student_icon action_icon" data-toggle="tooltip" title="View Student profile"></span>
            			</a>
					</div>

			<div class="col-sm-1">
			<a type="button" name="viewCourseBtn" id="viewCourseBtn" value="view_course"  class="view_course action_icon" href="admin_view_one_course.php?id='.$course_id.'">
                <span class="fa fa-book-reader view_course_icon action_icon" data-toggle="tooltip" title="View course profile"></span>
            		</a>
			</div
        </div>
        </div>
        </ol>
		';
	}
}
echo $output;
?>