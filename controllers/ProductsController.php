<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 4/14/2019
 * Time: 11:03 AM
 */
require_once('controllers/BaseController.php');
require_once ('models/Product.php');
require_once ('models/category.php');
class ProductsController extends BaseController
{

    /**
     * ProductsController constructor.
     */
    public function __construct()
    {
        $this->folder = 'products';
    }
    public function index()
    {
        $products = Product::all();
        $data = array('products' => $products);
        $this->render('index', $data);
    }
    public function creat(){
        $categories = Category::all();
        $data = array('categories' => $categories);
        $this->render('creat',$data);

    }
    public function store(){
        $response = Product::store();
        $_SESSION['message'] = @$response['result']['message'];
        if ($response['status'] == false) {
            $this->render('creat', $response['result']);
        } else {
            header("Location: index.php?controller=products&action=index");
        }
    }
    public function show()
    {
        $product = Product::finDetailProduct($_GET['id']);
        if ($product == null) {
            $_SESSION['message'] = "Mon an không tồn tại";
        }
        $data = array('product' => $product);
        $this->render('show', $data);
    }

    public function edit()
    {
        $product = Product::find($_GET['id']);
        //var_dump($product);
        $categories = Category::all();
        if ($product == null) {
            $_SESSION['message'] = "Product không tồn tại";
        }
        $data = array('product' => $product,'categories' => $categories);
        $this->render('edit', $data);
    }

    public function update()
    {
        $response = Product::update();
        $_SESSION['message'] = $response['result']['message'];
        if ($response['status'] == false) {
            $this->render('edit', $response['result']);
        } else {
            header("Location: index.php?controller=products&action=index");
        }
    }

    public function delete()
    {
        $response = Product::delete();
        $_SESSION['message'] = $response['result']['message'];
        header("Location: index.php?controller=products&action=index");
    }

}