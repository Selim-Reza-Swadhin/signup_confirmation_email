<?php
//session_start();
include 'helpers/functions.php';
if (!isset($_SESSION['user_id'])) {
    header("location:login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Page</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body style="background-color: silver">

<?php include 'support/nav.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center" style="background-color: #fff; padding-top: 10px; border-radius: 6px; box-shadow: 0 0 15px rgba(0,0,0,0.5)">
            <?php if (isset($_SESSION['full_name'])){?>
                <div class="alert alert-success">Welcome <b><?php echo ucwords($_SESSION['full_name']);?></b></div>
            <?php } ?>
            <?php unset($_SESSION['full_name']); ?>
            <h3>User Record</h3>
            <?php user_profile(); ?>
        </div>
    </div>
</div>

<script src="bootstrap/js/jquery-3.5.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
