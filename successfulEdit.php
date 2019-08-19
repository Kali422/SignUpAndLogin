<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
<body>
<p>Your data was successfully edited</p>
<p>Wait few seconds for redirection or click <a href="welcome.php">here</a></p>


</body>
</html>

<?php
header('Refresh: 2; URL=welcome.php');
?>