<?php


class Signup extends Database{

      public function checkUser($username,$email,$isAdmin){
        $stmt = $this->getConnection()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');

        if(!$stmt->execute(array($username, $email))){
            $stmt = null;
          if ($isAdmin) {
            header("location: ../SignupPage.php?error=Something went wrong. Try Again !");
          }else{
            header("location: ../SignupPage.php?error=Something went wrong. Try Again !");
          }
            exit();
        }

        $resultCheck = false;
        if($stmt->rowCount() > 0){
            $resultCheck = false;
        }else {
            $resultCheck = true;
        }

        return $resultCheck;
      }

      protected function setUser( $username, $email, $password,$isAdmin){

        $hashedPass = password_hash($password, PASSWORD_DEFAULT);

      if($isAdmin){
        $stmt = $this->getConnection()->prepare('INSERT INTO users ( username, email, password,admin) VALUES (?, ?, ?,?);');

        if (!$stmt->execute(array($username, $email, $hashedPass,$isAdmin))) {

            $stmt = null;
            header("location: ../SignupPage.php?error=Something went wrong. Try Again !");
            exit();
        }
      }else{

        $stmt = $this->getConnection()->prepare('INSERT INTO users ( username, email, password) VALUES (?, ?, ?);');
        if (!$stmt->execute(array($username, $email, $hashedPass))) {

            $stmt = null;
            header("location: ../SignupPage.php?error=Something went wrong. Try Again !");
            exit();
        }

      }
            $stmt = null;

    }

}
