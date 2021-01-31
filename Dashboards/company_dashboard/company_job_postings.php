<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Company Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/754094cd0e.js" crossorigin="anonymous"></script>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!--Toaster-->
  <link href="toastr.css" rel="stylesheet"/>
  <!--Action Icon styling-->
  <link rel="stylesheet" href="dist/css/action_icon_styling.css">
  <script src="toastr.js"></script>
  <style type="text/css">
    .formrow,.modalrow{
      margin: 10px;
    }
      
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <?php
  session_start();
  require '../../connection.php';
  include_once '../../all_database_queries/find_count_of_all_active_jobs.php'; 
  include_once '../../all_database_queries/user_student_find_course_data.php';
  ?>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i>
        </a>
      </li>
      
    </ul>
   
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
   
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["user_company_name"]?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="fas fa-tachometer-alt nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
        <!--   <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              Level 1
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Level 2</p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Level 2
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Level 3</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Level 3</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Level 3</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Level 2</p>
              </a>
            </li>
          </ul>
        </li> -->
          <li class="nav-item">
            <a href="company_job_postings.php" class="nav-link">
              <i class="fas fa-users nav-icon"></i>
              <p>Jobs</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="company_job_application.php" class="nav-link">
              <i class="fas fa-mail-bulk nav-icon"></i>
              <p>Applications</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="company_profile.php" class="nav-link">
              <i class="fas fa-user nav-icon"></i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-cog"></i>
            <p>
              Settings
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="company_logout.php" class="nav-link">
                <i class="fa fa-sign-out nav-icon"></i>
                <p>Logout</p>
              </a>
            </li>       
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Job Posts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Jobs</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 
        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="company-jobs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="company-add-job-tab" data-toggle="pill" href="#company-add-job" role="tab" aria-controls="company-add-job" aria-selected="true">Add a job</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="company-view-update-job-tab" data-toggle="pill" href="#company-view-update-job" role="tab" aria-controls="company-view-update-job" aria-selected="false">View/Update all active jobs</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="company-job-history-tab" data-toggle="pill" href="#company-job-history" role="tab" aria-controls="company-job-history" aria-selected="false">History</a>
                  </li>
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="company-jobsContent">
                  <div class="tab-pane fade show active" id="company-add-job" role="tabpanel" aria-labelledby="company-add-job-tab">
                   <h3><i class="fas fa-plus fa-3x"></i>Add a new job</h3>
                      <form method="POST" action="resources/company_job_add_form_action.php" onsubmit=" return job_post_input_validation();">
                      <div class="row formrow">
                        <div class="col-md-2">
                          <label for="job_position_name">Job Position</label>                          
                        </div>
                        <div class="col-md-2">
                          <input type="text" name="job_position_name" id="job_position_name" placeholder="Enter job name" required>
                        </div>
                      </div>
                        <div class="row formrow">
                        <div class="col-md-2">
                          <label for="job_location">Job location</label>                          
                        </div>
                        <div class="col-md-2">
                          <input type="text" name="job_location" id="job_location" placeholder="Enter job location" required>
                        </div>
                      </div>
                      <div class="row formrow">
                        <div class="col-md-2">
                          <label for="job_salary">Salary per month</label>                          
                        </div>
                        <div class="col-md-2">
                          <input type="text" name="job_salary" id="job_salary" placeholder="Enter salary" required>
                        </div>
                      </div>                      
                      <div class="row formrow">
                        <div class="col-md-2">
                          <label for="job_field">Job field</label>                          
                        </div>
                        <div class="col-md-2">
                          <input type="text" name="job_field" id="job_field" placeholder="Enter job field" required>
                        </div>
                      </div>
                      <div class="row formrow">
                        <div class="col-md-2">
                          <label for="job_info">Information</label>
                        </div>
                        <div class="col-md-2">
                          <textarea name="job_info" id="job_info" placeholder="Enter some information about the job" cols="60" rows="5" required></textarea>
                        </div>
                      </div>
                      <div class="row formrow">
                        <div class="col-md-2">
                          <label for="expires_on">Expiry date and time</label>
                        </div>
                        <div class="col-md-2">
                          <input type="datetime-local" name="expires_on" id="expires_on" required>
                        </div>
                      </div>                                           
                      <div class="row">
                        <div class="col-md-1">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                         <div class="col-md-1">
                          <button type="reset" class="btn btn-info">Clear</button>
                        </div>
                      </div>
                    </form>                     
                  </div>
                  <div class="tab-pane fade" id="company-view-update-job" role="tabpanel" aria-labelledby="company-view-update-job-tab">
                  <h3><i class="fas fa-briefcase fa-3x"></i>All active jobs</h3>
                    
                  <div id="company_job_data_body">                  
                  </div>  
                  </div>               
                
                  <div class="tab-pane fade" id="company-job-history" role="tabpanel" aria-labelledby="company-job-history-tab"> 
                 <h3><i class="fas fa-history fa-3x"></i>Job history</h3>       
                  <div id="company_job_history_body">                  
                  </div>                 
                </table>                   
                  </div>
                  
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>   
        </div>   
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!--SCRIPTS-->
<script>
   /*
  Tooltip script
   */
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
  $(document).ready(function(){
   $.ajax({
                  url: "resources/company_display_all_active_jobs.php",
                  method: "POST",
                  success: function(data) {
                      $('#company_job_data_body').html(data);                    
                  }
              });
});
$(document).ready(function(){
   $.ajax({
                  url: "resources/company_job_history.php",
                  method: "POST",
                  success: function(data) {
                      $('#company_job_history_body').html(data);                    
                  }
              });
});
/*
Job post input validation
 */
