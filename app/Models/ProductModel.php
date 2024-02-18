<?php

namespace App\Models;

use App\Models\BaseModel;
use PDO;

class ProductModel extends BaseModel
{
   public function add()
   {
      echo "Add Product";
   }
   public function getAllProduct()
   {
      $query = "SELECT p.*, c.name as category FROM products p, categories c WHERE p.category_id = c.id";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
   public function getProductHot()
   {
      $query = "SELECT p.*, c.name as category FROM products p, categories c WHERE p.category_id = c.id ORDER BY qty ASC LIMIT 5";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
   public function getVegetable()
   {
      $query = "SELECT p.*, c.name as category FROM products p, categories c WHERE p.category_id = c.id AND c.id = 1 ORDER BY qty ASC";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
   public function getMeat()
   {
      $query = "SELECT p.*, c.name as category FROM products p, categories c WHERE p.category_id = c.id AND c.id = 2 ORDER BY qty ASC";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
   public function getFruite()
   {
      $query = "SELECT p.*, c.name as category FROM products p, categories c WHERE p.category_id = c.id AND c.id = 3 ORDER BY qty ASC";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
   public function getBox()
   {
      $query = "SELECT p.*, c.name as category FROM products p, categories c WHERE p.category_id = c.id AND c.id = 4 ORDER BY qty ASC";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
}
