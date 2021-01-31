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
            <h1 class="m-0 text-dark">Job profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
               <li class="breadcrumb-item"><a href="admin_jobs_page.php">Jobs</a></li>
              <li class="breadcrumb-item active">Job profile</li>
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
          <a type="button" class="btn btn-secondary" href="admin_jobs_page.php">Back to Jobs page</a>
          </div>   
      </div>
      <br/>
     <?php 
$query1=$con->prepare("SELECT a.*,b.id,b.company_code,b.company_name FROM jobs AS a LEFT JOIN company as b ON a.company_code=b.company_code WHERE a.id=?");
$query1->bind_param("i",$_REQUEST["id"]);
 $query1->execute();
  $query1->store_result();
  $query1->bind_result($job_id,
$company_code,
$job_code,
$job_position_name,
$job_location,
$salary,
$field,
$job_info,
$job_status,
$posted_on,
$expires_on,
$company_id,
$company_code,
$company_name);
$query1->fetch();
?>
      <div class="row">
          <div class="col-md-12">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-gradient-navy ">
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><i class="fas fa-briefcase fa-3x"></i>
                   &nbsp;
                  <?php echo $job_position_name;?></h3>
              <!--   <h5 class="widget-user-desc">Lead Developer</h5> -->
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <span class="description-text">JOB CODE</span> 
                      <h5 class="description-header"><?php echo $job_code;?></h5>
                    </div><!--/.description-block -->
                  </div><!--/.col -->
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <span class="description-text">APPLICATIONS </span> 
                      <h5 class="description-header"><?php 
                      $query=$con->prepare("SELECT COUNT(id) FROM job_application WHERE job_code=?");
                      $query->bind_param("s",$job_code);
                      $query->execute();
                      $query->bind_result($all_application_count);
                      $query->fetch();
                      $query->free_result();
                      $query->close();
                      echo $all_application_count;?></h5>
                    </div><!--/.description-block -->
                  </div><!--/.col -->
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <span class="description-text">SHORTLISTED APPLICATIONS </span> 
                      <h5 class="description-header"><?php 
                      $query=$con->prepare("SELECT COUNT(id) FROM job_application WHERE job_code=? AND application_status='Shortlisted'");
                      $query->bind_param("s",$job_code);
                      $query->execute();
                      $query->bind_result($shortlisted_application_count);
                      $query->fetch();
                      $query->free_result();
                      $query->close();
                      echo $shortlisted_application_count;?></h5>
                    </div><!--/.description-block -->
                  </div><!--/.col -->
                   <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <span class="description-text">REJECTED APPLICATIONS </span> 
                      <h5 class="description-header"><?php 
                      $query=$con->prepare("SELECT COUNT(id) FROM job_application WHERE job_code=? AND application_status='Rejected'");
                      $query->bind_param("s",$job_code);
                      $query->execute();
                      $query->bind_result($rejected_application_count);
                      $query->fetch();
                      $query->free_result();
                      $query->close();
                      echo $rejected_application_count;?></h5>
                    </div><!--/.description-block -->
                  </div><!--/.col -->
                </div><!--/.row-->
              </div><!--/.card footer-->
            </div><!--/.card card-widget-->
          </div><!--/.col-->
        </div><!--/.row-->
        <div class="row">
          <div class="col-md-4">
            <div class="card card-success">
              <div class="card-header bg-gradient-navy">
                <h3 class="card-title">About Job</h3>
              </div> <!-- /.card-header -->             
              <div class="card-body">
                <strong><i class="fas fa-building mr-1"></i>Company</strong>
                <p class="text-muted">
                <a href="<?php echo "admin_view_one_company.php?id=".$company_id;?>"><?php echo $company_name;?></a>
                </p>
                <hr>
                 <strong><i class="fas fa-map-marker-alt mr-1"></i>Location</strong>
                <p class="text-muted"><?php echo $job_location;?></p>
                <hr>
                <strong><i class="fas fa-glasses mr-1"></i>Field</strong>
                <p class="text-muted"><?php echo $field;?></p>
                <hr>
                <strong><i class="fas fa-money-bill mr-1"></i>Salary per month</strong>
                <p class="text-muted"><?php echo $salary;?></p>
                <hr>
                 <strong><i class="far fa-circle mr-1"></i>Job status</strong>
                <p class="text-muted"><?php echo $job_status;?></p>
                <hr>
                <strong><i class="fas fa-bullhorn mr-1"></i>Posted on</strong>
                <p class="text-muted"><?php 
                $i_posted_on=new DateTime($posted_on);
                echo $i_posted_on->format("d-M-Y H:i:s A");?></p>
                <hr>
                <strong><i class="fas fa-hourglass-end mr-1"></i>Expires on</strong>
                <p class="text-muted"><?php 
                $i_expires_on=new DateTime($expires_on);
                echo $i_expires_on->format("d-M-Y H:i:s A");?></p>
              </div><!--/.card-body-->
            </div><!--/.card-->            
          </div><!--/.col-->
          <section class="col-md-8 connectedSortable">
             <div class="card card-success">
              <div class="card-header bg-gradient-navy">
                <h3 class="card-title">Job Info</h3>
              </div> <!-- /.card-header -->             
              <div class="card-body">
                <p class="text-muted"><?php echo $job_info;?></p>
              </div>
            </div> 
              <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1 bg-gradient-navy">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="pt-2 px-3"><h3 class="card-title">Applications</h3></li>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">All applications</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Shortlisted Applications</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Rejected Applicaions</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                   <?php
                   $query1=$con->prepare("SELECT a.*,b.id,b.first_name,b.last_name,c.id,c.course_name,d.id,d.job_position_name FROM job_application AS a LEFT JOIN student AS b ON a.student_code=b.student_code LEFT JOIN course AS C ON b.course_code=c.course_code LEFT JOIN jobs AS d ON d.job_code=a.job_code WHERE d.id=?");
                    $query1->bind_param("i",$_REQUEST["id"]);
  $query1->execute();

  $query1->store_result();
  $query1->bind_result(

$application_id,
$application_code,
$received_on,
$job_code,
$company_code,
$student_code,
$student_apply_info,
$application_status,
$student_id,
$first_name,
$last_name,
$course_id,
$course_name,
$job_id,
$i_job_position_name
);
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
    </div>
     <hr>
    <div class="row">
      <div class="col-md-3 ">
      <strong></i>Actions</strong>
      </div>
      <div class="col-sm-1">
          <a type="button" name="viewApplicationBtn" id="viewApplicationBtn" value="view_applications"  class="view_applications action_icon" href="admin_view_one_application.php?id=<?php echo $application_id;?>">
                      <span class="far fa-address-card view_application_icon action_icon" data-toggle="tooltip" title="View application"></span>
                  </a>
          </div>
          <div class="col-sm-1">
          <a type="button" name="viewCourseBtn" id="viewCourseBtn" value="view_course"  class="view_course action_icon" href="admin_view_one_course.php?id=<?php echo $course_id;?>">
                      <span class="fas fa-book-reader view_course_icon action_icon" data-toggle="tooltip" title="View course detail"></span>
                  </a>
          </div>
          <div class="col-sm-1">
          <a type="button" name="viewStudentBtn" id="viewStudentBtn" value="view_student"  class="view_student action_icon" href="admin_view_one_student.php?id=<?php echo $student_id;?>">
                      <span class="fas fa-user-graduate view_student_icon action_icon" data-toggle="tooltip" title="View Student detail"></span>
                  </a>
          </div>
  </div>
