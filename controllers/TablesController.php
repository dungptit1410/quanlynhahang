<?php
require_once('controllers/BaseController.php');
require_once('models/Table.php');
require_once ('models/Booking.php');
class TablesController extends BaseController{

    /**
     * TablesController constructor.
     */
    public function __construct()
    {
        $this->folder = 'tables';
    }
    public function index(){
        $tables = Table::all();
        $data = array('tables' => $tables);
        $this->render('index',$data);
    }
    public function choose(){
        $tables = Table::listFreeTable();
        $booking = Booking::find($_GET['id']);
        $data = array('tables' => $tables, 'booking' => $booking); // truyen du lieu ra view choose table
        $this->render('choose', $data); // view choose ban trong
    }
    public function update()
    {
        $response = Table::update();
        $_SESSION['message'] = $response['result']['message'];
        if ($response['status'] == false) {
            $this->render('edit', $response['result']);
        } else {
            header("Location: index.php?controller=tables&action=index");
        }
    }
}
