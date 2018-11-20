<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title> Mini Blog PT2</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

<style>
#formulaire{
    text-align: center;


}
h1{

    font-family: 'Open Sans', sans-serif;
    font-size: 50px;
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

<form  action="login.html" method="POST">
		
        <input type="submit" value="login">
        
    </form>
<h1 align="center">Projet n°4 Noé</h1>

	
   
	  
    <form id="formulaire" action="article.php" method="post">
           
     
             Auteur: <input type="text" name="auteur" maxlength="15" style="width: 150px" placeholder="nom d'Auteur">
            <br><br>
             Titre: <input type="text" name="titre" maxlength="50" placeholder="Titre">
            <br><br>
             Texte: 
        <div>
            <textarea type="text" placeholder="Contenu" cols="40" rows="5" name="comments"></textarea>
        </div>
            <br><br>
        <input type="submit" value="Submit" name="Submit1">
    </form> 
    <p></p>
    <form id="formulaire" action="article.php" method="POST">
		
        <input type="submit" value="Afficher informations" name="Submit2">
        
    </form>
</body>

</html>

<?php

date_default_timezone_set('UTC');

$today = date("d-m-Y"); 
$auteu = ($_POST['auteur']);
$titr = ($_POST['titre']);
$comment =($_POST['comments']);
?>



<?php
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
$affich = "SELECT auteur, titre, texte, `date` FROM blog2 ORDER BY `id` DESC"; 
$result = $conn->query($affich);
//$url = "";



if(isset($_POST['Submit1'])){
    
   print ("Bonjour, "); 
   //print htmlspecialchars($_POST['auteur']); 
   ?>

   <strong><?php print htmlspecialchars($auteu); ?></strong>
   
   <?php
   print(" merci pour votre article suivant : ");
   ?>

   <strong><?php print htmlspecialchars($titr); ?></strong>

   <?php
   //print htmlspecialchars($_POST['titre']);
   print(" qui a pour texte : <br>");
   echo '<textarea readonly="readonly" cols="40" rows="5"  class="box">'.$comment.'</textarea>';
   //echo '<input type="text" name="name1" value="'.$comment.'">';
   //print htmlspecialchars($_POST['comments']);
   print("<br>le ");
   print $today;


if ($conn->query($sql) === TRUE) { // Exécution code MySql
    
    echo "<br><br>Vos informations ont été ajoutés avec succès";
} else {
    
    echo "<br>Error: " . $sql . "<br>" . $conn->error;
}

}

elseif (isset($_POST['Submit2'])) {

    /*if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            print "<br> Auteur: ". $row["auteur"]. " - Titre: ". $row["titre"]. " - Texte: ". $row["texte"]. " - ". $row["date"].  "<br>";
        }*/
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            
           /* ?>
            <input type="text" name="auteur" readonly="readonly"  style="width: 300px;height : 30px" value="<?php print "" .$row["auteur"]. "<br>";  ?>">
            <?php*/
            //echo '<input type="text" style="height : 30px; width : 300px" name="name1" readonly="readonly" value='. $row["titre"].'>';
                        
           /* echo "<div id='" 
                
                . "' class='nivo-html-caption' onclick=\"location.href='$url'\">"
               
            ;*/
            echo '<textarea style="resize:none; border:solid 1.5px black;" readonly="readonly" cols="40" rows="2" class="box">'.$row["titre"]. "\n" .$row["auteur"]. ", " .$today.'</textarea>'; //TRAVAILLE ICI 08/11
            echo '<br/>';
            echo '<textarea onclick="textAreaAdjust(this)" style="resize: vertical; border:solid 1.5px black; overflow:hidden" readonly="readonly" cols="40" rows="3" class="box">'. $row["texte"].'</textarea>';
           // echo '</div>';
          
           
            echo '<p></p>';
            
           // print "<br> Auteur: ". $row["auteur"]. " - Titre: ". $row["titre"]. " - Texte: ". $row["texte"]. " - ". $row["date"].  "<br>";
        }
    } else {
        print "0 results";
    }

}  

$conn->close();
?>

