<!DOCTYPE html>
<html lang="en">

<head>


    <title>Mini Blog Final</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--===============================================LOGIN.PHP================================================-->

    <link rel="stylesheet" type="text/css" href="assets/css/util.css?<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css?<?php echo time(); ?>">

    <!--===============================================LOGIN.PHP================================================-->
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="icon" type="image/png" href="assets/img/icons/favicon.ico" />
    <link rel="stylesheet" href="assets/css/Basic-Header.css?<?php echo time(); ?>">
    <!--===============================================================================================-->



</head>


<body>

    <script type="text/javascript">
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>



    <?php
/*===============================================================================================*/
#DEBUT_Definition_date
date_default_timezone_set('UTC');
$today = date("d-m-Y");
#FIN_Definition_date
/*===============================================================================================*/
#DEBUT_Definition_Base_SQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "miniblogpt2";

$conn = new mysqli($servername, $username, $password, $dbname) or die($conn);
// Connexion au serveur MySQL
#FIN_Definition_Base_SQL
/*===============================================================================================*/
// Vérifie si la à la base de données ne produit pas d'erreur (mdp incorrect, username, incorrect, db inconnu, servername inconnu)
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/*===============================================================================================*/
$auteu = isset($_POST['auteur']) ? $_POST['auteur'] : null;
$titr = isset($_POST['titre']) ? $_POST['titre'] : null;
$comment = isset($_POST['comments']) ? $_POST['comments'] : null;
$_comment = mysqli_real_escape_string($conn,$comment);
/*===============================================================================================*/
$ID_RDMORE = isset($_GET['readmoreid']) ? $_GET['readmoreid'] : null;
$ID_ART = isset($_GET['id']) ? $_GET['id'] : null;
/*===============================================================================================*/
$page = (!empty($_GET['accueil']) ? $_GET['accueil'] : 1);
/*===============================================================================================*/
$admin = isset($_GET['logtry']) ? $_GET['logtry'] : 0;
$IDLOGIN = isset($_POST['LOGIN_ID']) ? $_POST['LOGIN_ID'] : null;
$IDMDP = isset($_POST['LOGIN_MDP']) ? $_POST['LOGIN_MDP'] : null;
$conf = isset($_POST['verif_admin']) ? $_POST['verif_admin'] : null;
//$conf = true; // A ENLEVER APRES TESTS
$IDVRAI = "root";
$MDPVRAI = "root";
/*===============================================================================================*/
$charlimit = 50;
/*===============================================================================================*/

/*===============================================================================================*/
$sql = "INSERT INTO blog2 (auteur, titre, texte, `date`) VALUES ('$auteu', '$titr', '$_comment', '$today')";
$affich = "SELECT id, auteur, titre, texte, `date` FROM blog2 ORDER BY `id` DESC";
$result = $conn->query($affich);
/*===============================================================================================*/

