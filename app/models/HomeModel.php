<?php
class HomeModel{
    protected $_table = 'products';

    public function getList(){
        $data= [
            'sp1',
            'sp2',
            'sp3',
        ];
        return $data;
    }
}