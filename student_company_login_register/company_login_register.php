<!DOCTYPE html>
<html>
<head>
	<title>Company Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style type="text/css">
		body {
 		 margin: 0;
  		font-family: Arial, Helvetica, sans-serif;
		}
		.hero-image {
		  background-image: url("assets/img/background_image_company.jpg");
		  background-color: #cccccc;
		  height: 800px;
		  background-position: center;
		  background-repeat: no-repeat;
		  background-size: cover;
		  position: relative;
		}
		.hero-text {
		  text-align: center;
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  transform: translate(-50%, -50%);
		  color: white;
		}
		.modalrow{
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<div class="hero-image">
		<div class="hero-text">
			<h1 style="font-size:50px">Welcome Company.</h1>
    <h3>Please register or login to continue</h3>
     <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#companyRegisterModal">
    Register
  </button>
  &nbsp;
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#companyLoginModal">
    Login
  </button>
  &nbsp;
   <a class="btn btn-secondary" href="student_login_register.php" role="button">Go to student page </a>
   &nbsp;
</div>
</div>
<form id="company_login_form" method="post" action="company_login_action.php">
 <!-- The Login Modal -->
  <div class="modal fade" id="companyLoginModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Company Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
        		<div class="container">
        			<div class="row modalrow">
        				<div class="col-md-3">
			        		<label for="user_email"><b>Email</b></label>
			        	</div>
			        	<div class="col">
			    			<input type="text" placeholder="Enter User email" name="user_email" id="user_email" style="width: 75%;"required>
			    		</div>
			    	</div>
			    	<div class="row modalrow">
        				<div class="col-md-3">
      						<label for="user_password"><b>Password</b></label>
      					</div>
      					<div class="col">
    						<input type="password" placeholder="Enter Password" name="user_password" required id="user_password" style="width: 55%;" >
    						<input type="checkbox" onclick="togglePasswordVisibility()">Show 
    					</div>
    				</div>
    				<div class="row modalrow">
    					<div class="col">
    						<a href="#">
    							<span data-toggle="modal" data-target="#companyRegisterModal" data-dismiss="modal">Register now
    							</span>
    						</a>
    					</div>
    				</div>   			   				
    			</div>
        	</form>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
	          <button type="submit" class="btn btn-success">Submit</button>       
	          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</form>
  <!-- The Register Modal -->
  <form id="company_login_form" method="post" action="company_register_action.php" onsubmit="return validateInfo();">
  <div class="modal fade" id="companyRegisterModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Company Registration</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
        		<div class="container">
        			<div class="row modalrow">
        				<div class="col-md-3">
			        		<label for="company_name"><b>Company name</b></label>
			        	</div>
			        	<div class="col">
			    			<input type="text" placeholder="Enter Company name" name="company_name" id="company_name" required style="width: 55%;">
			    		</div>
			    	</div>
			    	<div class="row modalrow">
        				<div class="col-md-3">
			        		<label for="company_email"><b>User and Login Email</b></label>
			        	</div>
			        	<div class="col">
			    			<input type="email" placeholder="Enter email for login purposes" name="company_email" id="company_email" required style="width: 55%;">
			    		</div>
			    	</div>
			    	<div class="row modalrow">
        				<div class="col-md-3">
			        		<label for="company_email"><b>Contact Email</b></label>
			        	</div>
			        	<div class="col">
			    			<input type="email" placeholder="Enter email for enquiries" name="company_contact_email" id="company_contact_email" required style="width: 55%;">
			    		</div>
			    	</div>
			    	<div class="row modalrow">
        				<div class="col-md-3">
			        		<label for="company_website"><b>Website</b></label>
			        	</div>
			        	<div class="col">
			    			<input type="urll" placeholder="Enter company website" name="company_website" id="company_website" required style="width: 55%;">
			    		</div>
			    	</div>
			    	<div class="row modalrow">
        				<div class="col-md-3">
			        		<label for="company_contact_no"><b>Contact number</b></label>
			        	</div>
			        	<div class="col">
			    			<input type="text" placeholder="Enter Contact number" name="company_contact_no" id="company_contact_no" required style="width: 55%;">
			    		</div>
			    	</div>	
			    	<div class="row modalrow">
        				<div class="col-md-3">
			        		<label for="company_info"><b>Company information</b></label>
			        	</div>
			        	<div class="col">
			    			<textarea id="company_info" name="company_info" rows="5" cols="50" required placeholder="Enter a short description about the company"></textarea>
			    		</div>
			    	</div>			    
			    	<div class="row modalrow">
        				<div class="col-md-3">
      						<label for="crt_password"><b>Password</b></label>
      					</div>
      					<div class="col">
    						<input type="password" placeholder="Enter Password" name="crt_password" required id="crt_password" >   						
    					</div>
    				</div>
    				<div class="row modalrow">
        				<div class="col-md-3">
      						<label for="confirm_password"><b>Confirm Password</b></label>
      					</div>     					
	    				<div class="col">
	    						<input type="password" placeholder="Re-enter Password" name="confirm_password" required id="confirm_password" >   				
	    				</div>
    				</div>
    				<div class="row modalrow">
    					<div class="col">
    						<a href="#">
    							<span data-toggle="modal" data-target="#companyLoginModal" data-dismiss="modal">I already have an account
    							</span>
    						</a>
    					</div>
    				</div>   									
	   			</div>
	   		</div>
        <!-- Modal footer -->
        <div class="modal-footer">	        
	          <button type="submit" class="btn btn-success" >Submit</button>       
	          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</form>
<script type="text/javascript">
	function togglePasswordVisibility(){
	  var x = document.getElementById("user_password");
	  if (x.type === "password") {
	    x.type = "text";
	  } else {
	    x.type = "password";
	  }
	}
	function validateInfo(){
		var contact_no=document.getElementById("contact_no");
		var crt_password=document.getElementById("crt_password");
		var confirm_password=document.getElementById("confirm_password");
		if(crt_password.value!==confirm_password.value){
			alert("Please recheck passwords");
			return false;
		}
		else if (isNaN(contact_no)){
			alert("Please enter numbers");
			return false;
		}
		else{
			return true;
		}
	}
</script>
</body>
</html>