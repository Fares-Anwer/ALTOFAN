<?php
session_start();
//Database Configuration File
include('includes/config.php');
// error_reporting(0);

if(isset($_POST['login'])) {
 

    // Getting username/ email and password
    $uname = $_POST['username'];
    $password = md5($_POST['password']);
    // Fetch data from database on the basis of username/email and password
    $stmt = $con->prepare("SELECT AdminUserName,AdminEmailId,AdminPassword,userType FROM tbladmin WHERE AdminUserName= :uname AND AdminPassword= :password");
    $stmt->bindParam(':uname', $uname);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $conut = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($conut > 0) {
        $_SESSION['login'] = $_POST['username'];
        $_SESSION['utype'] = $conut['userType'];
        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    } else {
        echo "<script>alert('Invalid Details');</script>";
  }
}else{
?>
<!DOCTYPE html>
<head>
	<title>Admin login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="assets/js/modernizr.min.js"></script>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="Login/images/icons/favicon.ico"/>
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="Login/css/main.css">
    <!--===============================================================================================-->
    <script src="assets/js/modernizr.min.js"></script>

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
		<div class="container-login100" style="background-image: url('Login/images/TUFAN.png');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Admin Login
				</span>
				<form method="post" class="login100-form m p-b-33 p-t-5"  action="index.php">

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
					
						<a href="../index.php"><i class="mdi mdi-home"></i> Back Home</a>
					</div>

			
				
			

    <!-- HOME -->
    <section>
        <div class="container m-t-50">
            <div class="row align-items-center m-t-50">
                <div class="col-md-8 text-center">
                    <img src="assets/images/backgr.jpg" width="auto">
                </div>
                <div class="col-md-4 ">

                    <div class="wrapper-page">

                        <div class="m-t-40 account-pages">
                            <div class="account-logo-box">
                                <h2 class="text-uppercase">
                                    <a href="index.php" class="text-success">
                                        <span><img src="assets/images/.jpg" alt="" width="350px"></span>
                                    </a>
                                </h2>
                                <p>Please sign-in to your account and start the adventure</p>
                                <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                            </div>
                            <div class="account-content">
                                <form class="form-horizontal" method="post">
                                    <div class="form-group ">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="text" required="" name="username"
                                                placeholder="Username or email" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="text-right mb-2"><a href="forgot-password.php"><i
                                                class="mdi mdi-lock"></i> Forgot your password?</a></div>


                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="password" name="password" required=""
                                                placeholder="Password" autocomplete="off">
                                        </div>
                                    </div>



                                    <div class="form-group account-btn text-center m-t-10">
                                        <div class="col-xs-12">
                                            <button class="btn btn-custom waves-effect waves-light btn-md w-100"
                                                type="submit" name="login">Log In</button>
                                        </div>
                                    </div>

                                </form>
                                <div class="text-center">
                                    <a href="../index.php"><i class="mdi mdi-home"></i> Back Home</a>
                                </div>
                            </div>
                        </div>
                        <!-- end card-box-->




                    </div>
                    <!-- end wrapper -->

                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->

	<div id="dropDownSelect1"></div>
	
    <script>
    var resizefunc = [];
    </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>


<!--===============================================================================================-->


</body>
</html>
<?php } ?>