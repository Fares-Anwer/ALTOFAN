<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $aid = $_SESSION['login'];
        $UserName = $_POST['username'];
        $email = $_POST['emailid'];
        
        // Use prepared statement with placeholders
        $stmt = $con->prepare("UPDATE tbladmin SET AdminEmailId=:email, AdminUserName=:username WHERE AdminUserName=:aid");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $UserName);
        $stmt->bindParam(':aid', $aid);
        $stmt->execute();

        if ($stmt->rowCount()) {
            echo "<script>alert('User details updated.');</script>";
            echo "<script type='text/javascript'> document.location = 'index.php'; </script>";

        } else {
            echo "<script>alert('No records updated.');</script>";
        }
    }
}
?>


<!-- ========== Left Sidebar Start ========== -->

<!-- Left Sidebar End -->


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    body {
        margin-top: 20px;
        background-color: #f2f6fc;
        color: #69707a;
    }

    .img-account-profile {
        height: 10rem;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
    }

    .card .card-header {
        font-weight: 500;
    }

    .card-header:first-child {
        border-radius: 0.35rem 0.35rem 0 0;
    }

    .card-header {
        padding: 1rem 1.35rem;
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }

    .form-control,
    .dataTable-input {
        display: grid;
        width: 100%;
        padding: 0.875rem 1.125rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1;
        color: #69707a;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #c5ccd6;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .nav-borders .nav-link.active {
        color: #0061f2;
        border-bottom-color: #0061f2;
    }

    .nav-borders .nav-link {
        color: #69707a;
        border-bottom-width: 0.125rem;
        border-bottom-style: solid;
        border-bottom-color: transparent;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0;
        padding-right: 0;
        margin-left: 1rem;
        margin-right: 1rem;
    }
</style>
</head>

<body>
    <div class="container-xl px-4 mt-4">

        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">

                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile  Picture</div>
                    <div class="card-body text-center">

                        <img class="img-account-profile rounded-circle mb-2" src="assets/images/users/170.jpg" alt>

                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>

                        <button class="btn btn-primary" type="button">
                            <form action="" method="post">
                                <input type="file">
                            </form>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">

                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <?php
                  
                        $aid = $_SESSION['login'];
                    
                        $stmt = $con->prepare("Select * from  tbladmin where AdminUserName=:aid");
                        $stmt->bindParam(':aid', $aid);
                        $stmt->execute();
                        $cnt = 1;
                        
                        if ($stmt->rowCount()) {
                            foreach ($stmt->fetchAll() as $row) {
                        ?>
                                <form method="post">

                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputUsername">Username (how your name will appear to
                                            other users on the site)</label>
                                        <input class="form-control"  id="inputUsername" type="text" name="username" value=<?php echo htmlentities($row['AdminUserName']); ?>>
                                    </div>

                                    <div class="row gx-3 mb-3">

                                    </div>

                                    <div class="row gx-3 mb-3">




                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                            <input class="form-control" id="inputEmailAddress" name="emailid" type="email" value=<?php echo htmlentities($row['AdminEmailId']); ?>>
                                        </div>

                                        <div class="row gx-3 mb-3">

                                          


                                            <input class="btn btn-primary" type="submit" name="submit" value="save" style="margin: 5px;">
                                            
                                </form>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>
<?php include('includes/footer.php'); ?>

</html>