<?php if (isset($_SESSION['result'])){
    echo '<script language="javascript">';
    echo 'alert("'.$_SESSION['result'].'")';
    echo '</script>';
    unset($_SESSION['result']);

} ?>
<div class="support-main">
    <div class="container">
        <ul>
            <li>
                <div class="anh">
                    <img src="views/font-qlnh/img/giaohang.png" alt="" class="img-responsive">
                </div>
                <i>Giao hàng tận nơi</i>
                <div class="div4"></div>
            </li>
            <li>
                <div class="anh">
                    <img src="views/font-qlnh/img/telephone.png" alt="" class="img-responsive">
                </div>
                <i href="">Call us: 0363181796</i>
                <div class="div4"></div>
            </li>
            <li>
                <div class="anh">
                    <img src="views/font-qlnh/img/address.png" alt="" class="img-responsive">
                </div>
                <i href="">228 Ba Trieu, Ha Noi</i>
                <div class="div4"></div>

            </li>
        </ul>
    </div>
</div>
<!-- end div giao hang -->
<div class="gioithieu">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="hinhanh">
                    <img src="views/font-qlnh/img/gdnh.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="khoitin text-center">
                    <hr>
                    <div class="chen">
                        <p>NHÀ HÀNG CƠM VIỆT NAM - GIA VIÊN</p>
                    </div>
                    <p>Chào mừng bạn đến với nhà hàng Cơm Việt Nam Gia Viên,
                        chuỗi nhà hàng mang phong cách ẩm thực Việt Nam đương đại dựa trên sự chắt lọc tinh hoa của ẩm thực truyền thống Việt Nam và châu Á được phát triển và quản lý bởi công ty TNHH Triều Nhật (chủ sở hữu của những thương hiệu nhà hàng độc đáo, uy tín lâu năm như Long Đình, Triều Nhật Asahi Sushi).

                        Nhà hàng đầu tiên của chúng tôi đã khai trương tại 228 Bà Triệu, Hà Nội vào tháng 7/2013 và nhận được sự yêu mến, ủng hộ của nhiều thực khách...
                    </p>
                    <a href="" class="btn btn-default">Xem tiếp</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end div gioithieu -->
<div class="thucdon">
    <h2>THỰC ĐƠN</h2>
    <hr>
    <div class="chen chen-thucdon">
        <p>Vietnamese Cuisines</p>
    </div>
</div>
<!-- end div thucdon -->
<div class="motsomonan">
    <div class="container">
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 chinh2">
                <div class="item-zoom">
                    <img src="views/font-qlnh/img/monan1.jpg" alt="" class="img-responsive chinh">
                </div>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="item-zoom">
                            <img src="views/font-qlnh/img/monan2.jpg" alt="" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="item-zoom">
                            <img src="views/font-qlnh/img/monan3.jpg" alt="" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="item-zoom">
                            <img src="views/font-qlnh/img/monan4.jpg" alt="" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="item-zoom">
                            <img src="views/font-qlnh/img/monan5.jpg" alt="" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end  khoi 1 -->
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 chinhanh">
                <div class="item-zoom">
                    <img src="views/font-qlnh/img/monan6.jpg" alt="" class="img-responsive">
                </div>
                <div class="item-zoom">
                    <img src="views/font-qlnh/img/monan7.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 chinhanh">
                <div class="item-zoom">
                    <img src="views/font-qlnh/img/monan8.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 chinhanh">
                <div class="item-zoom">
                    <img src="views/font-qlnh/img/monan6.jpg" alt="" class="img-responsive">
                </div>
                <div class="item-zoom">
                    <img src="views/font-qlnh/img/monan7.jpg" alt="" class="img-responsive">
                </div>
            </div>
        </div>
        <!-- end khoi 2 -->
    </div>
</div>
<!-- end monanlist -->
<div class="datban">
    <div class="container text-center">
        <h2 style="color: white;">ĐẶT BÀN</h2>
        <p style="font-weight: bold;font-style: italic; color: white;padding-bottom: 20px">Book Your Table</p>
        <form action="?controller=bookings&action=store" method="POST" role="form">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                    <table>
                        <tr>
                            <td><div class="form-group">
                                    <div class="item-reservation">
                                        <input name="name" type="text" class="form-control" id="" placeholder="Họ và Tên">
                                    </div>
                                </div></td>
                            <td><div class="form-group">
                                    <input name="email" type="email" class="form-control" id="" placeholder="Email">
                                </div></td>
                        </tr>
                        <tr>
                            <td><div class="form-group">
                                    <input name="phone" type="text" class="form-control" id="" placeholder="Điện thoại">
                                </div></td>
                            <td><div class="form-group">
                                    <input name="amount" type="text" class="form-control" id="" placeholder="Số khách">
                                </div></td>
                        </tr>
                        <tr>
                            <td><div class="form-group">
                                    <input name="time" type="time" class="form-control" id="" placeholder="Thời gian">
                                </div></td>
                            <td><div class="form-group">
                                    <input name="date" type="date" class="form-control" id="" placeholder="Ngày">
                                </div></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <textarea rows="7" cols="72" placeholder="Ghi chú" name="note"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-default" onclick="return confirm('Xác nhận gửi yêu cầu? ')">ĐẶT BÀN</button>
        </form>
    </div>
</div>
<!-- end dat ban -->