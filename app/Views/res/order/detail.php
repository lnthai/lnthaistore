<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
            <li><a href="javascript:void(0)" onclick="loadPage('/admin',this)" class="ajax-link">Trang chủ</a></li>
            <li>Đơn hàng</li>
        </ul>
        <a>
            <!-- <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
      <span>Premium Demo</span> -->
        </a>
    </div>
</section>
<div class="card has-table">
    <header class="card-header">
        <p class="card-header-title" style="font-size: 20px;">
            <span class="icon"><i class="mdi mdi-shopping"></i></span>
            Đơn hàng
        </p>
        <a href="javascript:void(0)" onclick="loadPage('/admin/order/list',this)" class="card-header-icon ajax-link">
            <span class="button small green" style="padding: 0 20px;
    line-height: 30px;
    font-size: 14px;"><i class="mdi mdi-arrow-left-bold" style="margin-right: 3px;"></i>Quay lại</span>
        </a>
    </header>
    <div class="card-content">
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Cart Code</th>
                    <th>Sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($data['detail'])) {
                    $stt = 1;
                    $total_product = 0;
                    $total = 0;
                    foreach ($data['detail'] as $item) {
                        $total_product = $item['product_price'] * $item['qty'];
                        $total += $total_product;
                ?>
                        <tr>
                            <td class="image-cell">
                                <?= $stt ?>
                            </td>
                            <td data-label="Name"><?= $item['cart_code'] ?></td>
                            <td data-label="Company"><?= $item['name'] ?></td>
                            <td data-label="City"><img src="<?= $item['image'] ?>" width="50px" height="50px" alt=""></td>
                            <td><?= number_format($item['product_price']) ?> VND</td>
                            <td data-label="Progress" class="progress-cell">
                                <?= $item['qty'] ?>
                            </td>
                            <td data-label="Created">
                                <?= number_format(($item['product_price']) * ($item['qty'])) ?> VND
                            </td>
                            <td class="actions-cell">
                                <div class="buttons right nowrap">
                                    <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                                        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                    </button>
                                </div>
                            </td>

                        </tr>
                    <?php
                        $stt++;
                    }
                    ?>
                <?php

                }
                ?>
            </tbody>
            
        </table>
        <h3 style="margin-left:1100px;margin-top:10px; font-size:20px">Tổng tiền : <?= number_format($total) ?> VND</h3>
        <div class="table-pagination">
            <div class="flex items-center justify-between">
                <div class="buttons">
                    <button type="button" class="button active">1</button>
                    <button type="button" class="button">2</button>
                    <button type="button" class="button">3</button>
                </div>
                <small>Page 1 of 3</small>
            </div>
        </div>
    </div>
</div>