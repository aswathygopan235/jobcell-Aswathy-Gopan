<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
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
  <!--Action Icon Styling-->
  <link rel="stylesheet" href="dist/css/action_icons.css">

</head>
<?php 
session_start();
include '../../connection.php';
include '../../all_database_queries/admin_find_number_of_students.php';
include '../../all_database_queries/admin_find_no_of_companies.php';
include '../../all_database_queries/admin_find_number_of_jobs.php';
include '../../all_database_queries/admin_find_number_of_applications.php';
include '../../all_database_queries/admin_no_of_courses.php';
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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
          <a href="#" class="d-block"><?php echo $_SESSION["user_admin_name"];?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <i class="fas fa-tachometer-alt nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin_students_page.php" class="nav-link">
                  <i class="fas fa-graduation-cap nav-icon"></i>
                  <p>Students</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin_courses_page.php" class="nav-link">
                  <i class="fas fa-book nav-icon"></i>
                  <p>Courses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin_companies_page.php" class="nav-link">
                  <i class="fas fa-city nav-icon"></i>
                  <p>Companies</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin_jobs_page.php" class="nav-link">
                  <i class="fas fa-briefcase nav-icon"></i>
                  <p>Jobs</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="admin_applications_page.php" class="nav-link">
                  <i class="fas fa-paper-plane nav-icon"></i>
                  <p>Applications</p>
                </a>
              </li>
             <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="admin_logout.php" class="nav-link">
                  <i class="fas fa-sign-out-alt nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
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
            <h1 class="m-0 text-dark">Applications</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Applications</li>
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
          <div class="col-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1 bg-gradient-yellow">
                <ul class="nav nav-tabs" id="admin-application" role="tablist">
                  <li class="pt-2 px-3"><h3 class="card-title">Applications</h3></li>
                  <li class="nav-item">
                    <a class="nav-link active" id="admin-all-applications-tab" data-toggle="pill" href="#admin-all-applications" role="tab" aria-controls="admin-all-applications" aria-selected="true">All applications</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="admin-shortlisted-applications-tab" data-toggle="pill" href="#admin-shortlisted-applications" role="tab" aria-controls="admin-shortlisted-applications" aria-selected="false">Shortlisted applications</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="admin-rejected-applications-tab" data-toggle="pill" href="#admin-rejected-applications" role="tab" aria-controls="admin-rejected-applications" aria-selected="false">Rejected applications</a>
                  </li>
                 
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="admin-applicationContent">
                  <div class="tab-pane fade show active" id="admin-all-applications" role="tabpanel" aria-labelledby="admin-all-applications-tab">
                      <h3><i class="fas fa-mail-bulk fa-3x"></i>All Applications</h3>
                  <?php
                   $query1=$con->prepare("SELECT a.*,b.id,b.job_position_name,b.job_location,c.id,c.company_name,d.student_code,d.first_name,d.last_name FROM job_application AS a LEFT JOIN jobs AS b ON a.job_code=b.job_code LEFT JOIN company AS c ON a.company_code=c.company_code LEFT JOIN student AS d ON d.student_code=a.student_code");
  
  $query1->execute();

  $query1->store_result();
  $query1->bind_result($application_id,$application_code,$received_on,$job_code,$company_code,$student_code,$student_apply_info,$application_status,$job_id,$job_position_name,$job_location,$company_id,$company_name,$student_code,$first_name,$last_name);
  if($query1->num_rows<=0){?>
  <div class="callout callout-info">                
           <p class="lead">No Records found.</p>
  </div>
        <?php
  }else{
    while($query1->fetch()){?>
    <div class="callout callout-success"> 
    <div class="row">
    <div class="col-md-3 ">
     <strong><i class="fas fa-qrcode mr-1"></i>Application code</strong>
                <p class="text-muted">
                <?php echo $application_code;?>
                </p>
      </div>
      <div class="col-md-3 ">
      <strong>First name</strong>
                <p class="text-muted">
                <?php echo $first_name;?>
                </p>
      </div>
      <div class="col-md-3 ">
      <strong>Last name</strong>
                <p class="text-muted">
                <?php echo $last_name;?>
                </p>
      </div>
        <div class="col-md-3 ">
      <strong>Job position name</strong>
                <p class="text-muted">
                <?php echo $job_position_name;?>
                </p>
      </div>
    </div>
     <hr>
    <div class="row">
      <div class="col-md-3 ">
      <strong></i>Actions</strong>
      </div>
      <div class="col-sm-1">
          <a type="button" name="viewApplicationBtn" id="viewApplicationBtn" value="view_application"  class="view_application action_icon" href="admin_view_one_application.php?id=<?php echo $application_id;?>">
                      <span class="far fa-address-card view_application_icon action_icon" data-toggle="tooltip" title="View application"></span>
                  </a>
          </div>
          <div class="col-sm-1">
          <a type="button" name="viewJobBtn" id="viewJobBtn" value="view_job"  class="view_job action_icon" href="admin_view_one_job.php?id=<?php echo $job_id;?>">
                      <span class="fas fa-briefcase view_job_icon action_icon" data-toggle="tooltip" title="View job"></span>
                  </a>
          </div>
          <div class="col-sm-1">
          <a type="button" name="viewCompanyBtn" id="viewCompanyBtn" value="view_company"  class="view_company action_icon" href="admin_view_one_company.php?id=<?php echo $company_id;?>">
                      <span class="fas fa-city view_company_icon action_icon" data-toggle="tooltip" title="View company"></span>
                  </a>
          </div>
  </div>
</div>
  <?php   
    }
}
  ?>   

                  
                  </div>
                  <div class="tab-pane fade" id="admin-shortlisted-applications" role="tabpanel" aria-labelledby="admin-shortlisted-applications-tab">
                   
                   
                  
                  <h3>
                  
    
  <i class="fas fa-envelope fa-3x"></i>
  <i class="fas fa-check fa-2x" style="color: green;"></i>
 
