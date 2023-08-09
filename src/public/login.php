<?php

session_start();

if(empty($_POST)){

    // Afficher le formulaire
    include "public/views/layout/header.view.php";
    include "public/views/login.view.php";
    include "public/views/layout/footer.view.php";

}else{
    try{

        // 2 - connect to DB
        require_once "public/db/connection.php";

        if(empty($_POST["email"]) ||empty($_POST["password"])){
            throw new Exception("Form not completed");
        }

        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        $statement = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $statement->execute([$email]);

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user["password"])){
            $_SESSION["user"] = [
                "id" => $user['id'],
                "username" => $user['username'],
                "email" => $email,
             ];
             header("location: index.php");
             exit();
        }else{
            throw new Exception("Not log in");
        }

    }catch(Exception $e){
        echo $e->getMessage();
    }
}


?>