function job_post_input_validation(){
var job_salary=document.getElementById("job_salary");
var expires_on=document.getElementById("expires_on");
var current_dt=new Date();
var expires_on_dt=new Date(expires_on.value);
if(isNaN(job_salary.value)){
  alert("Please enter a number");
  salary.focus();
  return false;
}else if(current_dt>expires_on_dt){
  alert("Please select a new expiry date");
  expires_on.focus();
  return false;
}else{
  toastr.info('Job posted succesfully');
return true;
}

}
/*
Job edit input validation
 */
function job_edit_input_validation(){
var job_salary=document.getElementById("job_salary_in");
var new_expires_on=document.getElementById("new_expires_on");
var current_dt=new Date();
var expires_on_dt=new Date(new_expires_on.value);
if(isNaN(job_salary.value)){
  alert("Please enter a number");
  job_salary.focus();
  return false;
}else if(expires_on_dt.value!=='' && current_dt>expires_on_dt){
  alert("Please select a new expiry date");
  new_expires_on.focus();
  return false;
}else{
return true;
}

}

/*
Company job view modal
 */

    $(document).on('click', '.view_jobs', function() {
          var job_id = $(this).attr("job_id");
          if (job_id != '') {
              $.ajax({
                  url: "resources/select_one_job.php",
                  method: "POST",
                  data: {
                      job_id: job_id
                  },
                  success: function(data) {
                      $('#company_view_job_modal_body').html(data);
                      $('#company_job_view_modal').modal('show');
                  }
              });
          }
      }); 
      /*
Company job edit  modal
 */

    $(document).on('click', '.edit_jobs', function() {
          var job_id = $(this).attr("job_id");
          if (job_id != '') {
              $.ajax({
                  url: "resources/edit_job.php",
                  method: "POST",
                  data: {
                      job_id: job_id
                  },
                  success: function(data) {
                      $('#company_edit_job_modal_body').html(data);
                      $('#company_job_edit_modal').modal('show');
                  }
              });
          }
      });
/*
    Company job delete  modal
 */

    $(document).on('click', '.delete_jobs', function() {
          var job_id = $(this).attr("job_id");
          if (job_id != '') {
              $.ajax({
                  url: "resources/delete_job.php",
                  method: "POST",
                  data: {
                      job_id: job_id
                  },
                  success: function(data) {
                      $('#company_delete_job_modal_body').html(data);
                      $('#company_job_delete_modal').modal('show');
                  }
              });
          }
      });
</script>


<!--Job view modal-->
 <div class="modal fade" id="company_job_view_modal" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="view_jobs_body">
              <!-- Modal Header -->
              <div class="modal-header">

                  <h4 class="modal-title">
                    <span class="fa fa-info-circle fa-2x"></span>
                     View Job
                  </h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body" id="company_view_job_modal_body">
              </div>
               <!-- Modal footer div goes here -->
              <div class="modal-footer">
               
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
        </div>
    </div>

    <!--Job edit modal-->
     <form id="company_job_edit_form" method="POST" action="resources/update_job_action.php" onsubmit="return job_edit_input_validation();">    

 <div class="modal fade" id="company_job_edit_modal" data-backdrop="static">
 
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="edit_jobs_body">
              

              <!-- Modal Header -->
              <div class="modal-header">

                  <h4 class="modal-title">
                    <span class="fa fa-pencil-square fa-2x"></span>
                     View Job
                  </h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body" id="company_edit_job_modal_body">
              </div>
               <!-- Modal footer div goes here -->
              <div class="modal-footer"> 
               <button type="submit" class="btn btn-success">Update</button>             
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>


        </div>


        </div>
    </div>
  </form>


      <!--Job delete modal-->
      <form id="job_delete_form" method="POST" action="resources/delete_job_action.php">
 <div class="modal fade" id="company_job_delete_modal">
        <div class="modal-dialog modal-md">
            <div class="modal-content" id="delete_jobs_body">
              <!-- Modal Header -->
              <div class="modal-header">

                  <h4 class="modal-title">
                    <span class="fas fa-eraser fa-2x"></span>
                     Delete Job
                  </h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body" id="company_delete_job_modal_body">
              </div>
               <!-- Modal footer div goes here -->
              <div class="modal-footer">
              <button type="submit" class="btn btn-info">Delete</button>              
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
        </div>
    </div>
  </form>
</body>


</html>
