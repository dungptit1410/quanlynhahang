<?php
require_once('controllers/BaseController.php');
require_once('models/User.php');

class UsersController extends BaseController
{
    function __construct()
    {
        $this->folder = 'users';
    }

    public function index()
    {
        $users = User::all();
        $data = array('users' => $users);
        $this->render('index', $data);
    }

    public function create()
    {

        $this->render('creat');
    }

    public function store()
    {
        $response = User::store();
        $_SESSION['message'] = @$response['result']['message'];
        if ($response['status'] == false) {
            $this->render('creat', $response['result']);
        } else {
            header("Location: index.php?controller=users&action=index");
        }
    }

    public function show()
    {
        $user = User::find($_GET['id']);
        if ($user == null) {
            $_SESSION['message'] = "User không tồn tại";
        }
        $data = array('user' => $user);
        $this->render('show', $data);
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
        $response = Table::update();
        $_SESSION['message'] = $response['result']['message'];
        if ($response['status'] == false) {
          $this->render('edit', $response['result']);
        } else {
            header("Location: index.php?controller=tables&action=index");
        }
    }

    public function delete()
    {
        $response = User::delete();
        $_SESSION['message'] = $response['result']['message'];
        header("Location: index.php?controller=users&action=index");
    }
}