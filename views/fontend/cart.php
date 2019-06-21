<h2 align="center">Đơn hàng của bạn</h2>
<br>
<br>

<div class="cart">
 <div class="container">
  <form method="post" action="?controller=fontend&action=viewInfo">
<table class="table">
     <th>Tên món ăn</th>
     <th>Số lượng</th>
     <th>Giá/sp</th>
     <th>Tổng</th>
     <th>Thao tác</th>
     <?php $sum=0 ; ?>
     <?php foreach ($_SESSION['cart'] as $cart => $c):  ?>
     <tr>
      <td><?php echo $c['name'];?></td>
      <td><?php echo $c['quantity'];?></td>
      <td><?php echo $c['price'];?></td>
      <td><?php echo $c['price']*$c['quantity']; ?></td>
      <?php @$sum += $c['price']*$c['quantity']; ?>
      <td>
       <a>Sửa</a>
       <a>Xóa</a>
      </td>
     </tr>
    <?php endforeach; ?>
</table>
   <hr>
   <h3 style="margin-left: 918px;">Tổng tiền: <?php echo @$sum; ?></h3>
   <input type="hidden" name="amount" value="<?php echo @$sum; ?>" >
   <input style="margin-left: 918px;"  align="center" type="submit" value="Xác nhận thanh toán" class="btn btn-primary">
  </form>
</div>
</div>