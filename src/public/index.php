<?php
declare(strict_types=1);

session_start();

try{

// 1 - Connect to DB
require_once "public/db/connection.php";

// 2 - get the list of products
$statement = $pdo->query("SELECT * FROM products LIMIT 14");
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

include "public/views/layout/header.view.php";
include "public/views/index.view.php";
include "public/views/layout/footer.view.php";

} catch(Exception $e){
    print_r($e->getMessage());
}

?>