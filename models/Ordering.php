<?php


class Ordering
{
    public $id;
    public $id_table;
    public $id_product;
    public $id_bill;
    public $number;
    public $price;
    public $status;
    public $note;

    /**
     * Ordering constructor.
     * @param $id
     * @param $id_table
     * @param $id_product
     * @param $id_bill
     * @param $number
     * @param $price
     * @param $status
     * @param $note
     */
    public function __construct($id, $id_table, $id_product, $id_bill, $number, $price, $status, $note)
    {
        $this->id = $id;
        $this->id_table = $id_table;
        $this->id_product = $id_product;
        $this->id_bill = $id_bill;
        $this->number = $number;
        $this->price = $price;
        $this->status = $status;
        $this->note = $note;
    }


    static function add()
    {
        self::getData($data);
        $db = DB::getInstance();
        $red = $db->prepare("UPDATE tbl_tables SET status=? WHERE id=?"); // update ban hoat dong
        $red->execute(array((int)1, $data['id_table']));
        $red = $db->prepare("INSERT INTO tbl_orderings (id_table, id_product, id_bill, number, price, status, note) VALUES (?,?,?,?,?,?,?)");
        if (!$red->execute(array($data['id_table'], $data['id_product'], null, $data['number'], $data['price'], 0, $data['note']))) {
            return array('status' => false, 'result' => array('message' => 'Gọi món ăn thất bại'));
        }
        return array('status' => true, 'result' => array('message' => 'Gọi món ăn thành công'));
    }
    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT o.id, o.number, o.price, o.note, p.name FROM tbl_orderings as o JOIN tbl_products as p
                                       ON o.id_product = p.id
                                       WHERE o.status = 0 AND o.id_table = :id');
        $req->execute(array('id' => $id));
        foreach ($req->fetchAll() as $item) {
            $list[] = $item;
        }
        if(count($list) >0) return $list;
        else return null;
    }
    static function findManyTable($listId){
        $db = DB::getInstance();
        $listProuductOfTables = [];
        for($i = 0 ; $i < count($listId) ;$i++){
            $list = null;
            $req = $db->prepare('SELECT o.id, o.number, o.price, o.note, p.name, o.id_table FROM tbl_orderings as o JOIN tbl_products as p
                                       ON o.id_product = p.id
                                       WHERE o.status = 0 AND o.id_table = :id');
            $req->execute(array('id' => (int) $listId[$i]));
            foreach ($req->fetchAll() as $item) {
                $list[] = $item;
            }
            $listProuductOfTables[] = $list;
        }
        if(count($listProuductOfTables) >0 ) return $listProuductOfTables ;
        else return null;

    }
    // update id bill cho mon goi o ban;
    static function update_IdBill($id){
        $db = DB::getInstance();
        $req = $db->query('SELECT MAX(id) as max FROM tbl_bills');
        $id_fetch = $req->fetch();
        $idBill = $id_fetch['max'];
        $red = $db->prepare("UPDATE tbl_orderings SET id_bill=?, status=? WHERE id_table=? AND status = ?");
        if(!$red->execute([(int) $idBill, 1, $id, 0])){
            return array('status' => false, 'result' => array('message' => 'Update thất bại'));
        }
        return array('status' => true, 'result' => array('message' => 'Update thành công'));

    }
    static function getProductByIdBill($id){
        $list =  [];
        $db = DB::getInstance();
        $red = $db->prepare("Select  p.name, sum(o.number) as soluong, o.price, o.note
                                       FROM tbl_bills as b JOIN tbl_orderings as o
                                       ON b.id = o.id_bill
                                       JOIN  tbl_products as p
                                       ON p.id = o.id_product
                                       WHERE b.id = :id 
                                       GROUP BY p.name
                                       ");
        $red->execute(array('id' => $id));
        foreach ($red->fetchAll() as $item) {
            $list[] = $item;
        }
        return $list;
    }

    private static function getData(&$data)
    {
        if ($_POST['id_product'] != '') {
            $data['id_product'] = $_POST['id_product'];
        }
        if ($_POST['id_table'] != '') {
            $data['id_table'] = $_POST['id_table'];
        }
        if ($_POST['price'] != '') {
            $data['price'] = $_POST['price'];
        }
        if ($_POST['number'] != '') {
            $data['number'] = $_POST['number'];
        }
        if ($_POST['note'] != '') {
            $data['note'] = $_POST['note'];
        }
    }


}