</div>
  <?php   
    }
}

?>   
     

                  </div>
                  <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                      <?php
                   $query1=$con->prepare("SELECT a.*,b.id,b.first_name,b.last_name,c.id,c.course_name,d.id,d.job_position_name FROM job_application AS a LEFT JOIN student AS b ON a.student_code=b.student_code LEFT JOIN course AS C ON b.course_code=c.course_code LEFT JOIN jobs AS d ON d.job_code=a.job_code WHERE d.id=? AND a.application_status='Shortlisted'");
                    $query1->bind_param("i",$_REQUEST["id"]);
  $query1->execute();

  $query1->store_result();
  $query1->bind_result(

$application_id,
$application_code,
$received_on,
$job_code,
$company_code,
$student_code,
$student_apply_info,
$application_status,
$student_id,
$first_name,
$last_name,
$course_id,
$course_name,
$job_id,
$i_job_position_name
);
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
    </div>
     <hr>
    <div class="row">
      <div class="col-md-3 ">
      <strong></i>Actions</strong>
      </div>
      <div class="col-sm-1">
          <a type="button" name="viewApplicationBtn" id="viewApplicationBtn" value="view_applications"  class="view_applications action_icon" href="admin_view_one_application.php?id=<?php echo $application_id;?>">
                      <span class="far fa-address-card view_application_icon action_icon" data-toggle="tooltip" title="View application"></span>
                  </a>
          </div>
          <div class="col-sm-1">
          <a type="button" name="viewCourseBtn" id="viewCourseBtn" value="view_course"  class="view_course action_icon" href="admin_view_one_course.php?id=<?php echo $course_id;?>">
                      <span class="fas fa-book-reader view_course_icon action_icon" data-toggle="tooltip" title="View course detail"></span>
                  </a>
          </div>
          <div class="col-sm-1">
          <a type="button" name="viewStudentBtn" id="viewStudentBtn" value="view_student"  class="view_student action_icon" href="admin_view_one_student.php?id=<?php echo $student_id;?>">
                      <span class="fas fa-user-graduate view_student_icon action_icon" data-toggle="tooltip" title="View Student detail"></span>
                  </a>
          </div>
  </div>
