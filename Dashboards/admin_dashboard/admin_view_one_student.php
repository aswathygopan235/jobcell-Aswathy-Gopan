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
  
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Student profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
               <li class="breadcrumb-item"><a href="admin_students_page.php">Students</a></li>
              <li class="breadcrumb-item active">Student profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
     <!--Top row-->
        <div class="row">
          <div class="col-md-12">
          <a type="button" class="btn btn-secondary" href="admin_students_page.php">Back to Student page</a>
          </div>
        </div>
        <!-- /.row -->
        <br/>
        <?php
        $query=$con->prepare("SELECT a.*,b.course_code,b.course_name,b.no_of_sems FROM student AS a LEFT JOIN course AS b ON a.course_code=b.course_code WHERE a.id=?");
        $query->bind_param("i",$_REQUEST["id"]);
        $query->execute();
        $query->store_result();
        $query->bind_result($student_id,$student_code,$first_name,$last_name,$gender,$course_code,$date_of_birth,$email,$contact_no,$grad_month_year,$date_time_of_join,$skills,$password,$course_code,$course_name,$no_of_sems);
        $query->fetch();
        ?>
        <!-- Main row -->
        <div class="row">
          <div class="col-md-12">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-gradient-navy ">
                <!-- /.widget-user-image -->

                <h3 class="widget-user-username"><i class="fas fa-user-graduate fa-3x"></i>
                   &nbsp;
                   <?php echo $first_name.' '.$last_name;?></h3>
              <!--   <h5 class="widget-user-desc">Lead Developer</h5> -->
              </div>
                  <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <span class="description-text">STUDENT CODE</span> 
                      <h5 class="description-header"><?php echo $student_code;?></h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <span class="description-text">SENT APPLICATIONS</span> 
                      <h5 class="description-header"><?php 
                      $no_application_query=$con->prepare("SELECT COUNT(id) FROM job_application WHERE student_code=?");
                       $no_application_query->bind_param("s",$student_code);
                  $no_application_query->execute();
                  $no_application_query->bind_result($student_no_applications);
                  $no_application_query->fetch();
                  $no_application_query->free_result();
                  $no_application_query->close();
                  echo $student_no_applications;?>
                     </h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <span class="description-text">SHORTLISTED APPICATIONS</span> 
                      <h5 class="description-header">
                        <?php 
                      $no_shortlisted_application_query=$con->prepare("SELECT COUNT(id) FROM job_application WHERE student_code=? AND application_status='Shortlisted'");
                       $no_shortlisted_application_query->bind_param("s",$student_code);
                  $no_shortlisted_application_query->execute();
                  $no_shortlisted_application_query->bind_result($student_no_shortlisted_applications);
                  $no_shortlisted_application_query->fetch();
                  $no_shortlisted_application_query->free_result();
                  $no_shortlisted_application_query->close();
                  echo $student_no_shortlisted_applications;?>
                      </h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                   <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <span class="description-text">REJECTED APPICATIONS</span> 
                      <h5 class="description-header">
                        <?php 
                      $no_rejected_application_query=$con->prepare("SELECT COUNT(id) FROM job_application WHERE student_code=? AND application_status='Rejected'");
                       $no_rejected_application_query->bind_param("s",$student_code);
                  $no_rejected_application_query->execute();
                  $no_rejected_application_query->bind_result($student_no_rejected_applications);
                  $no_rejected_application_query->fetch();
                  $no_rejected_application_query->free_result();
                  $no_rejected_application_query->close();
                  echo $student_no_rejected_applications;?>
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
          </div>
          <!-- /.col -->  
          <div class="row">
          <section class="col-md-4 connectedSortable">
                     <!-- About Me Box -->
            <div class="card card-success">
              <div class="card-header bg-gradient-navy">
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
                 <hr>
                <strong><i class="fas fa-calendar-plus mr-1"></i>Date and time of join</strong>
                <p class="text-muted">
                <?php $idate_time_of_join=new DateTime($date_time_of_join);
                echo $idate_time_of_join->format("d-M-Y h:i:s A");?>
                </p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
             <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1 bg-gradient-navy">
                <ul class="nav nav-tabs" id="education-details" role="tablist">
                  <li class="pt-2 px-3"><h3 class="card-title">Education Details</h3></li>
                  <li class="nav-item">
                    <a class="nav-link active" id="course-details-tab" data-toggle="pill" href="#course-details" role="tab" aria-controls="course-details" aria-selected="true">Course</a>
                  </li>
                  <li class="nav-item" >
                    <a class="nav-link" id="marks-display-tab" data-toggle="pill" href="#marks-display" role="tab" aria-controls="marks-display" aria-selected="false">Mark</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="education-detailsContent">
                  <div class="tab-pane fade show active" id="course-details" role="tabpanel" aria-labelledby="course-details-tab">
                 <strong><i class="fas fa-book-open mr-1"></i>Course</strong>
                <p class="text-muted">
                <?php echo $course_name;?>
                </p>
                <hr>
                 <strong><i class="fas fa-clock mr-1"></i>Number of semesters</strong>
                <p class="text-muted">
                <?php echo $no_of_sems;?>
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
                  <div class="tab-pane fade" id="marks-display" role="tabpanel" aria-labelledby="marks-display-tab">
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
          </section>
                    <section class="col-md-8 connectedSortable">
                          <!--Job overview-->
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1 bg-gradient-navy">
                <ul class="nav nav-tabs" id="application-overview" role="tablist">
                  <li class="pt-2 px-3"><h3 class="card-title">Application Overview</h3></li>
                  <li class="nav-item">
                    <a class="nav-link active" id="all-application-tab" data-toggle="pill" href="#all-application" role="tab" aria-controls="all-application" aria-selected="true">All Applications</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="shortlisted-application-tab" data-toggle="pill" href="#shortlisted-application" role="tab" aria-controls="shortlisted-application" aria-selected="false">Shortlisted Applications</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="rejected-application-tab" data-toggle="pill" href="#rejected-application" role="tab" aria-controls="rejected-application" aria-selected="false">Rejected Applications</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="application-overviewContent">
                  <div class="tab-pane fade show active" id="all-application" role="tabpanel" aria-labelledby="all-application-tab">
                    <?php
    /*selecting the all applications query*/
  $query1=$con->prepare("SELECT a.*,b.id,b.job_position_name,b.job_location,c.id,c.company_name,d.student_code FROM job_application AS a LEFT JOIN jobs AS b ON a.job_code=b.job_code LEFT JOIN company AS c ON a.company_code=c.company_code LEFT JOIN student AS d ON d.student_code=a.student_code WHERE d.id=?");
  $query1->bind_param("i",$_REQUEST["id"]);
  $query1->execute();

  $query1->store_result();
  $query1->bind_result($application_id,$application_code,$received_on,$job_code,$company_code,$student_code,$student_apply_info,$application_status,$job_id,$job_position_name,$job_location,$company_id,$company_name,$student_code);
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
      <strong>Job position name</strong>
                <p class="text-muted">
                <?php echo $job_position_name;?>
                </p>
      </div>
      <div class="col-md-3 ">
      <strong><i class="fas fa-city mr-1"></i>Company name</strong>
                <p class="text-muted">
                <?php echo $company_name;?>
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
  </div>
