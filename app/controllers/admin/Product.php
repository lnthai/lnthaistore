<?php
class Product {
    public function index(){
        echo "sanpham";
    }
    public function list(){
        echo "list";
    }
    public function detail($id='',$slug=''){
        echo "huhu".$id;
        echo "concac".$slug;
    }
}