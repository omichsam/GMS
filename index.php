<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
if (isset($_POST['signin'])) {
    $uname = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT EmailId,Password,Status,id FROM tblemployees WHERE EmailId=:uname and Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':uname', $uname, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            $status = $result->Status;
            $_SESSION['eid'] = $result->id;
        }
        if ($status == 0) {
            $msg = "In-Active Account. Please contact your administrator!";
        } else {
            echo "<script>alert('LOGGED IN SUCCESSFULLY');</script>";
            // echo '<script type="text/javascript">sweetAlert("INFO !","LOGGED IN SUCCESSFULLY !","success")</script>';
            $_SESSION['emplogin'] = $_POST['username'];
            echo "<script type='text/javascript'> document.location = 'employees/dashboard.php'; </script>";
        }
    } else {
        echo "<script>alert('Sorry, Invalid Details.');</script>";
    }

}

?>
<?php include('includes/head_main.php'); ?>

<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="POST" name="signin" class="border border-white rounded-top rounded-bottom card cards"
                    style="background: #EEEEEE;">
                    <div class="login-form-head">
                        <h4>JUDICIARY SERVICE COMMISSION</h4>
                        <p>Guest Management System</p>
                        <?php if ($msg) { ?>
                            <div class="errorWrap"><strong>Error</strong> :
                                <?php echo htmlentities($msg); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" id="username" name="username" autocomplete="off" required>
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="password" name="password" autocomplete="off" required>
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember
                                        Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="password-recovery.php">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit" name="signin">Login <i
                                    class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted"><a href="admin/index.php">Go to Admin Panel</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>