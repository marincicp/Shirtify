<?php

class Cart
{
    protected $conn;

    public function __construct()
    {

        global $conn;

        $this->conn = $conn;


    }

    public function add_to_cart($user_id, $product_id, $quantity)
    {

        $sql = "INSERT INTO cart (user_id, product_id,quantity) VALUES (?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $user_id, $product_id, $quantity);
        $stmt->execute();

    }


    public function get_all_items()
    {

        $sql = "SELECT  products.product_id, products.name, products.price, products.size, products.image ,cart.quantity FROM cart INNER JOIN products ON cart.product_id = products.product_id WHERE cart.user_id = ?  ";



        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $_SESSION["user_id"]);
        $stmt->execute();

        $res = $stmt->get_result();
        return $res = $res->fetch_all(MYSQLI_ASSOC);

    }
    public function destroy_cart()
    {

        $stmt = $this->conn->prepare("DELETE FROM cart WHERE user_id = ?");

        $stmt->bind_param("i", $_SESSION["user_id"]);
        $stmt->execute();

    }


}



?>