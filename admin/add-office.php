<?php
    session_start();
    error_reporting(1);
    include('../includes/dbconn.php');
    include('includes/head.php');
    if(strlen($_SESSION['alogin'])==0){   
    header('location:index.php');
    } else {
    if(isset($_POST['add'])){
        
    $officeName=$_POST['officeName'];
    $branchName=$_POST['branchName'];
    $building=$_POST['building'];  
    $roomNo=$_POST['roomNo'];
    $department =$_POST['department'];

    $sql="INSERT INTO `tbloffice`(officeName,BranchName,Department,roomNo,Building ) 
    VALUES(:officeName,:branchName,:department,:roomNo, :building)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':officeName',$officeName,PDO::PARAM_STR);
    $query->bindParam(':branchName',$branchName,PDO::PARAM_STR);
    $query->bindParam(':roomNo',$roomNo,PDO::PARAM_STR);
    $query->bindParam(':department',$department,PDO::PARAM_STR);
    $query->bindParam(':building',$building,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();

    if($lastInsertId){
    $msg="Office Created Successfully";
    } else {
    $error="Something went wrong. Please try again";
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
                        $page='Office';
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
                            <?php include '../includes/admin-notification.php'?>

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
                            <h4 class="page-title pull-left">Office Section</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="Office.php">Office</a></li>
                                <li><span>Add</span></li>
                                
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="../assets/images/admin.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">ADMIN <i class="fa fa-angle-down"></i></h4>
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
                    <!-- Dark table start -->
                    <div class="col-12 mt-5">
                    
                        <div class="card">
                        

                        <?php if($error){?><div class="alert alert-danger alert-dismissible fade show"><strong>Info: </strong><?php echo htmlentities($error); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            
                             </div><?php } 
                                 else if($msg){?><div class="alert alert-success alert-dismissible fade show"><strong>Info: </strong><?php echo htmlentities($msg); ?> 
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                 </div><?php }?>
                                <form method="POST">
                                 <div class="card-body">
                                        
                                        <p class="text-muted font-14 mb-4">Please fill up the form in order to add new Office</p>
                                        <div class="form-row align-items-center">
                                        <div class="form-group col-4">
                                            <label for="example-text-input" class="col-form-label">Office Name</label>
                                            <input class="form-control" name="officeName" type="text" required id="example-text-input" >
                                        </div>
                                        
                                        <div class="form-group col-4">
                                                        <label class="col-form-label"> Department</label>
                                                        <select class="custom-select" name="department" autocomplete="off">
                                                            <option value="">Choose..</option>
                                                            <?php $sql = "SELECT DepartmentName from tbldepartments";
                                                            $query = $dbh->prepare($sql);
                                                            $query->execute();
                                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                            $cnt = 1;
                                                            if ($query->rowCount() > 0) {
                                                                foreach ($results as $result) { ?>
                                                                    <option
                                                                        value="<?php echo htmlentities($result->DepartmentName); ?>">
                                                                        <?php echo htmlentities($result->DepartmentName); ?>
                                                                    </option>
                                                                <?php }
                                                            } ?>
                                                        </select>
                                                    </div>
                                        <div class="form-group col-4">
                                            <label for="example-text-input" class="col-form-label">Building</label>
                                            <input class="form-control" name="building" type="text" autocomplete="off" required id="example-text-input" >
                                        </div>

                                        <div class="form-group col-4">
                                            <label for="example-email-input" class="col-form-label">Room NO</label>
                                            <input class="form-control" name="roomNo" type="text" autocomplete="off" required id="example-email-input" >
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="example-email-input" class="col-form-label">Branch Name</label>
                                            <input class="form-control" name="branchName" type="text" autocomplete="off" required id="example-email-input" >
                                            </div></div>

                                        <button class="btn btn-primary" name="add" id="add" type="submit">ADD</button>
                                        
                                    </div>
                                    </form>
                        </div> 
                    </div>
                    <!-- Dark table end -->
                    
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

        <!-- Start datatable js -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    
    <!-- others plugins -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
</body>

</html>

<?php } ?>