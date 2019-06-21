<h2>Chọn bàn</h2>
<p>Tên khách hàng: <?php echo $booking['name']; ?></p>
<p>Số điện thoại: <?php echo $booking['telephone'];?></p>
<?php foreach ($tables AS $table): ?>
<input type="checkbox" name="cbx_id_table" value="<?php echo $table->id;?>"> <span>Bàn <?php echo $table->id?></span> <br>
<?php endforeach;?>
<button class="btn btn-primary"  type="button" id="selecttable" onclick="selectTable()">Chọn bàn</button>

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
        location.href="?controller=tables&action=update&id_table=" + result + "&id_booking=" + <?php echo $booking['id']?>;

    }
</script>