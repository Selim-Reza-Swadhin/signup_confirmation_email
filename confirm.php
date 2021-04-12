<?php
include 'helpers/functions.php';
//$email = $db->prepare("SELECT email FROM users WHERE email = ?");
//$email = $email->execute($email);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirm</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>
<?php include 'support/nav.php'; ?>

<div class="container" style="margin-top: 70px;">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <?php
            if (isset($_SESSION['account_create'])) {
                echo "<div class='alert alert-success'>" . $_SESSION['account_create'] . "</div>";
            }
            unset($_SESSION['account_create']);
            ?>
            <?php
            if (isset($_SESSION['please_confirm'])) {
                echo "<div class='alert alert-success'>" . $_SESSION['please_confirm'] . "</div>";
            }
            unset($_SESSION['please_confirm']);
            ?>
            <h4 class="text-center">Please Confirm Your Email <?= isset($email) ? $email : ''; ?></h4>
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" name="confirm_code" class="form-control" id=""
                           placeholder="Enter confirmation code...">
                    <div class="input-group-btn">
                        <input type="submit" value="Confirm" name="confirm" class="btn btn-success">
                    </div>
                </div>
            </form>
            <div class="form-group">
                <?php confirm_email(); ?><!-- functions.php-->
            </div>
        </div>
    </div>
</div>


<script src="bootstrap/js/jquery-3.5.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
