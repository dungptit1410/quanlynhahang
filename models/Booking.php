<?php


class Booking
{
    public $id;
    public $name;
    public $telephone;
    public $amount;
    public $time;
    public $note;
    public $id_user;
    public $status;

    /**
     * Booking constructor.
     * @param $id
     * @param $name
     * @param $telephone
     * @param $amount
     * @param $time
     * @param $note
     * @param $id_user
     * @param $status
     */
    public function __construct($id, $name, $telephone, $amount, $time, $note, $id_user, $status)
    {
        $this->id = $id;
        $this->name = $name;
        $this->telephone = $telephone;
        $this->amount = $amount;
        $this->time = $time;
        $this->note = $note;
        $this->id_user = $id_user;
        $this->status = $status;
    }
    static function all(){
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM tbl_bookings');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Booking($item['id'], $item['name'], $item['telephone'], $item['amount'], $item['time'], $item['note'],$item['id_user'], $item['status'] );
        }

        return $list;
    }
    static function store(){
        self::getData($data);
        $db = DB::getInstance();
        $date = $data['date'].' '.$data['time'];
        $req = $db->prepare('INSERT INTO tbl_bookings(name,telephone,amount,time,note) values (?,?,?,?,?)');
        if (!$req->execute(array($data['name'], $data['phone'], $data['amount'], $date , $data['note']))) {
            return array('status' => false, 'result' => array('message' => 'Tạo booking thất bại'));
        }
        return array('status' => true, 'result' => array('message' => 'Đặt bàn thành công'));
    }
    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM tbl_bookings WHERE id = :id');
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
        $red = $db->prepare("DELETE FROM tbl_bookings WHERE id=?");
        if (!$red->execute([(int)$_GET['id']])) {
            return array('status' => false, 'result' => array('message' => 'Xóa đặt phòng thất bại'));
        }
        return array('status' => true, 'result' => array('message' => 'Xóa đặt phòng thành công'));
    }

    private static function getData(&$data)
    {
        if ($_POST['name'] != '') {
            $data['name'] = $_POST['name'];
        }
        if ($_POST['email'] != '') {
            $data['email'] = $_POST['email'];
        }
        if ($_POST['phone'] != '') {
            $data['phone'] = $_POST['phone'];
        }
        if ($_POST['amount'] != '') {
            $data['amount'] = $_POST['amount'];
        }
        if ($_POST['date'] != '') {
            $data['date'] = $_POST['date'];
        }
        if ($_POST['time'] != '') {
            $data['time'] = $_POST['time'];
        }
        if ($_POST['note'] != '') {
            $data['note'] = $_POST['note'];
        }
    }


}

