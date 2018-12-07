 <!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title> Mini Blog PT2</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/Basic-Header.css">
    <!-- Bootstrap CSS -->
   

<style>



#formulaire{
    text-align: center;


}

h1{

font-family: 'Open Sans', sans-serif;
font-size: 50px;
}



.res{

      position: relative;
      
      left : 35%;
    
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
</style>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

</script>
</head>

<body >

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
                   
                      
                    <form class="navbar-input-group navbar-form navbar-left"  action="acceslogin.php" method="POST">
                            <input type="hidden" name="verif_admin" value="true">
                            <button type="submit"><a class="navbar-link login">Accueil admin</a></button>
                    </form>
                    
                    <?php
                    }
                    else{
                    ?>
                    
                        <form class="navbar-input-group navbar-form navbar-left" action="login.php" method="GET">
                            <input type="hidden" name="verif" value="true" >
                            <button type="submit"><a class="navbar-link login">Accueil admin</a></button>
                        </form>
                       <!--<a class="navbar-link login">Accueil admin</a>-->
                    <?php  
                    }

                    ?>
                    <a class="btn btn-default action-button" role="button" href="article.php">Accueil invité</a></p>
                </p>
            </div>
        </nav>
</div>
</header>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



</body>

</html>

<?php
//$identifiant = isset($_POST['postid']) ? $_POST['postid'] : NULL;

$ID_ROW = isset($_POST['idrow']) ? $_POST['idrow'] : null;

//echo '<p>' . "id : " . $ID_ROW .'</p>';

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


$affich = "SELECT auteur, titre, texte, `date` FROM blog2 WHERE id = $ID_ROW";


$result = $conn->query($affich);

if ($result->num_rows > 0) {

           
    
// output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<div class='container' align='center'>";
       
        echo '<h3>' . 'Les informations avec l\'id ' . $ID_ROW . ' ont bien été supprimés' . '</h3>';
        echo '<br/>';
        echo '<textarea style="resize:none; border:solid 1.5px black;" readonly="readonly" cols="40" rows="2" class="box; rounded">' . $row["titre"] . "\n" . $row["auteur"] . ", " . $row["date"] . '</textarea>'; //TRAVAILLE ICI 08/11
               // echo '<p>' . $row["id"] . '</p>';
        echo '<br/>';
        echo '<textarea  style="resize: vertical; border:solid 1.5px black; overflow:hidden" readonly="readonly" cols="40" rows="3" class="box; rounded">' . $row["texte"] . '</textarea>';
     
        echo "</div>";

    }
} else {


    print "BUG SYSTEME ID INTROUVABLE";
}

$delete = "DELETE from blog2 where id= $ID_ROW";

if ($conn->query($delete) === true) { // Exécution code MySql

    $conn->close();
} else {

    echo "<br>Error: " . $delete . "<br>" . $conn->error;
}






////////////////////////////////////////////////


?>

