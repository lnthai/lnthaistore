<?php
namespace App\Controllers\Client;

use App\Controllers\BaseController;

class CartController extends BaseController{
    public function __construct()
    {
       
    }
    public function index(){
        parent::view('ClientMasterLayout',[
            'pages' => 'Cart'
        ]);
    }
    public function upqty(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $qty = $_POST['qty'];
            var_dump($qty);
            // var_dump($_SESSION['cart']["$id"]['qty']);
            // $_SESSION['cart']["$id"]['qty'] = $qty;
        }
    }

    public function generateUpdatedCartContent(){
        ob_start();
        
    }
}