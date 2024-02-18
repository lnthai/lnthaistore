<?php

namespace App;

use App\Core\Route;
use App\Controllers\Admin\LoginController as LoginAdminController;
use App\Controllers\Admin\HomeController as HomeAdminController;
use App\Controllers\Admin\ProductController as ProductAdminController;
use App\Controllers\Admin\OrderController as OrderAdminController;
use App\Controllers\Admin\UserController as UserAdminController;
use App\Controllers\Client\HomeController as HomeClientController;
use App\Controllers\Client\LoginController as LoginClientController;
use App\Controllers\Client\RegisterController as RegisterClientController;
use App\Controllers\Client\ForgotController as ForgotClientController;
use App\Controllers\Client\ResetPasswordController as ResetPasswordClientController;
use App\Controllers\Client\CartController as CartClientController;


class routes
{   
    public function __construct()
    {
        $route = new Route;
        $userType = strpos($_SERVER['REQUEST_URI'], '/admin') === 0 ? 'admin' : 'client';
        if ($userType === 'admin') {
            $this->checkLogin();
        }
        $route->get('/admin', [HomeAdminController::class, 'index'])
            //ADMIN
            //admin login
            ->get('/login', [LoginAdminController::class, 'index'])
            ->post('/login', [LoginAdminController::class, 'index'])
            //admin logout
            ->get('/admin/logout', [LoginAdminController::class, 'logout'])
            ->get('/resetpassword', [LoginAdminController::class, 'reset_password'])
            //admin/product
            ->get('/admin/product', [ProductAdminController::class, 'index'])
            ->get('/admin/product/list', [ProductAdminController::class, 'index'])
            ->get('/admin/product/create', [ProductAdminController::class, 'create'])

            //admin/order
            ->get('/admin/order/list', [OrderAdminController::class, 'index'])
            ->post('/admin/order/list', [OrderAdminController::class, 'index'])
            ->get('/admin/order/detail/(\d+)', [OrderAdminController::class, 'detail'])
            ->get('/admin/order', [OrderAdminController::class, 'index'])
            ->get('/admin/order/create', [OrderAdminController::class, 'add'])
            ->post('/admin/order/create', [OrderAdminController::class, 'add'])
            ->get('/admin/order/delete/(\d+)', [OrderAdminController::class, 'delete'])
            ->post('/admin/order/delete/(\d+)', [OrderAdminController::class, 'delete'])

            //admin/user
            ->get('/admin/user/list', [UserAdminController::class, 'index'])
            ->get('/admin/user', [UserAdminController::class, 'index'])
            ->get('/admin/user/create', [UserAdminController::class, 'create'])
            ->post('/admin/user/create', [UserAdminController::class, 'create'])
            ->get('/admin/user/edit/(\d+)', [UserAdminController::class, 'edit'])
            ->post('/admin/user/edit/(\d+)', [UserAdminController::class, 'edit'])
            ->get('/admin/user/delete/(\d+)', [UserAdminController::class, 'delete'])
            ->post('/admin/user/delete/(\d+)', [UserAdminController::class, 'delete'])


            //CLIENT
            //home
            ->get('', [HomeClientController::class, 'index'])
            ->get('/home', [HomeClientController::class, 'index'])
            ->post('', [HomeClientController::class, 'addToCart'])

            //login
            ->get('/signin', [LoginClientController::class, 'index'])
            ->post('/signin', [LoginClientController::class, 'index'])

            //register
            ->get('/register', [RegisterClientController::class, 'index'])
            ->post('/register', [RegisterClientController::class, 'index'])
            ->get('/confirm', [RegisterClientController::class, 'confirm'])
            ->post('/confirm', [RegisterClientController::class, 'confirm'])

            //logout
            ->get('/logout', [HomeClientController::class, 'logout'])

            //forgot password
            ->get('/forgot', [ForgotClientController::class, 'index'])
            ->post('/forgot', [ForgotClientController::class, 'index'])

            //reset pasword
            ->get('/resetpassword', [ResetPasswordClientController::class, 'index'])
            ->post('/resetpassword', [ResetPasswordClientController::class, 'index'])

            //cart
            ->get('/cart', [CartClientController::class, 'index'])
            ->post('/cart/upqty', [CartClientController::class, 'upqty'])
            ;
        try {
            $route->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']), $userType);
        } catch (\Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }
    private function checkLogin()
    {
        if (!isset($_SESSION['admin'])) {
            header('Location: /login'); 
            exit();
        }
    }
}
