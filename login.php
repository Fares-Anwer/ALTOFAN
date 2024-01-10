<?php
session_start();
//Database Configuration File
include('includes/config.php');
// error_reporting(0);

if(isset($_POST['login'])) {
 

    // Getting username/ email and password
    $username = $_POST['username'];
    $passwd = md5($_POST['password']);
    // Fetch data from database on the basis of username/email and password
    $stmt = $con->prepare("SELECT name,email,password,phone,username,gender FROM tbluser WHERE username=:username AND password= :passwd");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':passwd', $passwd);
	$stmt->execute();
    $conut = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($conut > 0) {
        $_SESSION['login'] = $_POST['username'];
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    } else {
        echo "<script>alert('Invalid Details');</script>";
		        echo "<script type='text/javascript'> document.location = 'login.php'; </script>";

  }
}else{
?>
<!DOCTYPE html>
<head>
	<title>User login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="admin/assets/js/modernizr.min.js"></script>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="admin/Login/images/icons/favicon.ico"/>
	<link href="admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/Login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/Login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="admin/Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/Login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="admin/Login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="admin/Login/css/main.css">
    <!--===============================================================================================-->
    <script src="admin/assets/js/modernizr.min.js"></script>

</head>
<style>
	.forget :hover a{
	
		color:rgb(187, 64, 181);
	}
	.back :hover a{
		color: rgb(255, 0, 0);
	}
</style>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('admin/Login/images/TUFAN.png');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					User Login
				</span>
				<form method="post" class="login100-form m p-b-33 p-t-5" >

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" required="" name="username" placeholder="Username or email" autocomplete="off" autofocus>
						<span class="focus-input100"></span>
					</div>
					
                 
                    <div class="forget">
					<div class="text-right mb-2"><a href="forgot-password.php"><i class="mdi mdi-lock"></i> Forgot your password?</a></div>
				  
					
                   <div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password" required="" placeholder="Password" autocomplete="off">
						<span class="focus-input100"></span>
					</div>
                  
				 
                    <div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" type="submit" name="login">
							Login
						</button>
					</div>
					</form>
                    <div class="back">
					<div class="text-center m-t-32">
					
						<a href="../index.php"><i class="mdi mdi-home"></i> Back Home</a> <br>
						<a align="center" href="signup.php">create a new acount </a>
					</div>
					
                    </div>
                    <!-- end wrapper -->

                </div>
            </div>
        </div>
 
    <!-- END HOME -->

	<div id="dropDownSelect1"></div>
	
    <script>
    var resizefunc = [];
    </script>

        <!-- jQuery  -->
        <script src="admin/assets/js/jquery.min.js"></script>
        <script src="admin/assets/js/detect.js"></script>
        <script src="admin/assets/js/fastclick.js"></script>
        <script src="admin/assets/js/jquery.blockUI.js"></script>
        <script src="admin/assets/js/waves.js"></script>
        <script src="admin/assets/js/jquery.slimscroll.js"></script>
        <script src="admin/assets/js/jquery.scrollTo.min.js"></script>


<!--===============================================================================================-->


</body>
</html>
<?php } ?>