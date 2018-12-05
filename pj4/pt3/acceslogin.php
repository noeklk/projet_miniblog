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

form.php {
    display: inline-block; 
    
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
      left : 35%;  
}
</style>

</head>

<body >

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<form align="right" action="article.php" method="POST">
		
        <input class="btn btn-outline-primary" type="submit"  value="accueil">
        
    </form>

<div id="result"></div>

<h1 align="center" class="">Projet n°4 Noé - PHPMYADMIN</h1>


    <script type="text/javascript">
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

</script>

</body>

</html>

<?php

$IDLOGIN = isset($_POST['LOGIN_ID']) ? $_POST['LOGIN_ID'] : null;
$IDMDP = isset($_POST['LOGIN_MDP']) ? $_POST['LOGIN_MDP'] : null;
$conf = isset($_POST['verif_admin']) ? $_POST['verif_admin'] : null;

$IDVRAI = "root";
$MDPVRAI = "root";




    if ($IDLOGIN == $IDVRAI && $IDMDP == $MDPVRAI || $conf == true ) {



        
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
        
        
        if ($result->num_rows > 0) {
        
            echo '<p></p>';
                // output data of each row
            while ($row = $result->fetch_assoc()) {
        
        
                $identifiant = $row["id"];
                echo "<div class='container'>";
                echo "<div class='res' width: auto; height:auto>";
        
        
                echo '<textarea style="resize:none; border:solid 1.5px black;" readonly="readonly" cols="40" rows="2" class="box; rounded">' . $row["titre"] . "\n" . $row["auteur"] . ", " . $row["date"] . '</textarea>'; //TRAVAILLE ICI 08/11
        
                echo '<br/>';
                echo '<textarea style="resize: vertical; border:solid 1.5px black; overflow:hidden" readonly="readonly" cols="40" rows="3" class="box; rounded">' . $row["texte"] . '</textarea>';
        
                ?><div >
                                <form action="suppression.php" method="post" class="php">
                                    <p>  
                                        
                                        <input type="hidden" name="verif_admin"  value="true">
                                        <input  name="idrow" type="hidden" value="<?php echo htmlspecialchars($identifiant); ?>">
                                        <input type="submit" value="supprimer">
                                    </p>
                                </form>
                                <form action="edition.php" method="post" class="php">
                                    <p>  
                                        
                                        <input type="hidden" name="verif_admin" value="true">
                                        <input  name="idrow" type="hidden" value="<?php echo htmlspecialchars($identifiant); ?>">
                                        <input type="submit" value="editer">
                                    </p>
                                </form>
                                </div>
                                <?php
        
        
                                echo '<p></p>';
        
                                echo "</div>";
                                echo "</div>";
        
        
        
                            }
                        } else {
                            print "0 resultats trouvés";
                        }
        
        
        
                        $conn->close();






    } else {
        header('Location: login.php?verif=true');
        //
    }






                ?>

