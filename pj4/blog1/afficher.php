<!DOCTYPE html>
<html>
<head>
<title>Etape 1</title>
<style>
    .box-centerside{

  background-color:powderblue;
  display:inline-block
    }
</style>

</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$affich = "SELECT titre, texte FROM article";
$result = $conn->query($affich);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        ?> 
            <div  class="box-centerside">
            <h1>Titre : <?php echo htmlspecialchars($row["titre"]);  ?> </h1>
            <p> <?php echo htmlspecialchars($row["texte"]);  ?></p>
            </div>  
            <p></p>
        <?php
      //  echo "<br> pseudo: ". $row["titre"]. " - Commentaire: ". $row["texte"].  "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?> 

</body>
</html>