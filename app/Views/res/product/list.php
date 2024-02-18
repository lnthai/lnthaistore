<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li><a href="javascript:void(0)" onclick="loadPage('/admin',this)" class="ajax-link">Trang chủ</a></li>
      <li>Sản phẩm</li>
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
      <span class="icon"><i class="mdi mdi-cube-outline"></i></span>
      Sản phẩm
    </p>
    <a href="javascript:void(0)" onclick="loadPage('/admin/product/create',this)" class="card-header-icon ajax-link">
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
          <th>Tên</th>
          <th class="text-center">Ảnh</th>
          <th>Danh mục</th>
          <th>Giá</th>
          <th>Tồn kho</th>
          <th>Trạng thái</th>
          <th>Ngày thêm</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($data['product'] as $item) {
        ?>
          <tr>
            <td><?= $item['id'] ?></td>
            <td data-label="Name"><?= $item['name'] ?></td>
            <td>
              <img src="<?= $item['image'] ?>" width="50px" height="50px">
            </td>
            <td data-label="Company"><?= $item['category'] ?></td>
            <td data-label="City"><?= number_format($item['price']) ?> VND</td>
            <td><?= $item['qty'] ?></td>
            <td data-label="Progress" class="progress-cell">
              <?= (!empty($item['qty'])||$item['qty']!=0) ? "<div style='color:green'>Còn hàng</div>" : "<div style='color:red'>Hết hàng</div>" ?>
            </td>
            <td data-label="Created">
              <small class="text-gray-500" title="Oct 25, 2021"><?= $item['created_at']?></small>
            </td>
            <td class="actions-cell">
              <div class="buttons right nowrap">
                <button class="button small green --jb-modal" data-target="sample-modal-2" type="button">
                  <span class="icon"><i class="mdi mdi-eye"></i></span>
                </button>
                <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                  <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                </button>
              </div>
            </td>
          </tr>
        <?php
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