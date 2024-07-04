<?php


class Product
{
    protected $conn;


    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }


    public function get_all_products()
    {

        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);

    }



    public function get_product($product_id)
    {

        $sql = "SELECT * FROM products WHERE product_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $product_id);
        $stmt->execute();
        $res = $stmt->get_result();

        return $res->fetch_assoc();
    }

    public function create($name, $price, $size, $image)
    {

        $sql = "INSERT INTO products (name, price,size, image) VALUES (?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $price, $size, $image);
        return $stmt->execute();
        // $res = $res->get_result();  
// return  $res->fetch_assoc(); 
    }



    public function update($name, $price, $size, $image, $product_id)
    {

        $sql = "UPDATE products SET name = ?, price = ?, image = ?,size = ? WHERE product_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssi", $name, $price, $size, $image, $product_id);

        return $stmt->execute();

    }

    public function delete($product_id)
    {


        $sql = "DELETE FROM products WHERE product_id = ? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();


    }



}

?>