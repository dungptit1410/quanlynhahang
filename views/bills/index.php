<table class="table table-bordered">
    <tr>

        <th>STT</th>
        <th>Tên khách hàng</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Ngày thanh toán</th>
        <th>Tổng tiền</th>
        <th>Xem chi tiết</th>
    </tr>
    <?php $i=1; ?>
    <?php foreach ($bills as $bill): ?>

    <tr>
        <td><?php echo @$i++?></td>
        <td><?php echo $bill->name?></td>
        <td><?php echo $bill->email?></td>
        <td><?php echo $bill->phone?></td>
        <td><?php echo $bill->datecreat?></td>
        <td><?php echo $bill->amount?></td>
        <td><a class="btn btn-primary" href="?controller=bills&action=getDetailBill&id=<?php echo $bill->id;?>">Xem chi tiết</a></td>
    </tr>

    <?php endforeach; ?>
</table>