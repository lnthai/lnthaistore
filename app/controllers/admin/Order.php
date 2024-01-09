<?php
class Order extends Controller
{
    public function index()
    {
        $this->view('AdminMasterLayout', [
            'pages' => 'Order',
            'block' => 'order/list',
        ]);
    }
    public function list(){
        $this->view('AdminMasterLayout', [
            'pages' => 'Order',
            'block' => 'order/list',
        ]);
    }
}
