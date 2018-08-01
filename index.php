<?php session_start(); 
$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet" media="all" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
    <title>MiniChat</title>
</head>
<body>
    <div id="form">
            <form method="post" action="post.php" onsubmit="storeMessage(event, this)">
        <div id="form2">
            <p>
            <label> Entrez Pseudo :
            <input type="text" name="pseudo" value="<?= $_COOKIE['test'] ?? '' ?>"/>
            </p>
            </label>
        </div>
        <div id="form3">
            <p>
            <label> Entrez Message :
            <input type="text" name="messagef" id="toto"/>
            <input type="submit" value="Valider" id="btn"/>
            </label>
            </div>
        </form>
    </div>

    <div id="center">
        <?php
        include('display.php');
        ?>
    </div>

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="refresh.js" type="text/javascript"></script>

</body>
</html>