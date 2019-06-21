<h2>Sửa danh mục</h2>
<form action="?controller=categories&action=update&id=<?php echo @$category['id']?>" method="post">
    <table class="table table-bordered">
        <tr>
            <td>Tên: </td>
            <td><input type="text" name="name" value="<?php echo @$category['name']?>"></td>
            <td> <?php if(isset($errors['name_err'])){ ?>
                    <p><?php echo $errors['name_err'] ?></p>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td>Mô tả</td>
            <td>
                <textarea name="description" cols="23" rows="5"><?php echo @$category['description']?></textarea>
            </td>
        </tr>
    </table>
    <input type="submit" value="Sửa" class="btn btn-primary">
</form>