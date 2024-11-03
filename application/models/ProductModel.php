<?php
class ProductModel {
    public $products = [
        [
            'id' => 1,
            'name' => 'Product A',
            'qty' => 10,
            'description' => 'Description for Product A',
            'price' => 100.00
        ],
        [
            'id' => 2,
            'name' => 'Product B',
            'qty' => 5,
            'description' => 'Description for Product B',
            'price' => 150.00
        ],
        [
            'id' => 3,
            'name' => 'Product C',
            'qty' => 20,
            'description' => 'Description for Product C',
            'price' => 200.00
        ]
    ];

    public function getAllProducts() {
        return $this->products;
    }

    public function addProduct($product) {
        $product['id'] = end($this->products)['id'] + 1;
        $this->products[] = $product;
    }

    public function updateProduct($id, $updatedProduct) {
        foreach ($this->products as &$product) {
            if ($product['id'] == $id) {
                $product = array_merge($product, $updatedProduct);
                break;
            }
        }
    }

    public function deleteProduct($id) {
        foreach ($this->products as $key => $product) {
            if ($product['id'] == $id) {
                unset($this->products[$key]);
                break;
            }
        }
    }
}
?>
