<?php
session_start();
error_reporting(0);
include('includes/config.php');

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ALTOFAN | Search Page</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link rel="stylesheet" href="css/icons.css">
</head>

<body>

  <!-- Navigation -->
  <?php include('includes/header.php'); ?>

  <!-- Page Content -->
  <div class="container">



    <div class="row" style="margin-top: 4%">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <!-- Blog Post -->
        <?php
        if ($_POST['searchtitle'] != '') {
          $st = $_SESSION['searchtitle'] = $_POST['searchtitle'];
        }
        $st;





        if (isset($_GET['pageno'])) {
          $pageno = $_GET['pageno'];
        } else {
          $pageno = 1;
        }
        $no_of_records_per_page = 8;
        $offset = ($pageno - 1) * $no_of_records_per_page;
        // Prepare the query
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM tblposts");
        $stmt->execute();

        // Fetch the result
        $total_rows = $stmt->fetchColumn();  // Fetch the first column directly

        // Calculate the total pages
        $total_pages = ceil($total_rows / $no_of_records_per_page);



        $stmt = $con->prepare("select tblposts.id as pid,tblposts.PostTitle as posttitle,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url,tblposts.PostImage from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.PostTitle like '%$st%' and tblposts.Is_Active=1 LIMIT $offset, $no_of_records_per_page");
        $stmt->execute();
        $cnt = 1;
        if ($stmt->rowCount() == 0) {
          echo "No record found";
        } else {
          foreach ($stmt->fetchAll() as $row) {


        ?>

            <div class="card mb-4">
              <img class="card-img-top" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="<?php echo htmlentities($row['posttitle']); ?>">
              <div class="card-body">
                <h2 class="card-title"><?php echo htmlentities($row['posttitle']); ?></h2>

                <a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="btn btn-primary">Read More &rarr;</a>
              </div>
              <div class="card-footer text-muted">
                Posted on <?php echo htmlentities($row['postingdate']); ?>

              </div>
            </div>
          <?php } ?>

          <ul class="pagination justify-content-center mb-4">
            <li class="page-item"><a href="?pageno=1" class="page-link">First</a></li>
            <li class="<?php if ($pageno <= 1) {
                          echo 'disabled';
                        } ?> page-item">
              <a href="<?php if ($pageno <= 1) {
                          echo '#';
                        } else {
                          echo "?pageno=" . ($pageno - 1);
                        } ?>" class="page-link">Prev</a>
            </li>
            <li class="<?php if ($pageno >= $total_pages) {
                          echo 'disabled';
                        } ?> page-item">
              <a href="<?php if ($pageno >= $total_pages) {
                          echo '#';
                        } else {
                          echo "?pageno=" . ($pageno + 1);
                        } ?> " class="page-link">Next</a>
            </li>
            <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
          </ul>
        <?php } ?>




        <!-- Pagination -->




      </div>

      <!-- Sidebar Widgets Column -->
      <?php include('includes/sidebar.php'); ?>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include('includes/footer.php'); ?>


  <script src="js/foot.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  </head>
</body>

</html>