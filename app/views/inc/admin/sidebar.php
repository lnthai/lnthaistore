<aside class="aside is-placed-left is-expanded">
  <div class="aside-tools">
    <div>
      Trang quản trị
    </div>
  </div>
  <div class="menu is-menu-main">
    <ul class="menu-list" id="menu">
      <li id="sidebar">
        <a class="ajax-link" <?= (($_SERVER['REQUEST_URI'] === '/admin')) ? "style='background: #e5e7eb1c;'" : '' ?> href="javascript:void(0)" onclick="loadPage('/admin',this)">
          <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
          <span class="menu-item-label">Trang chủ</span>
        </a>
      </li>
    </ul>
    <ul class="menu-list" id="menu">
      <li class="--set-active-tables-html" id="sidebar">
        <a class="ajax-link" <?= (($_SERVER['REQUEST_URI'] === '/admin/order/list') || ($_SERVER['REQUEST_URI'] === '/admin/order')) ? "style='background: #e5e7eb1c;'" : '' ?> href="javascript:void(0)" onclick="loadPage('/admin/order/list',this)">
          <span class="icon"><i class="mdi mdi-table"></i></span>
          <span class="menu-item-label">Đơn hàng</span>
        </a>
      </li>
      <li class="--set-active-forms-html">
        <a class="ajax-link" <?= (($_SERVER['REQUEST_URI'] === '/admin/product/list') || ($_SERVER['REQUEST_URI'] === '/admin/product')) ? "style='background: #e5e7eb1c;'" : '' ?> href="javascript:void(0)" onclick="loadPage('/admin/product/list',this)">
          <span class="icon"><i class="mdi mdi-cube-outline"></i></span>
          <span class="menu-item-label">Sản phẩm</span>
        </a>
      </li>
      <!-- <li class="--set-active-forms-html">
        <a class="ajax-link" <?= (($_SERVER['REQUEST_URI'] === '/admin/category/list') || ($_SERVER['REQUEST_URI'] === '/admin/category')) ? "style='background: #e5e7eb1c;'" : '' ?> href="javascript:void(0)">
          <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
          <span class="menu-item-label">Danh mục</span>
        </a>
      </li> -->
      <li class="--set-active-profile-html">
        <a class="ajax-link" <?= (($_SERVER['REQUEST_URI'] === '/admin/user/list') || ($_SERVER['REQUEST_URI'] === '/admin/user')) ? "style='background: #e5e7eb1c;'" : '' ?> href="javascript:void(0)" onclick="loadPage('/admin/user/list',this)">
          <span class="icon"><i class="mdi mdi-account-circle"></i></span>
          <span class="menu-item-label">Người dùng</span>
        </a>
      </li>

    </ul>
  </div>
</aside>