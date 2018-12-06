<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

   
    <title> Mini Blog PT2</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/Basic-Header.css">
<style>



</style>

</head>

<body>



   <!-- <form align="right" action="login.php" method="POST">
            
                    <input class="btn btn-outline-primary" type="submit" value="login">
                        
                </form>

            <h1 align="center" class="">Projet n°4 Noé - Final</h1>
            <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Projet n°4 Noé - Final</h1>
                <p class="lead">MiniBlog</p>
            </div>
            
            </div>

            <div class="jumbotron">
            <h1 class="display-4">Projet n°4 Noé - Final</h1>
            <p class="lead"></p>
            <hr class="my-4">
            <p>Bouton login pour se connecter et éditer les informations sql</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="login.php" role="button">login</a>
            </p>
</div>
-->
<header>
<div>
        <nav class="navbar navbar-default navigation-clean-button">
            <div class="container">
                <div class="navbar-header"><a class="navbar-brand" href="">Projet n°4 Noé - Final</a>

                </div>
                      
                    <p class="navbar-text navbar-right actions"><a class="navbar-link login" href="login.php">Log In</a> 
                    <a class="btn btn-default action-button" role="button" href="">Sign Up</a></p>
                    
            </div>
        </nav>
</div>
</header>

<h4 align="center" style="padding-top:20px;">Veuillez entrez votre contenu</h4>

   <div class="container form-group" align="center" style="padding-top:40px;">

   

        <form  action="article.php" method="post">
            
        
                Auteur: <input type="text" name="auteur" maxlength="15" style="width: 150px" placeholder="nom d'Auteur">
                <br><br>
                   
                Titre: <input type="text" name="titre" maxlength="50" placeholder="Titre">
                <br><br>
                Texte: 
            <div>
                <textarea class="rounded" type="text" placeholder="Contenu" cols="40" rows="5" name="comments"></textarea>
            </div>
                <br><br>
            <input class="btn btn-primary" type="submit" value="Submit" name="Submit1">
        </form> 
        <p></p>
        <form id="formulaire" action="article.php" method="POST">
            
            <input class="btn btn-primary" type="submit" value="Afficher informations" name="Submit2">
            
        </form>
    </div>



<script type="text/javascript">

    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

        </script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   
<?php

date_default_timezone_set('UTC');


$today = date("d-m-Y");


$identifiant = "0";


$auteu = isset($_POST['auteur']) ? $_POST['auteur'] : null;
$titr = isset($_POST['titre']) ? $_POST['titre'] : null;
$comment = isset($_POST['comments']) ? $_POST['comments'] : null;





///////////////////////////////////////

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "miniblogpt2";


// Connexion au serveur MySQL
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO blog2 (auteur, titre, texte, `date`) VALUES ('$auteu', '$titr', '$comment', '$today')";
$affich = "SELECT id, auteur, titre, texte, `date` FROM blog2 ORDER BY `id` DESC";



$result = $conn->query($affich);




if (isset($_POST['Submit1'])) {
    ?>

<div align="center">

<?php

print("Bonjour, ");

?>

   <strong><?php print htmlspecialchars($auteu); ?></strong>
   
   <?php
    print(" merci pour votre article suivant : ");
    ?>

   <strong><?php print htmlspecialchars($titr); ?></strong>

   <?php

    print(" qui a pour texte : ");

    echo "<br/><br/>";

    echo '<textarea readonly="readonly" cols="40" rows="5"  class="box">' . $comment . '</textarea>';

    print("<br>le ");
    print $today;
    ?>

</div>

<?php

if ($conn->query($sql) == true) { // Exécution code MySql

    echo "<br><br>Vos informations ont été ajoutés avec succès";
} else {

    echo "<br>Error: " . $sql . "<br>" . $conn->error;
}

} elseif (isset($_POST['Submit2'])) {


    if ($result->num_rows > 0) {

        ?>
                
        <div class='container' align="center">
        
        <div class="row">
        <?php 
        echo '<p></p>';
        // output data of each row
        while ($row = $result->fetch_assoc()) {


            $identifiant = $row["id"];
           
            ?>  <div class="col-sm">  <?php
            echo '<textarea style="resize:none; border:solid 1.5px black;" readonly="readonly" cols="40" rows="2" class="box; rounded">' . $row["titre"] . "\n" . $row["auteur"] . ", " . $row["date"] . '</textarea>'; //TRAVAILLE ICI 08/11

            ?>
            <br/>
            <?php
            echo '<textarea  style="resize: none; border:solid 1.5px black" readonly="readonly" cols="40" rows="3" class="box; rounded">' . $row["texte"] . '</textarea>';
            
            ?>
            <br/>
            <form action="commentaire.php?id=<?php echo htmlspecialchars($identifiant);?>" method="post" class="">
                            <p>  
                                <input  name="id" type="hidden" value="<?php echo htmlspecialchars($identifiant); ?>">
                                <input type="submit" value="Accéder à cet article">
                            </p>
                        </form>
				         <p></p>

                  </div>
           
            <?php

        }
    } else {
        print "0 resultats trouvés";
    }
?>
  
  </div>
</div>
<?php
}

$conn->close();
?>

 </body>
</html>