<?php
   session_start();
   include('includes/config.php');
   error_reporting(0);
   if(strlen($_SESSION['login'])==0)
   { 
      header('location:index.php');
   }
   else{
?>
<?php include('includes/topheader.php');?>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
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
                        <h4 class="page-title">Dashboard</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">NewsPortal</a>
                            </li>
                            <li>
                                <a href="#">Admin</a>
                            </li>
                            <li class="active">
                                Dashboard
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card-box h-100">
                        <div class="card-header">
                            <h2 class="card-title mb-2">Welcome TOFAN</h2>
                            <span class="d-block mb-4 text-nowrap">Gaza</span>
                        </div>
                        <br><br>

                        <div class="card-body">
                            <div class="row ">
                                <div class="col-md-6">
                                    <h1 class="display-6 text-primary mb-2 pt-4 pb-1"> We are Gaza</h1>
                                    <small class="d-block mb-3">In <br></small>
                                    <br>
                                    <br>
                                    <a href="https://www.facebook.com/profile.php?id=100013402905912&locale=ar_AR" target="a_blank"
                                        class="btn btn-sm btn-primary">Visit Website</a>
                                </div>
                                <div class="col-md-6">
                                    <img src="assets/images/prize-light.png" width="140" height="150"
                                        class="rounded-start">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-box h-100">
                        <div class="card-body">
                            <div class="row ">
                                <div class="card-header">
                                    <h4 class="card-title m-0">Visits of 2023</h4>
                                </div>
                                <div id="chart">
                                    <apexchart type="radialBar" height="265" :options="chartOptions" :series="series">
                                    </apexchart>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="manage-categories.php">
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="card-box widget-box-one text-center">
                            <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-secondary" title="Statistics">Categories Listed</p>
                                <?php  $stmt=$con->prepare("SELECT * FROM tblcategory WHERE Is_Active=1");
                        $stmt->execute();   
                        $countcat=$stmt->rowCount();  
                           ?>
                                <h2><?php echo htmlentities($countcat);?> <small></small></h2>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- end col -->
                 <a href="manage-users.php">
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="card-box widget-box-one text-center">
                            <i class="ti ti-user"></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-secondary" title="Statistics">users Listed</p>
                                <?php  $stmt=$con->prepare("SELECT * FROM tbluser ");
                        $stmt->execute();   
                        $countcat=$stmt->rowCount();  
                           ?>
                                <h2><?php echo htmlentities($countcat);?> <small></small></h2>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="manage-posts.php">
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="card-box widget-box-one text-center">
                            <i class="mdi mdi-layers widget-one-icon"></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-secondary" title="User This Month">Live News</p>
                                <?php   $stmt=$con->prepare("SELECT * FROM tblcategory WHERE Is_Active=1");   
                        $stmt->execute();   
          
                        $countposts=$stmt->rowCount();   
                           ?>
                                <h2><?php echo htmlentities($countposts);?> <small></small></h2>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="manage-subcategories.php">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="card-box widget-box-one text-center">
                            <i class="mdi mdi-layers widget-one-icon"></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-secondary" title="User This Month">Listed Subcategories</p>
                                <?php $stmt=$con->prepare("SELECT * FROM tblsubcategory WHERE Is_Active=1");     
                                 $stmt->execute();   
                            $countsubcat=$stmt->rowCount();  
                           ?>
                                <h2><?php echo htmlentities($countsubcat);?> <small></small></h2>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </a>

            </div>
            <!-- end row -->
            <div class="row">
                <!--  <a href="trash-posts.php">
               <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="card-box widget-box-one">
                     <i class="mdi mdi-layers widget-one-icon"></i>
                     <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Trash News</p>
                        <?php  $stmt=$con->prepare("SELECT * FROM tblposts WHERE Is_Active=1");  
                            $stmt->execute();              
                            $countposts=$stmt->rowCount();  
                  ?>
                        <h2><?php echo htmlentities($countposts);?> <small></small></h2>
                     </div>
                  </div>
               </div>
               </a> -->
            </div>
            <div class="col-sm-12">
                <div class="card-box">
                    <h2>Recent News Post</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                           $stmt=$con->prepare("SELECT tblposts.id AS postid,tblposts.PostTitle AS title,tblcategory.CategoryName AS category,tblsubcategory.Subcategory AS subcategory FROM tblposts LEFT JOIN tblcategory ON tblcategory.id=tblposts.CategoryId left join tblsubcategory ON tblsubcategory.SubCategoryId=tblposts.SubCategoryId WHERE tblposts.Is_Active=1");                                      
                           $stmt->execute();
                           $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                           
                         
                            if($stmt==0)
                            {
                           ?>
                                <tr>
                                    <td colspan="4" align="center">
                                        <h3 style="color:red">No record found</h3>
                                    </td>
                                <tr>
                                    <?php 
                              } else {
                                foreach($result as $row){
                                    {
                              ?>
                                <tr>
                                    <td><?php echo htmlentities($row['title']);?></td>
                                    <td><?php echo htmlentities($row['category'])?></td>
                                    <td><?php echo htmlentities($row['subcategory'])?></td>

                                </tr>
                                <?php } }}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- container -->
    </div>
    <!-- content -->
    <?php include('includes/footer.php');?>

</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
<!-- Right Sidebar -->
<div class="side-bar right-bar">
    <a href="javascript:void(0);" class="right-bar-toggle">
        <i class="mdi mdi-close-circle-outline"></i>
    </a>
    <h4 class="">Settings</h4>
    <div class="setting-list nicescroll">
        <div class="row m-t-20">
            <div class="col-xs-8">
                <h5 class="m-0">Notifications</h5>
                <p class="text-muted m-b-0"><small>Do you need them?</small></p>
            </div>
            <div class="col-xs-4 text-right">
                <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small" />
            </div>
        </div>
        <div class="row m-t-20">
            <div class="col-xs-8">
                <h5 class="m-0">API Access</h5>
                <p class="m-b-0 text-muted"><small>Enable/Disable access</small></p>
            </div>
            <div class="col-xs-4 text-right">
                <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small" />
            </div>
        </div>
        <div class="row m-t-20">
            <div class="col-xs-8">
                <h5 class="m-0">Auto Updates</h5>
                <p class="m-b-0 text-muted"><small>Keep up to date</small></p>
            </div>
            <div class="col-xs-4 text-right">
                <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small" />
            </div>
        </div>
        <div class="row m-t-20">
            <div class="col-xs-8">
                <h5 class="m-0">Online Status</h5>
                <p class="m-b-0 text-muted"><small>Show your status to all</small></p>
            </div>
            <div class="col-xs-4 text-right">
                <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small" />
            </div>
        </div>
    </div>
</div>
<!-- /Right-bar -->
</div>
<!-- END wrapper -->
<script>
var options = {
    series: [44, 55, 67],
    chart: {
        height: 265,
        type: 'radialBar',
    },
    plotOptions: {
        radialBar: {
            dataLabels: {
                name: {
                    fontSize: '40px',
                },
                value: {
                    fontSize: '16px',
                },
                total: {
                    show: true,
                    label: 'Total',
                    formatter: function(w) {
                        // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                        return 249
                    }
                }
            }
        }
    },
    labels: ['Apples', 'Oranges', 'Bananas'],
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();
</script>
<?php } ?>