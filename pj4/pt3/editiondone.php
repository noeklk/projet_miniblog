<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title> Mini Blog PT2</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/Basic-Header.css">
    <!-- Bootstrap CSS -->



    <style>

        .navigation-clean-button{
  background-color: rgba(0,0,0,.7);
  padding-top:10px;
  padding-bottom:20px;
  color:#fff;
  border-radius:0px;
  box-shadow:none;
  border: none;
  margin-bottom:0;
}

button{

background-image:none;
padding: 0;
border: none;
background: none;
margin-right: -20px;
text-decoration: none;
color: #fff;
cursor: pointer;
}
        #formulaire{
    text-align: center;


}

h1{

font-family: 'Open Sans', sans-serif;
font-size: 50px;
}




.res{

      position: relative;
}
</style>
    <script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

   

   

</script>
</head>

<body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <header>
        <div>
            <nav class="navbar navbar-default navigation-clean-button">
                <div class="container">
                    <div class="navbar-header"><a class="navbar-brand" href="">Projet n°4 Noé - Suppression Confirmer</a>

                    </div>

                    <p class="navbar-text navbar-right actions">
                        <?php
                     
                    $conf = isset($_POST['verif_admin']) ? $_POST['verif_admin'] : null;
                    if($conf == true){
                    ?>


                        <form class="navbar-input-group navbar-form navbar-left" action="acceslogin.php" method="POST">
                            <input type="hidden" name="verif_admin" value="true">
                            <button type="submit">
                                <p class="navbar-text navbar-right actions"><a class="navbar-link login">Accueil admin</a>
                            </button>
                        </form>

                        <?php
                    }
                    else{
                    ?>

                        <form class="form" action="login.php" method="GET">
                            <input type="hidden" name="verif" value="true">
                            <button type="submit">
                                <p class="navbar-text navbar-right actions"><a class="navbar-link login">Accueil admin</a>
                            </button>
                        </form>
                        <!--<a class="navbar-link login">Accueil admin</a>-->
                        <?php  
                    }

                    ?>
                        <a class="btn btn-default action-button" role="button" href="article.php">Accueil invité</a>
                    </p>
                    </p>
                </div>
            </nav>
        </div>
    </header>

</body>

</html>

<?php

date_default_timezone_set('UTC');


$today = date("d-m-Y");
//$identifiant = isset($_POST['postid']) ? $_POST['postid'] : NULL;

$ID_ROW = isset($_POST['idrow']) ? $_POST['idrow'] : null;
$AUT_ROW = isset($_POST['auteur']) ? $_POST['auteur'] : null;
$TIT_ROW = isset($_POST['titre']) ? $_POST['titre'] : null;
$TXT_ROW = isset($_POST['comments']) ? $_POST['comments'] : null;
$DAT_ROW = isset($_POST['editdate']) ? $_POST['editdate'] : null;



//echo '<p>' . "id : " . $ID_ROW .'</p>';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "miniblogpt2";


// Connexion au serveur MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

$_comment = mysqli_real_escape_string($conn,$TXT_ROW);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$affich = "SELECT auteur, titre, texte FROM blog2 WHERE id = '$ID_ROW'";

$edition = "UPDATE blog2 SET auteur='$AUT_ROW', titre='$TIT_ROW', texte='$_comment', `date`='$DAT_ROW' where id = '$ID_ROW'";
$result = $conn->query($affich);



if ($conn->query($affich) == true) { // Exécution code MySql

   

  

    if ($result->num_rows > 0) {

echo '<p></p>';
// output data of each row
while ($row = $result->fetch_assoc()) {

    if ($row['auteur'] == $AUT_ROW && $row['titre'] == $TIT_ROW && $row['texte'] == $TXT_ROW ){

        ?>
<p class="text-center">Aucune modification effectué</p>
<?php
    

    }
else{
    if ($conn->query($edition) == true){

        ?>
<p class="text-center">Vos modifications ont été effectué avec succès</p>
<?php

    }
    else{
        echo "<br>Error: " . $edition . "<br>" . $conn->error;

    }
    
}    
  
            }
        } else {
            print "0 resultats trouvés";
        }

    



} else {

    
    echo "<br>Error: " . $affich . "<br>" . $conn->error;
}


$conn->close();





?>