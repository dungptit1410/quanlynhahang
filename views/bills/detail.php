<h2>Thong tin khach hang</h2>
<p>Ten : <?php echo $bill->name; ?></p>
<p>DiaChi : <?php echo $bill->address; ?></p>
<p>DienThoai : <?php echo $bill->phone; ?></p>
<p>Email : <?php echo $bill->email; ?></p>
<p>NgayTaoHoaDon : <?php echo $bill->datecreat; ?></p>
<h2>Danh sách món ăn</h2>
<table class="table table-bordered">
    <tr>
        <th>Tên món ăn</th>
        <th>Giá</th>
        <th>Số lượng</th>

    </tr>
    <?php $s = 0;?>
    <?php foreach($products as $product):?>
        <tr>
            <td><?php echo $product['name'];?></td>
            <td><?php echo $product['price'];?></td>
            <td><?php echo $product['soluong'];?></td>

            <?php $s = $s + $product['price']*$product['soluong'];?>
        </tr>
    <?php endforeach;?>

</table>
<h3>Tong: <?php echo $s; ?></h3>