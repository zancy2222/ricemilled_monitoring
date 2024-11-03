<?php

require_once 'controllers/ProductController.php';

$controller = new ProductController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_GET['action'] === 'add_product') {
        $controller->addProduct();
    } elseif ($_GET['action'] === 'update_product') {
        $controller->updateProduct();
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $controller->deleteProduct($id);
} else {
    $controller->index();
}
