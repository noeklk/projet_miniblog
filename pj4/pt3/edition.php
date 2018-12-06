<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title> Mini Blog PT2</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

 <form align="right" action="article.php" method="POST">
		
        <input class="btn btn-outline-primary" type="submit"  value="accueil invite">
        
    </form>
    <?php
$conf = isset($_POST['verif_admin']) ? $_POST['verif_admin'] : null;
if($conf == true){
?>
<form align="right" action="acceslogin.php" method="POST">
		<input type="hidden" name="verif_admin" value="true">
        <input class="btn btn-outline-primary" type="submit"  value="accueil admin">
        
</form>
<?php
}
else{
?>
    <form align="right" action="login.php" method="GET">
        <input type="hidden" name="verif" value="true">
        <input class="btn btn-outline-primary" type="submit"  value="accueil admin">
        
    </form>
<?php  
}

    ?>
    





<h1 align="center" class="">Projet n°4 Noé - Edition SQL</h1>
<div id="result"></div>
    
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
$edition = "UPDATE blog2 SET auteur='$AUT_ROW', titre='$TIT_ROW', texte='$TXT_ROW', `date`='$DAT_ROW' where id = '$ID_ROW'";
$result = $conn->query($affich);

if ($conn->query($affich) == true) { // Exécution code MySql


} else {

    echo "<br>Error: " . $affich . "<br>" . $conn->error;
}


if ($result->num_rows > 0) {
 
// output data of each row
    while ($row = $result->fetch_assoc()) {
        $editdate = "edit : $today ";
        ?><form  action="editiondone.php" method="post" style="text-align: center;">
        <div class="container form-group" >
             <div class='res' width: auto; height:auto>

                Auteur: <input type="text" name="auteur" maxlength="15" style="width: 150px" value="<?php echo htmlspecialchars($row["auteur"]); ?>">
                <br><br>
                
                Titre: <input type="text" name="titre" maxlength="50" value="<?php echo htmlspecialchars($row["titre"]); ?>">
                <br><br>
                Texte: 
                <div>
                    <textarea class="rounded" type="text" cols="40" rows="5" name="comments"><?php echo htmlspecialchars($row["texte"]); ?></textarea>
                </div>

                <input  name="editdate" type="hidden" value="<?php echo htmlspecialchars($editdate); ?>">

                <input  name="idrow" type="hidden" value="<?php echo htmlspecialchars($ID_ROW); ?>">

                <br><br>
                <input type="hidden" name="verif_admin" value="true">
                <input class="btn btn-primary" type="submit" value="Submit" name="Submit1">
                <?php
                

               // echo '<p style ="transform: translateX(-3%)">' . 'Les informations avec l\'id ' . $ID_ROW .  ' ont bien été supprimés' . '</p>';
               // echo '<textarea style="resize:none; border:solid 1.5px black;" readonly="readonly" cols="40" rows="2" class="box; rounded">' . $row["titre"] . "\n" . $row["auteur"] . ", " . $row["date"] . '</textarea>'; //TRAVAILLE ICI 08/11
               // echo '<p>' . $row["id"] . '</p>';
				//echo '<br/>';
                //echo '<textarea onclick="textAreaAdjust(this)" style="resize: vertical; border:solid 1.5px black; overflow:hidden" readonly="readonly" cols="40" rows="3" class="box; rounded">' . $row["texte"] . '</textarea>';
                ?>
            </div>
         </div>
         </form> <?php

            }
        } else {


            print "BUG SYSTEME ID INTROUVABLE";
        }

/*$delete ="DELETE from blog2 where id= $ID_ROW";

if ($conn->query($delete) === true) { // Exécution code MySql

   
} else {

    echo "<br>Error: " . $sql . "<br>" . $conn->error;
}*/






////////////////////////////////////////////////


        ?>

