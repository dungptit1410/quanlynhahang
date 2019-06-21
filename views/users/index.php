<h2>Danh sách user</h2>
<p><?php if (isset($_SESSION['message'])) {echo $_SESSION['message']; unset($_SESSION['message']);} ?></p>
<input type="button" onclick="location='?controller=users&action=create'" value="Thêm user" class="btn btn-primary">
<table border="1" class="table table-bordered">
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Email</th>
        <th>Địa chỉ</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
    <?php
    $stt = 1;
    foreach ($users as $user) {
    ?>
        <tr>
            <td><?php echo $stt ?></td>
            <td><a href="index.php?controller=users&action=show&id=<?php echo $user->id ?>"><?php echo $user->name ?></a></td>
            <td><?php echo $user->email ?></td>
            <td><?php echo $user->address ?></td>
            <td><a href="index.php?controller=users&action=edit&id=<?php echo $user->id ?>">Sửa</a></td>
            <td><a href="index.php?controller=users&action=delete&id=<?php echo $user->id ?>">Xóa</a></td>
        </tr>
    <?php
        $stt++;
    }
    ?>
</table>
