<h2>Danh sách món ăn</h2>
<p align="center" style="color: red"><?php if (isset($_SESSION['message'])) {echo $_SESSION['message']; unset($_SESSION['message']);} ?></p>
<input type="button" onclick="location='?controller=products&action=creat'" value="Thêm món ăn" class="btn btn-primary">
<table border="1" class="table table-bordered">
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Giá</th>
        <th>Danh mục</th>
        <th>Mô tả</th>
    </tr>
    <?php $stt = 1;
    foreach ($products as $product) {
        ?>
        <tr>
            <td><?php echo $stt++; ?></td>
            <td><a href="index.php?controller=products&action=show&id=<?php echo $product->id ?>"><?php echo $product->name ?></a></td>
            <td><?php echo number_format($product->price) ?></td>
            <td><?php echo $product->name_category ?></td>
            <td><?php echo $product->description ?></td>
            <td><a class="btn btn-primary" href="index.php?controller=products&action=edit&id=<?php echo $product->id ?>">Sửa</a></td>
            <td><a class="btn btn-danger" href="index.php?controller=products&action=delete&id=<?php echo $product->id ?>">Xóa</a></td>
        </tr>
        <?php
    }
    ?>
</table>


