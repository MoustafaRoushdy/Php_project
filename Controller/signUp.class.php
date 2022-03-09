<?php

class signUp extends databaseController {
    protected function setUser($userName,$password, $email) {
        $statement = $this->connect()->prepare('INSERT INTO user (user_name,user_password,user_email) VALUES (?,?,?)');
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        if (!$statement->execute(array($userName,$hashPassword, $email))) {
            $statement = null;
            header("location: ../index.php?error=statementFailed");
            exit();
        }
      $statement = null;
    }

    protected function checkUser($userName, $email) {
        $statement = $this->connect()->prepare('SELECT user_name FROM user WHERE user_name=? OR user_email=? ;');
        if (!$statement->execute(array($userName, $email))) {
            $statement = null;
            header("location: ../index.php?error=statementFailed");
            exit();
        }
        $resultCheck;
        if ($statement->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

}
