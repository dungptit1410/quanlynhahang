<?php
require_once('controllers/BaseController.php');
require_once('models/Table.php');
require_once ('models/Booking.php');
require_once ('models/Product.php');
require_once ('models/Ordering.php');


class OrderingsController extends BaseController
{
    function __construct()
    {
        $this->folder = 'orderings';
    }

    public function index()
    {
        $table = Table::find($_GET['id']);
        $products = Product::all();
        @$ordered = Ordering::find($_GET['id']); // lay cac mon ban do dung;
        $data = array('products' => $products, 'table' => $table, 'ordered' => $ordered);
        $this->render('index', $data);
    }
    public function add(){
        $id = $_GET['id'];
        $response = Ordering::add();
        $_SESSION['message'] = @$response['result']['message'];
        if ($response['status'] == false) {
            $this->render('creat', $response['result']);
        } else {
            header("Location: index.php?controller=orderings&action=index&id=$id");
        }
    }
    public function viewDetailTables(){
        $listIdString = $_GET['id_table'];
        $listTable = explode(',' , $_GET['id_table']);
        $table = Table::find($listTable[0]);
        //lay duoc thong tin ban + tt khach hang o ban dau tien;

        $listProductOfTables = Ordering::findManyTable($listTable);
        //lay thong tin cac mon goi o tung ban
        $data = array('table' => $table, 'listId' => $listIdString, 'listProductOfTables' => $listProductOfTables);
        $this->render('viewdetailtables', $data);
    }
}