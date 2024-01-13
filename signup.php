<?php
session_start();
include('includes/config.php');
error_reporting(0);
// Code for Add New Sub Admi
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $gender = $_POST['gender'];
    $stmt = $con->prepare("insert into tbluser(name,email,password,phone,username,gender ) values('$name','$email','$password','$phone','$username','$gender')");
    $stmt->execute();
    if ($stmt) {
        echo "<script>alert('user details added successfully.');</script>";
        echo "<script type='text/javascript'> document.location ='index.php'; </script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
        echo "<script type='text/javascript'> document.location ='signup.php'; </script>";
    }
} else {


?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>ALTOFAN</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--jQuery library-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!--Latest compiled and minified JavaScript-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/signup.css">

</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">ALTOFAN</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php"> Home</a></li>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container signup">
        <div class="row">
            <div class="col-xs-4"></div>
            <div class="col-xs-4 form">
                <h1> Sign up </h1>
                <form method="POST" action="signup.php">
                    <div class="form-group">
                        <input class="form-control" placeholder="Name" type="text" name="name" required="true">

                        <br>

                        <input class="form-control" placeholder="Email" type="text" name="email">

                        <br>

                        <input class="form-control" placeholder="Password" type="password" name="password">

                        <br>

                        <input class="form-control" placeholder="Contact" type="text" name="phone" required="true">

                        <br>

                        <input class="form-control" placeholder="username" type="text" name="username" required="true">

                        <br>
                        <label for="gender">gender</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="0">famel</option>
                            <option value="1">Male</option>
                            <option value="2">other</option>
                        </select>
                        <br>

                        <button class="btn btn-primary" type="submit" name="submit">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <center>
                <p>Copyright © AFA. </p>
            </center>
        </div>
    </footer>
</body>

</html>

<?php } ?>