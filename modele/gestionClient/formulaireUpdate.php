
<?php
//Formulaire d'update SQL



//WWW récupère les valeurs post du formalaireClient WWW
function getValeur($pValeur){
	if (isset($_POST[$pValeur])){
		return $_POST[$pValeur];
	}else{
		return "null";
	}
}



if (isset($_POST['updateParent'])){
	
	$bddClient ->UpdateClientParent(getValeur('civilite'),
						getValeur('nom'),
						getValeur('prenom'),
						getValeur('prenom2'),
						getValeur('telephone'),
						getValeur('GSM'),
						getValeur('Fax'),
						getValeur('EMail'),
						getValeur('situationFamiale'),
						getValeur('dateSituation'),
						getValeur('dateNaissance'),
						getValeur('handicape'),
						getValeur('departementResidence'),
						
						getValeur('adresse'),
						getValeur('adresse2'),
						getValeur('BP'),
						getValeur('CP'),
						getValeur('ville'),
						getValeur('cedex'),
						getValeur('pays'),
						getValeur('NPAI'),
						$_SESSION['id'],
						$_POST['parent'],
						getValeur('parente')
						);



}else{



//WWW  modifie profil. Nécessite la page modele\BDDClient.php WWW
$bddClient ->UpdateClient(getValeur('civilite'),
						getValeur('nom'),
						getValeur('prenom'),
						getValeur('prenom2'),
						getValeur('telephone'),
						getValeur('GSM'),
						getValeur('Fax'),
						getValeur('EMail'),
						getValeur('situationFamiale'),
						getValeur('dateSituation'),
						getValeur('dateNaissance'),
						getValeur('handicape'),
						getValeur('departementResidence'),
						getValeur('ouvrantDroit'),
						getValeur('ministere'),
						getValeur('direction'),
						getValeur('categorie'),
						getValeur('typeClient'),
						getValeur('telephonePro'),
						getValeur('GSMPro'),
						getValeur('FaxPro'),
						getValeur('EMailPro'),
						getValeur('delegation'),
						getValeur('personneMorale'),
						getValeur('societe'),
						getValeur('login'),
						getValeur('PWD'),
						getValeur('tarif'),
						getValeur('CLIStatut'),
						getValeur('RFR'),
						getValeur('parts'),
						getValeur('QF'),
						getValeur('anneeFiscale'),
						getValeur('adresse'),
						getValeur('adresse2'),
						getValeur('BP'),
						getValeur('CP'),
						getValeur('ville'),
						getValeur('cedex'),
						getValeur('pays'),
						getValeur('NPAI'),
						getValeur('adresseF'),
						getValeur('adresse2F'),
						getValeur('BPF'),
						getValeur('CPF'),
						getValeur('villeF'),
						getValeur('cedexF'),
						getValeur('paysF'),
						getValeur('NPAIF'),$_SESSION['id']
						);

}
header('Refresh: 3;url=index.php');

?>