/*===============================================================================================*/
if ($ID_RDMORE > 0 || $ID_ART > 0 ){

    $retbar = "0";
    $affichart = "SELECT id, auteur, titre, texte, `date` FROM blog2 WHERE id = '$ID_ART'";
    $affichcomm = "SELECT id, pseudo, texte, `date`, id_article FROM commentaire WHERE id_article = '$ID_ART' ORDER BY `id` DESC";
    $pseud = isset($_POST['nom']) ? $_POST['nom'] : NULL;
    $mail = isset($_POST['mail']) ? $_POST['mail'] : NULL;
    $text = isset($_POST['comments']) ? $_POST['comments'] : NULL;
    $retbar = isset($_POST['idretbar']) ? $_POST['idretbar'] : NULL;
    $insert_comm = "INSERT INTO commentaire (pseudo, email, texte, `date`, id_article) VALUES ('$pseud', '$mail', '$_comment', '$today','$ID_ART')";
    $_comment = mysqli_real_escape_string($conn,$text);
    $verif = null;

    if(empty($ID_RDMORE) && isset($ID_ART)){#NAVBAR_COMMENTAIRE_BASIC
    
        ?>

    <header>
        <div>
            <nav class="navbar navbar-default navigation-clean-button">
                <div class="container">
                    <div class="navbar-header"><a class="navbar-brand" href="">Projet n°4 Noé -
                            Commentaire</a>

                    </div>

                    <p class="navbar-text navbar-right actions">
                        <a class="btn btn-default action-button" role="button" href="?accueil">Accueil</a>
                    </p>

                </div>
            </nav>
        </div>
    </header>


    <?php
    
    }
    else{#NAVBAR_COMMENTAIRE_EXPAND
    
        $affichbtnretour = "SELECT id_article FROM commentaire WHERE id = '$ID_RDMORE'";

        $result = $conn->query($affichbtnretour);
        if ($result->num_rows > 0) {//Afficher les commentaires
        
          
                while ($row = $result->fetch_assoc()) {

                    $retbar = $row['id_article'];
                    
                }
            }
                    else{
                        echo "id_article introuvable";
                    }

        ?>

    <header>
        <div>
            <nav class="navbar navbar-default navigation-clean-button padbot">
                <div class="container test">
                    <div class="navbar-header"><a class="navbar-brand" href="">Projet n°4 Noé -
                            Commentaire</a>

                    </div>

                    <div class="wrap-retour">
                        <div class="navleft">
                            <p class="navbar-text navbar-right actions retbarwrap">
                                <a class="btn btn-default action-button retbar" role="button" href="?id=<?php echo htmlspecialchars($retbar); ?>">Retour
                                    à l'article</a>
                            </p>
                            <span class="symbolfa4">
                                <i class="fa fa-comments fa-lg" aria-hidden="true"></i>
                            </span>

                        </div>

                        <div class="navright">
                            <p class="navbar-text navbar-right actions">
                                <a class="btn btn-default action-button" role="button" href="?accueil">Accueil</a>
                            </p>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>


    <?php
    }
/*===============================================================================================*/

/*===============================================================================================*/
    if ($ID_ART > 0){

        
        
        if (isset($_POST['SubmitComm']))//Ajouter un commentaire
    
        {  
            if ($conn->query($insert_comm) == true ) { // Exécution code MySql
                        
                
                $verif = "1";
                
            } else {
                
                echo "<br>Error: " . $insert_comm . "<br>" . $conn->error;
            }
        
        }
  /*===============================================================================================*/    
    
    #DEBUT_afficher_article
        $result = $conn->query($affichart);
        if ($result->num_rows > 0) { 
        ?>
    <div class='container' align="center">

        <p> </p>
        <?php 
        // output data of each row
        while ($row = $result->fetch_assoc()) {  
            
            ?>
        <textarea readonly="readonly" cols="50" rows="2" class="box rounded hidden"><?php echo $row["titre"] . "\n" . $row["auteur"] . ", " . $row["date"] ?> </textarea>

        <br />

        <textarea readonly="readonly" cols="50" rows="3" class="box rounded"><?php echo $row["texte"]; ?></textarea>

        <br />
        <p></p>
        <?php
        
        }
        } else {
        ?>
        <p>0 resultats trouvés</p>

        <?php
        }
    #FIN_afficher_article
    #DEBUT_Affichage_commentaire
    $result = $conn->query($affichcomm);
    if ($result->num_rows > 0) {//Afficher les commentaires
    
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
    
                $retbar = $row["id_article"];
                $identifiant = $row["id"];
                $limitedtext = $row["texte"];
                if (strlen($limitedtext) > $charlimit) {
                    $limitedtext = substr($limitedtext, 0, $charlimit) . "...";
                }
                ?>
                        <tr>
                            <td style="white-space: nowrap;">
                                <h5>
                                    <?php print htmlspecialchars($row["pseudo"]); ?>
                                </h5>
                                <p></p>
                                <p>
                                    <?php print htmlspecialchars($row["date"]); ?>
                                </p>

                            </td>


                            <td style="word-break:break-all;">
                                <p style="">
                                    <?php print htmlspecialchars($limitedtext);
    
            if (strlen($row["texte"]) > $charlimit) {
                                                ?>

                                    <a href="?readmoreid=<?php echo htmlspecialchars($identifiant);?>">Lire Plus</a>
                                    <!-- <form action="?readmoreid=php echo htmlspecialchars($identifiant);?>" method="post">
                                        <input name="idretbar" type="hidden" value="php echo htmlspecialchars($retbar); ?>">

                                        <button style="cursor: pointer;" type="submit" name="affichePlus">
                                            <img src="assets/img/readmore.png" style="max-width: 100px;height: 25px;>" />
                                        </button>

                                    </form>-->
                                    <?php                       
    }
    ?>
                                </p>
                            </td>
                        </tr>
                        <?php
        }
    } else {
    ?>
                        <p>0 commentaires trouvés</p>
                        <?php
    }
    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php 
    #FIN_Affichage_commentaire


    
    #DEBUT_Formulaire_commentaire
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
                        <input name="nom" type="text" class="form-control" id="example-text-input" placeholder="Nom"
                            required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input name="mail" type="email" class="form-control" id="example-email-input" placeholder="xyz@zyz.com"
                            required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleTextarea">Commentaire</label>
                    <textarea name="comments" class="form-control" id="exampleTextarea" rows="3" required></textarea>
                </div>

                <input class="btn btn-primary centwidth" type="submit" value="Envoyer" name="SubmitComm">
            </form>
            <p></p>

        </div>

        <?php
            #FIN_Formulaire_commentaire
    
    #FIN_Commentaire
    
            #DEBUT_Afficher_plus 
    }elseif($ID_RDMORE > 0){
    
    $affichbtnretour = "SELECT id_article FROM commentaire WHERE id = '$ID_ART'";
    $affichmore = "SELECT pseudo, texte, `date` FROM commentaire WHERE id = '$ID_RDMORE'";   
    $result = $conn->query($affichmore);
    
    if ($result->num_rows > 0) {
    
        
    // output data of each row
        ?>
        <p></p>
        <div class="container">
            <div class="row">

                <table class="table table-bordered">
                    <tbody>

                        <?php
    
        while ($row = $result->fetch_assoc()) {
    
            ?>
                        <tr>
                            <td style="white-space: nowrap;">

                                <h4>
                                    <?php print htmlspecialchars($row["pseudo"]); ?>
                                </h4> <br>
                                <p>
                                    <?php print htmlspecialchars($row["date"]); ?>
                                </p>
                            </td>

                            <td style="word-break:break-all;">
                                <p>
                                    <?php print htmlspecialchars($row["texte"]);?>
                                </p>
                            </td>
                        </tr>
                        <?php
            }
        }
        }
    else{
        ?>
                        <p>bug _get</p>
                        <?php
    
        }

    }
