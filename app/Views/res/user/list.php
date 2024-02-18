<div class="card has-table">
  <header class="card-header">
    <p class="card-header-title">
      <span class="icon"><i class="mdi mdi-shopping"></i></span>
      Khách hàng
    </p>
    <a href="javascript:void(0)" onclick="loadPage('/admin/user/create',this)" class="card-header-icon ajax-link">
      <span class="button small green" style="padding: 0 20px;
    line-height: 30px;
    font-size: 14px;"><i class="mdi mdi-plus-thick" style="margin-right: 3px;"></i>Thêm</span>
    </a>
  </header>
  <div class="card-content">
    <div class="table-respone" id="responseTable">
      <table>
        <thead>
          <tr>
            <th>STT</th>
            <th>Ảnh</th>
            <th>Tên KH</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($data['user'])) {
            foreach ($data['user'] as $item) {
          ?>
              <tr>
                <td class="image-cell">
                  <?= $item['id'] ?>
                </td>
                <td> <img src="/<?= $item['avatar'] ?>" alt="" width="50px" height="50px"></td>
                <td data-label="Name"><?= $item['name'] ?></td>
                <td data-label="Company"><?= $item['email'] ?></td>


                <td data-label="Progress" class="progress-cell">

                </td>
                <td data-label="Created">
                  <small class="text-gray-500"></small>

                </td>
                <td class="actions-cell">
                  <div class="buttons right nowrap">
                    <a class="button small green ajax-link" href="javascript:void(0)" onclick="loadPage('/admin/user/edit/<?= $item['id'] ?>',this)">
                      <span class="icon"><i class="mdi mdi-pencil"></i></span>
                    </a>
                    <button class="button small red --jb-modal" data-target="sample-modal<?= $item['id'] ?>" type="button">
                      <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                  </div>
                </td>
              </tr>
              <div id="sample-modal<?= $item['id'] ?>" class="modal">
                <form action="/admin/user/delete/<?= $item['id'] ?>" method="post">
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
                      <button class="button red" type="submit" onclick="deleteUser('/admin/user/delete/<?= $item['id'] ?>','<?= $item['id'] ?>',event)">Xóa</button>
                    </footer>
                  </div>
                </form>
              </div>
          <?php
            }
          }
          ?>
        </tbody>
      </table>
    </div>
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