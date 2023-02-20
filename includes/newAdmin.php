<?php

include "./includes/login.php";

session_start();

if (isset($_POST["Submit"])) {

    //Grabing the data
    $username = $_POST["Username"];
    $password = $_POST["Password"];
    $confirmPassword = $_POST["ConfirmPassword"];
    $email = $_POST["Email"];
    $isAdmin = 1;

    //Instanciate SignupContr class
    include "../classes/DB.php";
    include "../classes/signupClass.php";
    include "../classes/newAdminController.php";

    $admin = new AdminContr($username, $email, $password, $confirmPassword, $isAdmin);
    $admin->signupUser();

    header("location: ../AdminBlogPage.php?admin=" . $_SESSION["username"] . "&newAdmin=New Admin created Successfully!");
}
