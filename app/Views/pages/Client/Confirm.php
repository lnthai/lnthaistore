<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Đăng kí</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="/home">Trang chủ</a></li>
        <li class="breadcrumb-item active text-white">Đăng kí</li>
    </ol>
</div>
<section class="login_box_area section_gap" style="display: flex; justify-content: center; align-items: center;  padding: 50px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto" style="background-color: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
                <div class="login_form_inner">
                    <h3 style="text-align: center; margin-bottom: 30px; color: #333;">Xác nhận đăng kí</h3>
                    <form class="row login_form" action="/confirm" method="post" id="form-data">
                        <div class="col-md-12 form-group" style="margin-bottom: 20px;">
                            <input type="text" class="form-control" id="name" name="otp" placeholder="Mã OTP" style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 5px; font-size: 16px;">
                            <div class="alert text-danger" style="padding: 10px 0 0 0; margin-bottom:0; margin-left:7px;"></div>
                        </div>
                        <div class="col-md-12 form-group" style="margin-bottom: 20px;">
                            <button type="submit" onclick="confirm('/confirm',event)" value="submit" class="primary-btn" style="background-color: #81c408; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; border: none; width: 100%;">Đăng kí</button>
                            <br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

