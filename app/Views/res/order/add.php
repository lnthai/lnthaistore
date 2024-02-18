<?php
if (!isset($_SESSION['order_code'])) {
    $_SESSION['order_code'] = sprintf("%04d", rand(0, 9999));
}
$order_code = $_SESSION['order_code'];
?>
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
            <li><a class="ajax-link" href="javascript:void(0)" onclick="loadPage('/admin/order/list',this)">Đơn hàng</a></li>
            <li>Thêm đơn hàng</li>
        </ul>
    </div>
</section>

<section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <h1 class="title">
            Thêm Đơn Hàng
        </h1>
    </div>
</section>

<section class="section main-section">
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6" style="grid-template-columns: 2fr 1fr;">
        <form class="card" id="form-data1" action="/admin/order/create">
            <header class="card-header" style="display: flex; flex-direction: column; align-items: center;">
                <h1 class="card-header-title" style="font-size: 30px;">
                    Đơn Hàng
                </h1>
                <div style="display: flex; flex-direction: column; align-items: center; font-size: 20px;">
                    <label class="label" style="margin-bottom: 8px; margin-left:183px">Mã đơn hàng: <input type="text" name="order_code" value="<?= $order_code?>" disabled></label>
                </div>
                <div style="display: flex; flex-direction: column; align-items: center; font-size: 20px;">
                    <label class="label" style="margin-bottom: 8px; margin-left:120px">Ngày tạo: <input type="text" value="<?php echo date("d-m-Y"); ?>" disabled></label>
                </div>
            </header>

            <div class="card-content">
                <div>
                    <div class="field">
                        <label class="label">Họ và tên</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" id="name" name="name" value="" class="input" required="" placeholder="Nhập tên KH...">
                                </div>
                                <p id="name-error" style="color:red;" class="error-msg"></p>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Số điện thoại</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" id="phone" name="phone" value="" class="input" required="" placeholder="Nhập số điện thoại...">
                                </div>
                                <p id="phone-error" style="color:red;" class="error-msg"></p>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Địa chỉ</label>
                        <div class="field-body">
                            <div class="field">
                                <div>
                                    <select class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm" name="city">
                                        <option value="" selected>Chọn tỉnh thành</option>
                                    </select>

                                    <select class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm" name="district">
                                        <option value="" selected>Chọn quận huyện</option>
                                    </select>

                                    <select class="form-select form-select-sm" id="ward" aria-label=".form-select-sm" name="ward">
                                        <option value="" selected>Chọn phường xã</option>
                                    </select>
                                </div>
                                <p id="address-error" style="color:red;" class="error-msg"></p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <table style="border-collapse: collapse; width: 90%; margin: 0 auto;">
                        <thead>
                            <tr>
                                <th style="border: 1px solid #ddd; border-bottom: 2px solid #ddd; padding: 8px; text-align: left;">#</th>
                                <th style="border: 1px solid #ddd; border-bottom: 2px solid #ddd; padding: 8px; text-align: left;">Ảnh</th>
                                <th style="border: 1px solid #ddd; border-bottom: 2px solid #ddd; padding: 8px; text-align: left;">Tên sản phẩm</th>
                                <th style="border: 1px solid #ddd; border-bottom: 2px solid #ddd; padding: 8px; text-align: left;">Số lượng</th>
                                <th style="border: 1px solid #ddd; border-bottom: 2px solid #ddd; padding: 8px; text-align: left;">Đơn giá</th>
                                <th style="border: 1px solid #ddd; border-bottom: 2px solid #ddd; padding: 8px; text-align: left;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($_SESSION['order'])) {
                                $stt = 1;   
                                foreach ($_SESSION['order'] as $key => $item) {
                            ?>
                                    <tr>
                                        <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?= $stt ?></td>
                                        <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><img src="<?= $item['image'] ?>" alt="" height="50px" width="50px"></td>
                                        <td style="border: 1px solid #ddd; padding: 8px; text-align: left;" data-label="Name"><?= $item['name'] ?></td>
                                        <td style="border: 1px solid #ddd; padding: 8px; text-align: left;" data-label="Company"><?= $item['qty'] ?></td>
                                        <td style="border: 1px solid #ddd; padding: 8px; text-align: left;" data-label="City"><?= number_format($item['price'])?> Vnđ</td>
                                        <td style="border: 1px solid #ddd; padding: 8px; text-align: left;" data-label="City">
                                            <button class="button small red --jb-modal" data-target="sample-modal" type="button" onclick="deleteOrder('/admin/order/create',<?= $item['id']?>,event)">
                                                <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                            </button>
                                        </td>
                                        <input type="hidden" id="product_id" value="<?= $item['id']?>" name="product_id">
                                        <input type="hidden" value="<?= $item['price']?>" name="product_price">
                                        <input type="hidden" value="<?= $item['qty']?>" name="product_qty">
                                    </tr>
                                <?php
                                    $stt++;
                                }
                            } else {
                                ?>
                                <tr>
                                    <td style="border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; border-left: 1px solid #ddd; padding: 8px; text-align: left;"></td>
                                    <td style="border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; border-left: none; padding: 8px; text-align: left;"></td>
                                    <td style="border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; border-left: none; padding: 8px; text-align: left;"></td>
                                    <td style="border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; border-right: none; padding: 8px; text-align: left;">Hiện không có sản phẩm nào</td>
                                    <td style="border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; border-right: none; padding: 8px; text-align: left;"></td>
                                    <td style="border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; border-left: none; border-right: 1px solid #ddd; padding: 8px; text-align: left;"></td>

                                <?php
                            }
                                ?>
                                </tr>
                        </tbody>
                    </table>
                    <p id="product-error" style="color:red;" class="error-msg"></p>
                    <br>
                    <div class="field">
                        <div class="control">
                            <button type="submit" onclick="checkOut('/admin/order/create', event)" class="button green" name="checkout" <?= !empty($_SESSION['order'])?'':'disabled' ?>>
                                <span class="icon"><i class="mdi mdi-content-save"></i></span>
                                Tạo đơn hàng
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form class="card" style="height: 400px;" method="post" id="form-data" action="/admin/order/create">
            <header class="card-header">
                <p class="card-header-title" style="font-size: 20px;">
                    <span class="icon"><i class="mdi mdi-cube-outline"></i></span>
                    Sản Phẩm
                </p>
            </header>
            <div class="card-content">
                <div class="field">
                    <label class="label">Tên sản phẩm</label>
                    <select class="form-select input" id="product-select" name="productName">
                        <option value="0" selected>Chọn sản phẩm</option>
                        <?php if (!empty($data['products'])) {
                            foreach ($data['products'] as $product) {
                        ?>
                                <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <span id="product-quantity"></span>
                </div>
                <div class="field">
                    <label class="label">Số lượng</label>
                    <input type="number" value="1" class="input" name="qty">
                </div>
                <div class="field">
                    <div class="control">
                        <input type="hidden" name="order_code" value="<?= $order_code?>">
                        <button type="submit" name="add" class="button green" onclick="insertOrder('/admin/order/create', 'add' , event)">
                            <span class="icon"><i class="mdi mdi-content-save"></i></span>
                            Thêm
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>