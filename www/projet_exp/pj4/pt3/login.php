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

<h1 align="center" class="">Projet n°4 Noé - admin login</h1>

   <div class="form-group">
    
        <form id="formulaire" action="login.php" method="post">
            
        
                id : <input type="text" name="LOGIN_ID" maxlength="10" style="width: 150px" placeholder="LOGIN">
                <br><br>
                   
                mdp : <input type="password" name="LOGIN_MDP" maxlength="10" placeholder="PASSWORD">
                <br><br>
                 
            
                <br><br>
            <input class="btn btn-primary" type="submit" value="Connection" name="Submit1">
        </form> 
    </div>

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

$IDVRAI = "root";
$MDPVRAI = "root";


if (isset($_POST['Submit1'])) {

    if ($IDLOGIN == $IDVRAI && $IDMDP == $MDPVRAI) {
        header('Location: acceslogin.php');

    } else {
        echo '<p class="text-center"> ID ou MDP erroné </p>';
    }


}




?>






