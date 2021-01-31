<?php
/*session_start();*/
include '../../../connection.php';
if (isset($_REQUEST["student_code"])) {

 $query  =$con->prepare("SELECT COUNT(*) FROM marks WHERE student_code = ?");
 $query->bind_param("s",$_REQUEST["student_code"]);
 $query->execute();
 $query->bind_result($sem_count);
 $query->fetch();
 if($sem_count==0){

 	$output=' <!-- Modal Header -->
              <div class="modal-header">

                  <h4 class="modal-title">
                    <span class="fa fa-exclamation-triangle fa-2x"></span>
                     Error
                  </h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body" id="delete_marks_modal_body">
              Cannnot delete marks
              </div>
               <!-- Modal footer div goes here -->
              <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>


 	';
 }else{

 $output='
  <!-- Modal Header -->
              <div class="modal-header">

                  <h4 class="modal-title">
                    <span class="fa fa-minus-circle fa-2x"></span>
                     Delete Marks
                  </h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body" id="delete_marks_modal_body">
              <div class="container">
 	<input type="text" name="hidden_student_code" hidden id="hidden_student_code" value='.$_REQUEST["student_code"].'>
 	<input type="text" name="hidden_sem_count" hidden id="hidden_sem_count" value='.$sem_count.'>
 	Are you sure you want to delete the mark of <b>Semester '.$sem_count.'</b>?
</div>	
              </div>
               <!-- Modal footer div goes here -->
              <div class="modal-footer">
                  <button type="submit" class="btn btn-info" id="deleteBtn" name="deleteBtn">
                Delete
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

 

 ';
	}
}

 echo $output;

?>