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
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/toastr/toastr.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!--Icon styling-->
  <link rel="stylesheet" href="dist/css/action_icon_styling.css">
 
  
      <style type="text/css">
      .modalrow{
      margin-top: 10px;
      }
    </style>
     
   

</head>
<?php
session_start();
require '../../connection.php';
include_once'../../all_database_queries/user_student_average_marks.php';
include_once '../../all_database_queries/find_count_of_all_active_jobs.php';
include_once '../../all_database_queries/user_student_find_course_data.php';
include_once'../../all_database_queries/check_expiry_time_for_all_active_jobs.php';
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
            <a href="student_profile_page.php" class="nav-link"><!--Profile Read,Update and Delete here-->
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
                    <input type="text" class="knob" value='<?php echo $student_overall_mark; ?>'data-thickness="0.3" data-width="90" data-height="90" data-fgColor="#00a65a">
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
            <h1 class="m-0 text-dark">Marks</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Marks</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (info box) -->
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Course</span>
                <span class="info-box-number"><?php echo $_SESSION["user_student_course_name"];?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div><!-- ./col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-purple"><i class="fa fa-calendar"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Number of semesters</span>
                <span class="info-box-number"><?php echo $_SESSION["user_student_no_of_sems"]?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
       </div> <!-- /.row -->
       <div class="row">
         <div class="col-5">
            <div class="card">
              <div class="card-header">
            <h3 class="card-title">Marks</h3>
           <div class="col-sm-1"></div>
               <!--<div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 250px;">
                     <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                   <input type="text" name="typeahead" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Enter your search term...">
                   <div class="input-group-append">
                     <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                   </div>
                  </div>
                </div>
              </div>-->
            <br/>
            <div class="row">
              <div class="col">
                <button type="button" name="add" id="add" data-toggle="modal" data-target="#student_mark_add_modal" class="btn btn-success add_marks" student_code="<?php echo $_SESSION["user_student_code"]; ?>">
                  <i class="fas fa-plus"></i>Add marks of a new semester
                </button>
              </div>
              <div class="col">
                <button type="button" name="delete" id="delete" data-toggle="modal" data-target="#student_mark_delete_modal" class="btn btn-danger delete_marks" student_code="<?php echo $_SESSION["user_student_code"]; ?>">
                  <span class="fa fa-minus"></span>Delete marks of previous semester
                </button>
              </div>
              </div>
             </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
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
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                       <div id="mark_data-body">
                    <?php while($row=$result->fetch_assoc()){?>
                    <tr>
                      <td><?php echo "Semester ".$row["sem"]?></td>
                      <td><?php echo $row["marks"];?> <sup>%</sup></td>
                      <td>
                         <a type="button" name="viewBtn" id="viewBtn" value="view_marks" sem_id="<?php echo $row["id"];?>" class="view_marks action_icon" data-toggle="modal" data-target="#student_mark_view_modal">
                          <span class="fas fa-scroll view_mark_icon action_icon" data-toggle="tooltip" title="View"></span>
                       </a>
                        &nbsp;
                        <a type="button" name="editBtn" id="editBtn" value="edit_marks" sem_id="<?php echo $row["id"];?>" class="edit_marks action_icon" data-toggle="modal" data-target="#student_mark_edit_modal">
                          <span class="fas fa-pencil-alt edit_mark_icon action_icon" data-toggle="tooltip" title="Edit"></span>
                        </a>
                      </td>
                    </tr>
                    <?php } ?>
                  </div>
                 </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
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
<?php
 $query2->free_result();
 $query2->close();
            /*End of student mark selection query*/
/*close connection*/
   $con->close();
