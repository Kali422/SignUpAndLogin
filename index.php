<?php

use SignUpForm\config\Database;
use SignUpForm\repos\ErrorView;
use SignUpForm\repos\Login\UserLoginValidator;
use SignUpForm\repos\ValidateRep;

session_start();
include_once "vendor/autoload.php";

$errors = [];
$email = '';

if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    header('location: welcome.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $validateRep=new ValidateRep();
    $database=new Database();
    $validator = new UserLoginValidator($validateRep, $database);

    $result = $validator->validate($_POST);
    if ($validator->isValid()) {
        $_SESSION['id'] = $result;
        $_SESSION['logged'] = true;
        header('location: welcome.php');
        exit();
    } else {
        $errors = $validator->getErrors();
        $email = $_POST['emailText'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>


<div id="loginBox">
    <form id="loginForm" action="index.php" method="post">
        <div id="header">Login</div>
        <div class="text">
            Email:
        </div>
        <input type="text" name="emailText" placeholder="Enter Email" value= "<?php echo $email; ?>"/>

        <div class="text">
            Password:
        </div>

        <input type="password" name="passwordText" placeholder="Enter Password"><br/>


        <div id="loginSubmit">
            <input type="submit" value="Login">
        </div>

        <div id="error">
            <?php
            ErrorView::printErrors($errors);
            ?>
        </div>
    </form>
</div>
<p><a href="signup.php">Register account</a></p>

</body>
</html>
