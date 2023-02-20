
<?php
if (isset($_POST["Submit"])) {

    $username = $_POST["Username"];
    $password = $_POST["Password"];

    //Instantiate the contr class

    include "../classes/DB.php";
    include "../classes/loginClass.php";
    include "../classes/loginController.php";

    $login = new LoginContr($username, $password);

    //error handlers /user signup

    $login->loginUser();


    //goingback to frontpage


    if ($_SESSION["admin"]) {
        header("location: ../AdminBlogPage.php?admin=" . $username . "&error=none");
    } else {
        header("location: ../UserBlogPage.php?user=" . $username . "&error=none");
    }
}
