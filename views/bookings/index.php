
<h2>Danh sách đặt bàn</h2>
<p><?php if (isset($_SESSION['message'])) {echo $_SESSION['message']; unset($_SESSION['message']);} ?></p>
<input type="button" onclick="location='?controller=bookings&action=create'" value="Thêm đặt bàn" class="btn btn-primary">
<table border="1" class="table table-bordered">
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Điện thoại</th>
        <th>Số người</th>
        <th>Thời gian</th>
        <th>Ghi chú</th>
    </tr>
    <?php
    $stt = 1;
    foreach ($bookings as $booking) {
        ?>
        <?php if($booking->status!=2) { ?>
            <tr>
                <td><?php echo $stt ?></td>
                <td>
                    <a href="index.php?controller=bookings&action=show&id=<?php echo $booking->id ?>"><?php echo $booking->name ?></a>
                </td>
                <td><?php echo $booking->telephone ?></td>
                <td><?php echo $booking->amount ?></td>
                <td><?php echo $booking->time ?></td>
                <td><?php echo $booking->note ?></td>
                <?php if($booking->status == 0){ ?>
                <td><a class="btn btn-primary" href="index.php?controller=tables&action=choose&id=<?php echo $booking->id; ?>">Chọn bàn</a></td>
                <?php } ?>
                <td><a class="btn btn-primary" href="index.php?controller=bookings&action=delete&id=<?php echo $booking->id ?>">Xóa</a></td>
            </tr>
            <?php
        }
        $stt++;
    }
    ?>
</table>