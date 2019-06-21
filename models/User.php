<?php

class User
{
    public $id;
    public $name;
    public $email;
    public $address;
    public $password;

    function __construct($id, $name, $email, $address, $password = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->password = $password;
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM tbl_users');

        foreach ($req->fetchAll() as $item) {
            $list[] = new User($item['id'], $item['name'], $item['email'], $item['address']);
        }

        return $list;
    }

    static function store()
    {
        self::getData($data);
        $validate = self::validation($data);
        if (!empty($validate)) {
            return array('status' => false, 'result' => array('errors' => $validate, 'data' => $data));
        }

        $db = DB::getInstance();
        $red = $db->prepare("INSERT INTO tbl_users (name, email, address, password) VALUES (?,?,?,?)");
        if (!$red->execute(array($data['name'], $data['email'], $data['address'], $data['password']))) {
            return array('status' => false, 'result' => array('message' => 'Tạo user thất bại'));
        }
        return array('status' => true, 'result' => array('message' => 'Tạo user thành công'));
    }

    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM tbl_users WHERE id = :id');
        $req->execute(array('id' => $id));

        $item = $req->fetch();
        if (isset($item['id'])) {
            return $item;
        }
        return null;
    }
    static function update()
    {
        self::getData($data);
        $validate = self::validation($data);
        if (!empty($validate)) {
            return array('status' => false, 'result' => array('errors' => $validate, 'user' => $data));
        }

        $db = DB::getInstance();
        $red = $db->prepare("UPDATE tbl_users SET name=?, email=?, address=?, password=? WHERE id=?");
        if (!$red->execute([$data['name'], $data['email'], $data['address'], $data['password'], (int)$_GET['id']])) {
            return array('status' => false, 'result' => array('message' => 'Sửa user thất bại'));
        }
        return array('status' => true, 'result' => array('message' => 'Sửa user thành công'));
    }

    static function delete()
    {
        $db = DB::getInstance();
        $red = $db->prepare("DELETE FROM tbl_users WHERE id=?");
        if (!$red->execute([(int)$_GET['id']])) {
            return array('status' => false, 'result' => array('message' => 'Xóa user thất bại'));
        }
        return array('status' => true, 'result' => array('message' => 'Xóa user thành công'));
    }

    private static function getData(&$data)
    {
        if ($_POST['name'] != '') {
            $data['name'] = $_POST['name'];
        }
        if ($_POST['email'] != '') {
            $data['email'] = $_POST['email'];
        }
        if ($_POST['address'] != '') {
            $data['address'] = $_POST['address'];
        }
        if ($_POST['password'] != '') {
            $data['password'] = $_POST['password'];
        }
    }

    private static function validation($data)
    {
        $validation = [];
        if (!isset($data['name'])) {
            $validation['name_err'] = "Tên không được để trống";
        }
        if (isset($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $validation['email_err'] = "Email không hợp lệ";
        }
        if (!isset($data['password'])) {
            $validation['password_err'] = "Mật khẩu không được để trống";
        }
        return $validation;
    }
}