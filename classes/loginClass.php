
<?php

class Login extends Database
{

    protected function getUser($username, $password)
    {

        $stmt = $this->getConnection()->prepare('SELECT password FROM users WHERE username = ? OR email = ?;');

        if (!$stmt->execute(array($username, $username))) {

            $stmt = null;
            header("location: ../LoginPage.php?error=Something went wrong. Try Again !");
            exit();
        }

        if ($stmt->rowCount() === 0) {
            $stmt = null;
            header("location: ../LoginPage.php?error=User Not Found!");
            exit();
        }

        $passHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPass = password_verify($password, $passHashed[0]["password"]);

        if ($checkPass == false) {

            $stmt = null;
            header("location: ../LoginPage.php?error=" . "Wrong Password. Try Again !");
            exit();
        } elseif ($checkPass == true) {
            $stmt = $this->getConnection()->prepare('SELECT * FROM users WHERE username = ? OR email = ? AND password = ?;');

            if (!$stmt->execute(array($username, $username, $passHashed[0]["password"]))) {

                $stmt = null;
                header("location: ../LoginPage.php?error=Something went wrong. Try Again !");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["id"] = $user[0]["id"];
            $_SESSION["username"] = $user[0]["username"];
            $_SESSION["admin"] = $user[0]["admin"];

            $stmt = null;
        }
    }
}
