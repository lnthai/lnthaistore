<?php

namespace App\Models;

use App\Models\BaseModel;
use PDO;
class OrderModel extends BaseModel
{
    public function updateQty($id, $qty)
    {
        $sql = "UPDATE products SET qty = qty - :qty WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':qty', $qty, PDO::PARAM_INT);
        $stmt->execute();
        return true; 
    }

    public function getAllDetail($order_id){
        $sql = "SELECT o.*, p.name, p.image FROM order_detail o, products p WHERE order_id = :order_id AND o.product_id = p.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result; 
    }
}
