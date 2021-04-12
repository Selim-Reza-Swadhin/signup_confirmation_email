<?php
require_once 'helpers/functions.php';
//require_once 'connection/connect.php';
if (isset($_POST['create_account'])) {
$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$email = trim($_POST['email']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$confirm = trim($_POST['confirm']);
$gender = trim($_POST['gender']);

//$error = '';
if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm) || empty($gender)) {
    $error = "<div class='text-danger'>Please fill out the form</div>";
} else {
    $pattern = "/^[a-zA-Z ]+$/";
    if (preg_match($pattern, $first_name)) {
        if (preg_match($pattern, $last_name)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if (strlen($password) > 4 && strlen($confirm)) {
                    if ($password == $confirm) {
                        $check_email = $db->prepare("SELECT email FROM users WHERE email = ?");
                        $check_email->execute([$email]);

                        if ($check_email->rowCount() == 1) {
                            $error = "<div class='text-danger'>Email already exists.</div>";
                        } else {
                            //$code = rand();
                            $code = rand(1, 1000000);
                            //$text        = substr($check_email, 0, 4);
                            //$rand        = rand(10000, 99999);
                            //$newcode     = "$text$rand";
                            $status = 0;
                            try {
                                $insert_query = $db->prepare("INSERT INTO users (first_name, last_name, email, password, gender, code, status) VALUES(?,?,?,?,?,?,?)");
                                $insert_query->execute([$first_name, $last_name, $email, password_hash($password, PASSWORD_DEFAULT), $gender, $code, $status]);
                                send_code($code, $email);

                            } catch (PDOException $e) {
                                echo "Sorry " . $e->getMessage();
                            }
                        }}
                    else {
                            $error = "<div class='text-danger'>Password not match</div>";
                        }
                    } else {
                        $error = "<div class='text-danger'>Your password is too weak.</div>";
                    }
                } else {
                    $error = "<div class='text-danger'>Email must be valid</div>";
                }
            } else {
                $error = "<div class='text-danger'>Last name must be character!</div>";
            }
        } else {
            $error = "<div class='text-danger'>First name must be character!</div>";
        }
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup Confirmation Email</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/custom.css">
</head>
<body>
<?php include 'support/nav.php';?>

<div class="container" style="margin-top: 50px; margin-left: 450px;">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span id="header">Create User Account</span>
                    <span class="glyphicon glyphicon-pencil c-pencil pull-right"></span>
                </div>

                <div class="panel-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <?= isset($error) ? $error : ''; ?>
                            <? //= isset($error) ? : ''; ?> <!--shorthand-->
                            <? //= isset($error) ?? '';?>
                            <?php // if (isset($error)): echo $error; endif;?>
                        </div>
                        <div class="form-group">
                            <!--<input type="text" class="form-control" name="first_name" id=""
                                   placeholder="Enter your first name" value="<?php /*if (isset($first_name)): echo $first_name;  endif;*/ ?>">-->

                            <input type="text" class="form-control" name="first_name" id=""
                                   placeholder="Enter your first name"
                                   value="<?= isset($first_name) ? $first_name : ''; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="last_name" id=""
                                   placeholder="Enter your last name"
                                   value="<?= isset($last_name) ? $last_name : ''; ?>">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="" placeholder="Enter your email"
                                   value="<?= isset($email) ? $email : ''; ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id=""
                                   placeholder="Enter your password" value="<?= isset($password) ? $password : ''; ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="confirm" id=""
                                   placeholder="Enter your password confirm"
                                   value="<?= isset($confirm) ? $confirm : ''; ?>">
                        </div>
                        <div class="form-group">
                            <select name="gender" id="" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block" name="create_account" id=""
                                   value="Create Account">
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
