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
  <?php
  $i_course_id=$_REQUEST["id"];
  $query=$con->prepare("SELECT * FROM course WHERE id=?");
  $query->bind_param("i",$i_course_id);
  $query->execute();
  $query->store_result();
  $query->bind_result($course_id,$course_code,$course_name,$no_of_sems);
  $query->fetch();
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Course</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="admin_courses_page.php">Course</a></li>
              <li class="breadcrumb-item active">View Course</li>
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
          <a type="button" class="btn btn-secondary" href="admin_courses_page.php">Back to Courses page</a>
          </div>
        </div>
        <!-- /.row -->
        <br/>
        <div class="row">
          <div class="col-md-12">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-gradient-navy ">
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><i class="fas fa-book-open fa-3x"></i>
                  &nbsp;
                  <?php echo $course_name;?></h3>
              <!--   <h5 class="widget-user-desc">Lead Developer</h5> -->
              </div>
                  <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <span class="description-text">COURSE CODE</span> 
                      <h5 class="description-header"><?php echo $course_code;?></h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <span class="description-text">STUDENTS</span> 
                      <h5 class="description-header">
                        <?php
                        $query=$con->prepare("SELECT COUNT(id) FROM student WHERE course_code=?");
                        $query->bind_param("s",$course_code);
                        $query->execute();
                        $query->store_result();
                        $query->bind_result($no_of_students);
                        $query->fetch();
                        echo $no_of_students;
                        ?>
                      </h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <span class="description-text">AVERAGE COURSE MARKS</span> 
                      <h5 class="description-header">
                        <?php
                        $querya=$con->prepare("SELECT ROUND(AVG(marks),2) FROM marks WHERE course_code=?");
                      $querya->bind_param("s",$course_code);
                       $querya->execute();
                        $querya->store_result();
                        $querya->bind_result($course_avg_mark);
                        $querya->fetch();
                        echo $course_avg_mark.'%';
                        ?>
                      </h5>
                    </div><!-- /.description-block -->
                  </div> <!-- /.col -->
                   <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <span class="description-text">SEMESTER</span> 
                      <h5 class="description-header"><?php echo $no_of_sems;?></h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->

                </div><!--/.row-->
              </div><!--/.card footer-->
            </div><!--/.Widget card-->
          </div><!--/.col-->
        </div><!--/.row-->
        <div class="row">
          <div class="col-md-12">
          <div class="card card-success">
           <div class="card-header bg-gradient-navy">
                <h3 class="card-title">Student data</h3>
           </div>
           <div class="card-body">
           <?php $query=$con->prepare("SELECT * FROM student WHERE course_code=?");
           $query->bind_param("s",$course_code);
$query->execute();
  $result=$query->get_result();
  $query->store_result();
  $count=$result->num_rows;
  if($count<=0){
?>
    <div class="callout callout-warning">                
           <p class="lead">No Records found.</p>
        </div>
 <?php }else{
  while($row=$result->fetch_assoc()){
  ?>
    
    <div class="container-fluid">
    <div class="callout callout-warning" style="width:75%;">  
    <div class="row">
    <div class="col-md-3 ">
     <strong><i class="fas fa-qrcode mr-1"></i>Student code</strong>
                <p class="text-muted">
                <?php echo $row["student_code"]; ?>
                </p>
              
        </div>
        <div class="col-md-4">
     <strong></i>First Name</strong>
                <p class="text-muted">
                <?php echo $row["first_name"];?>
                </p>
               
          </div>
           <div class="col-md-4">
     <strong></i>Last Name</strong>
                <p class="text-muted">
                <?php echo $row["last_name"];?>
                </p>
             
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-3 border-right">
     <strong><i class="fas fa-pencil-alt mr-1"></i>Actions</strong>
    </div>
    <div class="col-sm-2">
          <a type="button" name="viewStudentBtn" id="viewStudentBtn" value="view_student"  class="view_student action_icon" href="admin_view_one_student.php?id=<?php echo $row["id"];?>" >
                      <span class="fas fa-user-graduate view_student_icon action_icon" data-toggle="tooltip" title="View Student profile"></span>
                  </a>
          </div>
             
           </div>
         </div>

          


        </div>
      <?php }
    }?>
  </div>
</div>
</div>
</div>

      </div><!-- /.container-fluid -->
    </section> <!-- /.content -->  
  </div> <!-- /.content-wrapper -->
  
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
