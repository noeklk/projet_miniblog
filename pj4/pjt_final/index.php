<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/img/icons/favicon.ico" />
    <title> Mini Blog PT2</title>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/Basic-Header.css">


</head>

<body>
    <script type="text/javascript">
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>






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


$identifiant = "0";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "miniblogpt2";

$conn = new mysqli($servername, $username, $password, $dbname) or die($conn);
// Connexion au serveur MySQL

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$auteu = isset($_POST['auteur']) ? $_POST['auteur'] : null;
$titr = isset($_POST['titre']) ? $_POST['titre'] : null;
$comment = isset($_POST['comments']) ? $_POST['comments'] : null;

$_comment = mysqli_real_escape_string($conn,$comment);
$ID_ROW = isset($_GET['readmoreid']) ? $_GET['readmoreid'] : null;
$ID_ART = isset($_GET['id']) ? $_GET['id'] : null;

$page = (!empty($_GET['accueil']) ? $_GET['accueil'] : 1);

#echo $page == 1 ?  "HOLE" : "no";

$charlimit = 50;
$limitedtext = "";

///////////////////////////////////////







$sql = "INSERT INTO blog2 (auteur, titre, texte, `date`) VALUES ('$auteu', '$titr', '$_comment', '$today')";
$affich = "SELECT id, auteur, titre, texte, `date` FROM blog2 ORDER BY `id` DESC";



