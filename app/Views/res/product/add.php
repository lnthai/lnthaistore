<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
            <li><a class="ajax-link" href="javascript:void(0)" onclick="loadPage('/admin',this)">Trang chủ</a></li>
            <li>Thêm sản phẩm</li>
        </ul>
    </div>
</section>

<section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <h1 class="title">
            Thêm Sản Phẩm
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
            <form method="post" id="form-data" action="/admin/user/create">
                <div class="field">
                    <label class="label"></label>
                    <div class="field-body">
                        <div class="field">
                            <div class="control icons-left icons-right">
                            
                                <select name="category" id="" class="input">
                                    <option value="0">Chọn danh mục</option>
                                    <?php
                                    if (!empty($data['category'])) {
                                        foreach ($data['category'] as $category) {
                                    ?>  
                                            <option value="<?= $category['id']?>"><?= $category['name']?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <span class="icon left"><i class="mdi mdi-mail"></i></span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control icons-left">
                                <input class="input" type="text" placeholder="Tên sản phẩm" name="name">
                                <span class="icon left"><i class="mdi mdi-rename-box"></i></span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control icons-left icons-right">
                                <input class="input" type="text" placeholder="Giá" value="" name="price">
                                <span class="icon left"><i class="mdi mdi-cash"></i></span>
                                <span class="icon right"><i class="mdi mdi-check"></i></span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control icons-left icons-right">
                                <input class="input" type="file" placeholder="" value="" name="image">
                                <span class="icon left"><i class="mdi mdi-image-area"></i></span>
                                <span class="icon right"><i class="mdi mdi-check"></i></span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control icons-left icons-right">
                                <input class="input" type="text" placeholder="Số lượng" value="" name="qty">
                                <span class="icon left"><i class="mdi mdi-piggy-bank"></i></span>
                                <span class="icon right"><i class="mdi mdi-check"></i></span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control icons-left icons-right">
                                <textarea name="content" id="editor" class="input"></textarea>
                            </div>
                        </div>
                        <!-- end -->
                    </div>
                    <hr>
                    <div class="field grouped">
                        <div class="control">
                            <button type="submit" class="button green" onclick="insert('/admin/product/create',event)">
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