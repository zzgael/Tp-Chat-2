
<?php
// Connexion à la base de données

try

{

    $bdd = new PDO('mysql:host='.(getenv('MYSQL_HOST') ?: 'localhost').';dbname=mini_chat_jeremy_g;charset=utf8', 'root', '');

}

catch(Exception $e)

{

        die('Erreur : '.$e->getMessage());

}
?>
