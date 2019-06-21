<h2>Danh sách loại món ăn</h2>
<p align="center" style="color: red"><?php if (isset($_SESSION['message'])) {echo $_SESSION['message']; unset($_SESSION['message']);} ?></p>
<input type="button" onclick="location='index.php?controller=categories&action=creat'" value="Thêm danh mục" class="btn btn-primary">
<table class="table table-bordered">
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Mô tả</th>
    </tr>
    <?php $stt = 1;
    foreach ($categories as $category): ?>
    <tr>
        <td><?php echo $stt++;?></td>
        <td><?php echo $category->name?></td>
        <td><?php echo $category->description?></td>
        <td><a class="btn btn-primary" href="?controller=categories&action=edit&id=<?php echo $category->id ;?>">Sửa</a></td>
        <td><a class="btn btn-danger" href="?controller=categories&action=delete&id=<?php echo $category->id;?>"">Xóa</a></td>
        <td></td>
    </tr>
    <?php endforeach; ?>
</table>