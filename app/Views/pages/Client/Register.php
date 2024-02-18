<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Đăng kí</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="/home">Trang chủ</a></li>
        <li class="breadcrumb-item active text-white">Đăng kí</li>
    </ol>
</div>
<div class="" style="height:100px;background-color: #ffff;"></div>
<div class="container">
    <ul class="nav nav-pills nav-justified" id="ex1" role="tablist">
        <li class="nav-item ml-3" role="presentation">
            <a href="javascript:void(0)" onclick="loadPage('/signin',this)" class="nav-link ajax-link">Đăng nhập</a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="javascript:void(0)" onclick="loadPage('/register',this)" class="nav-link active ajax-link" id="tab-register">Đăng kí</a>
        </li>
    </ul>
</div>
<section class="login_box_area section_gap" style="display: flex; justify-content: center; align-items: center;  padding: 50px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6" style="position: relative; border-radius: 10px; overflow: hidden;">
                <div class="login_box_img" style="position: absolute;
                        left: 0;
                        top: 0;
                         height: 100%;
                        width: 100%;
                        background: #000;
                        ">
                    <img class="img-fluid" src="/public/assets/client/loginassets/img/login.jpg" alt="" style="width: 100%; border-radius: 10px;">
                    <div class="hover" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: #fff;">
                        <h4 style="font-size: 24px; margin-bottom: 10px; color:#000">Bạn đã có tài khoản?</h4>
                        <p style="font-size: 16px;">Đăng nhập ngay để nhận được những trải nghiệm thú vị</p>
                        <a class="primary-btn ajax-link" href="javascript:void(0)" onclick="loadPage('/signin',this)" style="background-color: #81c408; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 15px;">Đăng nhập tài khoản</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" style="background-color: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
                <div class="login_form_inner">
                    <h3 style="text-align: center; margin-bottom: 30px; color: #333;">Đăng kí</h3>
                    <form class="row login_form" action="/register" method="post" id="form-data">
                        <div class="col-md-12 form-group" style="margin-bottom: 20px;">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Họ và tên" style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 5px; font-size: 16px;">
                            <div class="alert text-danger" style="padding: 10px 0 0 0; margin-bottom:0; margin-left:7px;"></div>
                        </div>
                        <div class="col-md-12 form-group" style="margin-bottom: 20px;">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 5px; font-size: 16px;">
                        </div>
                        <div class="col-md-12 form-group" style="margin-bottom: 20px; position: relative;">
                            <div style="position: relative;">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" style="padding: 15px; border: 1px solid #ddd; border-radius: 5px 0 0 5px; font-size: 16px; display: inline-block; width: calc(100% - 50px);">
                                <span style="position: absolute; top: 50%; transform: translateY(-50%);cursor: pointer; width: 50px; font-size: 20px; height: 102%; background-color: #f0f0f0;border-radius: 0 5px 5px 0" onclick="togglePasswordVisibility()">
                                    <i id="eye" class="mdi mdi-eye-off" style="height: 100%; display: flex; align-items: center; margin-left:14px"></i>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-12 form-group" style="margin-bottom: 20px; position: relative;">
                            <div style="position: relative;">
                                <input type="password" class="form-control" id="password1" name="confirmPassword" placeholder="Nhập lại mật khẩu" style="padding: 15px; border: 1px solid #ddd; border-radius: 5px 0 0 5px; font-size: 16px; display: inline-block; width: calc(100% - 50px);">
                                <span style="position: absolute; top: 50%; transform: translateY(-50%);cursor: pointer; width: 50px; font-size: 20px; height: 102%; background-color: #f0f0f0;border-radius: 0 5px 5px 0" onclick="togglePasswordVisibility1()">
                                    <i id="eye1" class="mdi mdi-eye-off" style="height: 100%; display: flex; align-items: center; margin-left:14px"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12 form-group" style="margin-bottom: 20px;">
                            <button type="submit" onclick="register('/register',event)" value="submit" class="primary-btn" style="background-color: #81c408; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; border: none; width: 100%;">Đăng kí</button>
                            <br>
                        </div>

                    </form>
                    <div class="loading" id="loading">
                        <i class="fas fa-spinner fa-spin loading-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>