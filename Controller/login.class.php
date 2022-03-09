<?php

class login extends databaseController {

    protected function getUser($email, $password) {
        $statement = $this->connect()->prepare('SELECT user_password FROM user WHERE user_email =? OR user_password =? ;');

        if (!$statement->execute(array($email, $password))) {
            $statement = null;
            header("location: ../index.php?error=statementFailed");
            exit();
        }

        if ($statement->rowCount() == 0) {
            $statement = null;
            header("location: ../index.php?error=userNotfound");
            exit();
        }
        $hashPassword = $statement->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $hashPassword[0]["user_password"]);
        if ($checkPassword == false) {
            $statement = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        } elseif ($checkPassword == true) {
            $statement = $this->connect()->prepare('SELECT * FROM user WHERE user_email = ? OR user_name = ? AND user_password = ? ;');
            if (!$statement->execute(array($email,$userName,$password))) {
                $statement = null;
                header("location: ../index.php?error=statementFailed");
                exit();
            }
            if ($statement->rowCount() == 0) {
                $statement = null;
                header("location: ../index.php?error=usernotFound");
                exit();
            }
            $user = $statement->fetchAll(PDO::FETCH_ASSOC);
            session_start();

            $_SESSION["userid"] = $user[0]["user_id"];
            $_SESSION["userName"] = $user[0]["user_name"];
            $statement = null;
        }
        $statement = null;
    }

}
