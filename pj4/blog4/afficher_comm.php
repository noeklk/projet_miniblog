<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title> Mini Blog ET2</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <style>

    

        h1{
        font-family: 'Open Sans', sans-serif;
        font-size: 50px;
        }

        .res{
            position: relative;     
            left : 35%;  
        }
      button{

        background-image:none;
        padding: 0;
        border: none;
        background: none;
      }

}

    </style>
</head>

<body >

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

   

<h1 align="center" class="">Projet n°4 Noé ET4 Affich_Comm</h1>

    <script type="text/javascript">

    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

    </script>

    </body>
</html>
<?php

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

$ID_ROW = isset($_GET['id']) ? $_GET['id'] : NULL;

$affich = "SELECT id, pseudo, texte, `date` FROM commentaire ORDER BY `id` DESC";

$charlimit = 200;
$limitedtext ="";

$affichmore = "SELECT pseudo, texte, `date` FROM commentaire WHERE id = '$ID_ROW'";

//$replacedottext= <a href="afficher_comm.php?hello=true">... </a>  ;




if (isset($_GET["btnSubmit"])){

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
            
    <td style="white-space: nowrap;" ><?php print htmlspecialchars($row["pseudo"]) ;?> <br>  <?php print htmlspecialchars($row["date"]); ?></td>


    <td style="word-break:break-all;"><?php print htmlspecialchars($row["texte"]);
    
     ?></td>

  
</tr>               
       
        <?php
        }
    } else {
        print "0 resultats trouvés";
    }
    


}
else{
    $result = $conn->query($affich);
   
		if ($result->num_rows > 0) {
           
			echo '<p></p>';
        // output data of each row
            ?>

            <div class="container" >
            <div class="row">
           <u> <p><?php print htmlspecialchars($result->num_rows) ; ?> commentaires</p> </u>
            <table class="table table-bordered"  >
            <tbody>

            <?php

        while ($row = $result->fetch_assoc()) {

            $identifiant = $row["id"];
            $limitedtext= $row["texte"];
                if (strlen($limitedtext) > $charlimit){

                    $limitedtext = substr($limitedtext,0,$charlimit)."...";
                           
                     
                }
            ?>

    <tr>
                
        <td style="white-space: nowrap;" ><?php print htmlspecialchars($row["pseudo"]) ;?> <br>  <?php print htmlspecialchars($row["date"]); ?></td>
    
    
        <td style="word-break:break-all;" ><?php print htmlspecialchars($limitedtext);
        if(strlen($row["texte"]) > $charlimit){
        // echo ' ...<a href="" >' ."Read More". '</a>';

        
         ?>
         <form class ="transp-img" action="afficher_comm.php" method="get" >
                              
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
			print "0 resultats trouvés";
        }
    }
?> 
            </tbody>
        </table>
    </div>
</div>

<?php

	

	$conn->close();
	?>

