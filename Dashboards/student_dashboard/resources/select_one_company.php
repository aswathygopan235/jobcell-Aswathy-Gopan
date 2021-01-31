<?php
/*session_start();*/
if(isset($_REQUEST["company_id"])){
	$output='';
	include_once '../../../connection.php'; // MySQL Connection
	$query  =$con->prepare("SELECT * FROM company WHERE id = ?");
	$query->bind_param("s",$_REQUEST["company_id"] );
	$query->execute();
    $result =$query->get_result();
    $output .= '  
      <div class="table-responsive">  
           <table class="table table-hover table-bordered">';
    while ($row = $result->fetch_assoc()) {
    	$output.='
    			<tr>  
                     <td width="30%"><label>Company code</label></td>  
                     <td width="70%">'.$row["company_code"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Company name</label></td>  
                     <td width="70%">'.$row["company_name"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Company email</label></td>  
                     <td width="70%"><a href="'.$row["company_contact_email"].'">'.$row["company_contact_email"].'</a></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Company website</label></td>  
                     <td width="70%"><a href="'.$row["company_website"].'">'.$row["company_website"].'</a></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Company contact number</label></td>  
                     <td width="70%">'.$row["company_contact_no"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Company Information</label></td>  
                     <td width="70%">'.$row["company_info"].'</td>  
                </tr>              

                ';


	}
	$output.='</table>
    </div>';
}
echo $output;

?>