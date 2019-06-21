<?php


class Bill
{
    public $id;
    public $amount;
    public $note;
    public $name;
    public $phone;
    public $email;
    public $address;
    public $status;
    public $datecreat;

    /**
     * Bill constructor.
     * @param $id
     * @param $amount
     * @param $note
     * @param $name
     * @param $phone
     * @param $email
     * @param $address
     * @param $status
     */
    public function __construct($id, $amount, $note, $name, $phone, $email, $address, $status,$datecreat)
    {
        $this->id = $id;
        $this->amount = $amount;
        $this->note = $note;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
        $this->status = $status;
        $this->datecreat = $datecreat;
    }
    static function store(){
        self::getData($data);
        $db = DB::getInstance();
        $red = $db->prepare("INSERT INTO tbl_bills (amount, name, phone, email ,address, status) VALUES (?,?,?,?,?,?)");
        if (!$red->execute(array((int)$data['amount'], $data['name'], (int) $data['phone'], $data['email'], $data['address'], (int) 1))) {
            return array('status' => false, 'result' => array('message' => 'Thanh toán thất bại'));
        }
        return array('status' => true, 'result' => array('message' => 'Thanh toán thành công'));
    }
    static function allOfTable(){
        $db = DB::getInstance();
        $list = [];
        $req = $db-> query("Select b.* 
                                     FROM tbl_bills as b
                                     where b.id IN (
                                     SELECT distinct id_bill 
                                     from tbl_orderings where id_table >0
                                     ) order by b.id desc 
                                     ");
        foreach ($req->fetchAll() as $item){
            $list[] = new Bill($item['id'], $item['amount'], $item['note'], $item['name'], $item['phone'] , $item['email'], $item['address'], $item['status'], $item['datecreat']);
        }
        //echo count($list);
        return $list;
    }
    static function findBillById($id){
        $db = DB::getInstance();
        $list = [];
        $req = $db->prepare("Select b.* 
                                     FROM tbl_bills as b
                                     where b.id = :id
                                     ");
        $req->execute(array('id' => $id));
        $item = $req->fetch();
        if (isset($item['id'])) {
            return new Bill($item['id'], $item['amount'], $item['note'], $item['name'], $item['phone'] , $item['email'], $item['address'], $item['status'], $item['datecreat']);
        }
        return null;
    }

    static function getBillOnline(){
        $db = DB::getInstance();
        $list = [];
        $req = $db-> query("Select b.* 
                                     FROM tbl_bills as b
                                     where b.status = 2 order by b.id desc 
                                     ");
        foreach ($req->fetchAll() as $item){
            $list[] = new Bill($item['id'], $item['amount'], $item['note'], $item['name'], $item['phone'] , $item['email'], $item['address'], $item['status'], $item['datecreat']);
        }
        //echo count($list);
        return $list;
    }
   /* static function upDateTableAndOrdering($id){
        $db = DB::getInstance();
        $red = $db->prepare("SELECT MAX(id) FROM tbl_bills");
        $idBill = $red->fetch();
        echo $idBill;
        die();
    }*/
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
        if ($_POST['phone'] != '') {
            $data['phone'] = $_POST['phone'];
        }
        if ($_POST['amount'] != '') {
            $data['amount'] = $_POST['amount'];
        }
    }

}