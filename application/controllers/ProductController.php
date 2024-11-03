<?php
session_start();
require_once 'models/ProductModel.php';

class ProductController {
    private $model;

    public function __construct() {
        $this->model = new ProductModel();
        if (!isset($_SESSION['products'])) {
            $_SESSION['products'] = $this->model->getAllProducts();
        }
    }

    public function index() {
        $products = $_SESSION['products'];
        include 'views/index.php';
    }

    public function addProduct() {
        $newProduct = [
            'name' => $_POST['productName'],
            'qty' => $_POST['productQty'],
            'description' => $_POST['productDescription'],
            'price' => $_POST['productPrice']
        ];
        $_SESSION['products'][] = $newProduct;

        echo json_encode(['status' => 'success']);
    }

    public function updateProduct() {
        $id = $_POST['editProductId'];
        $updatedProduct = [
            'name' => $_POST['editProductName'],
            'qty' => $_POST['editProductQty'],
            'description' => $_POST['editProductDescription'],
            'price' => $_POST['editProductPrice']
        ];

        foreach ($_SESSION['products'] as &$product) {
            if ($product['id'] == $id) {
                $product = array_merge($product, $updatedProduct);
                break;
            }
        }

        echo json_encode(['status' => 'success']);
    }

    public function deleteProduct($id) {
        foreach ($_SESSION['products'] as $key => $product) {
            if ($product['id'] == $id) {
                unset($_SESSION['products'][$key]);
                break;
            }
        }

        echo json_encode(['status' => 'success']);
    }
}
?>
