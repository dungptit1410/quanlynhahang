
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="views/font-qlnh/1.css">
    <script src="views/font-qlnh/1.js" type="text/javascript"></script>
    <style>

        .container.css-login {
            width: 530px;
        }
        .css-login input[type=text], .css-login input[type=password] {
            width: 90%;
            padding: 12px 20px;
            margin: 8px 26px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size:16px;
        }
        .container.css-login input[type=text]::placeholder { /* Firefox, Chrome, Opera */
            color: gray;
        }
        input[type=password]::placeholder { /* Firefox, Chrome, Opera */
            color: gray;
        }

        /* Set a style for all buttons */
        .css-login button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 26px;
            border: none;
            cursor: pointer;
            width: 90%;
            font-size:20px;
        }
        button:hover {
            opacity: 0.8;
        }

        /* Center the image and position the close button */
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            position: relative;
        }
        .avatar {
            width: 200px;
            height:200px;
            border-radius: 50%;
        }

        /* The Modal (background) */
        .modal {
            display:none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        /* Modal Content Box */
        .modal-content {
            background-color: #fefefe;
            margin: 4% auto 15% auto;
            border: 1px solid #888;
            width: 40%;
            padding-bottom: 30px;
        }


        /* The Close Button (x) */
        .close {
            position: absolute;
            right: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }
        .close:hover,.close:focus {
            color: red;
            cursor: pointer;
        }

        /* Add Zoom Animation */
        .animate {
            animation: zoom 0.6s
        }
        @keyframes zoom {
            from {transform: scale(0)}
            to {transform: scale(1)}
        }
    </style>

</head>
<body>
<div class="head">
    <nav class="navbar navbar-fixed-top" role="navigation">
        <div class="container ">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header ">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="?controller=fontend&action=index"><i style="font-size: 21px;" class="fas fa-home"></i></a></li>
                    <li class="active"><a href="?controller=fontend&action=introduce">Giới thiệu</a></li>
                    <li><a href="?controller=fontend&action=getCategories">Thực đơn</a></li>
                    <li><a href="#">Khuyến mại</a></li>
                    <li><a href="#">Nhượng quyền</a></li>
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="#">Đặt bàn</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="?controller=fontend&action=viewCart"><i class="fas fa-shopping-cart"><span>(<?php if(isset($_SESSION['cart'])) echo count($_SESSION['cart']); else echo "0";?>)</span></i></a></li>
                    <!--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello Admin <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </li>-->
                    <li><a onclick="document.getElementById('modal-wrapper').style.display='block'">Đăng nhập</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>	<!-- end menu -->
    <div class="banner">
        <img src="views/font-qlnh/img/banner.jpg" alt="" class="img-responsive">
    </div>
    <!-- end banner -->

    <div id="modal-wrapper" class="modal">

        <form class="modal-content animate" action="/action_page.php">

            <div class="imgcontainer">
                <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
                <img src="views/theme/1.png" alt="Avatar" class="avatar">
                <h1 style="text-align:center">Modal Popup Box</h1>
            </div>

            <div class="container css-login">
                <input style="::-ms-input-placeholder { /* Microsoft Edge */
 color: red;
}" type="text" placeholder="Enter Username" name="uname">
                <input type="password" placeholder="Enter Password" name="psw">
                <button type="submit">Login</button>
                <input type="checkbox" style="margin:26px 30px;"> Remember me
                <a href="#" style="text-decoration:none; float:right; margin-right:34px; margin-top:26px;">Forgot Password ?</a>
            </div>

        </form>

    </div>

    <script>
        // If user clicks anywhere outside of the modal, Modal will close

        var modal = document.getElementById('modal-wrapper');
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
