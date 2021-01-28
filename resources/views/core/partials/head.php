<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KEA Hotel ERP | Experiece Life Live The Moment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/back_office.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Sweet Alerts -->
    <script src="../public/plugins/sweetalerts/sweetalert2.min.js"></script>
    <link href="../public/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <!-- Init Swal -->
    <?php if (isset($success)) { ?>
        <script>
            setTimeout(function() {
                    swal(
                        "Success", "<?php echo $success; ?>", "success",
                    );
                },
                100);
        </script>

    <?php } ?>

    <?php if (isset($err)) { ?>
        <script>
            setTimeout(function() {
                    swal("Failed", "<?php echo $err; ?>", "error", );
                },
                100);
        </script>

    <?php } ?>
    <?php if (isset($info)) { ?>
        <script>
            setTimeout(function() {
                    swal("Success", "<?php echo $info; ?>", "warning");
                },
                100);
        </script>

    <?php }
    ?>
</head>