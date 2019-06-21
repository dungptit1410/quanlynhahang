<div style="padding-bottom: 100px">
<div class="banner-thucdon">
    <div class="thucdon1">
        <h3 align="center">THỰC ĐƠN CHÍNH</h3>
    </div>
    <div class="menu">
        <ul>
            <!--<li><a>KHAI VỊ</a></li>
            <li><a>MÓN THỊT</a></li>
            <li><a>MÓN HẢI SẢN</a></li>
            <li><a>MÓN RAU</a></li>
            <li><a>MỲ-MIẾN-PHỞ</a></li>
            <li><a>CƠM-CHÁO</a></li>
            <li><a>CANH LẨU</a></li>
            <li><a>ĐỒ UỐNG</a></li>-->
            <?php foreach ($categories as $category): ?>
            <li><a style="text-transform: uppercase;" href="?controller=fontend&action=getAllProductByIdCategory&id=<?php echo $category->id;?>"> <?php echo $category->name ;?> </a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
</div>
