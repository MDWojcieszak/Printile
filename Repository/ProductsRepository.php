<?php

require_once "Repository.php";
require_once __DIR__.'//..//Models//Product.php';

class ProductsRepository extends Repository {

    public function getProduct(int $id): ?Product
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM products WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$product)
            return null;
        return new Product(
            $product['id'],
            $product['image'],
            $product['name'],
            $product['description'],
            $product['price'],
            $product['opinion']
        );
    }
}