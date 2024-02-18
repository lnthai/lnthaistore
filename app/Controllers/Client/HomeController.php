<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class HomeController extends BaseController
{
    private $ProductModel;
    public function index()
    {
        $this->ProductModel = new ProductModel();
        parent::view('ClientMasterLayout', [
            'pages' => 'Home',
            'product' => $this->ProductModel->getProductHot(),
            'vegetable' => $this->ProductModel->getVegetable(),
            'fruite' => $this->ProductModel->getFruite(),
            'box' => $this->ProductModel->getBox(),
            'meat' => $this->ProductModel->getMeat()
        ]);
    }
    public function addToCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $image = $_POST['image'];
            $price = $_POST['price'];
            $qty = 1;
            $found = false;
            $product = [
                'id' => $id,
                'name' => $name,
                'image' => $image,
                'price' => $price,
                'qty' => $qty
            ];
            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    if ($id == $item['id']) {
                        $_SESSION['cart']["$id"]['qty']++;
                        $found = true;
                        break;
                    }
                }
            }
            if (!$found) {
                $_SESSION['cart']["$id"] = $product;
            }
        }
    }
    public function logout()
    {
        session_unset();
        
    }
}
