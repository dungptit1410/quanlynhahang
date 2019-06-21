<h2>Bàn <?php echo $table['id']?></h2>
<form action="?controller=bills&action=store&id=<?php echo $table['id']?>" method="post">
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
    <?php if ($ordered != null)
{?>
<table class="table table-bordered">
<tr>
    <th>Tên món ăn</th>
    <th>Số lượng</th>
    <th>Giá/món</th>
    <th>Tổng</th>
    <th>Ghi chú</th>
</tr>
    <?php $sum=0; ?>
    <?php foreach($ordered as $o): ?>
    <tr>
        <td><?php echo $o['name'];?></td>
        <td><?php echo $o['number'];?></td>
        <td><?php echo $o['price'];?></td>
        <td><?php echo $o['price']*$o['number']?></td>
        <td><?php echo $o['note'];?></td>
        <?php $sum += $o['price']*$o['number'] ?>
    </tr>
    <?php endforeach; ?>
</table>
    <p style="margin-left: 770px; color: red; font-weight: bold">Tổng hóa đơn     : <?php echo $sum ?> </p>
    <input type="hidden" name="amount" value="<?php echo $sum;?>">
    <input style="margin-left: 770px" type="submit" value="Thanh toán" class="btn btn-primary">
<?php } ?>
</form>
<h2>Danh sách món ăn</h2>
<table class="table table-bordered">
    <tr>
        <th>Tên món ăn</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Ghi chú</th>
    </tr>
    <?php foreach($products as $product):?>
    <tr>
        <td><?php echo $product->name;?></td>
        <td><?php echo $product->price;?></td>
        <form action="?controller=orderings&action=add&id=<?php echo $table['id']?>" method="post">
            <input type="hidden" name="id_table" value="<?php echo $table['id'];?>">
            <input type="hidden" name="price" value="<?php echo $product->price;?>">
            <input type="hidden" name="id_product" value="<?php echo $product->id;?>">
            <td><input type="number" name="number"></td>
            <td><input type="text" name="note"></td>
            <td><input type="submit" value="Thêm" class="btn btn-primary"></td>

        </form>
    </tr>
    <?php endforeach;?>
</table>
