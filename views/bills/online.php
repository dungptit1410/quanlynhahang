
<table class="table table-bordered">
    <tr>

        <th>STT</th>
        <th>Tên khách hàng</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Ngày đặt hàng</th>
        <th>Tổng tiền</th>
        <th>Tình trạng</th>
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
        <td><?php  if($bill->status == 2) echo "Chưa thanh toán"; else {echo "Đã thanh toán";};?></td>
        <td><a class="btn btn-primary">Xem chi tiết</a></td>
    </tr>

    <?php endforeach; ?>
</table>