Shortlisted applications

           </h3>   
               
             
                 
                  <?php
                   $query1=$con->prepare("SELECT a.*,b.id,b.job_position_name,b.job_location,c.id,c.company_name,d.student_code,d.first_name,d.last_name FROM job_application AS a LEFT JOIN jobs AS b ON a.job_code=b.job_code LEFT JOIN company AS c ON a.company_code=c.company_code LEFT JOIN student AS d ON d.student_code=a.student_code WHERE a.application_status='Shortlisted'");
  
  $query1->execute();

  $query1->store_result();
  $query1->bind_result($application_id,$application_code,$received_on,$job_code,$company_code,$student_code,$student_apply_info,$application_status,$job_id,$job_position_name,$job_location,$company_id,$company_name,$student_code,$first_name,$last_name);
  if($query1->num_rows<=0){?>

  

  <div class="callout callout-info">                
           <p class="lead">No Records found.</p>
  </div>

        <?php
  }else{

    while($query1->fetch()){?>
    <div class="callout callout-success"> 
    <div class="row">
    <div class="col-md-3 ">
     <strong><i class="fas fa-qrcode mr-1"></i>Application code</strong>
                <p class="text-muted">
                <?php echo $application_code;?>
                </p>
      </div>
      <div class="col-md-3 ">
      <strong>First name</strong>
                <p class="text-muted">
                <?php echo $first_name;?>
                </p>
      </div>
      <div class="col-md-3 ">
      <strong>Last name</strong>
                <p class="text-muted">
                <?php echo $last_name;?>
                </p>
      </div>
        <div class="col-md-3 ">
      <strong>Job position name</strong>
                <p class="text-muted">
                <?php echo $job_position_name;?>
                </p>
      </div>
    </div>
     <hr>
    <div class="row">
      <div class="col-md-3 ">
      <strong></i>Actions</strong>
      </div>
      <div class="col-sm-1">
          <a type="button" name="viewApplicationBtn" id="viewApplicationBtn" value="view_applications"  class="view_application action_icon" href="admin_view_one_application.php?id=<?php echo $application_id;?>">
                      <span class="far fa-address-card view_application_icon action_icon" data-toggle="tooltip" title="View application"></span>
                  </a>
          </div>
          <div class="col-sm-1">
          <a type="button" name="viewJobBtn" id="viewJobBtn" value="view_job"  class="view_job action_icon" href="admin_view_one_job.php?id=<?php echo $job_id;?>">
                      <span class="fas fa-briefcase view_job_icon action_icon" data-toggle="tooltip" title="View job"></span>
                  </a>
          </div>
          <div class="col-sm-1">
          <a type="button" name="viewCompanyBtn" id="viewCompanyBtn" value="view_company"  class="view_company action_icon" href="admin_view_one_company.php?id=<?php echo $company_id;?>">
                      <span class="fas fa-city view_company_icon action_icon" data-toggle="tooltip" title="View company"></span>
                  </a>
          </div>
  </div>
</div>
  <?php   
    }
}
  ?>   

                    


                   

                    
                  </div>
                  <div class="tab-pane fade" id="admin-rejected-applications" role="tabpanel" aria-labelledby="admin-rejected-applications-tab">
                     <h3>
                  
    
  <i class="fas fa-envelope fa-3x"></i>
  <i class="fas fa-times fa-2x" style="color: red;"></i>
 
