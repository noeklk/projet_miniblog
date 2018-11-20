<?php
$pseud = ($_POST['pseudo']);
$comment =($_POST['comments']);
?>

Bonjour, <?php echo htmlspecialchars($_POST['pseudo']); ?>.
Merci pour ton commentaire suivant : <?php echo htmlspecialchars($_POST['comments']); ?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "livredor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO commentaire (pseudo, texte)
VALUES ('$pseud', '$comment')";

if ($conn->query($sql) === TRUE) {
    
    echo "<br>New record created successfully";
} else {
    
    echo "<br>Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

