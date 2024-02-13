<?php
session_start();
error_reporting(0);
include('../includes/dbconn.php');
include('includes/head.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
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
                        $page = 'dashboard';
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
                                    <li><span>Admin's Dashboard</span></li>
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
                    <div class="row col-12 mt-5">

                        <!-- trading history area start -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="data-tables datatable-dark">
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
                                            <div class="table-responsive table-sm">
                                                <table
                                                    class="table table-hover table-bordered table-striped table-sm progress-table text-center">
                                                    <thead class="text-uppercase">

                                                        <tr>
                                                            <td>S.N</td>
                                                            <td>Employee ID</td>
                                                            <td width="120">Full Name</td>
                                                            <td>Leave Type</td>
                                                            <td>Applied On</td>
                                                            <td>Current Status</td>
                                                            <td></td>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php

                                                        $sql = "SELECT tblleaves.id as lid,tblemployees.FirstName,tblemployees.LastName,tblemployees.EmpId,tblemployees.id,tblleaves.LeaveType,tblleaves.PostingDate,tblleaves.Status from tblleaves join tblemployees on tblleaves.empid=tblemployees.id order by lid desc limit 7";
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
                                                                        <?php echo htmlentities($result->EmpId); ?>
                                                                    </td>
                                                                    <td><a href="update-employee.php?empid=<?php echo htmlentities($result->id); ?>"
                                                                            target="_blank">
                                                                            <?php echo htmlentities($result->FirstName . " " . $result->LastName); ?>
                                                                        </a></td>
                                                                    <td>
                                                                        <?php echo htmlentities($result->LeaveType); ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo htmlentities($result->PostingDate); ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php $stats = $result->Status;

                                                                        if ($stats == 1) {
                                                                            ?>
                                                                            <span style="color: green">Approved <i
                                                                                    class="fa fa-check-square-o"></i></span>
                                                                        <?php }
                                                                        if ($stats == 2) { ?>
                                                                            <span style="color: red">Declined <i
                                                                                    class="fa fa-times"></i></span>
                                                                        <?php }
                                                                        if ($stats == 0) { ?>
                                                                            <span style="color: blue">Pending <i
                                                                                    class="fa fa-spinner"></i></span>
                                                                        <?php } ?>


                                                                    </td>


                                                                    <td><a href="employeeLeave-details.php?leaveid=<?php echo htmlentities($result->lid); ?>"
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