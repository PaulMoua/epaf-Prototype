<?php
function getFamille($pidMaster){
	$toReturn =[];
	global $nom;
	global $prenom;
	global $bddClient ;
	
	$famille=$bddClient ->Select("*", "groupement WHERE id_client_master='$pidMaster'");
	
	foreach ($famille as $key => $value){
		
    	$toReturn[$key]= [array(getNomPrenomFromID($famille[$key]['id_client_rattacher']), getParenterFromID($famille[$key]['lien_parente']), $famille[$key]['id_client_rattacher'])];
	}
	return $toReturn;
}
function getNomPrenomFromID($pidMaster){
	global $bddClient ;
	$toReturn = "";
	$nomPrenom = $bddClient ->Select("nom, prenom", "client WHERE id_client='$pidMaster'");
	$toReturn = $nomPrenom[0]['nom']." ".$nomPrenom[0]['prenom'];
	
	return $toReturn;
}
function getParenterFromID($pidParenter){
	global $bddClient ;
	$toReturn = "";
	$parenter = $bddClient ->Select("Libelle_parenter", "admin_parenter WHERE id_parenter='$pidParenter'");
	$toReturn = $parenter[0]['Libelle_parenter'];
	
	return $toReturn;
}

?>