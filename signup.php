<?php

use SignUpForm\config\Database;
use SignUpForm\repos\ErrorView;
use SignUpForm\repos\SignUp\SignUpProcessor;
use SignUpForm\repos\SignUp\SignUpUser;
use SignUpForm\repos\SignUp\SignUpValidator;
use SignUpForm\repos\ValidateRep;

include_once "vendor/autoload.php";

session_start();

$errors = [];
$firstName = '';
$lastName = '';
$phoneNumber = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $validateRep = new ValidateRep();
    $validator = new SignUpValidator($validateRep);

    $validator->validate($_POST);
    $errors = [];

    if ($validator->isValid()) {
        $user = new SignUpUser($_POST['firstNameText'], $_POST['lastNameText'], $_POST['phoneNumberText'], $_POST['emailText'], $_POST['passwordText']);
        $database= new Database();
        $processor = new SignUpProcessor($user,$database);
        if (false == $processor->checkIfUserExists()) {
            if ($processor->registerUser()) {
                header('location: registered.php');
                exit();
            } else array_push($errors, 'Something wrong, try again');
        } else array_push($errors, 'User with that email exists');
    } else {
        $errors = $validator->getErrors();
        $firstName = $_POST['firstNameText'];
        $lastName = $_POST['lastNameText'];
        $phoneNumber = $_POST['phoneNumberText'];
        $email = $_POST['emailText'];
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <title>Sign Up</title>
</head>
<body>
<div id="registerBox">
    <form id="registerForm" action="signup.php" method="post">
        <div id="header">Sign Up</div>
        <div class="text">
            First Name:
        </div>
        <input type="text" name="firstNameText" placeholder="Enter first name"
               style="<?php if (isset($errors['firstName'])) echo "color:red;"; ?>" value="<?php echo $firstName; ?>">

        <div class="text">
            Last Name:
        </div>
        <input type="text" name="lastNameText" placeholder="Enter last name"
               style="<?php if (isset($errors['lastName'])) echo "color: red;"; ?>" value="<?php echo $lastName; ?>">

        <div class="text">
            Email:
        </div>
        <input type="text" name="emailText" placeholder="Enter email"
               style="<?php if (isset($errors['email'])) echo "color: red;"; ?>" value="<?php echo $email; ?>">

        <div class="text">
            Phone number:
        </div>
        <input type="text" name="phoneNumberText" placeholder="Enter phone number"
               style="<?php if (isset($errors['phoneNumber'])) echo "color: red;"; ?>"
               value="<?php echo $phoneNumber; ?>">

        <div class="text">
            Password:
        </div>
        <input type="password" name="passwordText" placeholder="Enter password"
               style="<?php if (isset($errors['password'])) echo "color: red;"; ?>">

        <div class="text">
            Confirm password:
        </div>
        <input type="password" name="passwordConfirmText" placeholder="Confirm password"
               style="<?php if (isset($errors['passwordConfirm'])) echo "color: red;"; ?>">

        <div id="signUpSubmit">
            <input type="submit" value="Sign up!">
        </div>
    </form>
    <div id="error">
        <?php
        ErrorView::printErrors($errors);
        ?>

    </div>
</div>

<p><a href="index.php">Back to login</a></p>


</body>
</html>