</div>
  <?php   
    }
}

?>   
     

                  </div>
                  <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                      <?php
                   $query1=$con->prepare("SELECT a.*,b.id,b.first_name,b.last_name,c.id,c.course_name,d.id,d.job_position_name FROM job_application AS a LEFT JOIN student AS b ON a.student_code=b.student_code LEFT JOIN course AS C ON b.course_code=c.course_code LEFT JOIN jobs AS d ON d.job_code=a.job_code WHERE d.id=? AND a.application_status='Rejected'");
                    $query1->bind_param("i",$_REQUEST["id"]);
  $query1->execute();

  $query1->store_result();
  $query1->bind_result(

$application_id,
$application_code,
$received_on,
$job_code,
$company_code,
$student_code,
$student_apply_info,
$application_status,
$student_id,
$first_name,
$last_name,
$course_id,
$course_name,
$job_id,
$i_job_position_name
);
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
    </div>
     <hr>
    <div class="row">
      <div class="col-md-3 ">
      <strong></i>Actions</strong>
      </div>
      <div class="col-sm-1">
          <a type="button" name="viewApplicationBtn" id="viewApplicationBtn" value="view_applications"  class="view_applications action_icon" href="admin_view_one_application.php?id=<?php echo $application_id;?>">
                      <span class="far fa-address-card view_application_icon action_icon" data-toggle="tooltip" title="View application"></span>
                  </a>
          </div>
          <div class="col-sm-1">
          <a type="button" name="viewCourseBtn" id="viewCourseBtn" value="view_course"  class="view_course action_icon" href="admin_view_one_course.php?id=<?php echo $course_id;?>">
                      <span class="fas fa-book-reader view_course_icon action_icon" data-toggle="tooltip" title="View course detail"></span>
                  </a>
          </div>
          <div class="col-sm-1">
          <a type="button" name="viewStudentBtn" id="viewStudentBtn" value="view_student"  class="view_student action_icon" href="admin_view_one_student.php?id=<?php echo $student_id;?>">
                      <span class="fas fa-user-graduate view_student_icon action_icon" data-toggle="tooltip" title="View Student detail"></span>
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
          </section>
        </div><!--/.row-->
    </div><!--/.container-fluid -->
  </section><!--/.content -->    
</div><!-- /.content-wrapper -->
 
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
<script type="text/javascript" >
    /*
  Tooltip script
   */
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
</body>
</html>
