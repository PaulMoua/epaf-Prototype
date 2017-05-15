<?php
include_once '/modele/BDDClient.php';

include_once('\modele\RobinFaceModele.php');
include_once('\modele\ConnexionModele.php');
include_once('\modele\accueilModele.php');
include_once('\modele\deconnexionModele.php');
include('\modele\infosPersoModele.php');
session_start();

if(isset($_SESSION['id'])){
	
	$bddUtilisateur;
	$bddClient = new BDDClient();
	$bddClient ->BDDConnection();
	$bddUtilisateur= $bddClient->SelectClient("*","client",$_SESSION['id']);
	$nom= $bddUtilisateur[0]['nom'];
	$prenom= $bddUtilisateur[0]['prenom'];
}

$RobinFace= new RobinFaceModele();
$_SESSION['RobinFace']=$RobinFace;






ob_start();
include_once('\vue\header.php');

if (!isset($_SESSION['id']) or $_SESSION['id']==-1){
	$connexion=new connexionModele();
	$connexion->settin();
	if(isset($_SESSION['content'])){
		$_SESSION['content']->drawOld();
	}
	$connexion->draw();
	$_SESSION['content']=$connexion;
}elseif(isset($_GET['sortie'])){
	
	$sortie=new deconnexionModele();
	if(isset($_SESSION['content'])){
		$_SESSION['content']->drawOld();
	}
	$sortie->draw();
	$_SESSION['content']=$sortie;
}elseif(isset($_GET['infosPerso'])){
	
	$infosPerso=new infosPersoModele();
	if(isset($_SESSION['content'])){
		$_SESSION['content']->drawOld();
	}
	$infosPerso->draw();
	$_SESSION['content']=$infosPerso;
}elseif(isset($_SESSION['id'])){
	$accueil=new accueilModele();
	if(isset($_SESSION['content'])){
		$_SESSION['content']->drawOld();
	}
	$accueil->draw();
	$_SESSION['content']=$accueil;
}else{

}






include_once('\vue\footer.php');

$page =ob_get_contents();
ob_end_clean();

echo $page;
$_SESSION['start']=true;
?>