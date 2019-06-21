<?php
/**
 * Created by PhpStorm.
 * product: Admin
 * Date: 4/14/2019
 * Time: 11:03 AM
 */

class Product
{
    public $id;
    public $name;
    public $price;
    public $avatar;
    public $description;
    public $url;
    public $id_category;
    public $hidden;
    public $name_category;

    /**
     * Product constructor.
     * @param $name
     * @param $price
     * @param $avatar
     * @param $description
     * @param $url
     * @param $id_category
     * @param $hidden
     * @param $name_category
     */
    public function __construct($id,$name, $price, $avatar, $description, $url, $id_category, $hidden, $name_category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->avatar = $avatar;
        $this->description = $description;
        $this->url = $url;
        $this->id_category = $id_category;
        $this->hidden = $hidden;
        $this->name_category = $name_category;
    }

    /**
     * Product constructor.
     * @param $name
     * @param $price
     * @param $avatar
     * @param $description
     * @param $url
     * @param $id_category
     * @param $hidden
     */

    static function all(){
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT p.*, c.name as name_category
                                     FROM tbl_products AS p JOIN tbl_categories AS c 
                                     ON p.id_category = c.id 
                                     ORDER BY p.id ASC;');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Product($item['id'], $item['name'], $item['price'], $item['avatar'], $item['description'], $item['url'], $item['id_category'], $item['hidden'], $item['name_category']);
        }

        return $list;

    }
    static function getByIdCategory($id){
        $list = [];
        $db = DB::getInstance();
        $req = $db->prepare('SELECT *
                                     FROM tbl_products AS p 
                                     WHERE p.id_category = :id
                                     ;');
        $req->execute(array('id' => $id));
        foreach ($req->fetchAll() as $item) {
            $list[] = new Product($item['id'], $item['name'], $item['price'], $item['avatar'], $item['description'], $item['url'], $item['id_category'], $item['hidden'], '');
        }

        return $list;

    }
    static function store()
    {
        self::getData($data);
        $db = DB::getInstance();
        $red = $db->prepare("INSERT INTO tbl_products (name, price, avatar, description, url, id_category, hidden) VALUES (?,?,?,?,?,?,?)");
        if (!$red->execute(array($data['name'], $data['price'], $data['avatar'], $data['description'], $data['url'], $data['id_category'], $data['hidden']))) {
            return array('status' => false, 'result' => array('message' => 'Tạo món ăn thất bại'));
        }
        return array('status' => true, 'result' => array('message' => 'Tạo món ăn thành công'));
    }
    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM tbl_products WHERE id = :id');
        $req->execute(array('id' => $id));

        $item = $req->fetch();
        if (isset($item['id'])) {
            return $item;
        }
        return null;
    }
    static function finDetailProduct($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT p.*, c.name as name_category
                                     FROM tbl_products AS p JOIN tbl_categories AS c 
                                     ON p.id_category = c.id
                                     where p.id = :id');
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
            return array('status' => false, 'result' => array('errors' => $validate, 'product' => $data));
        }
        $db = DB::getInstance();
        if(isset($data['avatar'])) {
            $red = $db->prepare("UPDATE tbl_products SET name=?, price=?, avatar=?, description=?, url=?, id_category=?, hidden=? WHERE id=?");
            if (!$red->execute(array($data['name'], $data['price'], $data['avatar'], $data['description'], $data['url'], $data['id_category'],(int) $data['hidden'], (int)$_GET['id']))) {
                return array('status' => false, 'result' => array('message' => 'Tạo món ăn thất bại'));
            }
            return array('status' => true, 'result' => array('message' => 'Sửa món ăn thành công'));
        }
        else{

            $red = $db->prepare("UPDATE tbl_products SET name=?, price=?, description=?, url=?, id_category=?, hidden=? WHERE id=?");
            if (!$red->execute(array($data['name'], $data['price'], $data['description'], $data['url'], $data['id_category'],(int) $data['hidden'], (int)$_GET['id']))) {
                return array('status' => false, 'result' => array('message' => 'Tạo món ăn thất bại'));
            }
            return array('status' => true, 'result' => array('message' => 'Sửa món ăn thành công'));
        }
    }

    static function delete()
    {
        $db = DB::getInstance();
        $red = $db->prepare("DELETE FROM tbl_products WHERE id=?");
        if (!$red->execute([(int)$_GET['id']])) {
            return array('status' => false, 'result' => array('message' => 'Xóa product thất bại'));
        }
        return array('status' => true, 'result' => array('message' => 'Xóa product thành công'));
    }
    static function deleteByIdCategogy($id)
    {
        $db = DB::getInstance();
        $red = $db->prepare("DELETE FROM tbl_products WHERE id_category=?");
        if (!$red->execute([(int)$id])) {
            return array('status' => false, 'result' => array('message' => 'Xóa product thất bại'));
        }
        return array('status' => true, 'result' => array('message' => 'Xóa product thành công'));
    }

    private static function getData(&$data)
    {
        if ($_POST['name'] != '') {
            $data['name'] = $_POST['name'];
        }
        //danh muc
        if ($_POST['sl_category'] != '') {
            $data['id_category'] = $_POST['sl_category'];
        }
        if ($_POST['price'] != '') {
            $data['price'] = $_POST['price'];
        }
        //file
        if (($_FILES['fileUpload']['name'] != '')) {
            move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'views/upload/' . $_FILES['fileUpload']['name']);
            $data['avatar'] = 'views/upload/' . $_FILES['fileUpload']['name'];
        }
        //description
        if ($_POST['description'] != '') {
            $data['description'] = $_POST['description'];
        }
        if($_POST['url'] != '') {
            $data['url'] = $_POST['url'];
        }
        //check box
        if(isset($_POST['hidden'])){
            $data['hidden'] = 1;
        }
        else{
            $data['hidden'] = 0;
        }
    }

    private static function validation($data)
    {
        $validation = [];
        if (!isset($data['name'])) {
            $validation['name_err'] = "Tên không được để trống";
        }
        return $validation;
    }
}
