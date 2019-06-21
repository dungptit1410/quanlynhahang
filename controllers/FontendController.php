<?php
require_once('controllers/BaseController.php');
require_once ('models/Category.php');
require_once ('models/Product.php');

class FontendController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'fontend';
    }

    public function index()
    {
        $this->render1('index');
    }

    public function introduce()
    {
        $this->render1('introduce');
    }

    public function getCategories()
    {
        $categories = Category::all();
        $data = array('categories' => $categories);
        $this->render1('categories', $data);
    }

    public function getAllProductByIdCategory()
    {
        $id = $_GET['id'];
        $products = Product::getByIdCategory($id);
        $categories = Category::all();
        $data = array('categories' => $categories, 'products' => $products);
        $this->render1('products', $data);
    }

    public function add()
    {
        $quantity = $_POST['txt_quantity'];
        $id = $_POST['txt_id'];
        if (isset($_SESSION['cart'][$id])) {

            $_SESSION['cart'][$id]['quantity']+= $quantity;
            $_SESSION['result'] = "Thêm thành công";
        } else {
            $db = DB::getInstance();
            $req = $db->prepare('SELECT * FROM tbl_products WHERE id = :id');
            $req->execute(array('id' => $id));

            $item = $req->fetch();
            if (isset($item['id'])){
                $_SESSION['cart'][$item['id']] = array(
                    "quantity" => $quantity,
                    "name" => $item['name'],
                    "price" => $item['price'],
                    "avatar" => $item['avatar'],
                    "id_category" => $item['id_category']
                );
                $_SESSION['result'] = "Thêm thành công";
            }
            else {

                $_SESSION['result'] = "Thêm không thành công";;

            }
        }
        //$this->render1('cart');
        header("Location: ?controller=fontend&action=getAllProductByIdCategory&id=".$_POST['txt_idCategory']);
    }
    public function viewCart(){
        $this->render1('cart');
    }
    public function viewInfo(){
        $amount =  $_POST['amount'];
        $data = array('amount' => $amount);
        $this->render1('viewinfo', $data);
    }
    public function storeBill(){
        $db = DB::getInstance();
        $red = $db->prepare("INSERT INTO tbl_bills (amount, name, phone, email ,address, status) VALUES (?,?,?,?,?,?)");
        if (!$red->execute(array((int)$_POST['amount'], $_POST['name'],  $_POST['phone'], $_POST['email'], $_POST['address'], (int) 2))) {
            return array('status' => false, 'result' => array('message' => 'Thanh toán thất bại'));
        }
        $req1 = $db->query('SELECT MAX(id) as max FROM tbl_bills');
        $id_fetch = $req1->fetch();
        $idBill = $id_fetch['max'];
        $red2 = $db->prepare("INSERT INTO tbl_orderings ( id_product, id_bill, number, price, status) VALUES (?,?,?,?,?)");
        foreach ($_SESSION['cart'] as $cart => $c){
            $red2->execute(array($cart, $idBill, $c['quantity'], $c['price'], 5 ));
        }
        $_SESSION['result'] = "Đơn hàng của bạn đã được ghi";
        unset($_SESSION['cart']);
        $this->render1('index');
    }

}