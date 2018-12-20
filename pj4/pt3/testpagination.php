<?php
$cnx = new PDO('mysql:host=localhost;dbname=miniblogpt2;charset=utf8', 'root', '');

$page = (!empty($_GET['page']) ? $_GET['page'] : 1);
$limite = 5;

// Partie "Requête"
/* On calcule donc le numéro du premier enregistrement */
$debut = ($page - 1) * $limite;
/* On ajoute le marqueur pour spécifier le premier enregistrement */
$query = 'SELECT * FROM `blog2` LIMIT :limite OFFSET :debut';
$query = $cnx->prepare($query);
$query->bindValue('limite', $limite, PDO::PARAM_INT);
/* On lie aussi la valeur */
$query->bindValue('debut', $debut, PDO::PARAM_INT);
$query->execute();

// Partie "Boucle"
while ($element = $query->fetch()) {
    // C'est là qu'on affiche les données  :)
    
    echo '<p>';
    echo 'auteur : ' . $element["auteur"]. ' titre : '  . $element["titre"];
    echo '</p>';
    echo '<p>' . $element["texte"] . '</p>';
}

// Partie "Liens"
/* Notez que les liens ainsi mis vont bien faire rester sur le même script en passant
 * le numéro de page en paramètre */
?>
<a href="?page=<?php echo $page - 1; ?>&page=1">Page précédente</a>
—
<a href="?page=<?php echo $page + 1; ?>&page=1">Page suivante</a>