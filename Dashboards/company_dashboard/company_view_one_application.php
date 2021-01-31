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
require '../../all_database_queries/user_company_count_of_active_posted_jobs.php';
require '../../all_database_queries/company_count_applications_received.php';
require '../../all_database_queries/company_all_jobs_count.php';
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
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
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
    <!-- Brand Logo -->
    <a href="index3.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["user_company_name"];?></a>
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
              <i class="fas fa-user-circle nav-icon"></i>
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
  <?php
  /*
  Find the data for the specific application id
   */
$application_id=$_REQUEST["id"];
$query=$con->prepare("SELECT a.*,b.job_position_name,b.job_location,b.field,c.first_name,c.last_name,c.gender,c.date_of_birth,c.email,c.contact_no,c.grad_month_year,c.skills,d.course_name FROM job_application AS a LEFT JOIN jobs AS b ON a.job_code=b.job_code LEFT JOIN student AS c ON a.student_code=c.student_code LEFT JOIN course AS d on c.course_code=d.course_code WHERE a.id=?");
$query->bind_param("i",$application_id);
$query->execute();
$query->store_result();
$query->bind_result(
$got_id,
$application_code,
$received_on,
$job_code,
$company_code,
$student_code,
$student_apply_info,
$application_status,
$job_position_name,
$job_location,
$field,
$first_name,
$last_name,
$gender,
$date_of_birth,
$email,
$contact_no,
$grad_month_year,
$skills,
$course_name);
$query->fetch();
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Student Application</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="company_job_application.php">Application</a></li>
              <li class="breadcrumb-item active">Student Application</li>
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
          <div class="col-md-2">
          <a type="button" class="btn btn-secondary" href="company_job_application.php">Back to Application page</a>
          </div>
          <!-- ./col -->
          <div class="col-md-3">
          <button type="button" class="btn btn-primary change_status" data-toggle="modal" data-target="#application_status_change_modal" application_id="<?php echo $application_id;?>">
 Change application status
  </button>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
       <br>
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12 ">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user-2 ">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-gradient-olive">
                <h3 class="widget-user-username"><i class="fas fa-address-card fa-3x">
                </i>
                &nbsp;

                <?php echo $first_name.' '.$last_name;?></h3>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-2 border-right">
                    <div class="description-block">
                      <span class="description-text">Application code</span>
                      <h5 class="description-header"><?php echo $application_code;?></h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6 border-right">
                    <div class="description-block">
                         <span class="description-text">Job postion name</span>
                         <h5 class="description-header"><?php echo $job_position_name;?></h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                   <div class="col-sm-2 border-right">
                    <div class="description-block">
                         <span class="description-text">Current status</span>
                         <h5 class="description-header"><?php echo $application_status;?></h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                      <div class="col-sm-2 border-right">
                    <div class="description-block">
                         <span class="description-text">received on</span>
                         <h5 class="description-header"><?php $received_on=new DateTime($received_on);
                         echo $received_on->format("d-M-Y");


                        ?></h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                 
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          <!-- /.section -->
        </div>
        <!-- /.row (main row) -->
        <div class="row">
          <section class="col-md-4 connectedSortable">
                        <!-- Contact Box -->
            <div class="card card-gradient-olive">
              <div class="card-header">
                <h3 class="card-title">Job bio</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <strong><i class="fas fa-qrcode mr-1"></i>Job code</strong>
                <p class="text-muted">
                <?php echo $job_code;?>
                </p>
                <hr>
                <strong><i class="fas fa-map-marker-alt mr-1"></i>Location</strong>
                <p class="text-muted">
                <?php echo $job_location;?>
                </p>
                <hr>
                <strong><i class="fas fa-glasses mr-1"></i>Job field</strong>
                <p class="text-muted"><?php echo $field ;?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


            <div class="card card-olive">
              <div class="card-header bg-gradient-olive">
                <h3 class="card-title">About me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-transgender-alt mr-1"></i> Gender</strong>
                <p class="text-muted">
                <?php echo $gender;?>
                </p>
                <hr>
                <strong><i class="fas fa-birthday-cake mr-1"></i>Date of birth</strong>
                <p class="text-muted">
                <?php $idate_of_birth=new DateTime($date_of_birth);
                echo $idate_of_birth->format("d-M-Y");?>
                </p>
                <hr>
                <strong><i class="fas fa-phone mr-1"></i> Phone</strong>
                <p class="text-muted">
                 <?php echo $contact_no;?>
                </p>
                <hr>
                <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                <p><a href="<?php echo $email;?>"><?php echo $email;?></a></p>
                <hr>
                  <strong><i class="fas fa-user-tie mr-1"></i> Skills</strong>
                <p class="text-muted">
                <?php echo $skills ;?>
                </p>
             
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section><!--/.col>-->

            <section class="col-md-8 connectedSortable">
                        <!-- Contact Box -->
            <div class="card card-olive">
              <div class="card-header bg-gradient-olive">
                <h3 class="card-title">Bio</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              
                <strong><i class="fas fa-briefcase mr-1"></i>Additional info</strong>
                <p class="text-muted"><?php echo $student_apply_info;?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      
              <div class="card card-olive card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="student-education" role="tablist">
                  <li class="pt-2 px-3"><h3 class="card-title">Education Details</h3></li>
                   <div class="col-md-7"></div>
                  <li class="nav-item">
                    <a class="nav-link active" id="course-details-tab" data-toggle="pill" href="#course-details" role="tab" aria-controls="course-details" aria-selected="true">Course</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="mark-details-tab" data-toggle="pill" href="#mark-details" role="tab" aria-controls="mark-details" aria-selected="false">Marks</a>
                  </li>
                  
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="student-educationContent">
                  <div class="tab-pane fade show active" id="course-details" role="tabpanel" aria-labelledby="course-details-tab">
                     <strong><i class="fas fa-book-open mr-1"></i>Course</strong>
                <p class="text-muted">
                <?php echo $course_name;?>
                </p>
                <hr>
                <strong><i class="fas fa-user-graduate mr-1"></i>Month and year of graduation</strong>
                <p class="text-muted">
                <?php $grad_month_year=new DateTime($grad_month_year);
                echo $grad_month_year->format("M-Y");?>
                </p>
                <hr>

               
                <strong><i class="fas fa-chart-pie mr-1"></i>Overall marks</strong>
                <p> <?php 
                $query2=$con->prepare("SELECT ROUND(AVG(marks),2) FROM marks WHERE student_code=?");
                  $query2->bind_param("s",$student_code);
                  $query2->execute();
                  $query2->bind_result($student_overall_mark);
                  $query2->fetch();
                  $query2->free_result();
                  $query2->close();
                  echo $student_overall_mark.'%';

                ?></p>
                   
                  </div>
                  <div class="tab-pane fade" id="mark-details" role="tabpanel" aria-labelledby="mark-details-tab">
                      <table class="table table-hover text-nowrap">
                  <?php
                  /*selecting the student's marks query*/
                  $query2=$con->prepare("SELECT * FROM marks WHERE student_code=?");
                  $query2->bind_param("s",$student_code);
                  $query2->execute();
                  $result=$query2->get_result();
                  ?>
                  <thead>
                    <tr>
                      <th>Semester</th>
                      <th>Mark</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                       <div id="mark_data-body">
                    <?php while($row=$result->fetch_assoc()){?>
                    <tr>
                      <td><?php echo "Semester ".$row["sem"]?></td>
                      <td><?php echo $row["marks"];?> <sup>%</sup></td>
                    </tr>
                  <?php }?>
                  </div>
                </tbody>
              </table>
                  </div>
                 
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
             
        
          </section>
          


    
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>
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


<script type="text/javascript">
    /*
      Change application status javascript
       */
       $(document).on('click', '.change_status', function() {
          var application_id= $(this).attr("application_id");
          if (application_id != '') {
              $.ajax({
                  url: "resources/change_application_status.php",
                  method: "POST",
                  data: {
                      application_id: application_id
                  },
                  success: function(data) {
                      $('#change_application_status_body').html(data);
                      $('#application_status_change_modal').modal('show');
                  }
              });
          }
      });
  

</script>
</body>
<!--Change Application status modal-->
  <form id="change_application_status_form" action="resources/change_application_status_form_action.php" method="POST" >
    <div class="modal fade" id="application_status_change_modal" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="change_application_status_body">            
        </div>
        </div>
    </div>
  </form>
</html>
