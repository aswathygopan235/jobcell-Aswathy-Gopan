<!DOCTYPE html>
<html>
<head>
	<title>Student Page</title>
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
		  background-image: url("assets/img/background_image_student.jpg");
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
			<h1 style="font-size:50px">Welcome Student.</h1>
    <h3>Please register or login to continue</h3>
     <!-- Button to Open the Modal -->
    
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentRegisterModal">
    Register
  </button>

&nbsp;
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentLoginModal">
    Login
  </button>

&nbsp;
   <a class="btn btn-secondary" href="company_login_register.php" role="button">Go to company page </a>

</div>
</div>
</div>
<form id="student_login_form" method="post" action="student_login_action.php">
 <!-- The Login Modal -->
  <div class="modal fade" id="studentLoginModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Student Login</h4>
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
			    			<input type="text" placeholder="Enter User email" name="user_email" id="user_email" required style="width:75%;">
			    		</div>
			    	</div>
			    	<div class="row modalrow">
        				<div class="col-md-3">
      						<label for="user_password"><b>Password</b></label>
      					</div>
      					<div class="col">
    						<input type="password" placeholder="Enter Password" name="user_password" required id="user_password" >
    						<input type="checkbox" onclick="togglePasswordVisibility()">Show 
    					</div>
    				</div>
    				<div class="row modalrow">
    					<div class="col">
    						<a href="#">
    							<span data-toggle="modal" data-target="#studentRegisterModal" data-dismiss="modal">Register now
    							</span>
    						</a>
    					</div>
    				</div>   			   				
    			</div>
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
  <form id="student_login_form" method="post" action="student_register_action.php" onsubmit="return validateInfo();">
  <div class="modal fade" id="studentRegisterModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Student Registration</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
        		<div class="container">
        			<div class="row modalrow">
        				<div class="col-md-3">
			        		<label for="first_name"><b>First name</b></label>
			        	</div>
			        	<div class="col">
			    			<input type="text" placeholder="Enter First name" name="first_name" id="first_name" required>
			    		</div>
			    	</div>
			    	<div class="row modalrow">
        				<div class="col-md-3">
			        		<label for="last_name"><b>Last name</b></label>
			        	</div>
			        	<div class="col">
			    			<input type="text" placeholder="Enter Last name" name="last_name" id="last_name" required>
			    		</div>
			    	</div>
			    	<div class="row modalrow">
        				<div class="col-md-3">
			        		<label for="gender"><b>Gender</b></label>
			        	</div>
			        	<div class="col">
			    			<input type="radio" name="gender" id="male" value="Male" required>
			    			<label for="male">Male</label>
			    		</div>
			    		<div class="col">
			    			<input type="radio" name="gender" id="female" value="Female" required>
			    			<label for="female">Female</label>
			    		</div>
			    		<div class="col">
			    			<input type="radio" name="gender" id="others" value="Others" required>
			    			<label for="others">Others</label>
			    		</div>
			    	</div>
			    	<div class="row modalrow">
        				<div class="col-md-3">
			        		<label for="dob"><b>Date of birth</b></label>
			        	</div>
			        	<div class="col">
			    			<input type="date" name="dob" id="dob" required>
			    		</div>
			    	</div>
			    	<?php
			    	include '../connection.php';
			    	$query=$con->prepare("SELECT * FROM course");
			    	$query->execute();
			    	$result=$query->get_result();
			    	$count=$result->num_rows;
			    	if($count===0){
			    		exit("No courses added");
			    	}else{   	
			    	?>
			    	<div class="row modalrow">
        				<div class="col-md-3">
			        		<label for="course"><b>Course</b></label>
			        	</div>
			        	<div class="col">
			    			<select id="course" name="course" id="course" required>
			    				<option value="">-Select-</option>
			    				<?php			    							    			
			    		while($row=$result->fetch_assoc()){		 
			    				?>
			    				<option value='<?php echo $row["course_code"]?>'><?php echo $row["course_name"]?></option>
			    			<?php }
			    		}?>
			    			</select>
			    		</div>
			    	</div>
			    	<div class="row modalrow">
        				<div class="col-md-3">
			        		<label for="grad_month_year"><b>Graduating month and year</b></label>
			        	</div>
			        	<div class="col">
			    			<input type="month" name="grad_month_year" id="grad_month_year" required>
			    		</div>
			    	</div>
			    	<div class="row modalrow">
        				<div class="col-md-3">
			        		<label for="email"><b>Email</b></label>
			        	</div>
			        	<div class="col">
			    			<input type="email" placeholder="Enter email" name="email" id="email" required style="width:75%;">
			    		</div>
			    	</div>
			    	<div class="row modalrow">
        				<div class="col-md-3">
			        		<label for="contact_no"><b>Contact number</b></label>
			        	</div>
			        	<div class="col">
			    			<input type="text" placeholder="Enter Contact number" name="contact_no" id="contact_no" required>
			    		</div>
			    	</div>	
			    	<div class="row modalrow">
        				<div class="col-md-3">
			        		<label for="contact_no"><b>Skills</b></label>
			        	</div>
			        	<div class="col">
			    			<textarea id="skills" name="skills" rows="5" cols="50" required placeholder="Enter some skills you have"></textarea>
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
    							<span data-toggle="modal" data-target="#studentLoginModal" data-dismiss="modal">I already have an account
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
		var course=document.getElementById("course");
		if(crt_password.value!==confirm_password.value){
			alert("Please recheck passwords");
			return false;
		}
		else if (!isNaN(contact_no)){
			alert("Please enter numbers");
			return false;
		}
		else if(course.value==""){
			alert("Select a course");
			return false;
		}
		else{
			return true;
		}
	}
</script>

</body>
</html>