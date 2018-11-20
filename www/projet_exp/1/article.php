<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

<style>
#formulaire{
    text-align: center;
}
</style>

</head>

<body >
	<form  action="login.html" method="POST">
		
        <input type="submit" value="login">
        
      </form>
	  
    <form id="formulaire" action="article.php" method="post">
        pseudo: <input type="text" name="pseudo" placeholder="nom d'utilisateur"  >
        <br><br>
        commentaire:
        <div>
        <textarea type="text" placeholder="Hey... say something!" cols="40" rows="5" name="comments"></textarea>
            </div>
        <br><br>
        <input type="submit" value="Submit" name="Submit1">
      </form> 
      <form id="formulaire" action="article.php" method="POST">
		
        <input type="submit" value="Afficher informations" name="Submit2">
        
      </form>
</body>

</html>

<?php
$pseud = ($_POST['pseudo']);
$comment =($_POST['comments']);
?>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "livredor";

// Connexion au serveur MySQL
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO commentaire (pseudo, texte) VALUES ('$pseud', '$comment')";
$affich = "SELECT pseudo, texte FROM commentaire";
$result = $conn->query($affich);



if(isset($_POST['Submit1'])){

   print ("Bonjour, "); 
   print htmlspecialchars($_POST['pseudo']); 
   print(" merci pour votre commentaire suivant: ");
   print htmlspecialchars($_POST['comments']);


if ($conn->query($sql) === TRUE) { // Exécution code MySql
    
    echo "<br><br>Vos informations ont été ajoutés avec succès";
} else {
    
    echo "<br>Error: " . $sql . "<br>" . $conn->error;
}

}

elseif (isset($_POST['Submit2'])) {

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<br> pseudo: ". $row["pseudo"]. " - Commentaire: ". $row["texte"].  "<br>";
        }
    } else {
        echo "0 results";
    }

}  

$conn->close();
?>

