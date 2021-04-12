<?php
include './connection/connect.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_code($code, $email)
{
//Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'selimrezaswadhin@gmail.com';                     //SMTP username
        $mail->Password = '12101989';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('selimrezaswadhin@gmail.com', 'Selim Mailer');
        $mail->addAddress($email, ' 89 Joe User');

        //Attachments

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Confirmation code';
        $mail->Body = ' Thank you for joining us <b>Confirmation code is </b>' . $code;
        $mail->AltBody = 'ami baby This is the body in plain text for non-HTML mail clients';

//    $mail->send();
//    echo 'Message has been sent';
        if (!$mail->send()) {
            echo 'Message could not be sent';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $_SESSION['user_email'] = $email;
            $_SESSION['account_create'] = 'Your account is successfully created.';
            header("Location:confirm.php");
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function confirm_email()
{
    global $db;
    if (isset($_POST['confirm'])) {
        $code = trim($_POST['confirm_code']);
        $user_email = $_SESSION['user_email'];
        if (empty($code)) {
            echo "<div class='alert alert-danger'>Please enter code...</div>";
        } else {
            $query = $db->prepare("SELECT code FROM users WHERE email = ? && code = ?");
            $query->execute([$user_email, $code]);
            if ($query->rowCount() == 1) {
                //echo "success selim";
                $update_code = 1;
                $query_update = $db->prepare("UPDATE users SET status = ? WHERE email = ? && code = ? ");
                $query_update->execute([$update_code, $user_email, $code]);
                if ($query_update) {
                    $_SESSION['confirmation_success'] = "Your Account is Successfully confirm";
                    header("location:login.php");
                } else {
                    echo "<div class='alert alert-danger'>Query not work</div>";
                }
            } else {
                //echo "Invalid code";
                echo "<div class='alert alert-danger'>Invalid code...</div>";
            }
        }
    }
}

function user_login()
{
    global $db;
    if (isset($_POST['login'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        if (empty($email) || empty($password)) {
            echo "<div class='alert alert-danger'>Enter email and password</div>";
        } else {
            $query = $db->prepare("SELECT * FROM users WHERE email = ? ");
            $query->execute([$email]);
            if ($query->rowCount() == 1) {
                $row = $query->fetch(PDO::FETCH_OBJ);
                $db_password = $row->password;
                $status = $row->status;
                $id = $row->id;
                $user_firstName = $row->first_name;
                $user_lastName = $row->last_name;
                if ($status == 0) {
                    $_SESSION['user_email'] = $email;
                    $_SESSION['please_confirm'] = "Please confirm your email...";
                    header("location:confirm.php");
                } else {
                    if (password_verify($password, $db_password)) {
                        //echo "login";
                        $_SESSION['user_id'] = $id;
                        $_SESSION['user_firstNamee'] = $user_firstName;
                        $_SESSION['profile_name'] = $user_lastName;
                        $_SESSION['full_name'] = $_SESSION['user_firstNamee']." ".$_SESSION['profile_name'];
                        header("location:profile.php");
                    } else {
                        echo "<div class='alert alert-danger'>Please enter correct password</div>";

                    }
                }
            } else {
                echo "<div class='alert alert-danger'>Please enter correct email</div>";
            }


        }
    }
}



function user_profile()
{
    //$db = new PDO("mysql:host=localhost;dbname=signup_confirm", "root", "");

    global $db;
    $user_id = $_SESSION['user_id'];
    $queryy = $db->prepare("SELECT * FROM users WHERE id = ?");
    $queryy->execute([$user_id]);
    $row = $queryy->fetch(PDO::FETCH_OBJ);
    $first_name = $row->first_name;
    $last_name = $row->last_name;
    //$full_name = $first_name. " " . $last_name;
    $full_name = ucfirst($first_name) . " " . ucfirst($last_name);
    $email = $row->email;
    $gender = $row->gender;
    echo "<table class='table' border='1'>
    <tr><td>Name</td><td>$full_name</td></tr>
    <tr><td>Email</td><td>$email</td></tr>
    <tr><td>Gender</td><td>$gender</td></tr>
</table>";

}