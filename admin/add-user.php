<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
   header('location:index.php');
} else {

   // Code for Add New Sub Admi
   if (isset($_POST['submit'])) {
      $uname = $_POST['username'];
      $fname = $_POST['fullname'];
      $email = $_POST['emailid'];
      $password = md5($_POST['pwd']);
      $phone = $_POST['phone'];
      $userid = $_POST['userid'];
      $gender = $_POST['gender'];
      $photo=$_POST['userigme'];
      $stmt = $con->prepare("insert into tbluser(name,email,password,phone,username,gender,user_profile ) values('$fname','$email','$password','$phone','$uname','$gender','$photo')");
      $stmt->execute();
      if ($stmt) {
         echo "<script>alert('user details added successfully.');</script>";
         echo "<script type='text/javascript'> document.location = 'add-subadmins; </script>";
      } else {
         echo "<script>alert('Something went wrong. Please try again.');</script>";
      }
   }

?>


<?php include('includes/topheader.php'); ?>
<!-- Top Bar End -->
<!-- ========== Left Sidebar Start ========== -->
<?php include('includes/leftsidebar.php'); ?>
<!-- Left Sidebar End -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Add user</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">Admin</a>
                            </li>
                            <li>
                                <a href="#">Subadmin </a>
                            </li>
                            <li class="active">
                                Add user
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>Add user </b></h4>
                        <hr />
                        <div class="row">
                            <form class="row" name="addsuadmin" method="post">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputusername">Username (used for login)</label>
                                    <input type="text" placeholder="Enter  Username" name="username" id="username"
                                        class="form-control" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$"
                                        title="Username must be alphanumeric 6 to 12 chars" onBlur="checkAvailability()"
                                        required>
                                    <span id="user-availability-status" style="font-size:14px;"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputusername">Full Name</label>
                                    <input type="text" placeholder="Enter  Username" name="fullname" id="fullname"
                                        class="form-control" required>
                                    <span id="user-availability-status" style="font-size:14px;"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emailid">Email</label>
                                    <input type="email" class="form-control" id="emailid" name="emailid"
                                        placeholder="Enter email" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="pwd" name="pwd"
                                        placeholder="Enter password" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="gender">gender</label>
                                    <select class="form-control" id="gender" name="gender">
                                        <option value="0">famel</option>
                                        <option value="1">Male</option>
                                        <option value="">other</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">phone</label>
                                    <input class="form-control" id="phone" placeholder="Contact" type="text"
                                        name="phone" required="true">
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                       <div class="card-box">
                                          <h4 class="m-b-30 m-t-0 header-title"><b>profile Image</b></h4>
                                          <input type="file" class="form-control" id="userigme" name="userigme" >
                                       </div>
                                    </div>
                                 </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-custom waves-effect waves-light btn-md"
                                            id="submit" name="submit">
                                            Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- container -->
    </div>
    <!-- content -->
    <?php include('includes/footer.php'); ?>


    <?php } ?>