#DEBUT_LOGIN##############################################################################
elseif($admin == 1){

    ?>

                        <header>
                            <div>
                                <nav class="navbar navbar-default navigation-clean-button">
                                    <div class="container">
                                        <div class="navbar-header"><a class="navbar-brand" href="">Projet n°4 Noé -
                                                Backend</a>

                                        </div>

                                        <p class="navbar-text navbar-right actions">
                                            <a class="btn btn-default action-button" role="button" href="index.php">Accueil</a></p>

                                    </div>
                                </nav>
                            </div>
                        </header>



                        <?php

    

    $IDLOGIN = isset($_POST['LOGIN_ID']) ? $_POST['LOGIN_ID'] : null;
    $IDMDP = isset($_POST['LOGIN_MDP']) ? $_POST['LOGIN_MDP'] : null;
    $conf = isset($_POST['verif_admin']) ? $_POST['verif_admin'] : null;
    //$conf = true; // A ENLEVER APRES TESTS
    $IDVRAI = "root";
    $MDPVRAI = "root";
    
    
    
    
        if ($IDLOGIN == $IDVRAI && $IDMDP == $MDPVRAI || $conf == true ) {
      
            $identifiant = "0";
              
            $auteu = isset($_POST['auteur']) ? $_POST['auteur'] : null;
            $titr = isset($_POST['titre']) ? $_POST['titre'] : null;
            $comment = isset($_POST['comments']) ? $_POST['comments'] : null;
            $ID_COL = isset($_POST['idrow']) ? $_POST['idrow'] : null;
              
            ///////////////////////////////////////
            
            $sql = "INSERT INTO blog2 (auteur, titre, texte, `date`) VALUES ('$auteu', '$titr', '$comment', '$today')";
            $affich = "SELECT id, auteur, titre, texte, `date` FROM blog2 ORDER BY `id` DESC";
            $delete = "DELETE from blog2 where id= $ID_COL";



            if (isset($_POST['suppr'])) { 
            
                if ($conn->query($delete) === true) { // Exécution code MySql
            
                    
                } else {
                
                    echo "<br>Error: " . $delete . "<br>" . $conn->error;
                }
            
            }
            
            $result = $conn->query($affich);
            
            if ($result->num_rows > 0) {
            
                
                ?>


                        <div class='container' align="center" style="padding-top:50px;">
                            <div class="row">
                                <?php
                    // output data of each row
                while ($row = $result->fetch_assoc()) {
            
            
                    $identifiant = $row["id"];
                    
            
                    ?>
                                <div class="col-sm">

                                    <textarea style="resize:none; border:solid 1.5px black;" readonly="readonly" cols="40"
                                        rows="2" class="box; rounded"><?php echo $row['titre'] . "\n" . $row['auteur'] . ", " . $row['date'];?></textarea>

                                    <br>

                                    <textarea style="resize: vertical; border:solid 1.5px black" readonly="readonly"
                                        cols="40" rows="3" class="box; rounded"><?php echo $row['texte']; ?></textarea>



                                    <p>
                                        <p>

                                            <!-- BOUTON ACTIONNAGE MODAL -->
                                            <p class="php">
                                                <button type="button" value="supprimer" data-toggle="modal" data-target="#exampleModal">
                                                    <a class="btn btn-danger">
                                                        <i class="fa fa-trash-o fa-lg"></i> Delete</a></button>
                                            </p>
                                            <!-- FIN BOUTON ACTIONNAGE MODAL -->
                                            <!-- DEBUT MODAL -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Confirmez vous la suppression de l'article ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Annulez la
                                                                suppression</button>
                                                            <form action="#" method="post">
                                                                <input type="hidden" name="verif_admin" value="true">
                                                                <input name="idrow" type="hidden" value="<?php echo htmlspecialchars($identifiant); ?>">
                                                                <button type="submit" class="btn btn-danger" name="suppr">Oui</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- FIN MODAL -->

                                            <form action="edition.php" method="post" class="php">

                                                <input type="hidden" name="verif_admin" value="true">
                                                <input name="idrow" type="hidden" value="<?php echo htmlspecialchars($identifiant); ?>">
                                                <button type="submit" value="editer"><a class="btn btn-primary">
                                                        <i class="fa fa-pencil fa-lg"></i> Edit</a> </button>
                                            </form>
                                        </p>
                                        <br />
                                        <br />
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
        } else {
            header('Location: login.php?verif=true');
            //
        }

















}
#FIN_LOGIN################################################################################

elseif($page == 1){
    ?>

                        <header>
                            <div class=>
                                <nav class="navbar navbar-default navigation-clean-button">
                                    <div class="container">
                                        <div class="navbar-header"><a class="navbar-brand" href="">Projet
                                                n°4 Noé -
                                                Final</a>

                                        </div>

                                        <p class="navbar-text navbar-right actions">
                                            <a class="navbar-link login" href="login.php">Se connecter</a>
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
                                    <input class="btn btn-success centwidth" type="submit" value="Submit" name="RecepDataMain">

                                </form>
                                <br />


                                <?php
#Debut_Afficher ou cacher les informations
$boites = isset($_POST['boites']) ? $_POST['boites'] : null;
if ($boites == "1"){

?>

                                <form action="?infos=0" method="POST">

                                    <input type="hidden" name="boites" value="0">
                                    <input class="btn btn-success centwidth" type="submit" value="Cacher informations"
                                        name="aa">

                                </form>
                                <?php
}
else{

?>
                                <form action="?infos=1" method="POST">

                                    <input type="hidden" name="boites" value="1">
                                    <input class="btn btn-success centwidth" type="submit" value="Afficher informations"
                                        name="Submit2">

                                </form>

                                <?php

}
#FIN_Afficher ou cacher les informations
?>

                            </div>


                        </div>
                        <?php

}



if (!empty($_POST)) {

    switch ($_POST) {

        case isset($_POST['loginSubmit']):

        break;
   
        case isset($_POST['RecepDataMain']):
        #DEBUT_AFFICHER_ENVOI
        ?>

                        <div align="center">


                            <article>
                                <p>Bonjour, <strong>
                                        <?php print htmlspecialchars($auteu); ?></strong> merci
                                    pour
                                    votre article
                                    suivant
                                    :
                                    <strong>
                                        <?php print htmlspecialchars($titr); ?></strong> qui a pour
                                    contenu : </p>
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
                                        <textarea readonly="readonly" cols="30" rows="2" class="box rounded hidden"><?php echo $row["titre"] . "\n" . $row["auteur"] . ", " . $row["date"]; 
    
                ?>
                 
                 </textarea>

                                        <br />

                                        <textarea readonly="readonly" cols="30" rows="3" class="box rounded hidden"><?php  echo $limitedtext; ?></textarea>


                                        <br />
                                        <form action="?id=<?php echo htmlspecialchars($identifiant);?>" method="post">
                                            <p>

                                                <button type="submit" class="btn btn-outline-primary centwidth">Accéder
                                                    au
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
   
        
   
        default:
        
        break;
}
}

$conn->close();

?>

                        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                            crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
                            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
                            crossorigin="anonymous"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
                            crossorigin="anonymous"></script>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>

</html>