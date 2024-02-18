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
    <a href="javascript:void(0)" onclick="loadPage('/admin/order/create',this)" class="card-header-icon ajax-link">
      <span class="button small green" style="padding: 0 20px;
    line-height: 30px;
    font-size: 14px;"><i class="mdi mdi-plus-thick" style="margin-right: 3px;"></i>Thêm</span>
    </a>
  </header>
  <div class="card-content">
    <table>
      <thead>
        <tr>
          <th>STT</th>
          <th>Tên KH</th>
          <th>Email hoặc SDT</th>
          <th>Địa chỉ</th>
          <th>Cart_code</th>
          <th>Trạng thái</th>
          <th>Ngày đặt</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (!empty($data['order'])) {
          $stt = 1;
          foreach ($data['order'] as $item) {
        ?>
            <tr>
              <td class="image-cell">
                <?= $stt ?>
              </td>
              <td data-label="Name"><?= $item['user_name'] ?></td>
              <td data-label="Company"><?= !empty($item['user_email']) ? $item['user_email'] : $item['user_phone'] ?></td>
              <td data-label="City"><?= $item['user_address'] ?></td>
              <td><?= $item['cart_code'] ?></td>
              <td data-label="Progress" class="progress-cell">
                <?= ($item['cart_status'] == 1) ? '<div style="color:green">Đã xử lí</div>' : '<div style="color:orange">Đơn hàng mới</div>' ?>
              </td>
              <td data-label="Created">
                <small class="text-gray-500" title="Oct 25, 2021"><?= $item['created_at'] ?></small>
              </td>
              <td class="actions-cell">
                <div class="buttons right nowrap">
                  <button class="button small green --jb-modal" onclick="loadPage('/admin/order/detail/<?= $item['id'] ?>')" data-target="sample-modal-2" type="button">
                    <span class="icon"><i class="mdi mdi-eye"></i></span>
                  </button>
                  <button class="button small red --jb-modal" data-target="sample-modal<?= $item['id'] ?>" type="button">
                      <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                </div>
              </td>
            </tr>
            <div id="sample-modal<?= $item['id'] ?>" class="modal">
              <form action="/admin/order/delete/<?= $item['id'] ?>" method="post">
                <div class="modal-background --jb-modal-close"></div>
                <div class="modal-card">
                  <header class="modal-card-head">
                    <p class="modal-card-title">Thông báo</p>
                  </header>
                  <section class="modal-card-body">
                    <p>Bạn có chắc chắn muốn xóa?</b></p>
                  </section>
                  <footer class="modal-card-foot">
                    <button class="button --jb-modal-close">Hủy</button>
                    <button class="button red" type="submit" onclick="deleteOrders('/admin/order/delete/<?= $item['id']?>','<?= $item['id'] ?>',event)">Xóa</button>
                  </footer>
                </div>
              </form>
            </div>
        <?php
            $stt++;
          }
        }
        ?>
      </tbody>
    </table>
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