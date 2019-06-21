<?php
require_once('controllers/BaseController.php');
require_once('models/Category.php');
require_once('models/Product.php');
class CategoriesController extends BaseController
{

    /**
     * CategoriesController constructor.
     */
    public function __construct()
    {
        $this->folder = 'categories';
    }
    public function index(){
        $categories = Category::all();
        $data = array('categories' => $categories);
        $this->render('index',$data);
    }
    public function creat(){
        $this->render('creat');
    }
    public function store(){
        $response = Category::store();
        $_SESSION['message'] = @$response['result']['message'];
        //var_dump ($response);
        if ($response['status'] == false) {
            $this->render('creat', $response['result']);
        } else {
            header("Location: index.php?controller=categories&action=index");
        }
    }
    public function edit(){
        $category = Category::find($_GET['id']);
        if ($category == null) {
            $_SESSION['message'] = "Danh mục không tồn tại";
        }
        $data = array('category' => $category);
        $this->render('edit', $data);
    }
    public function update()
    {
        $response = Category::update();
        @$_SESSION['message'] = $response['result']['message'];
        if ($response['status'] == false) {
            $this->render('edit', $response['result']);
        } else {
            header("Location: index.php?controller=categories&action=index");
        }
    }
    public function delete()
    {
        $id = $_GET['id'];
        $category = Category::find($id);
        $response1 = Product::deleteByIdCategogy($category['id']);
        $response = Category::delete($id);
        $_SESSION['message'] = $response['result']['message'];
        header("Location: index.php?controller=categories&action=index");
    }
}