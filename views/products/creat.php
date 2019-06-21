<h2>Thêm mới món ăn</h2>
<p><?php if (isset($_SESSION['message'])) {echo $_SESSION['message']; unset($_SESSION['message']);} ?></p>
<form action="index.php?controller=products&action=store" method="post" enctype="multipart/form-data">
    <table class="table table-bordered">
        <tr>
            <td>
                Tên:
            </td>
            <td>
                <input class="form-control" type="text" name="name" value="<?php echo @$data['name'] ?>">
            </td>
            <td>
                <?php if(isset($errors['name_err'])){ ?>
                    <p><?php echo $errors['name_err'] ?></p>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td>
                Danh mục:
            </td>
            <td>
                <select name="sl_category" id="">
                    <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category->id ?>"> <?php echo  $category->name;?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                Giá:
            </td>
            <td>
                <input class="form-control" type="text" name="price" value="<?php echo @$data['price'] ?>">
            </td>
            <td>
                <?php if(isset($errors['price_err'])){ ?>
                    <p><?php echo @$errors['price_err'] ?></p>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td>
                Avatar:
            </td>
            <td>
                <input type="file" name="fileUpload" value="">
            </td>
        </tr>
        <tr>
            <td>
                Mô tả:
            </td>
            <td>
                <textarea name="description" class="form-control">
                    <?php echo @$data['description']?>
                </textarea>
            </td>
        </tr>
        <tr>
            <td>Url:
            </td>
            <td>
                <input type="text" name="url" value="<?php echo @$data['url']?>" class="form-control">
            </td>
        </tr>
        <tr>
            <td>Ẩn:
            </td>
            <td>
                <input type="checkbox" name="hidden">
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Thêm" class="btn btn-primary"></td>
        </tr>
    </table>
</form>