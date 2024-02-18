<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fruitables</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">

    <!-- Libraries Stylesheet -->
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="/public/assets/client/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/public/assets/client/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .loading {
            display: none;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.5);
            text-align: center;
        }

        .loading-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 50px;
        }
    </style>
</head>

<body>
    <div id="app">
        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">123 Nguyễn Văn Linh, Cần Thơ</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">thailnpc05781@fpt.edu.vn</a></small>
                    </div>
                    <div class="top-link pe-2">
                        <a href="#" class="text-white"><small class="text-white mx-2">FPT Polytechnic</small>/</a>
                        <a href="#" class="text-white"><small class="text-white mx-2">WD18301</small>/</a>
                        <a href="https://www.facebook.com/profile.php?id=100025386050403" target="_blank" class="text-white"><small class="text-white ms-2">Lê Nhựt Thái</small></a>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="" class="navbar-brand">
                        <h1 class="text-primary display-6">Fruitables</h1>
                    </a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="javascript:void(0)" onclick="loadPage('/home',this)" class="nav-item nav-link ajax-link <?= (($_SERVER['REQUEST_URI'] === '/home') || ($_SERVER['REQUEST_URI'] === '/')) ? 'active' : '' ?>">Trang chủ</a>
                            <a href="javascript:void(0)" onclick="loadPage('/about',this)" class="nav-item nav-link ajax-link">Giới thiệu</a>
                            <a class="nav-item nav-link ajax-link <?= (($_SERVER['REQUEST_URI'] === '/shop')) ? 'active' : '' ?>">Cửa hàng</a>
                            <a href="contact.html" class="nav-item nav-link ajax-link">Liên hệ</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                            <a href="javascript:void(0)" onclick="loadPage('/cart',this)" class="position-relative me-4 my-auto ajax-link">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;"><?= !empty($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?></span>
                            </a>

                            <?php
                            if (empty($_SESSION['user'])) {
                            ?>
                                <a href="javascript:void(0)" onclick="loadPage('/signin',this)" class="my-auto ajax-link">
                                    <i class="fas fa-user fa-2x"></i>
                                </a>

                            <?php
                            } else {
                            ?>
                                <div class="user-avatar">
                                    <img style="border-radius: 9999px; margin:5px 0px 0 15px" height="30px" src="<?= !empty($_SESSION['user']['avatar']) ? $_SESSION['user']['avatar'] : 'https://inkythuatso.com/uploads/thumbnails/800/2023/03/9-anh-dai-dien-trang-inkythuatso-03-15-27-03.jpg' ?>" alt="avata" class="rounded-full">
                                </div>
                                <div class="nav-item dropdown">

                                    <a href="javascript:void(0)" onclick="loadPage('/proflie',this)" class="my-auto ajax-link nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                        <?= $_SESSION['user']['name'] ?></i>
                                    </a>
                                    <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                        <a href="cart.html" class="dropdown-item">Tài khoản của tôi</a>
                                        <a href="chackout.html" class="dropdown-item">Đơn mua</a>
                                        <a href="javascript:void(0)" onclick="logout('/logout',this)" class="dropdown-item ajax-link">Đăng xuất</a>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tìm kiếm từ khóa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="Từ khóa...." aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>