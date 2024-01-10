<?php
   session_start();
   include('includes/config.php');
   error_reporting(0);
   if(strlen($_SESSION['login'])==0)
     { 
   header('location:index.php');
   }
   else{
   
   // Code for Forever deletionparmdel
   if($_GET['action']=='del' && $_GET['rid'])
   {
    $id=$_GET['rid'];
    $stmt=$con->prepare("delete from  tbluser  where username='$id'");   
    $stmt->execute();
   echo "<script>alert('user details deleted.');</script>";
   echo "<script type='text/javascript'> document.location = 'manage-users.php'; </script>";
   }
   
   ?>

         <?php include('includes/topheader.php');?>
         <!-- ========== Left Sidebar Start ========== -->
         <?php include('includes/leftsidebar.php');?>
         <!-- Left Sidebar End -->
         <!-- ============================================================== -->
         <!-- Start right Content here -->
         <!-- ============================================================== -->
         <div class="content-page">
            <!-- Start content -->
            <div class="content">
               <div class="container">
                  <div class="row">
                     <div class="col-xs-12">
                        <div class="page-title-box">
                           <h4 class="page-title">Manage users</h4>
                           <ol class="breadcrumb p-0 m-0">
                              <li>
                                 <a href="#">users </a>
                              </li>
                              <li class="active">
                                 Manage users
                              </li>
                           </ol>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
                  <!-- end row -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="demo-box m-t-20">
                           <div class="m-b-30">
                              <a href="aadd-subadmins.php">
                              <button id="addToTable" class="btn btn-custom waves-effect waves-light btn-md">Add <i class="mdi mdi-plus-circle-outline" ></i></button>
                              </a>
                           </div>
                           <div class="table-responsive">
                              <table class="table m-0  table-bordered" id="example">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th> name</th>
                                       <th>Email</th>
                                       <th>phone</th>
                                       <th>gender</th>
                                       <th> username:id</th>
                                       <th></th>
                                       
                                    </tr>
                                 </thead><?php include('includes/footer.php');?>
   
                                 <tbody>
                                    <?php 
                                         $stmt=$con->prepare("Select name,email,password,phone,username,gender from  tbluser"); 
                                         $stmt->execute(); 
                                          $cnt=1;
                                          if ($stmt->rowCount()) {
                                           foreach ($stmt->fetchAll() as $row)
                                       {
                                       ?>
                                    <tr>
                                       <th scope="row"><?php echo htmlentities($cnt);?></th>
                                       <td><?php echo htmlentities($row['name']);?></td>
                                       <td><?php echo htmlentities($row['email']);?></td>
                                       <td><?php echo htmlentities($row['phone']);?></td>
                                       <td><?php echo htmlentities($row['gender']);?></td>
                                       <td><?php echo htmlentities($row['username']);?></td>

                                       <td><a href="edit-subadmin.php?said=<?php echo htmlentities($row['id']);?>"  class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a> 
                                          &nbsp;<a href="manage-subadmins.php?rid=<?php echo htmlentities($row['id']);?>&&action=del" class="btn btn-danger btn-sm"> <i class="fa fa-trash-o"></i></a> 
                                       </td>
                                    </tr>
                                    <?php
                                       $cnt++;
                                        }} ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--- end row -->
               </div>
               <!-- container -->
            </div>
            <!-- content -->
            <?php include('includes/footer.php');?>
   
       
<?php } ?>