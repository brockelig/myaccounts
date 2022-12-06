<?php
require("connection.php");

if (isset($_POST["submit"])) {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $con->prepare("SELECT * FROM users WHERE username =:username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $userExists = $stmt->fetchAll();
    var_dump($userExists);

    $passwordHashed = $userExists[0]["password"];
    $checkPassword = password_verify($password, $passwordHashed);

    if($checkPassword === false){
        echo ("Login fehlgeschlagen, Passwort stimmt nicht überein");
    }
    if($checkPassword === true){

        session_start();
        $_SESSION["username"] = $userExists[0]["username"];
        header("Location: index.hmtl");
    }
}
?>

<html>
    <head>
        <title>MyAccounts Login</title>
        <link rel="stylesheet" href="regist.css">
    </head>
    <body>
        <form action="login.php" method="POST">
            <h1>MyAccounts Login</h1>
            <div class="inputs_container">
                <input type="email" placeholder="Email" name="email" autocomplete="off">
                <input type="password" placeholder="Passwort" name="password" autocomplete="off">
            </div>
            <button name="submit">Login</button>
            <a href="regist.php">Registrieren</a>
</html>
