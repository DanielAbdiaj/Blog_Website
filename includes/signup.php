<?php

if (isset($_POST["Submit"])) {

    //Grabing the data
    $username = $_POST["Username"];
    $password = $_POST["Password"];
    $confirmPassword = $_POST["ConfirmPassword"];
    $email = $_POST["Email"];
    $isAdmin = 0;

    //Instanciate SignupContr class
    include "../classes/DB.php";
    include "../classes/signupClass.php";
    include "../classes/signupController.php";

    $signup = new SignupContr($username, $email, $password, $confirmPassword, $isAdmin);

    $signup->signupUser();

    header("location: ../index.php?success=You signed up successfully! Please re-login!");
}