?>
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
<!--toastr-->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="dist/js/semester_table.js"></script>
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
              r   = true;
          this.g.lineWidth = this.lineWidth
          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3);
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
<!--Scripts for modals, forms,tooltip-->
<script>
  /*
  Tooltip script
   */
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
/*
View modal script
 */
    $(document).on('click', '.view_marks', function() {
          var sem_id = $(this).attr("sem_id");
          if (sem_id != '') {
              $.ajax({
                  url: "resources/select_one_mark.php",
                  method: "POST",
                  data: {
                      sem_id: sem_id
                  },
                  success: function(data) {
                      $('#mark_detail').html(data);
                      $('#student_mark_view_modal').modal('show');
                  }
              });
          }
      });
     /*
      Edit marks javascript
       */
      $(document).on('click', '.edit_marks', function() {
          var sem_id = $(this).attr("sem_id");
          if (sem_id != '') {
              $.ajax({
                  url: "resources/edit_mark.php",
                  method: "POST",
                  data: {
                      sem_id: sem_id
                  },
                  success: function(data) {
                      $('#edit_marks_body').html(data);
                      $('#student_mark_edit_modal').modal('show');
                  }
              });
          }
      });
       /*
      Add marks javascript
       */
       $(document).on('click', '.add_marks', function() {
          var student_code= $(this).attr("student_code");
          if (student_code != '') {
              $.ajax({
                  url: "resources/add_mark.php",
                  method: "POST",
                  data: {
                      student_code: student_code
                  },
                  success: function(data) {
                      $('#add_marks_body').html(data);
                      $('#student_mark_add_modal').modal('show');
                  }
              });
          }
      });
        /*
      Delete marks javascript
       */
       $(document).on('click', '.delete_marks', function() {
          var student_code= $(this).attr("student_code");
          if (student_code != '') {
              $.ajax({
                  url: "resources/delete_mark.php",
                  method: "POST",
                  data: {
                      student_code: student_code
                  },
                  success: function(data) {
                      $('#delete_marks_body').html(data);
                      $('#student_mark_delete_modal').modal('show');
                  }
              });
          }
      });
      /*
      Mark validation
       */
      function mark_validation() {
        var entered_marks=document.getElementById('student_new_marks');
        var sem_count=document.getElementById('student_semester');
        if(entered_marks.value>100 || entered_marks.value<0){
          alert("Please enter a valid value between 0 and 100");
          return false;
        }else if(isNaN(entered_marks.value)){
          alert("Please enter a number");
          return false;
        }else if(entered_marks.value==""){
          alert("No marks entered!");
          return false;
        }else{
          return true;
        }
      }
</script>
</body>
<!--View Data Modal-->
  <div class="modal fade" id="student_mark_view_modal" data-backdrop="static">
      <div class="modal-dialog modal-md">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">
                  <span class="fa fa-info-circle fa-2x"></span>
                View Marks
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" id="mark_detail">
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
  </div>
  <!--Edit data Modal-->
  <form id="mark_edit_form" action="resources/update_mark_action.php" method="POST" onsubmit="return mark_validation();">
    <div class="modal fade" id="student_mark_edit_modal" data-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                  <h4 class="modal-title">
                    <span class="fa fa-pencil-square-o fa-2x"></span>
                    Edit Marks
                  </h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body" id="edit_marks_body">
              </div>
               <!-- Modal footer div goes here -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="updateBtn" name="updateBtn">
                  Update
                  </button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
          </div>
      </div>
  </form>
  <!--Add marks modal-->
  <form id="mark_add_form" action="resources/add_mark_action.php" method="POST" onsubmit="return mark_validation();" >
    <div class="modal fade" id="student_mark_add_modal" data-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content" id="add_marks_body">
              <!-- Modal Header -->
              <div class="modal-header">
                  <h4 class="modal-title">
                    <span class="fa fa-plus-circle fa-2x"></span>
                     Add Marks
                  </h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body" id="add_marks_modal_body">
              </div>
               <!-- Modal footer div goes here -->
              <div class="modal-footer">
                  <button type="submit" class="btn btn-success" id="addBtn" name="addBtn">
                Add
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
        </div>
    </div>
  </form>
  <!--Delete mark modal-->
  <form id="mark_delete_form" action="resources/delete_mark_action.php" method="POST" >
    <div class="modal fade" id="student_mark_delete_modal" data-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content" id="delete_marks_body">            
        </div>
        </div>
    </div>
  </form>
  <!--Marks Error Modal-->
  <div class="modal fade" id="student_mark_error_modal" data-backdrop="static">
      <div class="modal-dialog modal-md">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">
                  <span class="fa fa-exclamation fa-2x"></span>
                Error
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" id="error_detail">
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
  </div>
</html>
