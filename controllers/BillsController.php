<?php
require_once('controllers/BaseController.php');
require_once('models/Bill.php');
require_once('models/Table.php');
require_once('models/Ordering.php');

class BillsController extends BaseController
{
    function __construct()
    {
        $this->folder = 'bills';
    }
    public function store()
    {
        $response = Bill::store(); // lưu bill
        $response2 = Ordering::update_IdBill($_GET['id']); // thêm id bill vào các món đã gọi của bàn
        $response1 = Table::updateOneFree($_GET['id']); // khởi tạo bàn trống
        $_SESSION['message'] = @$response['result']['message'];
        if ($response['status'] == false && $response1['status'] == false && $response2['status'] == false ) {
            echo "123";
        } else {
            header("Location: index.php?controller=tables&action=index");
        }

    }
    public function getBillInSite(){
        $Bills = Bill::allOfTable();
        $data = array('bills' => $Bills);
        $this->render('index',$data);
    }
    public function getBillOnLine(){
        $Bills = Bill::getBillOnLine();
        $data = array('bills' => $Bills);
        $this->render('online',$data);
    }
    public function getDetailBill(){
        $bill = Bill::findBillById($_GET['id']);
        $products = Ordering::getProductByIdBill($_GET['id']);
        $data = array('bill' => $bill, 'products' => $products);
        $this->render('detail',$data);
    }
    public function home(){
        $this->render('page');
    }
    public function storeManyTables(){
        $response = Bill::store();
        $listIdTable = explode(',',$_GET['id']);
        $check = 0;
        for($i =0 ; $i < count($listIdTable) ;$i++){
            //echo $listIdTable[$i];
            //die();
            $response1 = Ordering::update_IdBill($listIdTable[$i]);
            $response2 = Table::updateOneFree($listIdTable[$i]);
            if($response1 == false || $response2 == false ) $check++;
        }
        if($check > 0){
            echo "luu khong thanh cong";
        }
        else{
            header("Location: index.php?controller=tables&action=index");
        }
    }
}