Rejected applications

           </h3>   
                  <?php
                   $query1=$con->prepare("SELECT a.*,b.id,b.job_position_name,b.job_location,c.id,c.company_name,d.student_code,d.first_name,d.last_name FROM job_application AS a LEFT JOIN jobs AS b ON a.job_code=b.job_code LEFT JOIN company AS c ON a.company_code=c.company_code LEFT JOIN student AS d ON d.student_code=a.student_code WHERE a.application_status='Rejected'");
  
  $query1->execute();

  $query1->store_result();
  $query1->bind_result($application_id,$application_code,$received_on,$job_code,$company_code,$student_code,$student_apply_info,$application_status,$job_id,$job_position_name,$job_location,$company_id,$company_name,$student_code,$first_name,$last_name);
  if($query1->num_rows<=0){?>
  <div class="callout callout-info">                
           <p class="lead">No Records found.</p>
  </div>
        <?php
  }else{
    while($query1->fetch()){?>
    <div class="callout callout-success"> 
    <div class="row">
    <div class="col-md-3 ">
     <strong><i class="fas fa-qrcode mr-1"></i>Application code</strong>
                <p class="text-muted">
                <?php echo $application_code;?>
                </p>
      </div>
      <div class="col-md-3 ">
      <strong>First name</strong>
                <p class="text-muted">
                <?php echo $first_name;?>
                </p>
      </div>
      <div class="col-md-3 ">
      <strong>Last name</strong>
                <p class="text-muted">
                <?php echo $last_name;?>
                </p>
      </div>
        <div class="col-md-3 ">
      <strong>Job position name</strong>
                <p class="text-muted">
                <?php echo $job_position_name;?>
                </p>
      </div>
    </div>
     <hr>
    <div class="row">
      <div class="col-md-3 ">
      <strong></i>Actions</strong>
      </div>
      <div class="col-sm-1">
          <a type="button" name="viewApplicationBtn" id="viewApplicationBtn" value="view_applications"  class="view_application action_icon" href="admin_view_one_application.php?id=<?php echo $application_id;?>">
                      <span class="far fa-address-card view_application_icon action_icon" data-toggle="tooltip" title="View application"></span>
                  </a>
          </div>
          <div class="col-sm-1">
          <a type="button" name="viewJobBtn" id="viewJobBtn" value="view_job"  class="view_job action_icon" href="admin_view_one_job.php?id=<?php echo $job_id;?>">
                      <span class="fas fa-briefcase view_job_icon action_icon" data-toggle="tooltip" title="View job"></span>
                  </a>
          </div>
          <div class="col-sm-1">
          <a type="button" name="viewCompanyBtn" id="viewCompanyBtn" value="view_company"  class="view_company action_icon" href="admin_view_one_company.php?id=<?php echo $company_id;?>">
                      <span class="fas fa-city view_company_icon action_icon" data-toggle="tooltip" title="View company"></span>
                  </a>
          </div>
  </div>
</div>
  <?php   
    }
}
  ?>   

                    
                   
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
</body>
</html>
