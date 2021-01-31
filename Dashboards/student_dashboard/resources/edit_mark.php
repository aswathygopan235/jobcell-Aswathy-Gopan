<!--Edit modal the data of a specific record-->
<?php
session_start();
if (isset($_REQUEST["sem_id"])) {
	$output="";
 
   include_once '../../../connection.php'; // MySQL Connection
    $query  =$con->prepare("SELECT * FROM marks WHERE id = ?");
    $query->bind_param("s",$_POST["sem_id"] );
    $query->execute();
    $result=$query->get_result();
    $row=$result->fetch_assoc();
    $output.='<div class="container">
    					<input type="text" name="hidden_sem_id" hidden id="hidden_sem_id" value='.$row["id"].'>
			        		<div class="row modalrow">
			        			<div class="col-sm-4">
			        				<label for="student_code">Student code</label>
			        			</div>
			        			<div>
			        				'.$_SESSION["user_student_code"].'
			        			</div>
			        		</div>	

			        		<div class="row modalrow">
			        			<div class="col-sm-4">
			        				<label for="student_course_code">Course code</label>
			        			</div>
			        			<div>
			        				'.$_SESSION["user_student_course_name"].'
			        			</div>
			        		</div>	
			        					        					        				
			        		<div class="row modalrow">
			        			<div class="col-sm-4">
			        				<label for="student_semester">Semester</label>
			        			</div>
			        			<div>
			        				<input type="text" name="student_semester" id="student_semester" readonly disabled value='.$row["sem"].'>
			        			</div>
			        		</div>	
			        		<div class="row modalrow">
			        			<div class="col-sm-4">
			        				<label for="student_new_marks">Marks</label>
			        			</div>
		        				<div>
			        				<input type="text" name="student_new_marks" id="student_new_marks" min=0 max=100  required value='.$row["marks"].'>			        				
			        			</div>		        			
			        		</div>
			        	</div>';	  
	}


 echo $output;
?>