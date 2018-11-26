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

<body >

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

 <form id="log" action="article.php" method="POST">
		
        <input class="btn btn-outline-primary" type="submit"  value="accueil">
        
    </form>





<h1 align="center" class="">Projet n°4 Noé - ET3 Afficher</h1>
<div id="result"></div>
    
</body>

</html>

<?php

date_default_timezone_set('UTC');


$today = date("d-m-Y");


$ID_ROW = isset($_GET['id']) ? $_GET['id'] : NULL;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog2-3";

// Connexion au serveur MySQL
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}


$affich = "SELECT auteur, titre, texte, `date` FROM blog2 WHERE id = '$ID_ROW'";
$result = $conn->query($affich);

if ($conn->query($affich) == true) { // Exécution code MySql

   
} else {

    echo "<br>Error: " . $affich . "<br>" . $conn->error;
}

$charlimit = 200;
$limitedtext ="";

   
		if ($result->num_rows > 0) {
           
			echo '<p></p>';
        // output data of each row
			while ($row = $result->fetch_assoc()) {
                $limitedtext= $row["texte"];
                if (strlen($limitedtext) > $charlimit){
                    $limitedtext = (substr($limitedtext,0,$charlimit)."...");
                }

           
?>
                <div class='container'>

				    <div class='res' width: auto; height:auto>
<?php   
             
             
                        echo '<textarea style="resize:none; border:solid 1.5px black;" readonly="readonly" cols="40" rows="2" class="box; rounded">' . $row["titre"] . "\n" . $row["auteur"] . ", " . $row["date"] . '</textarea>'; //TRAVAILLE ICI 08/11
                    
                        echo '<br/>';

                        echo '<textarea style="resize: none; border:solid 1.5px black" readonly="readonly" cols="40" rows="3" class="box; rounded"  maxlength="200">' . $limitedtext . '</textarea>';
                        
?>
				        <p></p>

                    </div>

                </div>
           
<?php
			}
		} else {
			print "0 resultats trouvés";
		}

?>

