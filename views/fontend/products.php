<script>
        function increaseValue(id) {
            var value = parseInt(document.getElementById('number' + id).value, 10);
            console.log(value);
            value = isNaN(value) ? 1 : value;
            value++;
            document.getElementById('number' + id).value = value;
        }

        function decreaseValue(id) {
            var value = parseInt(document.getElementById('number' + id).value, 10);
            if(value == 1){
                document.getElementById('number' + id).value = value;
            }
            else{
                value = isNaN(value) ? 0 : value;
                value < 1 ? value = 1 : '';
                value--;

                document.getElementById('number' + id).value = value;
            }
        }

    </script>
    <?php if (isset($_SESSION['result'])){
        echo '<script language="javascript">';
        echo 'alert("'.$_SESSION['result'].'")';
        echo '</script>';
         unset($_SESSION['result']);
    } ?>
<body>
<div class="banner-thucdon">
    <div class="thucdon1">
        <h3 align="center">THỰC ĐƠN CHÍNH</h3>
    </div>
    <div class="menu">
        <ul>
            <?php foreach ($categories as $category): ?>
                <li><a style="text-transform: uppercase; color: <?php if($category->id == $_GET['id']) echo "#c7733c"; ?>" href="?controller=fontend&action=getAllProductByIdCategory&id=<?php echo $category->id;?>"> <?php echo $category->name ;?> </a></li>
            <?php endforeach; ?>

        </ul>
    </div>
</div>
<!-- end banner-thucdonlist-->
<div class="monanlist">
    <div class="container">
        <div class="tendanhmuc">
            <h2 align="center">KHAI VỊ</h2>
            <hr>
        </div>
        <div class="row">
            <?php foreach ($products as $product): ?>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <div class="monan">
                    <div class="item-zoom">
                        <img src="<?php echo $product->avatar; ?>" alt="" class="img-responsive">
                    </div>
                    <h4 style="font-weight: bold"><a style="text-transform: uppercase;"><?php echo $product->name ?></a></h4>
                    <h4><?php  echo number_format($product->price)." VNĐ" ?></h4>
                    <form method="post" action="?controller=fontend&action=add">
                        <div class="value-button" id="decrease" onclick="decreaseValue(<?php echo $product->id; ?>)" value="Decrease Value">-</div>
                        <input style="text-align: center;border: none;border-top: 1px solid #ddd ;border-bottom: 1px solid #ddd; margin: 0px;width: 40px; height: 40px;" type="number" id="number<?php echo $product->id;?>" value="1" name ="txt_quantity" />
                        <div class="value-button" id="increase" onclick="increaseValue(<?php echo $product->id; ?>)" value="Increase Value">+</div>
                        <input type="hidden" name="txt_id" value="<?php echo $product->id; ?>">
                        <input type="hidden" name="txt_idCategory" value="<?php echo $product->id_category; ?>">
                        <input type="submit" value="Đặt hàng" class="btn btn-default">
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
            <!-- end mot khoi -->
        </div>
    </div>
</div>