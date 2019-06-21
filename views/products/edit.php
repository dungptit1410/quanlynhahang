<h2>Sửa món ăn</h2>
<p><?php if (isset($_SESSION['message'])) {echo $_SESSION['message']; unset($_SESSION['message']);} ?></p>
<form action="index.php?controller=products&action=update&id=<?php echo @$product['id']?>" method="post" enctype="multipart/form-data">
    <table class="table table-bordered">
        <tr>
            <td>
                Tên:
            </td>
            <td>
                <input class= "form-control" type="text" name="name" value="<?php echo @$product['name'] ?>">
            </td>
            <td>
                <?php if(isset($errors['name_err'])){ ?>
                    <p><?php echo $errors['name_err'] ?></p>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td>
                Danh mục;
            </td>
            <td>
                <select name="sl_category" id="">
                    <?php foreach ($categories as $category): ?>
                        <option <?php if($category->id== $product['id_category']) echo 'selected'; ?> value="<?php echo $category->id ?>"> <?php echo  $category->name;?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                Giá:
            </td>
            <td>
                <input class= "form-control" type="text" name="price" value="<?php echo @$product['price']; ?>">
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
                <textarea name="description" class= "form-control">
                   <?php echo @$product['description']; ?>
                </textarea>
            </td>
        </tr>
        <tr>
            <td>Url:
            </td>
            <td>
                <input class= "form-control" type="text" name="url" value="<?php echo @$product['url']; ?>">
            </td>
        </tr>
        <tr>
            <td>Ẩn:
            </td>
            <td>
                <input type="checkbox" name="hidden" <?php if($product['hidden'] == 1) echo "checked" ; else echo "";?>  ">
            </td>
        </tr>
        <tr>
            <td colspan="2" ><input class= "btn btn-primary" type="submit" value="Sửa"></td>
        </tr>
    </table>
</form>