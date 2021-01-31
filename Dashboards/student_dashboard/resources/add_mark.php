<?php
session_start();
include '../../../connection.php';
if (isset($_REQUEST["student_code"])) {

 $query  =$con->prepare("SELECT COUNT(*) FROM marks WHERE student_code = ?");
 $query->bind_param("s",$_REQUEST["student_code"]);
 $query->execute();
 $query->bind_result($sem_count);
 $query->fetch();
 $sem_count=$sem_count+1;
 if($sem_count<=$_SESSION["user_student_no_of_sems"]){

 $output='
               <!-- Modal Header -->
              <div class="modal-header">

                  <h4 class="modal-title">
                    <span class="fa fa-plus-circle fa-2x"></span>
                     Add Marks
                  </h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body" id="add_marks_modal_body">
              <div class="container">
 	<input type="text" name="hidden_student_code" hidden id="hidden_student_code" value='.$_REQUEST["student_code"].'>
 	<input type="text" name="no_of_sems" hidden id="no_of_sems" value='.$_SESSION["user_student_no_of_sems"].'>
 	<div class="row modalrow">
		<div class="col-sm-4">
			<label for="student_semester">Semester</label>
		</div>
		<div>
			<input type="text" name="student_semester" id="student_semester" readonly value='.$sem_count.'>
		</div>
	</div>
	<div class="row modalrow">
		<div class="col-sm-4">
			<label for="student_new_marks">Marks</label>
		</div>
		<div>
			<input type="text" name="student_new_marks" id="student_new_marks" min="0" max="100"  required>
		</div>		        			
	</div>	
</div>	


              </div>
               <!-- Modal footer div goes here -->
              <div class="modal-footer">
                  <button type="submit" class="btn btn-success" id="addBtn" name="addBtn">          
                Add
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

 

 ';
 $a=true;//New line
}
	else{
		$output='
		              <!-- Modal Header -->
              <div class="modal-header">

                  <h4 class="modal-title">
                    <span class="fa fa-exclamation-triangle fa-2x"></span>
                    Error
                  </h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body" id="add_marks_modal_body">
              The semester exceeds the total number of semesters in the course
              </div>
               <!-- Modal footer div goes here -->
              <div class="modal-footer">
                  
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>


		';
		$a=false;//new line

	}
}

 echo $output;

?>