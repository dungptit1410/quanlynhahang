<h2>Thêm mới danh mục</h2>
<form action="?controller=categories&action=store" method="post">
    <table class="table table-bordered">
        <tr>
            <td>Tên: </td>
            <td><input type="text" name="name" value="<?php echo @$data['name']?>" class="form-control"></td>
            <td> <?php if(isset($errors['name_err'])){ ?>
                    <p><?php echo $errors['name_err'] ?></p>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td>Mô tả</td>
            <td>
                <textarea class="form-control" name="description" cols="23" rows="5" value="<?php echo @$data['name']?>"></textarea>
            </td>
        </tr>
    </table>
    <input type="submit" value="Thêm mới" class="btn btn-primary">
</form>