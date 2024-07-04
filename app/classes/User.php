<?php

class User
{
    protected $conn;

    public function __construct()
    {

        global $conn;
        $this->conn = $conn;

    }


    public function create($name, $username, $email, $password)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, username, password, email) values (?,?,?,?)";
        $run = $this->conn->prepare($sql);
        $run->bind_param("ssss", $name, $username, $hashed_password, $email);
        $result = $run->execute();

        var_dump($result);

        if ($result) {

            $_SESSION["user_id"] = $this->conn->insert_id;
            return true;

        }
        return false;
    }

    public function login($username, $password)
    {
        $sql = "SELECT user_id, password FROM users WHERE username =  ?";
        $run = $this->conn->prepare($sql);
        $run->bind_param("s", $username);
        $run->execute();
        $res = $run->get_result();

        if ($res->num_rows == 1) {
            $user = $res->fetch_assoc();
            var_dump($user);


            if (password_verify($password, $user["password"])) {
                $_SESSION["user_id"] = $user["user_id"];
                return true;
            } else {
                var_dump("Password verification failed.");
            }
        } else {
            var_dump("No user found.");
        }

        return false;
    }

    public function is_logged()
    {
        if (isset($_SESSION["user_id"])) {
            return true;
        } else {
            return false;
        }

    }

    public function is_admin()
    {


        $sql = "SELECT * FROM users where user_id = ? AND is_admin = 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $_SESSION["user_id"]);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows == 1) {
            return true;

        }
        return false;

    }


    public function logout()
    {
        unset($_SESSION["user_id"]);

    }
}