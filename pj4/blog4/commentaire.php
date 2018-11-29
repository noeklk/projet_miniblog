<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title> Mini Blog ET4</title>

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

   
<h1 align="center" class="">Projet n°4 Noé ET4 commentaire</h1>
<br/>

<h4 align="center" class="">Ajouter un commentaire</h4>
<br/>

   <div class="form-group; container" style="width:50%;">
    
        <form id="formulaire" action="commentaire.php" method="post" >
            
        
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
<?php

date_default_timezone_set('UTC');


$today = date("d-m-Y");

///////////////////////////////////////

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog4";


// Connexion au serveur MySQL
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}


$pseud = isset($_POST['nom']) ? $_POST['nom'] : NULL;
$mail = isset($_POST['mail']) ? $_POST['mail'] : NULL;
$text = isset($_POST['comments']) ? $_POST['comments'] : NULL;



$sql = "INSERT INTO commentaire (pseudo, email, texte, `date`) VALUES ('$pseud', '$mail', '$text', '$today')";



if (isset($_POST['Submit1']))

{

		if ($conn->query($sql) == true) { // Exécution code MySql

			echo "<br><br>Merci pour votre commentaire";
		} else {

			echo "<br>Error: " . $sql . "<br>" . $conn->error;
        }
        
}       




	?>

