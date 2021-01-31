<?php
include '../../../connection.php';
$query=$con->prepare("SELECT * FROM company");
$query->execute();
$output="";
	$result=$query->get_result();
	$count=$result->num_rows;
	if($count<=0){
		$output.='
		<div class="callout callout-info">                
           <p class="lead">No Records found.</p>
        </div>';
	}else{
	while($row=$result->fetch_assoc()){
		$output.='
	
		<div class="callout callout-info"> 
		<div class="row">
		<div class="col-md-3 ">
		 <strong><i class="fas fa-qrcode mr-1"></i>Company code</strong>
                <p class="text-muted">
                '.$row["company_code"].'
                </p>
        </div>
        <div class="col-md-6">
		 <strong></i>Company Name</strong>
                <p class="text-muted">
                '.$row["company_name"].'
                </p>
        	</div>
        	
        </div>
        <hr>
        <div class="row">
        	<div class="col-md-3 border-right">
		 <strong><i class="fas fa-pencil-alt mr-1"></i>Actions</strong>
		</div>
		<div class="col-sm-2">
					<a type="button" name="viewCompanyBtn" id="viewCompanyBtn" value="view_company"  class="view_company action_icon" href="admin_view_one_company.php?id='.$row["id"].'">
                			<span class="far fa-building view_company_icon action_icon" data-toggle="tooltip" title="View Company profile"></span>
            			</a>
					</div>
					</div>
			</div>
        </div>
    
     
		';
	}
}
echo $output;


?>