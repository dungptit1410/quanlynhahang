<form action="?controller=bills&action=storeManyTables&id=<?php echo $listId; ?>" method="post">
    <table class="table table-bordered">
        <tr>
            <td>Tên khách hàng:</td>
            <td><input type="text" name="name" value="<?php echo $table['name'] ?>"></td>
        </tr>
        <tr>
            <td>Số điện thoại:</td>
            <td><input type="text" name="phone" value="<?php echo $table['telephone'] ?>"></p></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email"></p></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" name="address" ></td>
        </tr>
    </table>
    <?php $amount = 0;
          $listTable = explode(',', $listId);
          $i =0 ;
    ?>
    <?php foreach ($listProductOfTables as $ordered): ?>
       <h2 align="center">Bàn <?php echo $listTable[$i++]; ?> </h2>
    <table class="table table-bordered">
        <tr>
            <th>Tên món ăn</th>
            <th>Số lượng</th>
            <th>Giá/món</th>
            <th>Ghi chú</th>
            <th>Tổng</th>
        </tr>
        <?php $sum=0; ?>
        <?php foreach($ordered as $o): ?>
            <tr>
                <td><?php echo $o['name'];?></td>
                <td><?php echo $o['number'];?></td>
                <td><?php echo $o['price'];?></td>
                <td><?php echo $o['note'];?></td>
                <td><?php echo $o['price']*$o['number']?></td>

                <?php $sum += $o['price']*$o['number'] ?>
            </tr>
        <?php endforeach; ?>
    </table>
    <p style="margin-left: 893px; color: red; font-weight: ">Tổng    : <?php echo $sum ?> </p>
    <?php @$s +=  $sum; ?>
    <?php endforeach; ?>
    <input type="hidden" name="amount" value="<?php echo $s;?>">
    <p style="text-align: center; color: red; font-weight: bold ">Tổng hóa đơn  : <?php echo $s ?> </p>
    <input style="    margin-left: 470px;" type="submit" value="Xác nhận thanh toán" class="btn btn-primary">
</form>