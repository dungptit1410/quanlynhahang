<?php


class Table
{
    public $status;
    public $id;
    public $id_booking;
    public $name;
    /**
     * Table constructor.
     * @param $status
     */

    public function __construct($id,$status,$id_booking,$name)
    {
        $this->id = $id;
        $this->status = $status;
        $this->id_booking = $id_booking;
        $this->name = $name;
    }
    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT t.*,b.name FROM tbl_tables AS t
                                     LEFT JOIN tbl_bookings AS b
                                     ON t.id_booking = b.id');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Table($item['id'],$item['status'],$item['id_booking'],$item['name']);
        }

        return $list;
    }
    static function listFreeTable(){
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM tbl_tables WHERE id_booking is null AND status = 0');

        foreach ($req->fetchAll() as $item) {

            $list[] = new Table($item['id'],$item['status'],$item['id_booking'], "");
        }

        return $list;

    }
    // update ban hoat dong khi chọn
    static function update()
    {
        $id_booking = $_GET['id_booking'];
        $idstring_tables = $_GET['id_table'];
        $id_tables = explode(",", $idstring_tables);
        $db = DB::getInstance();
        $red = $db->prepare("UPDATE tbl_bookings SET status=? WHERE id=?");
        $red->execute([(int)2, $id_booking]);
        for($i = 0; $i < count($id_tables) ; $i++) {
            $red = $db->prepare("UPDATE tbl_tables SET status=?, id_booking=? WHERE id=?");
            $red->execute([(int) 1,(int) $id_booking, $id_tables[$i]]);
        }
        return array('status' => true, 'result' => array('message' => 'Thành công'));
    }
    // update bàn trống khi thanh toán
    static function updateOneFree($id){
        $db = DB::getInstance();
        $red = $db->prepare("UPDATE tbl_tables SET status=?, id_booking=? WHERE id=?");
        if(!$red->execute([(int) 0, null , $id])){
            return array('status' => false, 'result' => array('message' => 'Update thất bại'));
        }
        return array('status' => true, 'result' => array('message' => 'Update thành công'));


    }
    // tìm kiếm thông tin bàn và khách hàng đặt bàn để đưa ra view gọi món
    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT t.*,b.name,b.telephone FROM tbl_tables AS t
                                     LEFT JOIN tbl_bookings AS b
                                     ON t.id_booking = b.id WHERE t.id = :id');
        $req->execute(array('id' => $id));
        $item = $req->fetch();
        if (isset($item['id'])) {
            return $item;
        }
        return null;
    }

}