<?php

use SignUpForm\config\Database;
use SignUpForm\repos\CsrfFormRepository;
use SignUpForm\repos\Edit\EditProcessor;
use SignUpForm\repos\Edit\EditUserData;
use SignUpForm\repos\Edit\EditUserValidator;
use SignUpForm\repos\ErrorView;
use SignUpForm\repos\ValidateRep;

include_once "vendor/autoload.php";

session_start();

if (false == (isset($_SESSION['logged']) && $_SESSION['logged'] == true)) {
    http_response_code(400);
    header('location: index.php');
    exit();
}

$errors = [];
$firstName = '';
$lastName = '';
$phoneNumber = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $csrf = new CsrfFormRepository();
    $validRep = new ValidateRep();
    $validator = new EditUserValidator($csrf, $validRep);
    $validator->validate($_POST);

    if ($validator->isValid()) {
        $editUser = new EditUserData($_POST['firstNameEdit'], $_POST['lastNameEdit'], $_POST['phoneNumberEdit'], $_SESSION['id']);
        $database = new Database();
        $processor = new EditProcessor($editUser, $database);
        if ($processor->processEdit()) {
            header('location: successfulEdit.php');
            exit();
        } else array_push($errors, "Something is wrong, try again");
    } else {
        $errors = $validator->getErrors();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>

<div id="header">
    My page
</div>

<div class="topnav">
    <a href="welcome.php">Home</a>
    <a href="">Something</a>
    <a href="">About</a>
    <a href="">Contact us</a>
    <a href="edit.php" id="account">My account</a>
    <a href="logout.php" id="logout">Logout</a>
</div>

<div id="content">
    <form id="editForm" action="edit.php" method="post">
        <p>First name: <input name="firstNameEdit" type="text" value="<?php echo $_SESSION['firstName']; ?>"
                              style="<?php if (isset($errors['firstName'])) echo "color: red;"; ?>"/></p>
        <p>Last name: <input name="lastNameEdit" type="text" value="<?php echo $_SESSION['lastName']; ?>"
                             style="<?php if (isset($errors['lastName'])) echo "color: red;"; ?>"></p>
        <p>Phone number: <input name="phoneNumberEdit" type="text" value="<?php echo $_SESSION['phoneNumber']; ?>"
                                style="<?php if (isset($errors['phoneNumber'])) echo "color: red;"; ?>"></p>
        <input type="hidden" name="token" value="<?php echo (new CsrfFormRepository())->create(); ?>"/>
        <input type="submit" value="Save">
    </form>

    <div style="color:red;">
        <?php
        ErrorView::printErrors($errors);
        ?>
    </div>
</div>


</body>
</html>