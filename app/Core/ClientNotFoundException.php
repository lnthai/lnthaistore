<?php
namespace App\Core;

use App\Controllers\BaseController;

class ClientNotFoundException extends BaseController{
    public function __construct(){
       parent::view('ClientMasterLayout',[
            'pages' =>'404'
       ]);
    }
}