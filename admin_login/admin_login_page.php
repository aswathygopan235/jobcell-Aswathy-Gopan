<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="toastr.css" rel="stylesheet"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"></script>
  <!-- <link href="toastr.css" rel="stylesheet"/>
  <script src="toastr.js"></script> -->
	<style type="text/css">
		body {
 		 margin: 0;
  		font-family: Arial, Helvetica, sans-serif;
		}
		.hero-image {
		  background-image: url("background_image_admin.jpg");
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
		  top: 25%;
		  left: 50%;
		  transform: translate(-50%, -50%);
		  color: black;
		}
		.modalrow{
			margin-top: 10px;
		}
		.mymodal{
			  padding-left: 500px;
    width: 1050px;
    padding-top: 250px;
    border-left-width: 500px;
		}s
	</style>
</head>
<body>
	<div class="hero-image">
		<div class="hero-text">
			<h1 style="font-size:50px">Welcome Admin.</h1>
    		<h3>Please login to continue</h3>
    </div>
   <div class="mymodal">
    <form id="admin_login_form" method="post" action="admin_login_action.php">
 			<!-- The Login Modal -->
      <div class="modal-content" id="loginform">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Admin Login</h4>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
        			<div class="row modalrow">
        				<div class="col-md-3">
			        		<label for="username"><b>Username</b></label>
			        	</div>
			        	<div class="col">
			    			<input type="text" placeholder="Enter Username" name="username" id="username" required style="width:75%;">
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
        	</div>
        <!-- Modal footer -->
        <div class="modal-footer">
	          <button type="submit" class="btn btn-success">Submit</button>       
	          <button type="reset" class="btn btn-primary">Clear</button>
        </div>
      </div>
    	</form>
</div>
</div>
    <script type="text/javascript">
	function togglePasswordVisibility(){
	  var x = document.getElementById("user_password");
	  if (x.type === "password") {
	    x.type = "text";
	  } else {
	    x.type = "password";
	  }
	}
	toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};
</script>
</body>
</html>