$result = $conn->query($affich);



    switch (true) {

        case $ID_ART > 0 || $ID_ROW > 0:
       #DEBUT_Entete_Comm       
        $affichart = "SELECT id, auteur, titre, texte, `date` FROM blog2 WHERE id = '$ID_ART'";
        $affichcomm = "SELECT id, pseudo, texte, `date` FROM commentaire WHERE id_article = '$ID_ART' ORDER BY `id` DESC";
        $affichmore = "SELECT pseudo, texte, `date` FROM commentaire WHERE id = '$ID_ROW'";
        $pseud = isset($_POST['nom']) ? $_POST['nom'] : NULL;
        $mail = isset($_POST['mail']) ? $_POST['mail'] : NULL;
        $text = isset($_POST['comments']) ? $_POST['comments'] : NULL;
        $insert_comm = "INSERT INTO commentaire (pseudo, email, texte, `date`, id_article) VALUES ('$pseud', '$mail', '$text', '$today','$ID_ART')";
        ?>

    <header>
        <div>
            <nav class="navbar navbar-default navigation-clean-button">
                <div class="container">
                    <div class="navbar-header"><a class="navbar-brand" href="">Projet n°4 Noé -
                            Commentaire</a>

                    </div>

                    <p class="navbar-text navbar-right actions">
                        <a class="btn btn-default action-button" role="button" href="?accueil">Accueil</a></p>

                </div>
            </nav>
        </div>
    </header>


    <?php

#FIN_Entete_Comm
        case $ID_ROW > 0:
#DEBUT_READMORE
        if ($ID_ROW > 0) { //Afficher plus du texte



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

        break;
#FIN_READMORE
        case $ID_ART > 0 :

       
        if (isset($_POST['SubmitComm']))//Ajouter un commentaire
        
        {  
                if ($conn->query($insert_comm) == true ) { // Exécution code MySql
                            
                   
                    $verif = "1";
                    
                } else {
                    
                    echo "<br>Error: " . $insert_comm . "<br>" . $conn->error;
                }
            
        }    
echo "SALTU";
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

      

        break;

        case $page == 1:
        #DEBUT_formulaire 
        ?>

                        <header>
                            <div>
                                <nav class="navbar navbar-default navigation-clean-button">
                                    <div class="container">
                                        <div class="navbar-header"><a class="navbar-brand" href="">Projet n°4 Noé -
                                                Final</a>

                                        </div>

                                        <p class="navbar-text navbar-right actions"><a class="navbar-link login" href="login.php">Se
                                                connecter</a>
                                            <a class="btn btn-default action-button" role="button" href="">S'inscrire</a></p>

                                    </div>
                                </nav>
                            </div>
                        </header>

                        <div class="container boite mb-3" align="center">

                            <h4 class="mb-5">Veuillez entrez votre contenu</h4>

                            <div class="col-sm-10">

                                <form action="?infos=receiving" method="post">


                                    <div class="input-group mb-2 form-group">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Auteur</span>
                                        </div>
                                        <input type="text" name="auteur" maxlength="15" class="form-control" aria-label="Username"
                                            aria-describedby="basic-addon1" required>
                                    </div>

                                    <div class="input-group mb-5 form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">Titre</span>
                                        </div>
                                        <input type="text" name="titre" maxlength="50" class="form-control" aria-label="Username"
                                            aria-describedby="basic-addon1" required>
                                    </div>


                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3">Contenu</span>
                                        </div>
                                        <textarea type="text" class="form-control" name="comments" rows="4" aria-label="With textarea"
                                            required></textarea>
                                    </div>
                                    <br>
                                    <input class="btn btn-success" type="submit" value="Submit" name="Submit1">

                                </form>
                                <br />


                                <?php
        #Debut_Afficher ou cacher les informations
        $boites = isset($_POST['boites']) ? $_POST['boites'] : null;
        if ($boites == "1"){

                ?>

                                <form action="?infos=0" method="POST">

                                    <input type="hidden" name="boites" value="0">
                                    <input class="btn btn-success" type="submit" value="Cacher informations" name="aa">

                                </form>
                                <?php
        }
        else{
            
            ?>
                                <form action="?infos=1" method="POST">

                                    <input type="hidden" name="boites" value="1">
                                    <input class="btn btn-success" type="submit" value="Afficher informations" name="Submit2">

                                </form>

                                <?php
        
        }
        #FIN_Afficher ou cacher les informations
        ?>

                            </div>


                        </div>
                        <?php
        
            
        break;

        default:
        break;
    }



if (!empty($_POST)) {

    switch ($_POST) {
   
        case isset($_POST['Submit1']):
        #DEBUT_AFFICHER_ENVOI
        ?>

                        <div align="center">


                            <article>
                                <p>Bonjour, <strong>
                                        <?php print htmlspecialchars($auteu); ?></strong> merci pour votre article
                                    suivant
                                    :
                                    <strong>
                                        <?php print htmlspecialchars($titr); ?></strong> qui a pour contenu : </p>
                            </article>

                            <br>

                            <textarea readonly="readonly" cols="40" rows="5" class="box"><?php echo $comment ?></textarea>

                            <p>le
                                <?php echo $today?>
                            </p>

                        </div>

                        <?php
    
    if ($conn->query($sql) == true) { // Exécution code MySql
    
        echo "<br><br>Vos informations ont été ajoutés avec succès";
    } else {
    
        echo "<br>Error: " . $sql . "<br>" . $conn->error;
    }
        break;
   #FIN_AFFICHER_ENVOI
        case isset($_POST['Submit2']):
        

        if ($result->num_rows > 0) {

            ?>

                        <div class="container listage" align="center">
                            <div class="row">

                                <?php 
            
            // output data of each row
            while ($row = $result->fetch_assoc()) {
    
                $limitedtext = $row["texte"];
                $identifiant = $row["id"];
                if (strlen($limitedtext) > $charlimit) {
    
                    $limitedtext = substr($limitedtext, 0, $charlimit) . "...";
                  
    
                }
               
                
               
                ?>
                                <div class="col-sm-4">
                                    <div class="petitesboites">
                                        <textarea style="resize:none; border:solid 1.5px black;overflow:hidden;"
                                            readonly="readonly" cols="30" rows="2" class="box; rounded"><?php
                echo $row["titre"] . "\n" . $row["auteur"] . ", " . $row["date"]; 
    
                ?>
                 
                 </textarea>

                                        <br />

                                        <textarea style="resize: none; border:solid 1.5px black" readonly="readonly"
                                            cols="30" rows="3" class="box; rounded"> <?php  echo $limitedtext; ?>  </textarea>


                                        <br />
                                        <form action="?id=<?php echo htmlspecialchars($identifiant);?>" method="post">
                                            <p>

                                                <button type="submit" class="btn btn-outline-primary">Accéder au
                                                    contenu</button>

                                            </p>
                                        </form>

                                        <p></p>
                                    </div>
                                </div>

                                <?php
    
            }
        } else {
            print "0 resultats trouvés";
        }
    ?>

                            </div>
                        </div>
                        <?php
    
        break;
   
        case $_POST['C']:
        #do something;
        break;
   
        default:
        
        break;
}
}



    

$conn->close();
?>

</body>

</html>