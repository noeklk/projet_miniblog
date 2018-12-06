<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title> Mini Blog PT2</title>
    
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/Basic-Header.css">
    <!-- Bootstrap CSS -->
   


<style>




.php {
    
    
    display: inline-block;
}

 button{


border: none;
background: none;
}

h1{
font-family: 'Open Sans', sans-serif;
font-size: 50px;
}




</style>

</head>

<body >

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<header>
<div>
        <nav class="navbar navbar-default navigation-clean-button">
            <div class="container">
                <div class="navbar-header"><a class="navbar-brand" href="">Projet n°4 Noé - Backend</a>

                </div>
                      
                    <p class="navbar-text navbar-right actions">
                    <a class="btn btn-default action-button" role="button" href="article.php">Accueil</a></p>
                    
            </div>
        </nav>
</div>
</header>

    <script type="text/javascript">
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

</script>


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
        
            
            ?>
              

                        <div class='container' align="center" style="padding-top:50px;">
                        <div class="row">
            <?php
                // output data of each row
            while ($row = $result->fetch_assoc()) {
        
        
                $identifiant = $row["id"];
                
        
                ?>  <div class="col-sm">  <?php
                echo '<textarea style="resize:none; border:solid 1.5px black;" readonly="readonly" cols="40" rows="2" class="box; rounded">' . $row["titre"] . "\n" . $row["auteur"] . ", " . $row["date"] . '</textarea>'; //TRAVAILLE ICI 08/11
        
                ?><br> <?php
                echo '<textarea style="resize: vertical; border:solid 1.5px black" readonly="readonly" cols="40" rows="3" class="box; rounded">' . $row["texte"] . '</textarea>';
        
                ?>
                
                <p>
                                <form action="suppression.php" method="post" class="php">
                                     
                                        
                                        <input type="hidden" name="verif_admin"  value="true">
                                        <input  name="idrow" type="hidden" value="<?php echo htmlspecialchars($identifiant); ?>">
                                        <button  type="submit" value="supprimer"> <a class="btn btn-danger">
                                        <i class="fa fa-trash-o fa-lg"></i> Delete</a></button>
                                        
                                    
                                </form>
                                <form action="edition.php" method="post" class="php">
                                    
                                        
                                        <input type="hidden" name="verif_admin" value="true">
                                        <input  name="idrow" type="hidden" value="<?php echo htmlspecialchars($identifiant); ?>">
                                        <button type="submit" value="editer"><a class="btn btn-primary">
                                            <i class="fa fa-pencil fa-lg"></i> Edit</a> </button>
                                        <!--<a class="btn btn-danger" href="#">
                                        <i class="fa fa-trash-o fa-lg"></i> Delete</a>-->
                                    
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
        
        
                        $conn->close();






    } else {
        header('Location: login.php?verif=true');
        //
    }






                ?>

</body>

</html>
