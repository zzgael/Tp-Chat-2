<?php
session_start();
use \Colors\RandomColor;
include('vendor/autoload.php');
include('connexion.php');
$useragent = $_SERVER ['HTTP_USER_AGENT'];

// Insertion du message à l'aide d'une requête préparée

$req = $bdd->prepare('INSERT INTO messages (pseudo, message, date, ip, useragent) VALUES(?, ?, NOW(), ?, ?)');

$req->execute(array($_POST['pseudo'], $_POST['messagef'], $_SESSION['ip'], $useragent));

setcookie("test", $_POST["pseudo"],  time()+3600);

$pseudo = $bdd->prepare('SELECT COUNT(*) FROM users WHERE pseudo = ?');
$pseudo->execute(array($_POST['pseudo']));
$testpseudo = $pseudo->fetchColumn();

if ($testpseudo === '0') {
    $ins_color = $bdd->prepare('INSERT INTO users (pseudo, color) VALUES(?, ?)');
    $ins_color->execute(array($_POST['pseudo'], RandomColor::one() ));
}
else { echo "non";}

//header('Location: index.php');

?>

