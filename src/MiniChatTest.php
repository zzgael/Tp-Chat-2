<?php
use PHPUnit\Framework\TestCase;
class MiniChatTest extends TestCase
{
    public function testLeNomDeVotreTest() 
    {
        // Instanciation de la connexion à base de données 
        $bdd = new PDO('mysql:host="127.0.0.1";dbname=minichat;charset=utf8', 'root', '');

        // utilisée pour vérifier la présence du message dans la table messages
        
        // Définition des données POST qui simulent un message
        $pseudo = "eryo";
        $useragent = "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0";
        $ip = "127.0.0.1";
        $message = "test unitaire"
    
        // Envoi de la requête POST
        $req = $bdd->prepare('INSERT INTO messages (pseudo, message, date, ip, useragent) VALUES(?, ?, NOW(), ?, ?)');
        $test = $req->execute(array($pseudo, $message, $ip, $useragent));
        // Si $result vaut "" alors c'est bien : la requête s'est executée
        
        // Si $result vaut FALSE alors c'est pas bien : la requête a échouée
        if ($test === FALSE){
            die("Probleme requette POST");
        }
        // Si $result contient quelque chose ici ( une string remplie ), 
        // c'est forcément une erreur retournée par store.php
        if ($test !== ""){
            die("string retourne par la requette");
        }

        
        // Si $result est vide c'est que la requête POST a bien été envoyée.
        // = store.php n'a renvoyé aucune erreur et donc n'a rien affiché.
        // On vérifie que le message existe bien dans la table messages
        $rep = $bdd->prepare('SELECT * FROM messages WHERE message="test unitaire"');
        $affichage = $rep->execute();
        // Pour vérifier que les datas sont identiques
        print_r($affichage);
    }
    // Création de la fonction PostRequest()
}
?>