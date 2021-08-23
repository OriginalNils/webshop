<?php

$url = $_SERVER['REQUEST_URI'];
$indexPHPPosition = strpos($url, 'index.php');
$baseURL = substr($url,0,$indexPHPPosition);
$route = null;
if(false !== $indexPHPPosition){
    $route = substr($url,$indexPHPPosition);
    $route = str_replace('index.php',' ',$route);
}

$userId = generateUserId();
$countCartItems = countProductsInCart($userId);

if(!$route){
    $products = getAllProducts();
    
    require __DIR__.'/templates/main.php';
    exit();
}

if(strpos($route,"/cart/add/") == true){
    $routeParts = explode("/",$route);
    $productId = (int)$routeParts[3];
    
    addProductToCart($userId,$productId);

    header("Location: ".$baseURL."");
    exit();
}

if(strpos($route,"/cart") == true){

    $cartItems = getCartItemsForUserId($userId);
    $cartSum = getCartSumForUserId($userId);
    require __DIR__.'/templates/cartPage.php';
    exit();
}  

if(strpos($route,"/login") !== false){
    $isPost = strtoupper($_SERVER['REQUEST_METHOD']) === 'POST';
    $username= "";
    $password = "";
    $errors = [];
    $hasErrors = false;
    var_dump($_POST);
    if($isPost){
        var_dump($isPost);
        $username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST,'password');

        if(false === (bool)$username){
            $errors[]="Username benötigt.";
        }
        if(false === (bool)$password){
            $errors[]="Passwort benötigt.";
        }
        $userData = getUserDataForUserName($username);
        if((bool)$username && 0 === count($userData)){
            $errors[]="Username existiert nicht.";
        }
        if((bool)$password &&
        isset($userData['password']) &&
        false === password_verify($password,$userData['password'])){
            $errors[]= "Passwort ist falsch.";
        }

        if(0 === count($errors)){
            $_SESSION['userId'] = (int)$userData['id'];
            $redirectTarget = $baseURL.'index.php';
            if(isset($_SESSION['redirectTarget'])){
                $redirectTarget = $_SESSION['redirectTarget'];
            }
        header("Location: ".$redirectTarget);
            
        exit();
        }
    }

    $hasErrors = count($errors) > 0;
    require __DIR__.'/templates/login.php';

    exit();
}   

if(strpos($route,"/checkout") == true){
    if(!isLoggedIn()){
        $_SESSION['redirectTarget']= $baseURL.'index.php/checkout';
        header("Location: ".$baseURL."index.php/login");

    exit();
    }
    exit();
}   

