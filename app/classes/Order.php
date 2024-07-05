<?php
require_once "app/classes/Cart.php";



class Order extends Cart
{

    protected $conn;


    public function __construct()
    {

        global $conn;
        $this->conn = $conn;


    }
    public function create_order($delivery_address)
    {


        $sql = "INSERT INTO orders (user_id, delivery_address) VALUES (?,?)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("is", $_SESSION["user_id"], $delivery_address);

        $stmt->execute();

        $order_id = $this->conn->insert_id;


        $cart_items = $this->get_all_items();

        $sql = "INSERT INTO order_items (order_id,  product_id, quantity) VALUES (?,?,?)";


        $stmt = $this->conn->prepare($sql);
        foreach ($cart_items as $item) {

            $stmt->bind_param("iis", $order_id, $item["product_id"], $item["quantity"]);
            $stmt->execute();
        }



        return $this->destroy_cart();
    }


    public function get_all_orders()
    {

        $user_id = $_SESSION["user_id"];

        $sql = "SELECT orders.order_id, orders.delivery_address, orders.created_at ,order_items.quantity, products.name, products.size, products.price, products.image FROM orders  INNER JOIN order_items ON orders.order_id = order_items.order_items_id
INNER JOIN products ON order_items.product_id = products.product_id WHERE orders.user_id = ?
 ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);


        $stmt->execute();

        $res = $stmt->get_result();

        return $res->fetch_all(MYSQLI_ASSOC);
    }


}
?>