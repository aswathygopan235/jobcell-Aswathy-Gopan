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
  <!--Icon Styling-->
  <link rel="stylesheet" href="dist/css/action_icon_styling.css";>
</head>
<?php  
session_start();
require("../../connection.php");/*database connection*/
include_once '../../all_database_queries/user_student_average_marks.php';
include_once '../../all_database_queries/find_count_of_all_active_jobs.php';

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
            <a href="#" class="nav-link">
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
        </ul> 
         <p class="nav-header">STATS</p>
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
            <h1 class="m-0 text-dark">Job Listings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Job Listings</li>
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
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="all-jobs-tab" data-toggle="pill" href="#all-jobs" role="tab" aria-controls="all-jobs" aria-selected="true"><i class="fas fa-eye"></i>View all jobs</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="active-jobs-tab" data-toggle="pill" href="#active-jobs" role="tab" aria-controls="active-jobs" aria-selected="false"><i class="fas fa-binoculars"></i>View all active jobs</a>
                  </li>
               
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="all-jobs" role="tabpanel" aria-labelledby="all-jobs-tab">
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
           
                <h3><i class="fas fa-briefcase fa-3x"></i>All active jobs</h3>
                  <div id="student_all_jobs_body">
                  </div>
             
          
          </div>
        </div>
        <!-- /.row -->
                  </div>
                 <div class="tab-pane fade" id="active-jobs" role="tabpanel" aria-labelledby="active-jobs-tab">
                <h3><i class="fas fa-business-time fa-3x"></i>All active jobs</h3>
                  <div id="student_active_jobs_body">
                  </div>
               
                  </div>
                 
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
        </div><!--/.Container fluid-->   
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

  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
$(document).ready(function(){
   $.ajax({
                  url: "resources/student_display_all_jobs.php",
                  method: "POST",
                  success: function(data) {
                      $('#student_all_jobs_body').html(data);                    
                  }
              });
});
$(document).ready(function(){
   $.ajax({
                  url: "resources/student_display_active_jobs.php",
                  method: "POST",
                  success: function(data) {
                      $('#student_active_jobs_body').html(data);                    
                  }
              });
});
/*
View job modal script
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
    Apply job modal script
 */
    $(document).on('click', '.apply_jobs', function() {
          var job_id = $(this).attr("job_id");
          if (job_id != '') {
              $.ajax({
                  url: "resources/student_apply_for_job.php",
                  method: "POST",
                  data: {
                      job_id: job_id
                  },
                  success: function(data) {
                      $('#job_apply_modal_body').html(data);
                      $('#student_job_apply_modal').modal('show');
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
      <!--Job apply modal-->
      <form action="resources/job_apply_form_action.php" method="POST">      
      <div class="modal fade" id="student_job_apply_modal" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="job_apply_modal_body">              
            </div>
        </div>
    </div>
  </form>





</html>
