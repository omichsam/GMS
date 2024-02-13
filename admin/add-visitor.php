<?php
session_start();
error_reporting(0);
include('../includes/dbconn.php');
include('includes/head.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['add'])) {
        $id = $_POST['idNo'];
        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $kenyan_citizen = $_POST['kenyan_citizen'];
        $mobileno = $_POST['mobileno'];
        $status = 1;

        $sql = "INSERT INTO tblVisitors(FullName,Email,Phone,gender,cardNo,is_kenyan) 
        VALUES(:userName,:email,:mobileno,:gender,:id,:kenyan_citizen)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->bindParam(':userName', $userName, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':gender', $gender, PDO::PARAM_STR);
        $query->bindParam(':kenyan_citizen', $kenyan_citizen, PDO::PARAM_STR);
        $query->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
            $msg = "Guest has been added Successfully";
            $visit_url = $url . DIRECTORY_SEPARATOR . "Employee" . DIRECTORY_SEPARATOR . "admin" . DIRECTORY_SEPARATOR . "add-visit.php?id=$id&name=$userName";
            echo "<script>alert('Guest has been added Successfully')</script>";
            header("Location: $visit_url");

        } else {
            $error = "ERROR";
        }

    }
}

if (isset($_POST['search'])) {
    $id = $_POST['idNo'];

    $sql = "SELECT * from `tblvisitors` WHERE cardNo=:id";

    $query = $dbh->prepare($sql);

    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if ($query->rowCount() > 0) {
        echo "<script>alert('user exist')</script>";
        foreach ($results as $result) {

            header("Location: {$url}" . DIRECTORY_SEPARATOR . "Employee" . DIRECTORY_SEPARATOR . "admin" . DIRECTORY_SEPARATOR . "add-visit.php?id=$id&name=$result->FullName");
        }

    } else {
        echo "<script>alert('user does not exist')</script>";

        header("Location: {$url}" . DIRECTORY_SEPARATOR . "Employee" . DIRECTORY_SEPARATOR . "admin" . DIRECTORY_SEPARATOR . "add-visitor.php?id=$id");
    }
}
?>

<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->

    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="dashboard.php"><img src="../assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <?php
                    $page = 'Visitor';
                    include '../includes/admin-sidebar.php';
                    ?>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>

                            <!-- Notification bell -->
                            <?php include '../includes/admin-notification.php' ?>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Add Visitor Section</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="Visitors.php">Visitor</a></li>
                                <li><span>Add</span></li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="../assets/images/admin.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">ADMIN <i
                                    class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="logout.php">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">


                <!-- row area start -->
                <div class="row">
                    <div class="col-lg-6 col-ml-12">
                        <div class="row">
                            <!-- Input form start -->
                            <div class="col-12 mt-5">
                                <?php if ($error) { ?>
                                    <div class="alert alert-danger alert-dismissible fade show"><strong>Info: </strong>
                                        <?php echo htmlentities($error); ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                    </div>
                                <?php } else if ($msg) { ?>
                                        <div class="alert alert-success alert-dismissible fade show"><strong>Info: </strong>
                                        <?php echo htmlentities($msg); ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                <?php } ?>

                                <?php

                                ?>
                                <?php
                                // Check if the form has been submitted using GET
                                if (isset($_GET['id'])) { ?>
                                    <div class="card">
                                        <form name="addemp" method="POST">

                                            <div class="card-body">
                                                <p class="text-muted font-14 mb-4">Please fill up the form in order to add
                                                    Visitor records</p>
                                                <div class="form-row align-items-center">

                                                    <div class="form-group col-4">
                                                        <label for="example-text-input"
                                                            class="col-form-label">Identification Card No *</label>
                                                        <input class="form-control" name="idNo"
                                                            value="<?php echo $_GET['id']; ?>" type="tel" maxlength="10"
                                                            autocomplete="off" required>
                                                    </div>

                                                    <div class="form-group col-4">
                                                        <label for="example-text-input" class="col-form-label">Full
                                                            Name *</label>
                                                        <input class="form-control" name="userName" type="text" required
                                                            id="example-text-input">
                                                    </div>

                                                    <div class="form-group col-4">
                                                        <label for="example-email-input"
                                                            class="col-form-label">Email</label>
                                                        <input class="form-control" name="email" type="email"
                                                            autocomplete="off" id="example-email-input">
                                                    </div>



                                                    <div class="form-group col-4">
                                                        <label class="col-form-label">Gender * </label>
                                                        <select class="custom-select" name="gender" autocomplete="off">
                                                            <option value="">Choose..</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                    </div>


                                                    <div class="form-group col-4">
                                                        <label class="col-form-label">Kenyan Citizen * </label>
                                                        <select class="custom-select" name="kenyan_citizen"
                                                            autocomplete="off">
                                                            <option value="">Choose..</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </div>



                                                    <div class="form-group col-4">
                                                        <label for="example-text-input" class="col-form-label">Contact
                                                            Number *</label>
                                                        <input class="form-control" name="mobileno" type="tel"
                                                            maxlength="10" autocomplete="off" required>
                                                    </div>
                                                </div>

                                                <button class="btn btn-success" name="add" id="update" type="submit"
                                                    onclick="return valid();">PROCEED</button>

                                            </div>
                                        </form>
                                    </div>


                                    <?php

                                } else {
                                    // Form has not been submitted, display the form
                                    ?>
                                    <div class="card">
                                        <form name="addemp" method="POST">

                                            <div class="card-body">
                                                <p class="text-muted font-14 mb-4">Check if Guest Exists</p>
                                                <div class="form-row align-items-center">

                                                    <div class="form-group col-4">
                                                        <label for="example-text-input"
                                                            class="col-form-label">Identification Card No *</label>
                                                        <input class="form-control" name="idNo" type="tel" maxlength="10"
                                                            autocomplete="off" required>
                                                    </div>

                                                </div>

                                                <button class="btn btn-sm btn-success " name="search" id="search"
                                                    type="submit" onclick="return valid();"><i class="fa fa-search"
                                                        aria-hidden="true"></i> SEARCH</button>

                                            </div>
                                        </form>
                                    </div>

                                    <?php
                                }
                                ?>

                            </div>

                        </div>
                    </div>
                    <!-- Input Form Ending point -->

                </div>
                <!-- row area end -->

            </div>
            <!-- row area start-->
        </div>
        <?php include '../includes/footer.php' ?>
        <!-- footer area end-->
    </div>
    <!-- main content area end -->


    </div>
    <!-- jquery latest version -->
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>         zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/"; ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>

    <!-- others plugins -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
</body>

</html>

<!-- < ?php } ?> -->