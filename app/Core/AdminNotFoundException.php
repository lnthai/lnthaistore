<?php
namespace App\Core;

use App\Controllers\BaseController;

class AdminNotFoundException extends BaseController{
    public function __construct()
    {
      parent::view('Admin404');
    }
}