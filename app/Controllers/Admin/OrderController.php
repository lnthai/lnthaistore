<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrderModel;
use App\Models\ProductModel;

class OrderController extends BaseController
{
    private $OrderModel;
    private $ProductModel;
    public function __construct()
    {
        parent::model('OrderModel');
        $this->OrderModel = new OrderModel;
        $this->ProductModel = new ProductModel;
    }
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $productId = $_POST['id'];
            $product = $this->OrderModel->getOne('products', 'id', $productId);
            echo json_encode(['quantity' => $product['qty']]);
            exit;
        }
        parent::view('AdminMasterLayout', [
            'pages' => 'Order',
            'block' => 'order/list',
            'order' => $this->OrderModel->getAll('orders'),
            'detail' => $this->OrderModel->getAll('order_detail')
        ]);
    }

    public function add()
    {
        if (isset($_POST['add'])) {
            $product = $_POST['productName'];
            $qty = $_POST['qty'];
            $order_code = $_POST['order_code'];
            $data = $this->ProductModel->getOne('products', 'id', $product);
            $id = $data['id'];
            $found = false;
            if (!empty($_SESSION['order'])) {
                foreach ($_SESSION['order'] as $item) {
                    if ($data['id'] == $item['id']) {
                        $_SESSION['order']["$id"]['qty'] += $qty;
                        $found = true;
                        break;
                    }
                }
            }
            if (!$found) {
                $data['qty'] = $qty;
                $data['order_code'] = $order_code;
                $_SESSION['order']["$data[id]"] = $data;
            }
            echo json_encode(['success' => true, 'message' => 'Đã thêm']);
            exit();
        }
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            if (!empty($_SESSION['order'])) {
                foreach ($_SESSION['order'] as $key => $item) {
                    if ($id == $item['id']) {
                        unset($_SESSION['order']["$id"]);
                        echo json_encode(['success' => true, 'message' => 'Đã xóa']);
                        exit();
                    }
                }
                if (empty($_SESSION['order'])) {
                    unset($_SESSION['order']);
                }
            }
        }
        if (isset($_POST['checkout'])) {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $product_id = $_POST['product_id'];
            $product_price = $_POST['product_price'];
            $product_qty = $_POST['product_qty'];
            $cityId = $_POST['city'];
            $districtId = $_POST['district'];
            $wardId = $_POST['ward'];
            $jsonData = file_get_contents('https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json');
            $data = json_decode($jsonData, true);
            $cityName = "";
            foreach ($data as $cityData) {
                if ($cityData['Id'] == $cityId) {
                    $cityName = $cityData['Name'];
                    break;
                }
            }
            $districtName = "";
            foreach ($data as $cityData) {
                foreach ($cityData['Districts'] as $districtData) {
                    if ($districtData['Id'] == $districtId) {
                        $districtName = $districtData['Name'];
                        break 2;
                    }
                }
            }
            $wardName = "";
            foreach ($data as $cityData) {
                foreach ($cityData['Districts'] as $districtData) {
                    foreach ($districtData['Wards'] as $wardData) {
                        if ($wardData['Id'] == $wardId) {
                            $wardName = $wardData['Name'];
                            break 2;
                        }
                    }
                }
            }
            $address = $wardName . ', ' . $districtName . ', ' . $cityName;
            $order_id = $this->OrderModel->insert('orders', [
                'cart_code' => $_SESSION['order_code'],
                'user_name' => $name,
                'user_address' => $address,
                'user_phone' => $phone,
                'cart_status' => 1
            ]);
            foreach ($_SESSION['order'] as $item) {
                $this->OrderModel->insert('order_detail', [
                    'order_id' => $order_id,
                    'cart_code' => $_SESSION['order_code'],
                    'product_id' => $item['id'],
                    'product_price' => $item['price'],
                    'qty' => $item['qty'],
                ]);
                $this->OrderModel->updateQty($item['id'], $item['qty']);
            }
            unset($_SESSION['order']);
            unset($_SESSION['order_code']);
            echo json_encode(['success' => true, 'message' => 'Đã thêm']);
            exit();
        }
        parent::view('AdminMasterLayout', [
            'pages' => 'Order',
            'block' => 'order/add',
            'products' => $this->OrderModel->getAll('products')
        ]);
    }

    public function detail(){
        $url = $_SERVER['REQUEST_URI'];
        $pattern = '/\/(\d+)$/';
        if (preg_match($pattern, $url, $matches)) {
            $order_id = $matches[1];
        }
        $this->OrderModel->update('orders', ['cart_status'=>1], 'id', $order_id);
        $detail = $this->OrderModel->getAllDetail($order_id);
        parent::view('AdminMasterLayout', [
            'pages' => 'Order',
            'block' => 'order/detail',
            'detail' => $detail,
        ]);
    }

    public function delete(){
        $url = $_SERVER['REQUEST_URI'];
        $pattern = '/\/(\d+)$/';
        if (preg_match($pattern, $url, $matches)) {
            $order_id = $matches[1];
        }
        $this->OrderModel->delete('orders', 'id', $order_id);
        $this->OrderModel->delete('order_detail', 'order_id', $order_id);
    }
}
