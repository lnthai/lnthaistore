<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
            <li><a class="ajax-link" href="javascript:void(0)" onclick="loadPage('/admin/user/list',this)">Người dùng</a></li>
            <li>Thêm người dùng</li>
        </ul>
    </div>
</section>

<section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <h1 class="title">
            Thêm Người Dùng
        </h1>
    </div>
</section>

<section class="section main-section">
    <div class="card mb-6">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-ballot"></i></span>
                Form
            </p>
        </header>
        <div class="card-content">
            <form method="post" id="form-data" action="/admin/user/create" enctype="multipart/form-data">
                <div class="field">
                    <label class="label"></label>
                    <div class="field-body">
                        <div class="field">
                            <div class="control icons-left">
                                <input class="input" type="text" placeholder="Họ và tên" name="name">
                                <span class="icon left"><i class="mdi mdi-account"></i></span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control icons-left icons-right">
                                <input class="input" type="email" placeholder="Email" value="" name="email">
                                <span class="icon left"><i class="mdi mdi-mail"></i></span>
                                <span class="icon right"><i class="mdi mdi-check"></i></span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control icons-left icons-right">
                                <input class="input" type="password" placeholder="Mật khẩu" value="" name="password">
                                <span class="icon left"><i class="mdi mdi-lock"></i></span>
                                <span class="icon right"><i class="mdi mdi-check"></i></span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control icons-left icons-right">
                                <input class="input" type="file" placeholder="Ảnh đại diện" value="" title="Ảnh đại diện" name="avatar">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="field grouped">
                    <div class="control">
                        <button type="submit" class="button green" onclick="insert('/admin/user/create',event)">
                            Thêm
                        </button>
                    </div>
                    <div class="control">
                        <button type="reset" class="button red">
                            Quay lại
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>