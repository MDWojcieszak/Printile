<?php

require_once "Repository.php";
require_once __DIR__.'//..//Models//Order.php';

class OrdersRepository extends Repository {

    public function getOrder(int $id): ?Order
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM orders WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$product)
            return null;
        return new Order(
            $product['id'],
            $product['userID'],
            $product['date'],
            $product['status'],
            $product['parametersID'],
            $product['price']
        );
    }
}