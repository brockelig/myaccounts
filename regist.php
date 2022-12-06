<?php
require("connection.php");


if (isset($_POST["submit"])){
    var_dump($_POST);

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = PASSWORD_HASH($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $con->prepare("SELECT * FROM users WHERE username=:username OR email=:email");
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $userAlreadyExists = $stmt->fetchColumn();

    if(!$userAlreadyExists){
        //Registrieren
        registerUser($username, $email, $password);
    }
    else{
        //User exsistiert bereits
        
    }
}

if (isset($_POST["submit"])){
    var_dump($_POST);

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = PASSWORD_HASH($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $con->prepare("SELECT * FROM users WHERE username=:username OR email=:email");
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $userAlreadyExists = $stmt->fetchColumn();

    if(!$userAlreadyExists){
        //Registrieren
        registerUser($username, $email, $password);
    }
    else{
        //User exsistiert bereits
    }
}

function registerUser($username, $email, $password){
    global $con;
    $stmt = $con->prepare("INSERT INTO users(username, email, password) VALUES(:username, :email, :password)");
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->execute();
    header("Location: index.html");
}


?>
<html>
    <head>
        <title>Registrieren</title>
        <link rel="stylesheet" href="regist.css">
    </head>
    <body>
        <form action="regist.php" method="POST">
            <h1>MyAccounts Signin</h1>
            <div class="inputs_container">
                <input type="text" placeholder="Benutzername" name="username" autocomplete="off">
                <input type="email" placeholder="Email" name="email" autocomplete="off">
                <input type="password" placeholder="Passwort" name="password" autocomplete="off">
            </div>
            <button name="submit">Erstellen</button>
            <a href="login.php">Einloggen</a>
</html>
