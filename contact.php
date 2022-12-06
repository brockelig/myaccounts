<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="assets/css/style.css">
     <title><title>
</head>
<body>
    <?php
    if (isset($_POST["submit"])) {
        mail("shopm.yaccs@gmailcom", "Kontaktformular", 'Name: ' . $_POST["name"] . ' E-Mail: ' . $_POST["email"] . ' Priorität: ' . $_POST["priorität"] . ' Nachricht: ' . $_POST["message"]);
    }
    ?>
        <h1 style="color: green;">Das Formular wurde versendet!</h1>
    <form action="contact.php" method="post">
        <input type="text" name="name" placeholder="Name"><br>
        <input type="email" name="email" placeholder="E-Mail"><br>
        <select name="priorität">
            <option value="gering">Gering</option>
            <option value="mittel">Mittel</option>
            <option value="hoch">Hoch</option>
        </select><br>
        <textarea name="message" rows="8" cols="80"></textarea><br>
        <button type="submit" name="submit">Absenden</button>
    </form>
</body>
</html>