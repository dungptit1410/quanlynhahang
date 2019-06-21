<?php
require_once('controllers/BaseController.php');
require_once('models/Booking.php');

class BookingsController extends BaseController
{

    /**
     * BookingsController constructor.
     */
    public function __construct()
    {
        $this->folder = 'bookings';
    }
    public function index()
    {
        $bookings = Booking::all();
        $data = array('bookings' => $bookings);
        $this->render('index', $data);
    }
    public function store(){
        $response = Booking::store();
        $_SESSION['message'] = @$response['result']['message'];
        if ($response['status'] == false) {
            $this->render('creat', $response['result']);
        } else {
            header("Location: index.php?controller=fontend&action=index");
        }
    }
    public function edit()
    {
        $user = User::find($_GET['id']);
        if ($user == null) {
            $_SESSION['message'] = "User không tồn tại";
        }
        $data = array('user' => $user);
        $this->render('edit', $data);
    }

    public function update()
    {
        $response = User::update();
        $_SESSION['message'] = $response['result']['message'];
        if ($response['status'] == false) {
            $this->render('edit', $response['result']);
        } else {
            header("Location: index.php?controller=users&action=index");
        }
    }

    public function delete()
    {
        $response = User::delete();
        $_SESSION['message'] = $response['result']['message'];
        header("Location: index.php?controller=users&action=index");
    }
}