<?php
class HomeClient extends Controller{
    private $HomeModel;
    function __construct(){
        $this->HomeModel = $this->model('HomeModel');
    }

    public function index(){

       $data = $this->HomeModel->getList();
      print_r($data);
    }
    public function detail($id='',$slug=''){
        echo "huhu".$id;
        echo "huhu".$slug;
    }
}