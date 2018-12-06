<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title> Mini Blog ET5</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
  


    <style>

       
        #formulaire{
            text-align: center;
        }

        h1{
        font-family: 'Open Sans', sans-serif;
        font-size: 50px;
        }

        #log{
            position: absolute;
            top: 20px;
            right: 20px;  
        }
        button{

            background-image:none;
            padding: 0;
            border: none;
            background: none;
}

      
    </style>
    
</head>

<body >

<form align ="right" action="article.php">
            
            <input class="btn btn-outline-primary" type="submit" value="accueil">
                
    </form>
    
    
<h1 align="center"  class="">Projet n°5 Noé ET4 commentaire-fusion</h1>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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


$verif = false;

$sql = "INSERT INTO commentaire (pseudo, email, texte, `date`, id_article) VALUES ('$pseud', '$mail', '$text', '$today','$ID_ART')";


if (isset($_POST["btnSubmit"]) || isset($ID_ROW)) { //Afficher plus du texte



    $result = $conn->query($affichmore);

    if ($result->num_rows > 0) {

        echo '<p></p>';
    // output data of each row
        ?>

        <div class="container" >
        <div class="row">
       
        <table class="table table-bordered">
        <tbody>

        <?php

        while ($row = $result->fetch_assoc()) {



            ?>

<tr>
            
    <td style="white-space: nowrap;" ><?php print htmlspecialchars($row["pseudo"]); ?> <br>  <?php print htmlspecialchars($row["date"]); ?></td>


    <td style="word-break:break-all;"><?php print htmlspecialchars($row["texte"]);

                                        ?></td>

  
</tr>               
       
        <?php

    }
} else  {
            print "0 resultats trouvés";
        }

}
elseif (isset($_POST['Submit1']))//Ajouter un commentaire

{
    if (empty($pseud) || empty($mail) || empty($text) ){
    
		
        //<!--<p class="text-center">Erreur : Une ou plusieurs case est vide</p>-->
        $verif = "2";
        
    }
    else
    {   
        if ($conn->query($sql) == true ) { // Exécution code MySql
                    
            //echo "<br><br>Merci pour votre commentaire";
            $verif = "1";
            
        } else {
            
            echo "<br>Error: " . $sql . "<br>" . $conn->error;
        }
    }
}    
 
   
if (isset($_POST["submit"]) || isset($ID_ART)) {
    $result = $conn->query($affichart);
    if ($result->num_rows > 0) {

        ?>
                
        <div class='container' align="center">
        

        <?php 
        echo '<p></p>';
        // output data of each row
        while ($row = $result->fetch_assoc()) {


            $identifiant = $row["id"];
           

            echo '<textarea style="resize:none; border:solid 1.5px black;" readonly="readonly" cols="50" rows="2" class="box; rounded">' . $row["titre"] . "\n" . $row["auteur"] . ", " . $row["date"] . '</textarea>'; //TRAVAILLE ICI 08/11

            ?>
            <br/>
            <?php
            echo '<textarea  style="resize: none; border:solid 1.5px black" readonly="readonly" cols="50" rows="3" class="box; rounded">' . $row["texte"] . '</textarea>';

            ?>
            <br/>
           
            <p></p>

                  
           
            <?php

        }
    } else {
        print "0 resultats trouvés";
    }

    $result = $conn->query($affichcomm);
    if ($result->num_rows > 0) {//Afficher les commentaires

        echo '<p></p>';
        // output data of each row
        ?>

            <div class="container" style="width:50%;">
            <div class="row">
           <u> <p><?
           php print htmlspecialchars($result->num_rows);
           if ($result->num_rows > 1){echo ' commentaires';}else{echo ' commentaire';} 
           ?> </p> </u>
           
           
            <table class="table table-bordered"  >
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
                
        <td style="white-space: nowrap;" ><?php print htmlspecialchars($row["pseudo"]); ?> <br>  <?php print htmlspecialchars($row["date"]); ?></td>
    
    
        <td style="word-break:break-all;" ><?php print htmlspecialchars($limitedtext);

            if (strlen($row["texte"]) > $charlimit) {
        // echo ' ...<a href="" >' ."Read More". '</a>';


                                                ?>
                <form action="commentaire.php?readmoreid=<?php echo htmlspecialchars($identifiant);?>" method="post" >
                    
                    <input  name="id" type="hidden" value="<?php echo htmlspecialchars($identifiant); ?>">
                    <!--<input name="btnSubmit"  type="submit" value="Lire Plus">-->
                    <button type="submit" name="btnSubmit" >
                    <img src="readmore.png" style="max-width: 100px;height: auto;>"    />
                    </button>
                
                 </form>
         <!-- ...<a href="" onclick="clear_div()" > Read More</a>-->
         
<?php

}

?></td>
   
      
    </tr>               
           
            <?php

        }
    } else {
        print "0 commentaires trouvés";
    }
}
?> 
            </tbody>
        </table>
    </div>
</div>

<?php 


if ($verif == "1") { ?> <p class="text-center">Merci pour votre commentaire</p> <?php } 
elseif ($verif == "2"){
    ?> <p class="text-center">Erreur : Une ou plusieurs case est vide</p> <?php
}
?>
<br/>


<h4 align="center">Ajouter un commentaire</h4>


<br/>

   <div class="form-group; container" style="width:50%;">
    
        <form id="formulaire" action="commentaire.php?id=<?php echo htmlspecialchars($ID_ART);?>" method="post" >
            
        
            <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <input name="nom" type="text" class="form-control" id="example-text-input" placeholder="Nom">
                    </div>
            </div>

            <div class="form-group row">
                 <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input name="mail" type="email" class="form-control" id="example-email-input" placeholder="xyz@zyz.com">
                </div>
            </div>
            
            <div class="form-group">
                <label for="exampleTextarea">Commentaire</label>
                <textarea name="comments" class="form-control" id="exampleTextarea" rows="3" ></textarea>
            </div>
  
            <input class="btn btn-primary" type="submit" value="Envoyer" name="Submit1">
        </form> 
        <p></p>
        
    </div>

    <script type="text/javascript">
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

        </script>
    </body>
</html>


   




	

