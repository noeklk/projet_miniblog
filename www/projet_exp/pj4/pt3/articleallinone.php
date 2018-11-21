<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title> Mini Blog PT2</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


<style>

form.php {
    display: inline-block; //Or display: inline; 
}
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

 <form id="log" action="login.php" method="POST">
		
        <input class="btn btn-outline-primary" type="submit" value="login">
        
    </form>

<div id="result"></div>

<h1 align="center" class="">Projet n°4 Noé</h1>

   <div class="form-group">
    
        <form id="formulaire" action="article.php" method="post">
            
        
                Auteur: <input type="text" name="auteur" maxlength="15" style="width: 150px" placeholder="nom d'Auteur">
                <br><br>
                   
                Titre: <input type="text" name="titre" maxlength="50" placeholder="Titre">
                <br><br>
                Texte: 
            <div>
                <textarea class="rounded" type="text" placeholder="Contenu" cols="40" rows="5" name="comments"></textarea>
            </div>
                <br><br>
            <input class="btn btn-primary" type="submit" value="Submit" name="Submit1">
        </form> 
        <p></p>
        <form id="formulaire" action="article.php" method="POST">
            
            <input class="btn btn-primary" type="submit" value="Afficher informations" name="Submit2">
            
        </form>
    </div>

    <script type="text/javascript">
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

    function textAreaAdjust(o) {
  o.style.height = "1px";
  o.style.height = (25+o.scrollHeight)+"px";
}
   /* function editionsql(x){
        
        
        //. = classe # = id blank = h1 h2
        
        location.href = 'editionsql.php';
        id = x;

        var code = '<article class="style1" id="rowEtu'+i+'" >'
				code +='<span id="colTof'+i+'"  class="image"><img src="'+photo+'" alt="www.farm5.static.flickr.com" /></span>'
				code +='<a class ="up" id="colComp'+i+'"></a>';
				
				code +='</article>';
				$('.tiles').append(code);
      //  $.post('article.php',{postid:id});

       //document.write(id);
       
  
    //echo '<textarea>' . x . '</textarea>';
    


    }*/

    


</script>

</body>


</html>

<?php

date_default_timezone_set('UTC');


$today = date("d-m-Y");

//$auteu = isset($_POST['auteur']);
//$titr = isset($_POST['titre']);
//$comment = isset($_POST['comments']);
$identifiant = "0";


//$test= isset($_POST['postid']) ? $_POST['postid'] : NULL;

$auteu = isset($_POST['auteur']) ? $_POST['auteur'] : NULL;
$titr = isset($_POST['titre']) ? $_POST['titre'] : NULL;
$comment = isset($_POST['comments']) ? $_POST['comments'] : NULL;





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


//$edition ="UPDATE blog2 SET auteur =  $mauteur, titre = $mtitre, texte = $mtexte WHERE `id` = $identifiant";
$result = $conn->query($affich);




if (isset($_POST['Submit1'])) {


	print("Bonjour, "); 
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
		echo '<textarea readonly="readonly" cols="40" rows="5"  class="box">' . $comment . '</textarea>';
   //echo '<input type="text" name="name1" value="'.$comment.'">';
   //print htmlspecialchars($_POST['comments']);
		print("<br>le ");
		print $today;


		if ($conn->query($sql) == true) { // Exécution code MySql

			echo "<br><br>Vos informations ont été ajoutés avec succès";
		} else {

			echo "<br>Error: " . $sql . "<br>" . $conn->error;
		}

	} elseif (isset($_POST['Submit2'])) {

    /*if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            print "<br> Auteur: ". $row["auteur"]. " - Titre: ". $row["titre"]. " - Texte: ". $row["texte"]. " - ". $row["date"].  "<br>";
        }*/
		if ($result->num_rows > 0) {
           
			echo '<p></p>';
        // output data of each row
			while ($row = $result->fetch_assoc()) {
            
           /* ?>
            <input type="text" name="auteur" readonly="readonly"  style="width: 300px;height : 30px" value="<?php print "" .$row["auteur"]. "<br>";  ?>">
            <?php*/
            //echo '<input type="text" style="height : 30px; width : 300px" name="name1" readonly="readonly" value='. $row["titre"].'>';
           
            $identifiant = $row["id"];
                echo "<div class='container'>";
				echo "<div class='res' width: auto; height:auto>";
                        //. " ondblclick='editionsql($identifiant)'> " ;
					//. " ondblclick=\"location.href='editionsql.php'\"> " ;
               // style="position:relative; width: auto; height:auto; text-align:center; border:1px solid black; display: inline-block;;


                echo '<textarea style="resize:none; border:solid 1.5px black;" readonly="readonly" cols="40" rows="2" class="box; rounded">' . $row["titre"] . "\n" . $row["auteur"] . ", " . $row["date"] . '</textarea>'; //TRAVAILLE ICI 08/11
               // echo '<p>' . $row["id"] . '</p>';
				echo '<br/>';
				echo '<textarea onclick="textAreaAdjust(this)" style="resize: vertical; border:solid 1.5px black; overflow:hidden" readonly="readonly" cols="40" rows="3" class="box; rounded">' . $row["texte"] . '</textarea>';
                //echo '<form action="editionsql.php" method="post">';
                  //  echo '<p>';
                   //     echo "<input  name='idrow' type='hidden' value='". $identifiant ."'>" ;
                        ?><div >
                        <form action="suppression.php" method="post" class="php">
                            <p>  
                                <input  name="idrow" type="hidden" value="<?php echo htmlspecialchars($identifiant); ?>">
                                <input type="submit" value="supprimer">
                            </p>
                        </form>
                        <form action="edition.php" method="post" class="php">
                            <p>  
                                <input  name="idrow" type="hidden" value="<?php echo htmlspecialchars($identifiant); ?>">
                                <input type="submit" value="editer">
                            </p>
                        </form>
                        </div>
                        <?php
                        //echo "<input type='submit' value='editer'>" ;
                     //   echo "<input type='submit' value='supprimer'>";
                  //  echo '</p>';
              //  echo '</form>';

				echo '<p></p>';

                echo "</div>";
                echo "</div>";
           
            
           // print "<br> Auteur: ". $row["auteur"]. " - Titre: ". $row["titre"]. " - Texte: ". $row["texte"]. " - ". $row["date"].  "<br>";
			}
		} else {
			print "0 resultats trouvés";
		}

	}

	$conn->close();
	?>

