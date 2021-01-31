<?php
    /*selecting the all applications query*/      
  $query1=$con->prepare("SELECT a.*,b.id,b.job_position_name,b.job_location,c.id,c.company_name,d.student_code FROM job_application AS a LEFT JOIN jobs AS b ON a.job_code=b.job_code LEFT JOIN company AS c ON a.company_code=c.company_code LEFT JOIN student AS d ON d.student_code=a.student_code WHERE d.id=?");
  $query1->bind_param("i",$_REQUEST["id"]);
  $query1->execute();
  $output='';
  $query1->store_result();
  $query1->bind_result($application_id,$application_code,$received_on,$job_code,$company_code,$student_code,$student_apply_info,$application_status,$job_id,$job_position_name,$job_location,$company_id,$company_name,$student_code);
  if($query1->num_rows<=0){  
    $output.='<div class="callout callout-info">                
           <p class="lead">No Records found.</p>
        </div>';
  }else{
    while($query1->fetch()){
      $output.='
     
  
    <div class="callout callout-success"> 
    <div class="row">
    <div class="col-md-3 ">
     <strong><i class="fas fa-qrcode mr-1"></i>Application code</strong>
                <p class="text-muted">
                '.$application_code.'
                </p>
      </div>
      <div class="col-md-3 ">
      <strong>Job position name</strong>
                <p class="text-muted">
                '.$job_position_name.'
                </p>
      </div>
      <div class="col-md-3 ">
      <strong><i class="fas fa-qrcode mr-1"></i>Application code</strong>
                <p class="text-muted">
                '.$application_code.'
                </p>
      </div>
      </div>
      </div>
      </div>
   

      ';
    }
}
 
  ?>