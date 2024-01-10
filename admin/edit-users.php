<?php
   session_start();
   include('includes/config.php');
   error_reporting(0);
   if(strlen($_SESSION['login'])==0)
     { 
   header('location:index.php');
   }
   else{
   if(isset($_POST['submit']))
   {
   $aid=intval($_GET['said']);
   $email=$_POST['emailid'];
   $stmt=$con->prepare("Update  tbluser set email='$email'  where username='$aid'");   
   $stmt->execute(); 
   if($stmt)
   {
   echo "<script>alert('user details updated.');</script>";
   }
   else{
   echo "<script>alert('Something went wrong . Please try again.');</script>";
   } 
   }
   
   
   ?>

         <?php include('includes/topheader.php');?>
         <!-- Top Bar End -->
         <!-- ========== Left Sidebar Start ========== -->
         <?php include('includes/leftsidebar.php');?>
         <!-- Left Sidebar End -->
         <div class="content-page">
            <!-- Start content -->
            <div class="content">
               <div class="container">
                  <div class="row">
                     <div class="col-xs-12">
                        <div class="page-title-box">
                           <h4 class="page-title">Edit user</h4>
                           <ol class="breadcrumb p-0 m-0">
                              <li>
                                 <a href="#">Admin</a>
                              </li>                            
                              <li class="active">
                                 Edit user
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
                           <h4 class="m-t-0 header-title"><b>Edit user </b></h4>
                           <hr />
                           <div class="row">
                              <div class="col-sm-6">
                                 <!---Success Message--->  
                                 <?php if($msg){ ?>
                                 <div class="alert alert-success" role="alert">
                                    <strong>Well done!</strong> <?php echo htmlentities($msg);?>
                                 </div>
                                 <?php } ?>
                                 <!---Error Message--->
                                 <?php if($error){ ?>
                                 <div class="alert alert-danger" role="alert">
                                    <strong>Oh snap!</strong> <?php echo htmlentities($error);?>
                                 </div>
                                 <?php } ?>
                              </div>
                           </div>
                           <?php 
                              $aid=$_GET['said'];
                              $stmt=$con->prepare("Select * from  tbluser where username='$aid'"); 
                              $stmt->execute(); 
                            $cnt=1;
                        if ($stmt->rowCount()) {
                             foreach ($stmt->fetchAll() as $row)
                              {
                              ?>
                           <div class="row">
                              <form class="row" name="suadmin" method="post">
                                 <div class="form-group col-md-6">
                                    <label class="control-label">Username</label>
                                    <input type="text" class="form-control" value="<?php echo htmlentities($row['name']);?>" name="adminusernmae" readonly>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label class=" control-label">Emailid</label>
                                    <div class="">
                                       <input type="text" class="form-control" value="<?php echo htmlentities($row['email']);?>" name="emailid" required>
                                    </div>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label class="control-label">Creation Dtae</label>
                                       <input type="text" class="form-control" value="<?php echo htmlentities($row['phone']);?>" name="cdate" readonly>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label class="control-label">Updation date</label>
                                       <input type="text" class="form-control" value="<?php echo htmlentities($row['username']);?>" name="udate" readonly>
                                 </div>
                                 <?php } }?>
                                 <div class="form-group col-md-12">
                                       <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                                       Update
                                       </button>
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
            <?php include('includes/footer.php');?>
   
         
<?php } ?>