<?php
ob_start();
$filePath = realpath(dirname(__FILE__));
require_once ($filePath.'/../lib/database.php');
require_once ($filePath.'/../helpers/helpers.php');


class Order
{   
    private $db; //database
    private $fm; //format

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function getOrderByCusId($cusId) {
        $query = "SELECT * FROM tb_order WHERE customerId = '$cusId'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getOrderTotalPrice($id) {
        $query = "SELECT sum(price) AS totalPrice FROM tb_order_details WHERE orderId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function convertIdOrder($id) {
        $numberOfZero = 4 - strlen($id);
        while($numberOfZero > 0) {
            $id = '0'.$id;
            $numberOfZero--;
        }
        echo 'HD'.$id;
    }
    public function getOrderDetailsByOrderId($id) {
        $query = "SELECT * FROM tb_order_details WHERE orderId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

}
ob_flush();
?>