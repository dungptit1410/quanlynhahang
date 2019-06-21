<h2>Chi tiết món ăn</h2>

<p>Tên: <?php echo $product['name']; ?></p>
<img width="200px"  height="200px" src="<?php echo $product['avatar']; ?>"
     <br>
<p>Danh mục: <?php echo $product['name_category']?></p>
<p>Giá: <?php echo $product['price']?></p>
<p>Mô tả: <?php echo $product['description']?> </p>
<p>Url: <?php echo $product['url']?></p>
<p>Ẩn: <?php if($product['hidden']==1) echo "có"; else echo "Không";?></p>