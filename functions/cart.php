<?php
function addProductToCart(int $userId, int $productId){
    
    $sql ="INSERT INTO cart 
            SET quantity=1,user_id = :userId,product_id = :productId
            ON DUPLICATE
            KEY UPDATE quantity = quantity + 1;";
    $statement = getDB()->prepare($sql);

    $statement->execute([
        ':userId'=> $userId ,
        ':productId'=> $productId,
    ]);
}

function countProductsInCart(int $userId){
    $sql ="SELECT SUM(quantity)
            FROM cart
            JOIN products ON(cart.product_id = products.id)
            WHERE user_id =".$userId ;

    $cartResult = getDB()->query($sql);

    if($cartResult === false){
        return 0;
    }

    $cartItems = $cartResult->fetchColumn();
    return $cartItems;
}

function getCartItemsForUserId(int $userId):array{
    $sql = "SELECT product_id,title,description,price
            FROM cart
            JOIN products ON(cart.product_id = products.id)
            WHERE user_id = ".$userId;
    $results = getDB()->query($sql);
    if($results === false){
        return [];
    }
    $found = [];
    while($row = $results->fetch()){
        $found[]=$row;
    }
    return $found;
}

function getCartSumForUserId(int $userId){
    $sql = "SELECT SUM(price * quantity)
            FROM cart
            JOIN products ON(cart.product_id = products.id)
            WHERE user_id = ".$userId;
    $result = getDB()->query($sql);
    if($result === false){
        return 0;
    }
    return (int)$result->fetchColumn();
}
