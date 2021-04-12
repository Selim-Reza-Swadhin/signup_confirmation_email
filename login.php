<?php
//include 'connection/connect.php';
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
    <title>Login Form</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>
<?php include 'support/nav.php'; ?>

<div class="container" style="margin-top: 70px;">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <?php if (isset($_SESSION['confirmation_success'])) { ?>
                <div class="alert alert-success"><?php echo $_SESSION['confirmation_success']; ?></div>
            <?php } ?>
            <?php unset($_SESSION['confirmation_success']); ?>


            <div class="panel panel-primary" style="box-shadow: 0 0 10px rgba(0,0,0,0.5); border: 0px">
                <div class="panel panel-heading text-center">
                    <h3>User Login</h3>
                </div>
                <div class="panel-body text-center">
                    <form action="" method="post">
                        <div class="form-group">
                            <?php user_login(); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Enter Email...">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Enter Password...">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="login" class="btn btn-primary" value="User Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="bootstrap/js/jquery-3.5.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
