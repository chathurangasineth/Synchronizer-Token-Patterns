<?php

session_start();

function generateToken( $formName )
{

return $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
}

function validateToken( $token)
{

    return $token ===$_SESSION['csrf_token'];
}


if (!$_SESSION["loged"]) {

    header('Location: csrftoken.php');
    exit();

	} else {

    echo '<div class="container">  <div class="alert alert-success alert-dismissible fade in">

			<strong> Welcome Sineth! </strong>
			</div>
		</div>';

}
if (isset($_POST['csrf_token']) && isset($_POST['mobilenum']) && isset($_POST['nickname'])) {

    if (validateToken($_POST['csrf_token'])) {
      echo '<div class="container">  <div class="alert alert-success alert-dismissible fade in">
				Profile Information Updated
			</div>
		</div>';
		
    } else {

      echo '<div class="container">  <div class="alert alert-danger alert-dismissible fade in">
				Invalid CSRF Token
			</div>
		</div>';
    }
}



?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Update Your Profile Information</div>

                    </div>

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                        <form id="loginform" class="form-horizontal" role="form" method="post" action="csrftoken.php">

                            <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">Mobile Number</span>
                                        <input id="MobNum" type="text" class="form-control" name="mobilenum" value="" placeholder="Mobile Number">
                                    </div>

                            <div style="margin-bottom: 25px" class="input-group">
                              <span class="input-group-addon">Nick Name</span>
                                  <input id="NickName" type="text" class="form-control" name="nickname" value="" placeholder="Nick Name">
                                    </div>


                                    <div style="margin-bottom: 25px" class="input-group">

                                          <input id="login-username" type="hidden" class="form-control" name="csrf_token" value=<?php echo '"' . generateToken('sec') . '"';?>>
                                            </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
									
									
									<button id="btn-bd" class="btn btn-lg btn-primary btn-block btn-signin" value="update" type="submit">Update Profile</button>
                                                                       
									<a href="signout.php">Sign out</a> 
                                    </div>

                                </div>
</form>
