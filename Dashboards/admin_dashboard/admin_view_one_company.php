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
            <h1 class="m-0 text-dark">Company Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
               <li class="breadcrumb-item"><a href="admin_companies_page.php">Company</a></li>
              <li class="breadcrumb-item active">Company Profile</li>
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
          <div class="col-md-12">
          <a type="button" class="btn btn-secondary" href="admin_companies_page.php">Back to Company page</a>
          </div>
        </div>
        <!-- /.row -->
        <br/>
        <?php
        $query=$con->prepare("SELECT * FROM company WHERE id=?");
        $query->bind_param("i",$_REQUEST["id"]);
        $query->execute();
        $query->store_result();
        $query->bind_result($company_id,$company_code,$company_name,$company_email,$company_contact_email,$company_website,$company_contact_no,$company_info,$date_time_of_join,$password);
         $query->fetch();
        ?>           
        </div><!-- /.row (main row) -->
                <!-- Main row -->
        <div class="row">
          <div class="col-md-12">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-gradient-navy ">
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><i class="fas fa-industry fa-3x"></i>
                   &nbsp;
                  <?php echo $company_name;?></h3>
              <!--   <h5 class="widget-user-desc">Lead Developer</h5> -->
              </div>
                  <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <span class="description-text">COMPANY CODE</span> 
                      <h5 class="description-header"><?php echo $company_code;?></h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <span class="description-text">POSTED JOBS</span> 
                      <h5 class="description-header">
                        <?php 
                      $no_jobs_query=$con->prepare("SELECT COUNT(id) FROM jobs WHERE company_code=?");
                       $no_jobs_query->bind_param("s",$company_code);
                  $no_jobs_query->execute();
                  $no_jobs_query->bind_result($company_no_jobs);
                  $no_jobs_query->fetch();
                  $no_jobs_query->free_result();
                  $no_jobs_query->close();
                  echo $company_no_jobs;?>
                     </h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <span class="description-text">ACTIVE JOBS</span> 
                      <h5 class="description-header">
                         <?php 
                      $no_active_jobs_query=$con->prepare("SELECT COUNT(id) FROM jobs WHERE company_code=? AND job_status='Active'");
                       $no_active_jobs_query->bind_param("s",$company_code);
                  $no_active_jobs_query->execute();
                  $no_active_jobs_query->bind_result($company_no_active_jobs);
                  $no_active_jobs_query->fetch();
                  $no_active_jobs_query->free_result();
                  $no_active_jobs_query->close();
                  echo $company_no_active_jobs;?>
                      </h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                    <div class="col-sm-3">
                    <div class="description-block">
                      <span class="description-text">APPLICATIONS</span> 
                      <h5 class="description-header">
                         <?php 
                      $no_application_query=$con->prepare("SELECT COUNT(id) FROM job_application WHERE company_code=?");
                       $no_application_query->bind_param("s",$company_code);
                  $no_application_query->execute();
                  $no_application_query->bind_result($company_no_application);
                  $no_application_query->fetch();
                  $no_application_query->free_result();
                  $no_application_query->close();
                  echo $company_no_application;?>
                      </h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              </div>
            </div>
            <!-- /.widget-user -->
          </div> <!-- /.row --> 
          <div class="row"> 
          <div class="col-md-4 ">
                     <!-- About Me Box -->
            <div class="card card-success">
              <div class="card-header bg-gradient-navy">
                <h3 class="card-title">About Company</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-paper-plane mr-1"></i>Company email</strong>
                <p class="text-muted">
                <a href="<?php echo $company_email;?>"><?php echo $company_email;?></a>
                </p>
                <hr>
                 <strong><i class="fas fa-laptop mr-1"></i>Company contact email</strong>
                <p class="text-muted">
                <a href="<?php echo $company_contact_email;?>"><?php echo $company_contact_email;?></a>
                </p>
                <hr>
                 <strong><i class="fas fa-globe mr-1"></i>Company website</strong>
                <p class="text-muted">
                <a href="<?php echo $company_website;?>"><?php echo $company_website;?></a>
                </p>
                <hr>
                 <strong><i class="fas fa-headset mr-1"></i>Contact number</strong>
                <p class="text-muted">
                <?php echo $company_contact_no;?>
                </p>
                <hr>
                 <strong><i class="fas fa-calendar-plus mr-1"></i>Date of join</strong>
                <p class="text-muted">
                <?php 
                $idate_time_of_join=new DateTime($date_time_of_join);
                echo $idate_time_of_join->format("d-M-Y h:i:s A");?>
                </p>               
              </div>
            </div>             
          </div>
          <section class="col-md-8">
             <div class="card card-success"> 
                <div class="card-header bg-gradient-navy">
                <h3 class="card-title">Company Bio</h3>
              </div>
               <div class="card-body">
                <p class="text-muted"><?php echo $company_info;?></p>
               </div>
            </div>
            <div class="card card-primary card-tabs ">
              <div class="card-header p-0 pt-1 bg-gradient-navy">
                <ul class="nav nav-tabs" id="admin-company-jobs" role="tablist">
                  <li class="pt-2 px-3"><h3 class="card-title">Jobs</h3></li>
                  <li class="nav-item">
                    <a class="nav-link active" id="admin-company-all-jobs-tab" data-toggle="pill" href="#admin-company-all-jobs" role="tab" aria-controls="admin-company-all-jobs" aria-selected="true">All jobs</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="admin-company-active-jobs-tab" data-toggle="pill" href="#admin-company-active-jobs" role="tab" aria-controls="admin-company-active-jobs" aria-selected="false">Active jobs</a>
                  </li>             
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="admin-company-jobsContent">
                  <div class="tab-pane fade show active" id="admin-company-all-jobs" role="tabpanel" aria-labelledby="admin-company-all-jobs-tab">
                    <?php
                    $query1=$con->prepare("SELECT * FROM jobs WHERE company_code=?");
                    $query1->bind_param("s",$company_code);
                    $query1->execute();
                    $result=$query1->get_result();
                    if($result->num_rows<=0){?>
  <div class="callout callout-info">                
           <p class="lead">No Records found.</p>
  </div>
        <?php
  }else{
    while($row=$result->fetch_assoc()){?>
    <div class="callout callout-success"> 
    <div class="row">
    <div class="col-md-3 ">
     <strong><i class="fas fa-qrcode mr-1"></i>Job code</strong>
                <p class="text-muted">
                <?php echo $row["job_code"];?>
                </p>
      </div>
      <div class="col-md-3 ">
      <strong>Job position name</strong>
                <p class="text-muted">
                <?php echo $row["job_position_name"];?>
                </p>
      </div>
      <div class="col-md-3 ">
      <strong>Job location</strong>
                <p class="text-muted">
                <?php echo $row["job_location"];?>
                </p>
      </div>
       <div class="col-md-3 ">
      <strong>Job field</strong>
                <p class="text-muted">
                <?php echo $row["field"];?>
                </p>
      </div>
    </div> 
    <hr>
    <div class="row">
      <div class="col-md-3 ">
      <strong>Actions</strong>
      </div>
      <div class="col-sm-1">
          <a type="button" name="viewJobBtn" id="viewJobBtn" value="view_job"  class="view_job action_icon" href="admin_view_one_job.php?id=<?php echo $row["id"];?>">
                      <span class="fas fa-briefcase view_job_icon action_icon" data-toggle="tooltip" title="View job"></span>
                  </a>
          </div>
  </div>
</div>
  <?php   
    }
}
                    ?>
                  </div>
                  <div class="tab-pane fade" id="admin-company-active-jobs" role="tabpanel" aria-labelledby="admin-company-active-jobs-tab">
                    <?php
                    $query1=$con->prepare("SELECT * FROM jobs WHERE company_code=? AND job_status='Active'");
                    $query1->bind_param("s",$company_code);
                    $query1->execute();
                    $result=$query1->get_result();
                    if($result->num_rows<=0){?>
  <div class="callout callout-info">                
           <p class="lead">No Records found.</p>
  </div>
        <?php
  }else{
    while($row=$result->fetch_assoc()){?>
    <div class="callout callout-success"> 
    <div class="row">
    <div class="col-md-3 ">
     <strong><i class="fas fa-qrcode mr-1"></i>Job code</strong>
                <p class="text-muted">
                <?php echo $row["job_code"];?>
                </p>
      </div>
      <div class="col-md-3 ">
      <strong>Job position name</strong>
                <p class="text-muted">
                <?php echo $row["job_position_name"];?>
                </p>
      </div>
      <div class="col-md-3 ">
      <strong>Job location</strong>
                <p class="text-muted">
                <?php echo $row["job_location"];?>
                </p>
      </div>
       <div class="col-md-3 ">
      <strong>Job field</strong>
                <p class="text-muted">
                <?php echo $row["field"];?>
                </p>
      </div>
    </div> 
    <hr>
    <div class="row">
      <div class="col-md-3 ">
      <strong><i class="fas fa-city mr-1"></i>Actions</strong>
      </div>
      <div class="col-sm-1">
          <a type="button" name="viewJobBtn" id="viewJobBtn" value="view_job"  class="view_job action_icon" href="admin_view_one_job.php?id=<?php echo $row["id"];?>">
                      <span class="fas fa-briefcase view_job_icon action_icon" data-toggle="tooltip" title="View job"></span>
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
          </section>
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
<script type="text/javascript">
    /*
  Tooltip script
   */
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
</body>
</html>
