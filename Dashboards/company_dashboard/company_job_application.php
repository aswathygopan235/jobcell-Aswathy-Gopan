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
  <!--Action Icon styling-->
  <link rel="stylesheet" href="dist/css/action_icon_styling.css">
</head>
<?php
session_start();
require '../../connection.php';
require '../../all_database_queries/find_count_of_all_active_jobs.php';
require '../../all_database_queries/user_company_count_of_active_posted_jobs.php'
?>
<body class="hold-transition sidebar-mini layout-fixed">
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


<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Job Applications</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="company-application-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="company-all-applications-tab" data-toggle="pill" href="#company-all-applications" role="tab" aria-controls="company-all-applications" aria-selected="true"><i class="fas fa-eye"></i>View all applications</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="company-shortlisted-applications-tab" data-toggle="pill" href="#company-shortlisted-applications" role="tab" aria-controls="company-shortlisted-applications" aria-selected="false"><i class="fas fa-binoculars"></i>View shortlisted applications</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="company-rejected-applications-tab" data-toggle="pill" href="#company-rejected-applications" role="tab" aria-controls="company-rejected-applications" aria-selected="false"><i class="fas fa-times"></i>
                      Rejected
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="company-application-tabContent">
                  <div class="tab-pane fade show active" id="company-all-applications" role="tabpanel" aria-labelledby="company-all-applications-tab">
        <div class="row">
          <div class="col-12">
          <!--  <div class="card">
               <div class="card-header">
                <h3 class="card-title">Fixed Header Table</h3>
                <div class="card-tools">                 
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <select name="table_search_param" class="form-control float-right" placeholder="Search" id="search_by">
                      <option value=""></option>
                      <option value=""></option>
                      <option value=""></option>
                      <option value=""></option>
                      </select>
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- /.card-header -->
             <!--  <div class="card-body table-responsive p-0" style="height: 500px;"> -->
                  <h3><i class="fas fa-mail-bulk fa-3x"></i>All Applications</h3>
               
                  <div id="company_all_applications_body">
                  </div>
             
          
          </div>
        </div>
        <!-- /.row -->
                  </div>
                 <div class="tab-pane fade" id="company-shortlisted-applications" role="tabpanel" aria-labelledby="company-shortlisted-applications-tab">
                             <h3>
                  
    
  <i class="fas fa-envelope fa-3x"></i>
  <i class="fas fa-check fa-2x" style="color: green;"></i>
 
Shortlisted applications

           </h3>   
               

                  <div id="company_shortlisted_applications_body">
                    </div>               
                             
                 
                  
               
                  </div>
                   <div class="tab-pane fade" id="company-rejected-applications" role="tabpanel" aria-labelledby="company-rejected-applications-tab"> 
                               <h3>
                  
    
  <i class="fas fa-envelope fa-3x"></i>
  <i class="fas fa-times fa-2x" style="color: red;"></i>
 
Rejected applications

           </h3>   
               
                   <div id="company_rejected_applications_body">
                    </div>         
                           
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>


        </div>
        <!-- /.row -->
       
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
  $.widget.bridge('uibutton', $.ui.button)
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

<script type="text/javascript">
  /*
  Tooltip
   */
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
}); 
/*
  Display all applications
   */
 
$(document).ready(function(){
   $.ajax({
                  url: "resources/company_show_all_applications.php",
                  method: "POST",
                  success: function(data) {
                      $('#company_all_applications_body').html(data);                    
                  }
              });
}); 
/*
  Display shortlisted applications
   */
 
$(document).ready(function(){
   $.ajax({
                  url: "resources/company_show_shortlisted_applications.php",
                  method: "POST",
                  success: function(data) {
                      $('#company_shortlisted_applications_body').html(data);                    
                  }
              });
});
/*
  Display shortlisted applications
   */
 
$(document).ready(function(){
   $.ajax({
                  url: "resources/company_show_rejected_applications.php",
                  method: "POST",
                  success: function(data) {
                      $('#company_rejected_applications_body').html(data);                    
                  }
              });
});  
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
    View application stats modal script
 */
    $(document).on('click', '.view_application', function() {
          var application_id = $(this).attr("application_id");
          if (application_id != '') {
              $.ajax({
                  url: "resources/company_application_stats.php",
                  method: "POST",
                  data: {
                      application_id: application_id
                  },
                  success: function(data) {
                      $('#view_application_stats_modal_body').html(data);
                      $('#company_application_stats_modal').modal('show');
                  }
              });
          }
      });
</script>
</body>

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

     <div class="modal fade" id="company_application_stat_modal" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="view_application_stats_modal_body">
            </div>
          </div>
        </div>
</html>
