<?php
session_start();
error_reporting(0);
include('../includes/dbconn.php');
include('../includes/head.php');
if (strlen($_SESSION['emplogin']) == 0) {
    header('location:../index.php');
} else {
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
                        $page = '#';
                        include '../includes/n-sidebar.php';
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
                            <!-- notification ends -->
                        </div>
                    </div>
                </div>
                <!-- header area end -->
                <!-- page title area start -->
                <div class="page-title-area">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="breadcrumbs-area clearfix">
                                <h4 class="page-title pull-left">Dashboard</h4>
                                <ul class="breadcrumbs pull-left">
                                    <li><a href="dashboard.php">Home</a></li>
                                    <li><span>Staff's Dashboard</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 clearfix">
                            <?php include '../includes/employee-profile-section.php' ?>
                        </div>
                    </div>
                </div>
                <!-- page title area end -->
                <div class="main-content-inner">
                    <!-- sales report area start -->
                    <div class="sales-report-area mt-5 mb-5">

                        <div class="row">
                            <div class="col-md-4 cards border-success">
                                <div class="single-report mb-xs-30 cards border">
                                    <div class="s-report-inner pr--20 pt--30 mb-3">
                                        <div class="icon"><i class="fa fa-spinner"></i></div>
                                        <div class="s-report-title d-flex justify-content-between">
                                            <h4 class="header-title mb-0">CHECKED IN</h4>

                                        </div>
                                        <div class="d-flex justify-content-between pb-2">
                                            <h1>
                                                <?php include 'counters/pendingapp-counter.php' ?>
                                            </h1>
                                            <span>Visitors</span>
                                        </div>
                                    </div>
                                    <!-- <canvas id="coin_sales1" height="100"></canvas> -->
                                </div>
                            </div>
                            <div class="col-md-4 cards ">
                                <div class="single-report mb-xs-30 cards border">
                                    <div class="s-report-inner pr--20 pt--30 mb-3">
                                        <div class="icon"><i class="fa fa-times"></i></div>
                                        <div class="s-report-title d-flex justify-content-between">
                                            <h4 class="header-title mb-0">CHECKED OUT</h4>

                                        </div>
                                        <div class="d-flex justify-content-between pb-2">
                                            <h1>
                                                <?php include 'counters/declineapp-counter.php' ?>
                                            </h1>
                                            <span>Visitors</span>
                                        </div>
                                    </div>
                                    <!-- <canvas id="coin_sales2" height="100"></canvas> -->
                                </div>
                            </div>
                            <div class="col-md-4 cards ">
                                <div class="single-report border cards">
                                    <div class="s-report-inner pr--20 pt--30 mb-3">
                                        <div class="icon"><i class="fa fa-check-square-o"></i></div>
                                        <div class="s-report-title d-flex justify-content-between">
                                            <h4 class="header-title mb-0">Total Visitors Today</h4>

                                        </div>
                                        <div class="d-flex justify-content-between pb-2">
                                            <h1>
                                                <?php include 'counters/approvedapp-counter.php' ?>
                                            </h1>
                                            <span>-----------</span>
                                        </div>
                                    </div>
                                    <!-- <canvas id="coin_sales3" height="100"></canvas> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- sales report area end -->

                    <!-- row area start -->
                    <div class="row">

                        <!-- trading history area start -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-center">
                                        <!-- <h4 class="header-title">Employee Leave History</h4> -->
                                        <div class="trd-history-tabs">
                                            <ul class="nav" role="tablist">
                                                <li>
                                                    <a class="active" data-toggle="tab" href="dashboard.php"
                                                        role="tab">Recent List</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <select class="custome-select border-0 pr-3">
                                            <option selected>Last 24 Hours</option>

                                        </select>
                                    </div>
                                    <!-- <h4 class="header-title"></h4> -->
                                    <div class="single-table">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-hover table-bordered table-striped progress-table text-center">
                                                <thead class="text-uppercase">

                                                    <tr>
                                                        <td>S.N</td>
                                                        <td width="120">Full Name</td>
                                                        <td>VisitorID</td>
                                                        <td>Department</td>
                                                        <td>CheckingInTime</td>
                                                        <td>Status</td>
                                                        <td></td>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php

                                                    $sql = "SELECT * from `tblvisitorlog`";
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt = 1;
                                                    if ($query->rowCount() > 0) {
                                                        foreach ($results as $result) {
                                                            ?>

                                                            <tr>
                                                                <td> <b>
                                                                        <?php echo htmlentities($cnt); ?>
                                                                    </b></td>
                                                                <td>
                                                                    <?php echo htmlentities($result->FullName); ?>
                                                                <td>
                                                                    <?php echo htmlentities($result->VisitorID); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo htmlentities($result->department); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo htmlentities($result->CheckingInTime); ?>
                                                                </td>
                                                                <td>
                                                                    <?php $stats = $result->Status;

                                                                    if ($stats == 1) {
                                                                        ?>
                                                                        <span style="color: green">CHECKED-OUT <i
                                                                                class="fa fa-check-square-o"></i></span>
                                                                    <?php }

                                                                    if ($stats == 0) { ?>
                                                                        <span style="color: GREEN">CHECKED-IN <i
                                                                                class=" fa fa-spinner fa-pulse"></i></span>
                                                                    <?php } ?>


                                                                </td>


                                                                <td><a href="update-remarks.php?id=<?php echo htmlentities($result->id); ?>"
                                                                        class="btn btn-secondary btn-sm">View Details</a></td>
                                                            </tr>
                                                            <?php $cnt++;
                                                        }
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- trading history area end -->
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
        <script>
            zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
            ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
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

<?php } ?>