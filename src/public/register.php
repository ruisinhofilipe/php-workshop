<?php 
declare(strict_types=1);

session_start();


if(empty($_POST)){

    // Afficher le formulaire
    include "public/views/layout/header.view.php";
    include "public/views/register.view.php";
    include "public/views/layout/footer.view.php";

}else{
    try{

        // 2 - connect to DB
        require_once "public/db/connection.php";

        // 3 - Verificate input
        
            // 3.1 Not empty
        if(empty($_POST["username"]) ||empty($_POST["email"]) ||empty($_POST["password"])){
            throw new Exception("Form not completed");
        }

            // 3.2 Pas d'injection SQL 
        $username = htmlspecialchars($_POST["username"]);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

        // 4 - Password hashing
        $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        // 5 - Added to DB
        $statement = $pdo->prepare(
           "INSERT INTO users (username, email, password) 
            VALUES (:username, :email, :password)"
         );
         $statement->bindParam(":username", $username);
         $statement->BindParam(":email", $email);
         $statement->BindParam(":password", $passwordHash);

         $statement->execute();

        // 6 - User connected
         $_SESSION["user"] = [
            "id" => $pdo->lastInsertId(),
            "username" => $username,
            "email" => $email,
         ];

        // Home page
        http_response_code(302);
        header("location: index.php");

    }catch(Exception $e){
        echo $e->getMessage();
    }
}

?>