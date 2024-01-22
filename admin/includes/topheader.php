<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('includes/config.php');
error_reporting(0);?>
<head>
    <title>ALTOFAN</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.png">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
    <script src="assets/js/modernizr.min.js"></script>
    <!-- Summernote css -->
    <link href="../plugins/summernote/summernote.css" rel="stylesheet" />
    <!-- Select2 -->

    <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- Jquery filer css -->
    <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
    <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <script>
    function checkAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'username=' + $("#sadminusername").val(),
            type: "POST",
            success: function(data) {
                $("#user-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }
    </script>
</head>
<?php
                       $user_name= $_SESSION['login'];
                        $stmt = $con->prepare("SELECT profile_imge FROM `tbladmin` WHERE AdminUserName=:user_name");
                        $stmt->bindParam(':user_name', $user_name);
                      $stmt->execute();
                      $cout= $stmt->rowCount();
                      $user_photo = $stmt->fetchColumn();
                      if (empty($user_photo)) {
                        // Set default/placeholder image path
                        $user_photo = 'assets/images/avatar-1.jpg';
                    }
                        
                        ?>

<body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">
        <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left">


                <a href="index.php" class="logo">
                    <span>
                        <img src="assets/images/logo.png" alt="" height="60">
                    </span>

                </a>

            </div>

            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container">

                    <!-- Navbar-left -->
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <button class="button-menu-mobile open-left waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>


                    </ul>
                    <ul class="nav navbar-nav" style=" width: 50%; margin-top: 23px; color: red;">
                        <marquee behavior="scroll" direction="left" onmouseover="this.stop();"
                            onmouseout="this.start();"><b>Today Trending News : </b><b> about Gaza & Tofan Alaqsa
                                in</b> www.TOFAN.com</marquee>


                    </ul>

                    <div id="google_translate_element">

                    </div>
                    <!-- Right(Notification) -->
                    <ul class="nav navbar-nav navbar-right">
                    

                        <li class="dropdown user-box">
                            <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown"
                                aria-expanded="true">
                                <img src="../Login/profilephoto/<?php echo $user_photo ?>"  class="img-circle user-img">
                            </a>

                            <ul
                                class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                <li>

                                    <h5>Hi, <?php echo $user_name; ?> </h5>
                                </li>

                                <li><a href="change-password.php"><i class="ti-settings m-r-5"></i> Change Password</a>
                                </li>
                                <li>
                                <?php
                                $stmt = $con->prepare("Select * from  tbladmin");
                              $stmt->execute();
                              if ($stmt->rowCount()) {
                               ?> 
                                    
                                <a href="editingProfile.php?uname=<?php echo htmlentities($row['AdminUserName']); ?>" class="ti-settings m-r-5">Edit Profile<i></i></a>                              
                                <?php }?>
                            </li>

                                <li><a href="logout.php"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                            </ul>
                        </li>

                    </ul> <!-- end navbar-right -->

                </div><!-- end container -->
            </div><!-- end navbar -->
        </div>