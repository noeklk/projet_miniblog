<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title> Mini Blog PT2</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


<style>


#formulaire{
    text-align: center;


}

h1{

font-family: 'Open Sans', sans-serif;
font-size: 50px;
}

#log{
    position: absolute;
    top: 20px;
    right: 20px;
    

}

.res{

      position: relative;
}
</style>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

    function textAreaAdjust(o) {
  o.style.height = "1px";
  o.style.height = (25+o.scrollHeight)+"px";
}


   

</script>
</head>

<body >

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

 <form id="log" action="article.php" method="POST">
		
        <input class="btn btn-outline-primary" type="submit"  value="accueil">
        
    </form>





<h1 align="center" class="">Projet n°4 Noé - Edition SQL</h1>
<div id="result"></div>
    
</body>

</html>

<?php

date_default_timezone_set('UTC');


$today = date("d-m-Y");
//$identifiant = isset($_POST['postid']) ? $_POST['postid'] : NULL;

$ID_ROW = isset($_POST['idrow']) ? $_POST['idrow'] : NULL;
$AUT_ROW = isset($_POST['auteur']) ? $_POST['auteur'] : NULL;
$TIT_ROW = isset($_POST['titre']) ? $_POST['titre'] : NULL;
$TXT_ROW = isset($_POST['comments']) ? $_POST['comments'] : NULL;
$DAT_ROW = isset($_POST['editdate']) ? $_POST['editdate'] : NULL;



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


$affich = "SELECT auteur, titre, texte FROM blog2 WHERE id = '$ID_ROW'";

$edition ="UPDATE blog2 SET auteur='$AUT_ROW', titre='$TIT_ROW', texte='$TXT_ROW', `date`='$DAT_ROW' where id = '$ID_ROW'";
$result = $conn->query($affich);



if ($conn->query($edition) == true) { // Exécution code MySql
       
    echo '<p class="text-center">'. $AUT_ROW . $TIT_ROW . $TXT_ROW . $DAT_ROW .'</p>';

    ?><p class="text-center">Vos informations ont été édités avec succès</p><?php
    
    $conn->close();

} else {
    
    echo "<br>Error: " . $edition . "<br>" . $conn->error;
}






/*$delete ="DELETE from blog2 where id= $ID_ROW";

if ($conn->query($delete) === true) { // Exécution code MySql

   
} else {

    echo "<br>Error: " . $sql . "<br>" . $conn->error;
}*/






////////////////////////////////////////////////


	?>

