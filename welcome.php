<?php

include_once "vendor/autoload.php";

use SignUpForm\config\Database;

session_start();
if (false == (isset($_SESSION['logged']) && $_SESSION['logged'] == true)) {
    header('location: index.php');
    exit();
} else {
    $dbHandle = (new Database())->getHandle();
    $query = <<<SQL
select * from users where id = {$_SESSION['id']}
SQL;
    $result = $dbHandle->query($query);
    $row = $result->fetchArray();
    $_SESSION['firstName'] = $row['firstName'];
    $_SESSION['lastName'] = $row['lastName'];
    $_SESSION['phoneNumber'] = $row['phoneNumber'];
    $email = $row['email'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
<body>
<div id="main">
    <div id="header">
        Welcome <?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName'];?>
    </div>

    <div class="topnav">
        <a href="welcome.php">Home</a>
        <a href="">Something</a>
        <a href="">About</a>
        <a href="">Contact us</a>
        <a href="edit.php" id="account">My account</a>
        <div><a href="logout.php" id="logout">Logout</a></div>
    </div>

    <div id="content">
        <div id="center">
            <div class="centerContent">
                <div class="centerContentHeader">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                <div class="centerContentImage"><img src="img.jpg" width=50% height=50%></div>
                <div class="centerContentText">

                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec consequat nibh ligula, eget condimentum urna pulvinar aliquet. Cras pellentesque ex nisi, ut pretium nunc volutpat vitae. In vulputate malesuada mi a dignissim. Vestibulum dapibus consequat velit, sit amet congue quam hendrerit gravida. Sed consectetur lobortis lectus, quis tincidunt nisi. Aenean vel metus nibh. Pellentesque eget elit lobortis, hendrerit neque ullamcorper, suscipit purus. Curabitur maximus consequat leo a sagittis. Quisque sollicitudin vitae purus eu gravida. In hac habitasse platea dictumst. Nullam ut lectus quis erat auctor tincidunt. Morbi ac commodo metus, ut lacinia leo. Suspendisse semper suscipit nisl at iaculis.

                    Pellentesque varius arcu nec nisi cursus rhoncus et quis nisl. Donec efficitur, justo et volutpat dignissim, quam libero faucibus enim, vitae sodales dolor ex eget urna. Cras gravida nibh vitae cursus luctus. Praesent mollis eu tellus eu pellentesque. Phasellus et libero et dui tempus sollicitudin. Morbi faucibus, enim nec porttitor vehicula, metus turpis sagittis augue, sed tincidunt odio orci sollicitudin lorem. Ut vel turpis nulla. Praesent non dui leo. Quisque ut mi ac tortor convallis rhoncus.

                    Vestibulum ultrices lectus laoreet odio iaculis sagittis. Morbi cursus interdum nulla. Nulla facilisi. In elementum felis ut est malesuada aliquam et sit amet tortor. Nulla facilisi. Praesent id diam vitae diam euismod placerat. Aenean ligula diam, fermentum vel fermentum et, placerat sed ante. Donec vitae neque congue, molestie magna at, rutrum orci. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse lacinia mauris elit, volutpat molestie ante molestie ut. Ut mauris dolor, porttitor quis magna ac, porttitor eleifend ipsum. Nullam sed interdum dui, eu dignissim nunc. Donec dignissim, erat id cursus tempus, lorem elit faucibus arcu, ac vehicula enim nunc vel est.

                    Pellentesque nisi dolor, lacinia eget ligula non, gravida iaculis mi. Sed sed est erat. Integer et felis enim. Vivamus malesuada elit eros, quis imperdiet lectus pretium auctor. Morbi non mauris quis libero pretium ornare. Aenean semper a odio ac gravida. Duis varius feugiat urna eget elementum.

                    Aliquam sem sapien, maximus sodales ante quis, consequat tempus felis. Integer semper finibus nunc vitae vehicula. Nunc varius fringilla lacus quis convallis. Nulla rhoncus, libero vitae commodo tincidunt, nulla massa accumsan nulla, in dapibus enim justo id ligula. Aenean suscipit lacinia scelerisque. Praesent semper consectetur sapien. Nunc mattis ante sit amet nisl ullamcorper egestas. Morbi pretium sollicitudin sollicitudin. Praesent a est at urna tincidunt bibendum. Nullam eget fermentum libero, sed finibus erat. Aenean maximus justo ac magna eleifend consequat. Ut et risus nec urna egestas fermentum. Donec posuere fermentum tellus, eu egestas metus vehicula sed. </div>
            </div>
            <div class="centerContent">
                <div class="centerContentHeader">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                <div class="centerContentImage"><img src="img.jpg" width=50% height=50%></div>
                <div class="centerContentText">

                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec consequat nibh ligula, eget condimentum urna pulvinar aliquet. Cras pellentesque ex nisi, ut pretium nunc volutpat vitae. In vulputate malesuada mi a dignissim. Vestibulum dapibus consequat velit, sit amet congue quam hendrerit gravida. Sed consectetur lobortis lectus, quis tincidunt nisi. Aenean vel metus nibh. Pellentesque eget elit lobortis, hendrerit neque ullamcorper, suscipit purus. Curabitur maximus consequat leo a sagittis. Quisque sollicitudin vitae purus eu gravida. In hac habitasse platea dictumst. Nullam ut lectus quis erat auctor tincidunt. Morbi ac commodo metus, ut lacinia leo. Suspendisse semper suscipit nisl at iaculis.

                    Pellentesque varius arcu nec nisi cursus rhoncus et quis nisl. Donec efficitur, justo et volutpat dignissim, quam libero faucibus enim, vitae sodales dolor ex eget urna. Cras gravida nibh vitae cursus luctus. Praesent mollis eu tellus eu pellentesque. Phasellus et libero et dui tempus sollicitudin. Morbi faucibus, enim nec porttitor vehicula, metus turpis sagittis augue, sed tincidunt odio orci sollicitudin lorem. Ut vel turpis nulla. Praesent non dui leo. Quisque ut mi ac tortor convallis rhoncus.

                    Vestibulum ultrices lectus laoreet odio iaculis sagittis. Morbi cursus interdum nulla. Nulla facilisi. In elementum felis ut est malesuada aliquam et sit amet tortor. Nulla facilisi. Praesent id diam vitae diam euismod placerat. Aenean ligula diam, fermentum vel fermentum et, placerat sed ante. Donec vitae neque congue, molestie magna at, rutrum orci. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse lacinia mauris elit, volutpat molestie ante molestie ut. Ut mauris dolor, porttitor quis magna ac, porttitor eleifend ipsum. Nullam sed interdum dui, eu dignissim nunc. Donec dignissim, erat id cursus tempus, lorem elit faucibus arcu, ac vehicula enim nunc vel est.

                    Pellentesque nisi dolor, lacinia eget ligula non, gravida iaculis mi. Sed sed est erat. Integer et felis enim. Vivamus malesuada elit eros, quis imperdiet lectus pretium auctor. Morbi non mauris quis libero pretium ornare. Aenean semper a odio ac gravida. Duis varius feugiat urna eget elementum.

                    Aliquam sem sapien, maximus sodales ante quis, consequat tempus felis. Integer semper finibus nunc vitae vehicula. Nunc varius fringilla lacus quis convallis. Nulla rhoncus, libero vitae commodo tincidunt, nulla massa accumsan nulla, in dapibus enim justo id ligula. Aenean suscipit lacinia scelerisque. Praesent semper consectetur sapien. Nunc mattis ante sit amet nisl ullamcorper egestas. Morbi pretium sollicitudin sollicitudin. Praesent a est at urna tincidunt bibendum. Nullam eget fermentum libero, sed finibus erat. Aenean maximus justo ac magna eleifend consequat. Ut et risus nec urna egestas fermentum. Donec posuere fermentum tellus, eu egestas metus vehicula sed. </div>
            </div>
            <div class="centerContent">
                <div class="centerContentHeader">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                <div class="centerContentImage"><img src="img.jpg" width=50% height=50%></div>
                <div class="centerContentText">

                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec consequat nibh ligula, eget condimentum urna pulvinar aliquet. Cras pellentesque ex nisi, ut pretium nunc volutpat vitae. In vulputate malesuada mi a dignissim. Vestibulum dapibus consequat velit, sit amet congue quam hendrerit gravida. Sed consectetur lobortis lectus, quis tincidunt nisi. Aenean vel metus nibh. Pellentesque eget elit lobortis, hendrerit neque ullamcorper, suscipit purus. Curabitur maximus consequat leo a sagittis. Quisque sollicitudin vitae purus eu gravida. In hac habitasse platea dictumst. Nullam ut lectus quis erat auctor tincidunt. Morbi ac commodo metus, ut lacinia leo. Suspendisse semper suscipit nisl at iaculis.

                    Pellentesque varius arcu nec nisi cursus rhoncus et quis nisl. Donec efficitur, justo et volutpat dignissim, quam libero faucibus enim, vitae sodales dolor ex eget urna. Cras gravida nibh vitae cursus luctus. Praesent mollis eu tellus eu pellentesque. Phasellus et libero et dui tempus sollicitudin. Morbi faucibus, enim nec porttitor vehicula, metus turpis sagittis augue, sed tincidunt odio orci sollicitudin lorem. Ut vel turpis nulla. Praesent non dui leo. Quisque ut mi ac tortor convallis rhoncus.

                    Vestibulum ultrices lectus laoreet odio iaculis sagittis. Morbi cursus interdum nulla. Nulla facilisi. In elementum felis ut est malesuada aliquam et sit amet tortor. Nulla facilisi. Praesent id diam vitae diam euismod placerat. Aenean ligula diam, fermentum vel fermentum et, placerat sed ante. Donec vitae neque congue, molestie magna at, rutrum orci. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse lacinia mauris elit, volutpat molestie ante molestie ut. Ut mauris dolor, porttitor quis magna ac, porttitor eleifend ipsum. Nullam sed interdum dui, eu dignissim nunc. Donec dignissim, erat id cursus tempus, lorem elit faucibus arcu, ac vehicula enim nunc vel est.

                    Pellentesque nisi dolor, lacinia eget ligula non, gravida iaculis mi. Sed sed est erat. Integer et felis enim. Vivamus malesuada elit eros, quis imperdiet lectus pretium auctor. Morbi non mauris quis libero pretium ornare. Aenean semper a odio ac gravida. Duis varius feugiat urna eget elementum.

                    Aliquam sem sapien, maximus sodales ante quis, consequat tempus felis. Integer semper finibus nunc vitae vehicula. Nunc varius fringilla lacus quis convallis. Nulla rhoncus, libero vitae commodo tincidunt, nulla massa accumsan nulla, in dapibus enim justo id ligula. Aenean suscipit lacinia scelerisque. Praesent semper consectetur sapien. Nunc mattis ante sit amet nisl ullamcorper egestas. Morbi pretium sollicitudin sollicitudin. Praesent a est at urna tincidunt bibendum. Nullam eget fermentum libero, sed finibus erat. Aenean maximus justo ac magna eleifend consequat. Ut et risus nec urna egestas fermentum. Donec posuere fermentum tellus, eu egestas metus vehicula sed. </div>
            </div>
            <div class="centerContent">
                <div class="centerContentHeader">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                <div class="centerContentImage"><img src="img.jpg" width=50% height=50%></div>
                <div class="centerContentText">

                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec consequat nibh ligula, eget condimentum urna pulvinar aliquet. Cras pellentesque ex nisi, ut pretium nunc volutpat vitae. In vulputate malesuada mi a dignissim. Vestibulum dapibus consequat velit, sit amet congue quam hendrerit gravida. Sed consectetur lobortis lectus, quis tincidunt nisi. Aenean vel metus nibh. Pellentesque eget elit lobortis, hendrerit neque ullamcorper, suscipit purus. Curabitur maximus consequat leo a sagittis. Quisque sollicitudin vitae purus eu gravida. In hac habitasse platea dictumst. Nullam ut lectus quis erat auctor tincidunt. Morbi ac commodo metus, ut lacinia leo. Suspendisse semper suscipit nisl at iaculis.

                    Pellentesque varius arcu nec nisi cursus rhoncus et quis nisl. Donec efficitur, justo et volutpat dignissim, quam libero faucibus enim, vitae sodales dolor ex eget urna. Cras gravida nibh vitae cursus luctus. Praesent mollis eu tellus eu pellentesque. Phasellus et libero et dui tempus sollicitudin. Morbi faucibus, enim nec porttitor vehicula, metus turpis sagittis augue, sed tincidunt odio orci sollicitudin lorem. Ut vel turpis nulla. Praesent non dui leo. Quisque ut mi ac tortor convallis rhoncus.

                    Vestibulum ultrices lectus laoreet odio iaculis sagittis. Morbi cursus interdum nulla. Nulla facilisi. In elementum felis ut est malesuada aliquam et sit amet tortor. Nulla facilisi. Praesent id diam vitae diam euismod placerat. Aenean ligula diam, fermentum vel fermentum et, placerat sed ante. Donec vitae neque congue, molestie magna at, rutrum orci. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse lacinia mauris elit, volutpat molestie ante molestie ut. Ut mauris dolor, porttitor quis magna ac, porttitor eleifend ipsum. Nullam sed interdum dui, eu dignissim nunc. Donec dignissim, erat id cursus tempus, lorem elit faucibus arcu, ac vehicula enim nunc vel est.

                    Pellentesque nisi dolor, lacinia eget ligula non, gravida iaculis mi. Sed sed est erat. Integer et felis enim. Vivamus malesuada elit eros, quis imperdiet lectus pretium auctor. Morbi non mauris quis libero pretium ornare. Aenean semper a odio ac gravida. Duis varius feugiat urna eget elementum.

                    Aliquam sem sapien, maximus sodales ante quis, consequat tempus felis. Integer semper finibus nunc vitae vehicula. Nunc varius fringilla lacus quis convallis. Nulla rhoncus, libero vitae commodo tincidunt, nulla massa accumsan nulla, in dapibus enim justo id ligula. Aenean suscipit lacinia scelerisque. Praesent semper consectetur sapien. Nunc mattis ante sit amet nisl ullamcorper egestas. Morbi pretium sollicitudin sollicitudin. Praesent a est at urna tincidunt bibendum. Nullam eget fermentum libero, sed finibus erat. Aenean maximus justo ac magna eleifend consequat. Ut et risus nec urna egestas fermentum. Donec posuere fermentum tellus, eu egestas metus vehicula sed. </div>
            </div>

        </div>
        <div class="side">
            <img src="img.jpg" width=75% height=75%>
            <div id="sideContent">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean in molestie massa. Aliquam erat volutpat. Duis euismod, orci sed mollis porttitor, magna mi eleifend est, sit amet vestibulum urna lacus a est. Curabitur tristique arcu libero, sed euismod arcu pharetra a. Vestibulum vehicula hendrerit tellus vel venenatis. Proin ac orci nunc. Cras tincidunt augue nec eros consectetur accumsan. Fusce laoreet est a justo iaculis, sed porttitor dolor iaculis. Sed ac enim vitae diam lacinia varius a maximus nisl.

                Nunc eget mattis magna. Sed convallis mi vel nulla tristique placerat. Nam quis ligula nibh. Phasellus viverra fringilla interdum. Vestibulum tempus libero ut tortor mattis condimentum. Maecenas gravida fringilla est et tempor. Maecenas nibh elit, consequat non imperdiet in, dignissim non neque. Morbi interdum, neque quis semper pharetra, purus lectus tempus elit, non ornare mi velit in tortor. Morbi eu sodales urna, sollicitudin ultrices mi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut leo tellus, malesuada at lectus ac, consectetur finibus ante. Sed vel interdum est.

                Suspendisse rhoncus auctor mauris, at fermentum massa varius non. Aliquam molestie mattis laoreet. Suspendisse ut orci purus. Vestibulum placerat cursus mi, et pellentesque nulla tempor nec. Duis consequat, massa quis blandit posuere, arcu eros pellentesque quam, a sagittis nisl magna et dolor. Curabitur congue tortor sed lacinia aliquet. Pellentesque sit amet augue tincidunt, pulvinar nisl et, volutpat libero. Proin sit amet viverra lacus, id ultricies enim.
            </div>
        </div>

    </div>
</div>

</body>
</html>

