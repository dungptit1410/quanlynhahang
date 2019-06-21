<script>
    function validateForm() {
        var x = document.forms["myForm"]["name"].value;
        if (x == "") {
            alert("Tên không được để trống");
            return false;
        }
        var mobile = document.forms["myForm"]["phone"].value;
        if (mobile != "") {
            var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            if (vnf_regex.test(mobile) == false)
                {
                    alert('Số điện thoại của bạn không đúng định dạng!');
                    return false;
                }
        }
        else{
            alert('Bạn chưa điền số điện thoại!');
            return false;
        }
        var email = document.forms["myForm"]["email"].value;
        if(email != ""){
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if(re.test(email) == false){
                alert('Email không đúng định dạng!');
                return false;
            }
        }
        else{
            alert('Bạn chưa điền Email!');
            return false;
        }
        var address =  document.forms["myForm"]["address"].value;
        if (address == "") {
            alert("Địa chỉ không được để trống");
            return false;
        }
        return true;
    }
</script>
<div class="thongtinkhachhang">
    <div class="container">
        <h2 style="text-align: center;">Điền thông tin thanh toán</h2>
        <form name="myForm" method="post" action="?controller=fontend&action=storeBill" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="exampleInputPassword1">Tên</label>
                <input style="color: black" type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Số điện thoại</label>
                <input style="color: black" type="text" class="form-control" name="phone" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input style="color: black" type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Địa chỉ</label>
                <input style="color: black" type="text" class="form-control"  name="address" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Ghi chú</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
            </div>
            <hr>
            <h3>Tổng tiền:<?php echo $amount;?></h3>
            <input type="hidden" name="amount" value="<?php echo @$amount; ?>" >
            <button type="submit" class="btn btn-primary" >Xác nhận và gửi đơn hàng</button>
        </form>
    </div>
</div>
