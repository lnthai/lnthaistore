<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ProductModel;

class ProductController extends BaseController
{
    private $ProductModel;
    private $CategoryModel;
    public function __construct(){
        // parent::model('ProductModel'); 
        // parent::model('CategoryModel');
        $this->ProductModel = new ProductModel();
        $this->CategoryModel = new CategoryModel();
    }
    public function index()
    {
        parent::view('AdminMasterLayout', [
            'pages' => 'Product',   
            'block' => 'product/list',
            'product' => $this->ProductModel->getAllProduct()
        ]);
    }
    public function create()
    {
        parent::view('AdminMasterLayout', [
            'pages' => 'Product',
            'block' => 'product/add',
            'category' => $this->CategoryModel->getAll('categories')
        ]);
    }
}
