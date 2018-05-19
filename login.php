<?php

session_start();

	 if (isset($_SESSION["loged"])) {
	 	 	header('Location: csrftoken.php');
	 	 	exit();

		 }else {
			
			 		if (isset($_POST['username']) && isset($_POST['password'])){
			
			if($_POST['username'] == "sineth" && $_POST['password']=="password"){
				$_SESSION["loged"] =$_POST['username'] .$_POST['password'];
				header('Location: csrftoken.php');
			}else {
			echo '<div class="alert alert-danger">Username or Password is Invalid!</div>';
				  }
			}
		 
	 }
	
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


    <div class="container">
		<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-3">
		
			<div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Synchronizer Token Patterns Demo
						</div>

                    </div>

			</div>			
						<div class="card card-container">		
						   
							
							<p id="profile-name" class="profile-name-card"></p>
							
							<form id="loginform" class="form-horizontal" role="form" method="post" action="login.php">
								
								<span id="reauth-email" class="reauth-email"></span>
								<input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Username">
								<input id="login-password" type="password" class="form-control" name="password" placeholder="Password">
								
								<div id="remember" class="checkbox">
									<label>
										<input type="checkbox" value="remember-me"> Remember me
									</label>
								</div>
								
								<button id="btn-login" class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
							</form>
							
							<a href="#" class="forgot-password">Forgot the password?</a>
						
						</div><!-- /card-container -->
		</div>
		
    </div><!-- /container -->