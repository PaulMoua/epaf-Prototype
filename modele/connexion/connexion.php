
<form action="index.php?" method="post" class="formConn">

<?php
	/* vérifie si l'utilisateur à rentrer des login et password valide puis renvoie soit à la page d'accueil soit à la page de connexion*/
	include_once '/modele/BDDClient.php';
	$bddUtilisateur;
	$bddClient = new BDDClient();
	$bddClient ->BDDConnection();
	$id=$bddClient ->VerifConnection($_POST['log'], $_POST['pass']);
	if ($id>-1){
		$_SESSION['reussiteConnexion']='true';
		
		$_SESSION['id']=$id;
	}else{
		$_SESSION['reussiteConnexion']=false;
		
		
	}
	header('Refresh: 5;url=index.php');
?>
</form>


