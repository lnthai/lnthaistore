<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
            <li><a class="ajax-link" href="javascript:void(0)" onclick="loadPage('/admin/user/list',this)">Người dùng</a></li>
            <li>Sửa người dùng</li>
        </ul>
    </div>
</section>

<section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <h1 class="title">
            Sửa Người Dùng
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
            <form method="post" id="form-data" action="/admin/user/edit/<?= $data['user']['id']?>">
                    <div class="field">
                        <label class="label"></label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control icons-left">
                                    <input class="input" type="text" placeholder="Họ và tên" name="name" value="<?= $data['user']['name']?>">
                                    <span class="icon left"><i class="mdi mdi-account"></i></span>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control icons-left icons-right">
                                    <input class="input" type="email" placeholder="Email" name="email" value="<?= $data['user']['email']?>">
                                    <span class="icon left"><i class="mdi mdi-mail"></i></span>
                                    <span class="icon right"><i class="mdi mdi-check"></i></span>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control icons-left icons-right">
                                    <input class="input" type="file" title="Ảnh đại diện" placeholder="" name="avatar" value="">
                                    <input class="input" type="hidden" placeholder="" name="image" value="<?= $data['user']['avatar']?>">
                                    <span class="icon left"><i class="mdi mdi-mail"></i></span>
                                    <span class="icon right"><i class="mdi mdi-check"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <hr>
                <div class="field grouped">
                    <div class="control">
                        <button type="submit" class="button green" onclick="update('/admin/user/edit/<?= $data['user']['id']?>',event)">
                            Lưu
                        </button>
                    </div>
                    <div class="control">
                        <a href="javascript:void(0)" onclick="loadPage('/admin/user/list',this)" class="button red ajax-link">
                            Quay lại
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>