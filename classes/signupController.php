<?php

class SignupContr extends Signup
{

    private $username;
    private $email;
    private $password;
    private $confirmPassword;
    private $isAdmin;

    public function __construct($username, $email, $password, $confirmPassword, $isAdmin)
    {

        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->isAdmin = $isAdmin;
    }

    public function signupUser()
    {

        if ($this->emptyInputs() == false) {
            header("location: ../SignupPage.php?error=You have to complete all the fields");
            exit();
        }
        if ($this->invalidUsername() == false) {
            header("location: ../SignupPage.php?error=Username must have 6-32 chars,must start with a letter,only letters and numbers allowed");
            exit();
        }
        if ($this->invalidEmail() == false) {
            header("location: ../SignupPage.php?error=Enter a valid email!");
            exit();
        }
        if ($this->invalidPassword() == false) {
            header("location: ../SignupPage.php?error=Password must have Uppercase letter,lower case letter,8 or more chars and a number");
        }
        if ($this->passwordMatch() == false) {
            header("location: ../SignupPage.php?error=Passwords did not match.Try Again !");
            exit();
        }

        //Username taken

        if ($this->usernameTakenCheck() == false) {
            header("location: ../SignupPage.php?error=This username is already taken.Try something else !");
            exit();
        }

        $this->setUser($this->username, $this->email, $this->password, $this->isAdmin);
    }


    private function emptyInputs()
    {

        $results = false;
        if (empty($this->username) || empty($this->email) || empty($this->password) || empty($this->confirmPassword)) {
            $results = false;
        } else {
            $results = true;
        }

        return $results;
    }


    private function invalidUsername()
    {

        $results = false;

        if (!preg_match("/^[A-Za-z][A-Za-z0-9]{6,31}$/", $this->username)) {
            $results = false;
        } else {
            $results = true;
        }

        return $results;
    }


    private function invalidPassword()
    {

        $results = false;

        if (!preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $this->password)) {
            $results = false;
        } else {
            $results = true;
        }

        return $results;
    }

    private function invalidEmail()
    {
        $result = false;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function passwordMatch()
    {
        $result = false;

        if ($this->password !== $this->confirmPassword) {

            $result = false;
        } else {

            $result = true;
        }

        return $result;
    }


    private function usernameTakenCheck()
    {
        $result = false;

        if (!$this->checkUser($this->username, $this->email, $this->isAdmin)) {

            $result = false;
        } else {

            $result = true;
        }

        return $result;
    }
}
