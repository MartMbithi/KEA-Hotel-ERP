<?php
session_start();
include('../config/config.php');
//handle login
if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = sha1(md5($_POST['password'])); //double encrypt to increase security
    $stmt = $mysqli->prepare("SELECT email, password, id, number  FROM staffs  WHERE (email =? AND password =?)");
    $stmt->bind_param('ss', $email, $password); //bind fetched parameters
    $stmt->execute(); //execute bind 
    $stmt->bind_result($email, $password, $id, $staff_number); //bind result
    $rs = $stmt->fetch();
    $_SESSION['id'] = $id;
    $_SESSION['number'] = $staff_number;
    if ($rs) {
        //if its sucessfull
        header("location:dashboard.php");
    } else {
        $err = "Access Denied Please Check Your Credentials";
    }
}

require_once('../partials/head.php');
?>

<body class="hold-transition login-page">
    <div class="login-box">
        <?php
        /* Persist System Settings */
        $ret = "SELECT * FROM `system_settings` ";
        $stmt = $mysqli->prepare($ret);
        $stmt->execute(); //ok
        $res = $stmt->get_result();
        while ($sys = $res->fetch_object()) {
            /* Check For Missing Logo And Load Default */
            if ($sys_logo = '') {
                $logo_dir = '../public/uploads/sys_logo/logo.png';
            } else {
                $logo_dir = "../public/uploads/sys_logo/$sys->sys_logo";
            }
        ?>
            <div class="login-logo">
                <!-- Adjust This Dimensions To Fit Your Logo -->
                <img class="img-fluid" height="100" width="150" src="<?php echo $logo_dir; ?>" alt="">
            </div>
        <?php
        } ?>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign In</p>
                <form method="post">
                    <div class="input-group mb-3">
                        <input type="email" required class="form-control" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" required class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <a href="../admin/" class="btn btn-primary btn-block">Sign In As Admin</a>
                        </div>
                        <div class="col-4">
                            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>

                <p class="mb-1">
                    <a href="../">Home</a>
                </p>
                <p class="mb-1">
                    <a href="reset_password.php">I forgot my password</a>
                </p>
            </div>
        </div>
    </div>
    <!-- /.login-box -->
    <?php require_once('../partials/scripts.php'); ?>

</body>


</html>