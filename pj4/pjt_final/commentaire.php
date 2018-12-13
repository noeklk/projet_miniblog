<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <title> Mini Blog ET5</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/css/Basic-Header.css">


</head>

<body>
    <script type="text/javascript">
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <header>
        <div>
            <nav class="navbar navbar-default navigation-clean-button">
                <div class="container">
                    <div class="navbar-header"><a class="navbar-brand" href="">Projet n°4 Noé - Commentaire</a>

                    </div>

                    <p class="navbar-text navbar-right actions">
                        <a class="btn btn-default action-button" role="button" href="article.php">Accueil</a></p>

                </div>
            </nav>
        </div>
    </header>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <?php

date_default_timezone_set('UTC');


$today = date("d-m-Y");

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
    
$ID_ROW = isset($_GET['readmoreid']) ? $_GET['readmoreid'] : null;
$ID_ART = isset($_GET['id']) ? $_GET['id'] : null;
//$ID_ROWP = isset($_POST['id']) ? $_POST['id'] : null;


$affichart = "SELECT id, auteur, titre, texte, `date` FROM blog2 WHERE id = '$ID_ART'";
$affichcomm = "SELECT id, pseudo, texte, `date` FROM commentaire WHERE id_article = '$ID_ART' ORDER BY `id` DESC";

$charlimit = 50;
$limitedtext = "";

$affichmore = "SELECT pseudo, texte, `date` FROM commentaire WHERE id = '$ID_ROW'";


$pseud = isset($_POST['nom']) ? $_POST['nom'] : NULL;
$mail = isset($_POST['mail']) ? $_POST['mail'] : NULL;
$text = isset($_POST['comments']) ? $_POST['comments'] : NULL;

$insert_comm = "INSERT INTO commentaire (pseudo, email, texte, `date`, id_article) VALUES ('$pseud', '$mail', '$text', '$today','$ID_ART')";


if (isset($_POST["affichePlus"]) || $ID_ROW > 0) { //Afficher plus du texte



    $result = $conn->query($affichmore);

    if ($result->num_rows > 0) {

        echo '<p></p>';
    // output data of each row
        ?>

    <div class="container">
        <div class="row">

            <table class="table table-bordered">
                <tbody>

                    <?php

        while ($row = $result->fetch_assoc()) {



            ?>

                    <tr>

                        <td style="white-space: nowrap;">
                            <?php print htmlspecialchars($row["pseudo"]); ?> <br>
                            <?php print htmlspecialchars($row["date"]); ?>
                        </td>


                        <td style="word-break:break-all;">
                            <?php print htmlspecialchars($row["texte"]);

                                        ?>
                        </td>


                    </tr>

                    <?php

    }
} else  {
           ?>
                    <p>0 resultats trouvés</p>

                    <?php
        }

}
elseif (isset($_POST['SubmitComm']))//Ajouter un commentaire

{  
        if ($conn->query($insert_comm) == true ) { // Exécution code MySql
                    
           
            $verif = "1";
            
        } else {
            
            echo "<br>Error: " . $insert_comm . "<br>" . $conn->error;
        }
    
}    
 
   
if ($ID_ART > 0) {
     #Afficher_Article
    $result = $conn->query($affichart);
    if ($result->num_rows > 0) {

        ?>

                    <div class='container' align="center">

                        <p> </p>
                        <?php 
        // output data of each row
        while ($row = $result->fetch_assoc()) {


          
           
            ?>
                        <textarea style="resize:none; border:solid 1.5px black;" readonly="readonly" cols="50" rows="2"
                            class="box; rounded"><?php echo $row["titre"] . "\n" . $row["auteur"] . ", " . $row["date"] ?> </textarea>


                        <br />

                        <textarea style="resize: none; border:solid 1.5px black" readonly="readonly" cols="50" rows="3"
                            class="box; rounded"><?php echo $row["texte"]; ?></textarea>


                        <br />

                        <p></p>



                        <?php

        }
    } else {
        ?>
                        <p>0 resultats trouvés</p>

                        <?php
    }

    $result = $conn->query($affichcomm);
    if ($result->num_rows > 0) {//Afficher les commentaires

        
        // output data of each row
        ?>
                        <p> </p>
                        <div class="container" style="width:50%;">
                            <div class="row">
                                <u>
                                    <p>
                                        <?php
           print htmlspecialchars($result->num_rows);
           if ($result->num_rows > 1){echo ' commentaires';}else{echo ' commentaire';} 
           ?>
                                    </p>
                                </u>


                                <table class="table table-bordered">
                                    <tbody>

                                        <?php

            while ($row = $result->fetch_assoc()) {

                $identifiant = $row["id"];
                $limitedtext = $row["texte"];
                if (strlen($limitedtext) > $charlimit) {

                    $limitedtext = substr($limitedtext, 0, $charlimit) . "...";


                }
                ?>

                                        <tr>

                                            <td style="white-space: nowrap;">
                                                <?php print htmlspecialchars($row["pseudo"]); ?> <br>
                                                <?php print htmlspecialchars($row["date"]); ?>
                                            </td>


                                            <td style="word-break:break-all;">
                                                <?php print htmlspecialchars($limitedtext);

            if (strlen($row["texte"]) > $charlimit) {
        // echo ' ...<a href="" >' ."Read More". '</a>';


                                                ?>
                                                <form action="commentaire.php?readmoreid=<?php echo htmlspecialchars($identifiant);?>"
                                                    method="post">

                                                    <input name="id" type="hidden" value="<?php echo htmlspecialchars($identifiant); ?>">
                                                    <!--<input name="affichePlus"  type="submit" value="Lire Plus">-->
                                                    <button type="submit" name="affichePlus">
                                                        <img src="readmore.png" style="max-width: 100px;height: auto;>" />
                                                    </button>

                                                </form>
                                                <!-- ...<a href="" onclick="clear_div()" > Read More</a>-->

                                                <?php
}
?>
                                            </td>
                                        </tr>

                                        <?php

        }
    } else {

?>
                                        <p>0 commentaires trouvés</p>
                                        <?php
        
    }
}
?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <?php 


if ($verif == "1") { ?>
                        <p class="text-center">Merci pour votre commentaire</p>
                        <?php } 
?>
                        <br />


                        <h4 align="center">Ajouter un commentaire</h4>


                        <br />

                        <div class="form-group; container" style="width:50%;">

                            <form align="center" action="?id=<?php echo htmlspecialchars($ID_ART);?>" method="post">


                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Nom</label>
                                    <div class="col-sm-10">
                                        <input name="nom" type="text" class="form-control" id="example-text-input"
                                            placeholder="Nom" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input name="mail" type="email" class="form-control" id="example-email-input"
                                            placeholder="xyz@zyz.com" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleTextarea">Commentaire</label>
                                    <textarea name="comments" class="form-control" id="exampleTextarea" rows="3"
                                        required></textarea>
                                </div>

                                <input class="btn btn-primary" type="submit" value="Envoyer" name="SubmitComm">
                            </form>
                            <p></p>

                        </div>


</body>

</html>