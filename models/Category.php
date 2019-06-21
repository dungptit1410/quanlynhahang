<?php


class Category
{
    public $id;
    public $name;
    public $description;

    /**
     * Categories constructor.
     * @param $id
     * @param $name
     * @param $description
     */
    public function __construct($id, $name, $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }
    static function all(){
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM tbl_categories');
        foreach ($req->fetchAll() as $item){
            $list [] = new Category($item['id'],$item['name'],$item['description']);
        }
        return $list;
    }
    static function store(){
        self::getData($data);
        $validate = self::validation($data);
        if (!empty($validate)){
            return array('status'=>false, 'result' => array('errors' => $validate, 'data' => $data));
        }
        $db = DB::getInstance();
        $red = $db->prepare("INSERT INTO tbl_categories (name,description) VALUES (?,?)");
        if(!$red->execute(array($data['name'],$data['description']))){
            return array('status' => false, 'result' => array('message' => 'Tạo danh mục thất bại'));
        }
        else{
            return array('status' => true, 'result' => array('message' => 'Tạo danh mục thành công'));
        }

    }
    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM tbl_categories WHERE id = :id');
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
            return array('status' => false, 'result' => array('errors' => $validate, 'category' => $data));
        }

        $db = DB::getInstance();
        $red = $db->prepare("UPDATE tbl_categories SET name=?, description=? WHERE id=?");
        if (!$red->execute([$data['name'], $data['description'], (int)$_GET['id']])) {
            return array('status' => false, 'result' => array('message' => 'Sửa danh mục thất bại'));
        }
        return array('status' => true, 'result' => array('message' => 'Sửa danh mục thành công'));
    }

    static function delete($id)
    {
        $db = DB::getInstance();
        $red = $db->prepare("DELETE FROM tbl_categories WHERE id=?");
        if (!$red->execute([(int)$id])) {
            return array('status' => false, 'result' => array('message' => 'Xóa danh mục thất bại'));
        }
        return array('status' => true, 'result' => array('message' => 'Xóa danh mục thành công'));
    }

    private static function getData(&$data){
        if($_POST['name'] != ''){
            $data['name'] = $_POST['name'];
        }
        if($_POST['description'] != ''){
            $data['description'] = $_POST['description'];
        }
    }
    private static function validation($data){
        $validation = [];
        if($data['name'] == ''){
            $validation['name_err'] = "Tên không được để trống";
        }
        return $validation;
    }
}