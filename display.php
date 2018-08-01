<div id="refreshmess">
    <?php  
                include ('connexion.php');
                $reponse = $bdd->query('SELECT m.pseudo, m.message, m.date, u.color FROM messages m LEFT JOIN users u ON m.pseudo = u.pseudo ORDER BY id DESC LIMIT 0, 10');
                

                // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)

                while ($donnees = $reponse->fetch())
                {
                    echo '<p><strong style="color:' . $donnees['color'] . '">' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . "   " . htmlspecialchars($donnees['date']) . '</p>';
                }

                $reponse->closeCursor();

    ?>
</div>
