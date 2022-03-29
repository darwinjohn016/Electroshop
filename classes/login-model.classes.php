<?php

class LoginModel extends Database{

    protected function getUser($users_username,$users_email,$users_password){

        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_username = ? OR users_email = ?');

        if(!$stmt->execute([$users_username,$users_email])){
            $stmt = null;
            header("Location:./login.php?error=stmtfailed");
            exit();
        }

        $fetch= $stmt->fetchAll();



        if(!empty($fetch)){
            $unhashed_password = password_verify($users_password,$fetch[0]['users_password']);

            if($unhashed_password == true){

                $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_username = ? OR users_email = ?');

                if(!$stmt->execute([$users_username,$users_email])){
                    $stmt = null;
                    header("Location:./login.php?error=stmtfailed");
                    exit();
                }

                $fetch= $stmt->fetchAll();

                $_SESSION['user'] = $fetch[0]['users_username'];

                echo '<script>
                window.location.href="./index.php";
                </script>';

                
        
            }

            else {
                $stmt = null;
                echo '<script>
                alert("Wrong Password")
                window.location.href = "./login.php";
                </script>';
            }

        }

        else {
            $stmt = null;
            echo '<script>
            alert("No User Found")
            window.location.href = "./login.php";
            </script>';
            
        }

    }

}