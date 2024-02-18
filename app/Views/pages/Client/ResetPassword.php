<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Quên mật khẩu</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="/signin">Đăng nhập</a></li>
        <li class="breadcrumb-item active text-white">Quên mật khẩu</li>
    </ol>
</div>
<section class="login_box_area section_gap" style="display: flex; justify-content: center; align-items: center;  padding: 50px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto" style="background-color: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
                <div class="login_form_inner">
                    <h3 style="text-align: center; margin-bottom: 30px; color: #333;">Đặt lại mật khẩu</h3>
                    <form class="row login_form" action="/resetpassword" method="post" id="form-data">
                        <div class="col-md-12 form-group" style="margin-bottom: 20px;">
                            <input type="password" class="form-control" id="name" name="password" placeholder="Nhập mật khẩu mới" style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 5px; font-size: 16px;">
                            <div class="alert text-danger" style="padding: 10px 0 0 0; margin-bottom:0; margin-left:7px;"></div>
                        </div>
                        <div class="col-md-12 form-group" style="margin-bottom: 20px;">
                            <input type="password" class="form-control" id="name" name="confirmPassword" placeholder="Xác nhận mật khẩu mới" style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 5px; font-size: 16px;">
                            <div class="alert text-danger" style="padding: 10px 0 0 0; margin-bottom:0; margin-left:7px;"></div>
                        </div>
                        <div class="col-md-12 form-group" style="margin-bottom: 20px;">
                            <button type="submit" onclick="resetpass('/resetpassword',event)" value="submit" class="primary-btn" style="background-color: #81c408; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; border: none; width: 100%;">Tiếp theo</button>
                            <br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>