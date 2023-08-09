<?php
declare(strict_types=1);


session_start();

try{
    // 1 - Connect to DB
    require_once "public/db/connection.php";
    
    // 2 - get the list of products
    $statement = $pdo->prepare("SELECT * FROM products WHERE productCode = :id");
    $statement->bindParam("id", $_GET["id"]);
    $statement->execute();
    
    $product = $statement->fetch(PDO::FETCH_ASSOC);


    include "public/views/layout/header.view.php";
    include "public/views/product.view.php";
    include "public/views/layout/footer.view.php";
    
    
    } catch(Exception $e){
        print_r($e->getMessage());
    }



?>