<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
  
if(isset($_POST['submit']))
{
    $user=$_SESSION['login'];
  $username=$_POST['username'];
$password=md5($_POST['newpassword']);
                          $stmt=$con->prepare("select id from tbladmin where AdminUserName='$user' "); 
                            $stmt->execute(); 

                           $ret= $stmt->rowCount();   
  if($ret>0){
      $stmt1=$con->prepare("update tbladmin set AdminPassword='$password'  where AdminUserName='$username' "); 
                            $stmt1->execute(); 
     if($stmt1)
 {
echo "<script>alert('Password successfully changed');</script>";
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";

 }
   
  }
  else{
  
    echo "<script>alert('Invalid Details. Please try again.');</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ALTOFAN.">
    <meta name="author" content="xyz">
    <title>ALTOFAN | Password</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/core.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    <script src="assets/js/modernizr.min.js"></script>
    <script type="text/javascript">
        function checkpass() {
            if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
                alert('New Password and Confirm Password field does not match');
                document.changepassword.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head>

<body class="bg-transparent">
<?php include('includes/topheader.php'); ?>

<section>
    <?php include('includes/leftsidebar.php'); ?>
    <div class="container-alt">
        <div class="row">
            <div class="col-sm-12">
                <div class="wrapper-page">
                    <div class="m-t-40 account-pages">
                        <div class="text-center account-logo-box">
                            <h2 class="text-uppercase">
                                <a href="index.php" class="text-success">
                                    <span><img src="assets/images/logo.png" alt="" height="56"></span>
                                </a>
                            </h2>
                        </div>
                        <div class="account-content">
                            <form class="form-horizontal" method="post" name="changepassword" onsubmit="return checkpass();">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="text" required="" name="username" placeholder="Username" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input type="password" class="form-control" id="userpassword" name="confirmpassword" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input type="password" class="form-control" id="userpassword" name="newpassword" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="form-group account-btn text-center m-t-10">
                                    <div class="col-xs-12">
                                        <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit" name="submit">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var resizefunc = [];
</script>
<?php include('includes/footer.php'); ?>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>

<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

</body>
</html>
<?php } ?>