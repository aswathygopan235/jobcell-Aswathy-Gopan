<?php
include '../../../connection.php';
$query1=$con->prepare("SELECT a.*,b.id,b.company_code,b.company_name FROM jobs AS a LEFT JOIN company as b ON a.company_code=b.company_code");
 $output='<h3><i class="fas fa-briefcase fa-3x"></i>All jobs</h3>';

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
  if($query1->num_rows<=0){  
    $output.='

    <div class="callout callout-info">                
           <p class="lead">No Records found.</p>
        </div>';
  }else{
    while($query1->fetch()){
      $output.='
     
  
    <div class="callout callout-success"> 
    <div class="row">
    <div class="col-md-3 ">
     <strong><i class="fas fa-qrcode mr-1"></i>Job code</strong>
                <p class="text-muted">
                '.$job_code.'
                </p>
      </div>
       <div class="col-md-3 ">
     <strong>Job position name</strong>
                <p class="text-muted">
                '.$job_position_name.'
                </p>
      </div>
       <div class="col-md-3 ">
       <strong>Company name</strong>
                <p class="text-muted">
                '.$company_name.'
                </p>
      </div>
        <div class="col-md-3 ">
       <strong>Job field</strong>
                <p class="text-muted">
                '.$field.'
                </p>
      </div>
      </div>
      <hr>
      <div class="row">
      <div class="col-md-3"><strong>Actions</strong></div>
      <div class="col-sm-1">
          <a type="button" name="viewJobBtn" id="viewJobBtn" value="view_job"  class="view_job action_icon" href="admin_view_one_job.php?id='. $job_id.'">
                      <span class="fas fa-briefcase view_job_icon action_icon" data-toggle="tooltip" title="View job"></span>
                  </a>
          </div>
     
      </div>
      </div>



      ';
  }
}
echo $output;
?>