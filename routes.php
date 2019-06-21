<?php

$controllers = array(
    'pages' => ['home', 'error'],
    'users' => ['index', 'show', 'create', 'store', 'edit', 'update', 'delete'],
    'categories' =>['index','creat','store','edit', 'update', 'delete'],
    'products' => ['index','creat','store','edit', 'update', 'delete','show'],
    'tables' => ['index','creat','choose','update'],
    'bookings' => ['index','creat','store','delete'],
    'orderings' => ['index','add','update','viewDetailTables'],
    'bills' => ['getBillOnLine','store','storeManyTables','home','getBillInSite','getDetailBill'],
    'fontend' => ['index','introduce', 'getCategories','getAllProductByIdCategory', 'add','viewCart','viewInfo','storeBill'],
); // Các controllers trong hệ thống và các action có thể gọi ra từ controller đó.

// Nếu các tham số nhận được từ URL không hợp lệ (không thuộc list controller và action có thể gọi
// thì trang báo lỗi sẽ được gọi ra.
if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = 'pages';
    $action = 'error';
}

// Tạo ra tên controller class từ các giá trị lấy được từ URL sau đó gọi ra để hiển thị trả về cho người dùng.
$controller_name = ucwords($controller, '_') . 'Controller';
// Nhúng file định nghĩa controller vào để có thể dùng được class định nghĩa trong file đó
include_once('controllers/' . $controller_name . '.php');
$controller = new $controller_name;
$controller->$action();