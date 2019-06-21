<h2>Danh sách bàn</h2>
<p><?php if (isset($_SESSION['message'])) {echo $_SESSION['message']; unset($_SESSION['message']);} ?></p>
<input type="button" onclick="location='?controller=orderings&action='" value="Thêm bàn" class="btn btn-primary">
<?php $check = 0;
    foreach ($tables as $table){
    if ($table->status == 1) $check++;
} ;?>
<?php if(@$check > 0){ ?>
<button class="btn btn-primary"  type="button" id="selecttable" onclick="selectTable()">Thanh toán</button>
<?php } ?>
<table border="1" class="table table-bordered">
    <tr>
        <th>Mã</th>
        <th>Trạng thái</th>
        <th>Tên khách hàng</th>
    </tr>
    <?php
    $stt = 1;
    foreach ($tables as $table) {
        ?>
        <tr>
            <td><?php echo $table->id ;?></a></td>
            <td><?php if($table->status == 1) echo "Đang hoạt động"; else echo "Trống";?></td>
            <td><?php echo $table->name;?></td>
            <td><a href="index.php?controller=orderings&action=index&id=<?php echo $table->id ?>" class="btn btn-primary">Gọi món</a></td>
            <td>
                <?php if($table->status == 1){ ?>
                <input type="checkbox" name="cbx_id_table" value="<?php echo $table->id;?>">
                <?php } ?>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
<script type="text/javascript">
    function checkbox(){
        var checkbox = document.getElementsByName('cbx_id_table');
        var result = '';
        var j = 0;
        for (var i = 0; i < checkbox.length; i++){
            if (checkbox[i].checked === true){
                if(j == 0){
                    result += checkbox[i].value;
                }else{
                    result += ',' + checkbox[i].value;
                }
                j++
            }
        }
        return result;
    }

    function selectTable(){
        var result = checkbox();
        location.href="?controller=orderings&action=viewDetailTables&id_table=" + result;

    }
</script>