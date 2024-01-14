<?php
session_start();
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="ar" >

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ALTOFAN</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <style>
        body{
text-align: ltr;
        }

     
    </style>
    <link rel="stylesheet" href="css/st.css">
    <link href="css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body>
    <audio src="includes/Zamil.m4a" autoplay></audio>
    <!-- Navigation -->
    <?php include('includes/header.php'); ?>
    <!-- Page Content -->
    <div class="container-fluid">
        <div class="row" style="margin-top: 4%">
            <!-- Blog Entries Column -->
            <?php include('includes/sidebar.php'); ?>
            <div class="col-md-7">
                <h4 class="widget-title mb-4">آخر <span>الأخبار</span></h4>
                <!-- Blog Post -->
                <div class="row">
                    <div class="owl-carousel owl-theme" id="slider">
                        <div class="card mb-4 border-0">
                            <img class="card-img-top" src="admin/postimages/TOF.jpg" alt="" width="100%">
                            <div align="right" class="card-body">
                                <p class="m-0">
                                    <!--category-->
                                    <a class="badge bg-success text-decoration-none link-light" href="#"
                                        style="color:#fff">أخبار</a>
                                    <!--Subcategory--->
                                    <a class="badge bg-warning text-decoration-none link-light"
                                        style="color:#fff">أخبار</a>
                                </p>
                                <p class="m-0"><small> Posted on 2023-9-7 09:20:09</small></p>
                                <a href="#" class="card-title text-decoration-none text-dark">
                                    <h5 class="card-title">
                                        في 7 أكتوبر 2023، استطاع مقاتلون من فصائل المقاومة الفلسطينية، اجتياز حاجز
                                        إسرائيل-غزة إلى منطقة غلاف غزة، بالإضافة إلى إطلاق الصواريخ على إسرائيل. وأعلنت
                                        إسرائيل بعد ذلك الحرب على حماس، واستدعت 300 ألف جندي احتياطي لتنفيذ العملية
                                        العسكرية الإسرائيلية. </h5>
                                </a>
                                <!-- <a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="">Read More &rarr;</a> -->
                            </div>
                        </div>
                        <div class="card mb-4 border-0">
                            <img class="card-img-top" src="admin/postimages/images.jpeg" alt="" width="100%">
                            <div class="card-body">
                                <p class="m-0">
                                    <!--category-->
                                    <a class="badge bg-success text-decoration-none link-light" href="#"
                                        style="color:#fff">أخبار</a>
                                    <!--Subcategory--->
                                    <a class="badge bg-warning text-decoration-none link-light"
                                        style="color:#fff">أخبار</a>
                                </p>
                                <p class="m-0"><small> Posted on 2023-11-11 00:20:09</small></p>
                                <a href="#" class="card-title text-decoration-none text-dark">
                                    <h5 class="card-title">علن القائد العام لكتائب القسام بدء عملية "طوفان الأقصى"
                                        ردًا على جرائم الاحتلال الإسرائيلي، في وقت انطلقت عشرات الرشقات الصاروخية من
                                        قطاع غزة، بالتزامن مع تسلّل مقاومين فلسطينيين إلى مستوطنات غلاف غزة.
                                    </h5>
                                </a>
                                <!-- <a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="">Read More &rarr;</a> -->
                            </div>
                        </div>
                        <div class="card mb-4 border-0">
                            <img class="card-img-top" src="admin/postimages/TOFF.jpg" alt="" width="100%">
                            <div class="card-body">
                                <p class="m-0">
                                    <!--category-->
                                    <a class="badge bg-success text-decoration-none link-light" href="#"
                                        style="color:#fff">أخبار</a>
                                    <!--Subcategory--->
                                    <a class="badge bg-warning text-decoration-none link-light"
                                        style="color:#fff">أخبار</a>
                                </p>
                                <p class="m-0"><small> Posted on 2023-12-11 00:20:09</small></p>
                                <a href="#" class="card-title text-decoration-none text-dark">منذ صباح السبت، أعلن
                                    الجناح العسكري لحركة حماس، كتائب القسام، بدءه عملية ضد إسرائيل وأطلق عليها اسم
                                    "طوفان الأقصى"، في حين أعلنت إسرائيل ردّها بإعلان الحرب على الأراضي الفلسطينية. فكيف
                                    بدا المشهد حيث مراسلينا في قطاع غزة، رام الله، والقدس؟
                                    <h5 class="card-title">
                                    </h5>
                                </a>
                                <!-- <a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="">Read More &rarr;</a> -->
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_GET['pageno'])) {
                        $pageno = $_GET['pageno'];
                    } else {
                        $pageno = 1;
                    }
                    $no_of_records_per_page = 8;
                    $offset = ($pageno - 1) * $no_of_records_per_page;



                    $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                    $stmt = $con->prepare($total_pages_sql);
                    $stmt->execute();
                    $total_rows = $stmt->fetchColumn();
                    $total_pages = ceil($total_rows / $no_of_records_per_page);

                    $stmt = $con->prepare("select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
                    $stmt->execute();
                    $cnt = 1;
                    if ($stmt->rowCount()) {
                        foreach ($stmt->fetchAll() as $row) {
                    ?>
                    <div class="col-md-6">
                        <div class="card mb-4 border-0">
                            <img class="card-img-top"
                                src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                                alt="<?php echo htmlentities($row['posttitle']); ?>" height="200px">
                            <div class="card-body">
                                <p class="m-0">
                                    <!--category-->
                                    <a class="badge bg-success text-decoration-none link-light"
                                        href="category.php?catid=<?php echo htmlentities($row['cid']) ?>"
                                        style="color:#fff"><?php echo htmlentities($row['category']); ?></a>
                                    <!--Subcategory--->
                                    <a class="badge bg-warning text-decoration-none link-light"
                                        style="color:#fff"><?php echo htmlentities($row['subcategory']); ?></a>
                                </p>
                                <p class="m-0"><small> Posted on
                                        <?php echo htmlentities($row['postingdate']); ?></small>
                                </p>
                                <a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>"
                                    class="card-title text-decoration-none text-dark">
                                    <h5 class="card-title"><?php echo htmlentities($row['posttitle']); ?></h5>
                                </a>
                                <!-- <a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="">Read More &rarr;</a> -->
                            </div>
                        </div>
                    </div>
                    <?php }
                    } ?>
                    <div class="col-md-12">
                        <!-- Pagination -->

                        <!-- <ul class="pagination justify-content-center mb-4">
                        <li class="page-item"><a href="?pageno=1"  class="page-link border-0">First</a></li>
                        <li class="<?php if ($pageno <= 1) {
                                        echo 'disabled';
                                    } ?> page-item">
                           <a href="<?php if ($pageno <= 1) {
                                        echo '#';
                                    } else {
                                        echo "?pageno=" . ($pageno - 1);
                                    } ?>" class="page-link border-0">Prev</a>
                        </li>
                        <li class="<?php if ($pageno >= $total_pages) {
                                        echo 'disabled';
                                    } ?> page-item">
                           <a href="<?php if ($pageno >= $total_pages) {
                                        echo '#';
                                    } else {
                                        echo "?pageno=" . ($pageno + 1);
                                    } ?> " class="page-link border-0">Next</a>
                        </li>
                        <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link border-0">Last</a></li>
                        </ul> -->
                    </div>
                    <!-- Static -->
                    <div class="col-md-12">
                        <div class="card mb-4 mt-5 border-0">
                            <img class="card-img-top" src="admin/postimages/TOFF.jpg" alt="" width="100%">
                            <div class="card-body">
                                <p class="m-0">
                                    <!--category-->
                                    <a class="badge bg-success text-decoration-none link-light" href="#"
                                        style="color:#fff">غزة</a>
                                    <!--Subcategory--->
                                    <a class="badge bg-warning text-decoration-none link-light"
                                        style="color:#fff">غزة</a>
                                </p>
                                <p class="m-0"><small> Posted on 2023-12-30 00:20:09</small></p>
                                <a href="#" class="card-title text-decoration-none text-dark">
                                    <h5 class="card-title">وأفادت وزراة الصحة الفلسطينية في قطاع غزة في بيان رسمي اليوم،
                                        بارتفاع حصيلة القتلى الفلسطينيين في القطاع جراء الغارات الإسرائيلية إلى 1417
                                        فيما أصيب 6268 آخرون.

                                        وأشارت وزارة الصحة الفلسطينية في بيان رسمي، أن بين ضحايا الغارات الإسرائيلية ما
                                        يقرب من 447 طفلا و248 امرأة.

                                        وأعلنت الصحة الفلسطينية في وقت سابق اليوم أن حصيلة قتلى القصف والغارات
                                        الإسرائيلية وصلت إلى 1354 والجرحى إلى أكثر من 6049 في غزة، وإلى 31 قتيلا و180
                                        جريحا في الضفة الغربية المحتلة.

                                        ودخلت عملية "طوفان الأقصى" التي أطلقتها حركة "حماس" يومها السادس، وسط تكثيف
                                        الجيش الإسرائيلي غاراته على قطاع غزة، وتوسيع رقعة الاستهداف لتشمل جنوب لبنان.
                                    </h5>
                                </a>
                                <!-- <a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="">Read More &rarr;</a> -->
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- Sidebar Widgets Column -->
            <div class="col-md-2 mt-4">
                <!-- Categories Widget -->
                <div class="card my-4 border-0">
                    <h5 class="card-header bg-white border-0">الفئات</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="list-unstyled mb-0">
                                    <?php

                                    $stmt = $con->prepare("select id,CategoryName from tblcategory");
                                    $stmt->execute();
                                    $cnt = 1;
                                    if ($stmt->rowCount()) {
                                        foreach ($stmt->fetchAll() as $row) {
                                    ?>
                                    <li class=" mb-2">
                                        <a href="category.php?catid=<?php echo htmlentities($row['id']) ?>"
                                            class="text-secondary"><?php echo htmlentities($row['CategoryName']); ?></a>
                                    </li>
                                    <?php }
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
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
        <script src="js/owl.carousel.min.js"></script>
        <script>
        $('#slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            autoplay: true,
            animateOut: 'fadeOut',
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
        $('#slider2').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            autoplay: true,
            animateOut: 'fadeOut',
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 4
                }
            }
        });
        </script>
</body>

</html>