</div>
  <?php   
    }
}
  ?>   
                  </div>
                  <div class="tab-pane fade" id="shortlisted-application" role="tabpanel" aria-labelledby="shortlisted-application-tab">
                    <?php
    /*selecting the shortlisted applications query*/
  $query1=$con->prepare("SELECT a.*,b.id,b.job_position_name,b.job_location,c.id,c.company_name,d.student_code FROM job_application AS a LEFT JOIN jobs AS b ON a.job_code=b.job_code LEFT JOIN company AS c ON a.company_code=c.company_code LEFT JOIN student AS d ON d.student_code=a.student_code WHERE d.id=? AND a.application_status='Shortlisted'");
  $query1->bind_param("i",$_REQUEST["id"]);
  $query1->execute();
  $output='';
  $query1->store_result();
  $query1->bind_result($application_id,$application_code,$received_on,$job_code,$company_code,$student_code,$student_apply_info,$application_status,$job_id,$job_position_name,$job_location,$company_id,$company_name,$student_code);
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
      <strong>Job position name</strong>
                <p class="text-muted">
                <?php echo $job_position_name;?>
                </p>
      </div>
      <div class="col-md-3 ">
      <strong><i class="fas fa-city mr-1"></i>Company name</strong>
                <p class="text-muted">
                <?php echo $company_name;?>
                </p>
      </div>
    </div>
     <hr>
    <div class="row">
      
      <div class="col-md-3 ">
      <strong>Actions</strong>
      </div>
      <div class="col-sm-1">
          <a type="button" name="viewApplicationBtn" id="viewApplicationBtn" value="view_applications"  class="view_applications action_icon" href="admin_view_one_application.php?id=<?php echo $application_id;?>">
                      <span class="far fa-address-card view_application_icon action_icon" data-toggle="tooltip" title="View application"></span>
                  </a>
          </div>
  </div>




</div>
  <?php   
    }
}
  ?>   
                   </div> 
                  <div class="tab-pane fade" id="rejected-application" role="tabpanel" aria-labelledby="rejected-application-tab">
                                        <?php
    /*selecting the all applications query*/
  $query1=$con->prepare("SELECT a.*,b.id,b.job_position_name,b.job_location,c.id,c.company_name,d.student_code FROM job_application AS a LEFT JOIN jobs AS b ON a.job_code=b.job_code LEFT JOIN company AS c ON a.company_code=c.company_code LEFT JOIN student AS d ON d.student_code=a.student_code WHERE d.id=? AND a.application_status='Rejected'");
  $query1->bind_param("i",$_REQUEST["id"]);
  $query1->execute();
 
  $query1->store_result();
  $query1->bind_result($application_id,$application_code,$received_on,$job_code,$company_code,$student_code,$student_apply_info,$application_status,$job_id,$job_position_name,$job_location,$company_id,$company_name,$student_code);
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
      <strong>Job position name</strong>
                <p class="text-muted">
                <?php echo $job_position_name;?>
                </p>
      </div>
      <div class="col-md-3 ">
      <strong><i class="fas fa-city mr-1"></i>Company name</strong>
                <p class="text-muted">
                <?php echo $company_name;?>
                </p>
      </div>
    </div> 
    <hr>
    <div class="row">
    
      <div class="col-md-3 ">
      <strong>Actions</strong>
      </div>
      <div class="col-sm-1">
          <a type="button" name="viewApplicationBtn" id="viewApplicationBtn" value="view_applications"  class="view_applications action_icon" href="admin_view_one_application.php?id=<?php echo $application_id;?>">
                      <span class="far fa-address-card view_application_icon action_icon" data-toggle="tooltip" title="View application"></span>
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
              </div>
              <!-- /.card -->
            </div>
          </section>
        </div> <!-- /.row (main row) -->
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
