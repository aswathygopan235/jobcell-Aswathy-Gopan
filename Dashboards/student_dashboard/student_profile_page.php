<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student Dashboard</title>
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
  <!--Icon styling-->
  <link rel="stylesheet" href="dist/css/action_icon_styling.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <?php  
session_start();
require("../../connection.php");/*database connection*/
include_once'../../all_database_queries/find_count_of_all_active_jobs.php';
include_once '../../all_database_queries/user_student_average_marks.php';
?>
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
    <!-- Brand Logo -->
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["user_first_name"]." ".$_SESSION["user_last_name"];?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item"><!--Back to home-->
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
           <li class="nav-item"> 
            <a href="#" class="nav-link"><!--Profile Read,Update and Delete here-->
              <i class="nav-icon fas fa-user"></i>
              <p>My Profile</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="student_applications_page.php" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>My Applications</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="student_job_listings_page.php" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>Job listings</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="student_mark_view_edit.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>Marks</p>
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
                <a href="student_logout.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
         <P class="nav-header">STATS</P>
         <div class=" text-center">
                    <input type="text" class="knob" value="<?php echo $student_overall_mark;?>" data-thickness="0.3" data-width="90" data-height="90" data-fgColor="#00a65a">
          <div class="knob-label" style="color: #cfd0d1">Overall Marks</div> 
        </div>
        <br/>
          
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
            <h1 class="m-0 text-dark">My Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">My Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
        <br/>
        <?php
        $query=$con->prepare("SELECT a.*,b.course_code,b.course_name,b.no_of_sems FROM student AS a LEFT JOIN course AS b ON a.course_code=b.course_code WHERE a.id=?");
        $query->bind_param("i",$_SESSION["user_student_id"]);
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
                <h3 class="widget-user-username"><?php echo $first_name.' '.$last_name;?></h3>
              <!--   <h5 class="widget-user-desc">Lead Developer</h5> -->
              </div>
                  <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <span class="description-text">STUDENT CODE</span> 
                      <h5 class="description-header"><?php echo $student_code;?></h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <span class="description-text">SENT APPLICATIONS</span> 
                      <h5 class="description-header"><?php 
                      $no_application_query=$con->prepare("SELECT COUNT(id) FROM job_application WHERE student_code=?");
                       $no_application_query->bind_param("s",$_SESSION["user_student_code"]);
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
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <span class="description-text">SHORTLISTED APPLICATIONS</span> 
                      <h5 class="description-header">
                        <?php 
                      $no_shortlisted_application_query=$con->prepare("SELECT COUNT(id) FROM job_application WHERE student_code=? AND application_status='Shortlisted'");
                       $no_shortlisted_application_query->bind_param("s",$_SESSION["user_student_code"]);
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
                
                  echo $student_overall_mark.'%';
                ?></p>                    
                  </div>
                  <div class="tab-pane fade" id="marks-display" role="tabpanel" aria-labelledby="marks-display-tab">
                    <table class="table table-hover text-nowrap">
                  <?php
                  /*selecting the student's marks query*/
                  $query2=$con->prepare("SELECT * FROM marks WHERE student_code=?");
                  $query2->bind_param("s",$_SESSION["user_student_code"]);
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
                 
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="application-overviewContent">
                  <div class="tab-pane fade show active" id="all-application" role="tabpanel" aria-labelledby="all-application-tab">
                    <?php
    /*selecting the all applications query*/
  $query1=$con->prepare("SELECT a.*,b.id,b.job_position_name,b.job_location,c.id,c.company_name,d.student_code FROM job_application AS a LEFT JOIN jobs AS b ON a.job_code=b.job_code LEFT JOIN company AS c ON a.company_code=c.company_code LEFT JOIN student AS d ON d.student_code=a.student_code WHERE d.id=?");
  $query1->bind_param("i",$_SESSION["user_student_id"]);
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
            <a type="button" name="viewJobBtn" id="viewJobBtn" value="view_job" job_id="<?php echo $job_id;?>" class="view_job action_icon" data-toggle="modal" data-target="#company_job_view_modal">
                      <span class="fa fa-eye view_job_icon action_icon" data-toggle="tooltip" title="View Job"></span>
                  </a>
                </div>
                <div class="col-sm-1"> 
            <a type="button" name="viewCompanyBtn" id="viewCompanyBtn" value="view_company" company_id='<?php echo $company_id;?>' class="view_company action_icon" data-toggle="modal" data-target="#student_company_view_modal">
                      <span class="fa fa-building view_company_icon action_icon" data-toggle="tooltip" title="View company"></span>
                  </a>
                </div>
                <div class="col-sm-1">
          <a type="button" name="viewApplicationStatsBtn" id="viewApplicationBtn" value="view_application_stats" application_id="<?php echo $application_id;?>" class="view_application_stats action_icon" data-toggle="modal" data-target="#student_application_stats_view_modal">
                      <span class="far fa-chart-bar view_application_stats_icon action_icon" data-toggle="tooltip" title="View application stats"></span>
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
  $query1->bind_param("i",$_SESSION["user_student_id"]);
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
            <a type="button" name="viewJobBtn" id="viewJobBtn" value="view_jobs" job_id="<?php echo $job_id;?>" class="view_jobs action_icon" data-toggle="modal" data-target="#student_job_view_modal">
                      <span class="fa fa-eye view_job_icon action_icon" data-toggle="tooltip" title="View"></span>
                  </a>
                </div>
                <div class="col-sm-1"> 
            <a type="button" name="viewCompanyBtn" id="viewCompanyBtn" value="view_company" company_id='<?php echo $company_id;?>' class="view_company action_icon" data-toggle="modal" data-target="#student_company_view_modal">
                      <span class="fa fa-building view_company_icon action_icon" data-toggle="tooltip" title="View company"></span>
                  </a>
                </div>
                <div class="col-sm-1">
          <a type="button" name="viewApplicationStatsBtn" id="viewApplicationBtn" value="view_application_stats" application_id="<?php echo $application_id;?>" class="view_application_stats action_icon" data-toggle="modal" data-target="#student_application_stats_view_modal">
                      <span class="far fa-chart-bar view_application_stats_icon action_icon" data-toggle="tooltip" title="View application stats"></span>
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
        </div><!--Container fluid end-->   
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
  <script>
  $(function () {
    /* jQueryKnob */
    $('.knob').knob({
      /*change : function (value) {
       //console.log("change : " + value);
       },
       release : function (value) {
       console.log("release : " + value);
       },
       cancel : function () {
       console.log("cancel : " + this.value);
       },*/
      draw: function () {
        // "tron" case
        if (this.$.data('skin') == 'tron') {
          var a   = this.angle(this.cv)  // Angle
            ,
              sa  = this.startAngle          // Previous start angle
            ,
              sat = this.startAngle         // Start angle
            ,
              ea                            // Previous end angle
            ,
              eat = sat + a                 // End angle
            ,
              r   = true
          this.g.lineWidth = this.lineWidth
          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3)
          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value)
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3)
            this.g.beginPath()
            this.g.strokeStyle = this.previousColor
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
            this.g.stroke()
          }
          this.g.beginPath()
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
          this.g.stroke()
          this.g.lineWidth = 2
          this.g.beginPath()
          this.g.strokeStyle = this.o.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
          this.g.stroke()
          return false
        }
      }
    })
    /* END JQUERY KNOB */
    //INITIALIZE SPARKLINE CHARTS
    $('.sparkline').each(function () {
      var $this = $(this)
      $this.sparkline('html', $this.data())
    })
    /* SPARKLINE DOCUMENTATION EXAMPLES http://omnipotent.net/jquery.sparkline/#s-about */
    drawDocSparklines()
    drawMouseSpeedDemo()
  })
  function drawDocSparklines() {
    // Bar + line composite charts
    $('#compositebar').sparkline('html', {
      type    : 'bar',
      barColor: '#aaf'
    })
    $('#compositebar').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7],
      {
        composite: true,
        fillColor: false,
        lineColor: 'red'
      })
    // Line charts taking their values from the tag
    $('.sparkline-1').sparkline()
    // Larger line charts for the docs
    $('.largeline').sparkline('html',
      {
        type  : 'line',
        height: '2.5em',
        width : '4em'
      })
    // Customized line chart
    $('#linecustom').sparkline('html',
      {
        height      : '1.5em',
        width       : '8em',
        lineColor   : '#f00',
        fillColor   : '#ffa',
        minSpotColor: false,
        maxSpotColor: false,
        spotColor   : '#77f',
        spotRadius  : 3
      })
    // Bar charts using inline values
    $('.sparkbar').sparkline('html', { type: 'bar' })
    $('.barformat').sparkline([1, 3, 5, 3, 8], {
      type               : 'bar',
      tooltipFormat      : '{{value:levels}} - {{value}}',
      tooltipValueLookups: {
        levels: $.range_map({
          ':2' : 'Low',
          '3:6': 'Medium',
          '7:' : 'High'
        })
      }
    })
    // Tri-state charts using inline values
    $('.sparktristate').sparkline('html', { type: 'tristate' })
    $('.sparktristatecols').sparkline('html',
      {
        type    : 'tristate',
        colorMap: {
          '-2': '#fa7',
          '2' : '#44f'
        }
      })
    // Composite line charts, the second using values supplied via javascript
    $('#compositeline').sparkline('html', {
      fillColor     : false,
      changeRangeMin: 0,
      chartRangeMax : 10
    })
    $('#compositeline').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7],
      {
        composite     : true,
        fillColor     : false,
        lineColor     : 'red',
        changeRangeMin: 0,
        chartRangeMax : 10
      })
    // Line charts with normal range marker
    $('#normalline').sparkline('html',
      {
        fillColor     : false,
        normalRangeMin: -1,
        normalRangeMax: 8
      })
    $('#normalExample').sparkline('html',
      {
        fillColor       : false,
        normalRangeMin  : 80,
        normalRangeMax  : 95,
        normalRangeColor: '#4f4'
      })
    // Discrete charts
    $('.discrete1').sparkline('html',
      {
        type     : 'discrete',
        lineColor: 'blue',
        xwidth   : 18
      })
    $('#discrete2').sparkline('html',
      {
        type          : 'discrete',
        lineColor     : 'blue',
        thresholdColor: 'red',
        thresholdValue: 4
      })
    // Bullet charts
    $('.sparkbullet').sparkline('html', { type: 'bullet' })
    // Pie charts
    $('.sparkpie').sparkline('html', {
      type  : 'pie',
      height: '1.0em'
    })
    // Box plots
    $('.sparkboxplot').sparkline('html', { type: 'box' })
    $('.sparkboxplotraw').sparkline([1, 3, 5, 8, 10, 15, 18],
      {
        type        : 'box',
        raw         : true,
        showOutliers: true,
        target      : 6
      })
    // Box plot with specific field order
    $('.boxfieldorder').sparkline('html', {
      type                     : 'box',
      tooltipFormatFieldlist   : ['med', 'lq', 'uq'],
      tooltipFormatFieldlistKey: 'field'
    })
    // click event demo sparkline
    $('.clickdemo').sparkline()
    $('.clickdemo').bind('sparklineClick', function (ev) {
      var sparkline = ev.sparklines[0],
          region    = sparkline.getCurrentRegionFields()
      value         = region.y
      alert('Clicked on x=' + region.x + ' y=' + region.y)
    })
    // mouseover event demo sparkline
    $('.mouseoverdemo').sparkline()
    $('.mouseoverdemo').bind('sparklineRegionChange', function (ev) {
      var sparkline = ev.sparklines[0],
          region    = sparkline.getCurrentRegionFields()
      value         = region.y
      $('.mouseoverregion').text('x=' + region.x + ' y=' + region.y)
    }).bind('mouseleave', function () {
      $('.mouseoverregion').text('')
    })
  }
  /**
   ** Draw the little mouse speed animated graph
   ** This just attaches a handler to the mousemove event to see
   ** (roughly) how far the mouse has moved
   ** and then updates the display a couple of times a second via
   ** setTimeout()
   **/
  function drawMouseSpeedDemo() {
    var mrefreshinterval = 500 // update display every 500ms
    var lastmousex       = -1
    var lastmousey       = -1
    var lastmousetime
    var mousetravel      = 0
    var mpoints          = []
    var mpoints_max      = 30
    $('html').mousemove(function (e) {
      var mousex = e.pageX
      var mousey = e.pageY
      if (lastmousex > -1) {
        mousetravel += Math.max(Math.abs(mousex - lastmousex), Math.abs(mousey - lastmousey))
      }
      lastmousex = mousex
      lastmousey = mousey
    })
    var mdraw = function () {
      var md      = new Date()
      var timenow = md.getTime()
      if (lastmousetime && lastmousetime != timenow) {
        var pps = Math.round(mousetravel / (timenow - lastmousetime) * 1000)
        mpoints.push(pps)
        if (mpoints.length > mpoints_max) {
          mpoints.splice(0, 1)
        }
        mousetravel = 0
        $('#mousespeed').sparkline(mpoints, {
          width        : mpoints.length * 2,
          tooltipSuffix: ' pixels per second'
        })
      }
      lastmousetime = timenow
      setTimeout(mdraw, mrefreshinterval)
    }
    // We could use setInterval instead, but I prefer to do it this way
    setTimeout(mdraw, mrefreshinterval);
  }
</script>
<script type="text/javascript">
   /*
  Tooltip script
   */
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
  /*
View job modal script
 */
    $(document).on('click', '.view_job', function() {
          var job_id = $(this).attr("job_id");
          if (job_id != '') {
              $.ajax({
                  url: "resources/select_one_job.php",
                  method: "POST",
                  data: {
                      job_id: job_id
                  },
                  success: function(data) {
                      $('#view_job_modal_body').html(data);
                      $('#student_job_view_modal').modal('show');
                  }
              });
          }
      });

    /*
View company modal script
 */
    $(document).on('click', '.view_company', function() {
          var company_id = $(this).attr("company_id");
          if (company_id != '') {
              $.ajax({
                  url: "resources/select_one_company.php",
                  method: "POST",
                  data: {
                      company_id: company_id
                  },
                  success: function(data) {
                      $('#view_company_modal_body').html(data);
                      $('#student_company_view_modal').modal('show');
                  }
              });
          }
      });
   /*
    View application stats modal script
 */
    $(document).on('click', '.view_application_stats', function() {
          var application_id = $(this).attr("application_id");
          if (application_id != '') {
              $.ajax({
                  url: "resources/student_application_stats.php",
                  method: "POST",
                  data: {
                      application_id: application_id
                  },
                  success: function(data) {
                      $('#view_application_stats_modal_body').html(data);
                      $('#student_application_stats_modal').modal('show');
                  }
              });
          }
      });
  

</script>
</body>
<!--Job view modal-->
 <div class="modal fade" id="student_job_view_modal" data-backdrop="static">
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
              <div class="modal-body" id="view_job_modal_body">
              </div>
               <!-- Modal footer div goes here -->
              <div class="modal-footer">
               
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
        </div>
    </div>

    <!--Company view modal-->
 <div class="modal fade" id="student_company_view_modal" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="view_company_body">
              <!-- Modal Header -->
              <div class="modal-header">

                  <h4 class="modal-title">
                    <span class="fa fa-landmark fa-2x"></span>
                     View Company
                  </h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body" id="view_company_modal_body">
              </div>
               <!-- Modal footer div goes here -->
              <div class="modal-footer">
               
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
        </div>
    </div>
    <div class="modal fade" id="student_application_stats_modal" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="view_application_stats_modal_body">
            </div>
          </div>
        </div>

</html>
