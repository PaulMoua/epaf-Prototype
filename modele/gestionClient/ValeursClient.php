<?php

/* Récupère et met en forme les informations nécessaires pour le fomulaire vu\formulaireClient.php. Récupérable via des functions*/




/* WWW  Les functions suivantes fournissent les informations nécessaires à la page vu\formulaireClient.php. Lorsque l'information récupérée fait référence à une base de données relationnelle, la function se connecte à la nouvelle BDD et récupère l'information voulue WWWW*/

$valeur;
$id;
include_once'modele\famille\valeursFamille.php';


function getValeur(){
	global $bddUtilisateur;
	global $bddClient;


	if(isset($_POST['ajoutFamille'])){
		$valeur=null;

	}
	elseif (!isset($_GET['parent'])){
		$valeur = $bddUtilisateur;
	}else{
		
		
		$id = getFamille($_SESSION['id'])[$_GET['parent']][0][2];
		$valeur= $bddClient->Select("*","client WHERE id_client=".$id."");
		
	}
	return $valeur;
}

function getCivilite(){
	$bddCivilite;
	global $bddClient;
	$valeur=getValeur();
	$bddCivilite = $bddClient->Select("*","admin_civilite WHERE id_civilite=".$valeur[0]['id_civilite']);
	return $bddCivilite[0]['libelle_long'];
}

function getNom(){
	$valeur=getValeur();
	if ($valeur==null){
		return null;
	}else{
		return $valeur[0]['nom'];
	}
}

function getPrenom(){
	$valeur=getValeur();
	if ($valeur==null){
		return null;
	}else{
		return $valeur[0]['prenom'];
	}
}
function getPrenom2(){
	$valeur=getValeur();
	if ($valeur==null){
		return null;
	}else{
		return $valeur[0]['prenom2'];
	}
}
function getTelephone(){
	$valeur=getValeur();
	if ($valeur==null){
		return null;
	}else{
		return $valeur[0]['tel'];
	}
}
function getGSM(){
	$valeur=getValeur();
	if ($valeur==null){
		return null;
	}else{
		return $valeur[0]['gsm'];
	}
}
function getFax(){
	$valeur=getValeur();
	if ($valeur==null){
		return null;
	}else{
		return $valeur[0]['fax'];
	}
}
function getEMail(){
	$valeur=getValeur();
	if ($valeur==null){
		return null;
	}else{
		return $valeur[0]['mail'];
	}
}
function getSituationFamiliale(){
	$bddSituationFamiliale;
	global $bddClient;
	$valeur=getValeur();
	if ($valeur==null){

		return null;}

	else{
		$bddSituationFamiliale = $bddClient->Select("*","admin_situation_familiale WHERE id_situation_famille=".$valeur[0]['id_situation_famille']);
	

		return $bddSituationFamiliale[0]['libelle'];
	}


}
function getDateNaissance(){
	$valeur=getValeur();
	return $valeur[0]['date_naissance'];
}
function getHandicape(){
	$valeur=getValeur();
	if ($valeur==null){
		return null;
	} else{
		$is_handicap;
		$is_handicap= $valeur[0]['is_handicap'];
		if ($is_handicap){
			$is_handicap ="oui";
		}else{
			$is_handicap ="non";
		}

		return $is_handicap;
	}
	
}
function getDepartement(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if ($valeur==null){
		return null;
	}else{
	
		$bddGet = $bddClient->Select("*","admin_departement WHERE id_departement=".$valeur[0]['id_departement']);
	

		return $bddGet[0]['libelle'];
	}
}
function getMinistere(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if ($valeur==null){
		return null;
	}else{
	
		$bddGet = $bddClient->Select("*","admin_ministere WHERE id_ministere=".$valeur[0]['id_ministere']);
	

		return $bddGet[0]['libelle'];
	}
}
function getDirection(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if ($valeur==null){
		return null;
	}else{
	
		$bddGet = $bddClient->Select("*","admin_direction WHERE id_direction=".$valeur[0]['id_direction']);
	

		return $bddGet[0]['libelle'];
	}
}
function getCategorie(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if ($valeur==null){
		return null;
	}else{
	
		$bddGet = $bddClient->Select("*","admin_categorie WHERE id_categorie=".$valeur[0]['id_categorie']);
	

		return $bddGet[0]['libelle'];
	}
}
function getTypeClient(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if ($valeur==null){
		return null;
	}else{
	
		$bddGet = $bddClient->Select("*","admin_type_client WHERE id_type_client=".$valeur[0]['id_type_client']);
	

		return $bddGet[0]['libelle'];
	}
}
function getTelephonePro(){
	$valeur=getValeur();
	if ($valeur==null){
		return null;
	}else{
		return $valeur[0]['tel_pro'];
	}
}
function getGSMPro(){
	$valeur=getValeur();
	if ($valeur==null){
		return null;
	}else{
		return $valeur[0]['gsm_pro'];
	}
}
function getFaxPro(){
	$valeur=getValeur();
	if ($valeur==null){
		return null;
	}else{
		return $valeur[0]['fax_pro'];
	}
}
function getEMailPro(){
	$valeur=getValeur();
	if ($valeur==null){
		return null;
	}else{
		return $valeur[0]['mail_pro'];
	}
}
function getDelegation(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if($valeur==null){
		return null;
	}else{
		$bddGet = $bddClient->Select("*","admin_delegation WHERE id_delegation=".$valeur[0]['id_delegation']);
		return $bddGet[0]['libelle'];
	}
}
function getPersonneMorale(){
	$valeur=getValeur();
	if($valeur==null){
		return null;
	}else{
		$is_morale;
		$is_morale= $valeur[0]['personne_physique'];
		if ($is_morale){
			$is_morale ="non";
		}else{
			$is_morale ="oui";
		}
		return $is_morale;
	}

}
function getSociete(){
	$valeur=getValeur();
	if ($valeur==null){
		return null;
	}else{
		return $valeur[0]['societe'];
	}
}
function getLogin(){
	$valeur=getValeur();
	if ($valeur==null){
		return null;
	}else{
		return $valeur[0]['login'];
	}
}
function getTarifFinancier(){
	$valeur=getValeur();
	if ($valeur==null){
		return null;
	}else{
		return $valeur[0]['tarif_financier'];
	}
}
function getCLIStatut(){
	$valeur=getValeur();
	if ($valeur==null){
		return null;
	}else{
		return $valeur[0]['statut'];
	}
}
function getRFR(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if($valeur==null){
		return null;
	}else{
		$bddGet = $bddClient->Select("*","client_qf WHERE id_client=".$valeur[0]['id_client']);
		

		if ($bddGet==null){
			return null;
		}else{
			return $bddGet[0]['RFR'];
		}
	}
}
function getAnneFiscale(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if($valeur==null){
		return null;
	}else{
		$bddGet = $bddClient->Select("*","client_qf WHERE id_client=".$valeur[0]['id_client']);
		

		if ($bddGet==null){
			return null;
		}else{
			return $bddGet[0]['annee'];
		}
	}
}
function getQF(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if($valeur==null){
		return null;
	}else{
		$bddGet = $bddClient->Select("*","client_qf WHERE id_client=".$valeur[0]['id_client']);
		

		if ($bddGet==null){
			return null;
		}else{
			return $bddGet[0]['qf'];  
		}
	}
}




function getNombreParts(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if($valeur==null){
		return null;
	}else{
		$bddGet = $bddClient->Select("*","client_qf WHERE id_client=".$valeur[0]['id_client']);
		

		if ($bddGet==null){
			return null;
		}else{
			return $bddGet[0]['NBPARTS'];
		}
	}
}



function getAdresse(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if($valeur==null){
		return null;
	}else{
		$bddGet = $bddClient->Select("*","adresse WHERE id_client=".$valeur[0]['id_client']);
		

		if ($bddGet==null){
			return null;
		}else{
			return $bddGet[0]['add_add1'];
		}
	}
}
function getAdresse2(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if($valeur==null){
		return null;
	}else{
		$bddGet = $bddClient->Select("*","adresse WHERE id_client=".$valeur[0]['id_client']);
		

		if ($bddGet==null){
			return null;
		}else{
			return $bddGet[0]['add_add2'];
		}
	}
}
function getBP(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if($valeur==null){
		return null;
	}else{
		$bddGet = $bddClient->Select("*","adresse WHERE id_client=".$valeur[0]['id_client']);
		

		if ($bddGet==null){
			return null;
		}else{
			return $bddGet[0]['add_bp'];
		}
	}
}
function getCP(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if($valeur==null){
		return null;
	}else{
		$bddGet = $bddClient->Select("*","adresse WHERE id_client=".$valeur[0]['id_client']);
		

		if ($bddGet==null){
			return null;
		}else{
			return $bddGet[0]['add_cp'];
		}
	}
}
function getVille(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if($valeur==null){
		return null;
	}else{
		$bddGet = $bddClient->Select("*","adresse WHERE id_client=".$valeur[0]['id_client']);
		

		if ($bddGet==null){
			return null;
		}else{
			return $bddGet[0]['add_ville'];
		}
	}
}
function getCedex(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if($valeur==null){
		return null;
	}else{
		$bddGet = $bddClient->Select("*","adresse WHERE id_client=".$valeur[0]['id_client']);
		

		if ($bddGet==null){
			return null;
		}else{
			return $bddGet[0]['add_cedex'];
		}
	}
}
function getPays(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if($valeur==null){
		return null;
	}else{
		$bddGet = $bddClient->Select("*","adresse WHERE id_client=".$valeur[0]['id_client']);
		

		if ($bddGet==null){
			return null;
		}else{
			return $bddGet[0]['add_pays'];
		}
	}
}
function getNPAI(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if($valeur==null){
		return null;
	}else{
		$bddGet = $bddClient->Select("*","adresse WHERE id_client=".$valeur[0]['id_client']);
		

		if ($bddGet==null){
			return null;
		}else{
			if( $bddGet[0]['add_npai']==1){
			
				return "N'habite pas à l'adresse indiqué";
			}else{
				return "Habite à l'adresse indiqué";
			}
		}
	}
}



function getAdresseF(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if($valeur==null){

		return null;
	}else{
			$bddGet = $bddClient->Select("*","addresse_facturation WHERE id_client=".$valeur[0]['id_client']);
			

			if ($bddGet==null){
				return null;
			}else{
				return $bddGet[0]['addfac_add1'];
			}
		}
	}
function getAdresse2F(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if($valeur==null){

		return null;
	}else{
			$bddGet = $bddClient->Select("*","addresse_facturation WHERE id_client=".$valeur[0]['id_client']);
			

			if ($bddGet==null){
				return null;
			}else{
				return $bddGet[0]['addfac_add2'];
			}
		}
	}
function getBPF(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if($valeur==null){

		return null;
	}else{
			$bddGet = $bddClient->Select("*","addresse_facturation WHERE id_client=".$valeur[0]['id_client']);
			

			if ($bddGet==null){
				return null;
			}else{
				return $bddGet[0]['addfac_bp'];
			}
		}
	}
function getCPF(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if($valeur==null){

		return null;
	}else{
			$bddGet = $bddClient->Select("*","addresse_facturation WHERE id_client=".$valeur[0]['id_client']);
			

			if ($bddGet==null){
				return null;
			}else{
				return $bddGet[0]['addfac_cp'];
			}
		}
	}
function getVilleF(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if($valeur==null){

		return null;
	}else{
			$bddGet = $bddClient->Select("*","addresse_facturation WHERE id_client=".$valeur[0]['id_client']);
			

			if ($bddGet==null){
				return null;
			}else{
				return $bddGet[0]['addfac_ville'];
			}
		}
	}
function getCedexF(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if($valeur==null){

		return null;
	}else{
			$bddGet = $bddClient->Select("*","addresse_facturation WHERE id_client=".$valeur[0]['id_client']);
			

			if ($bddGet==null){
				return null;
			}else{
				return $bddGet[0]['addfac_cedex'];
			}
		}
	}
function getPaysF(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if($valeur==null){

		return null;
	}else{
			$bddGet = $bddClient->Select("*","addresse_facturation WHERE id_client=".$valeur[0]['id_client']);
			

			if ($bddGet==null){
				return null;
			}else{
				return $bddGet[0]['addfac_pays'];
			}
		}
	}
function getNPAIF(){
	$bddGet;
	global $bddClient;
	$valeur=getValeur();
	if($valeur==null){

		return null;
	}else{
			$bddGet = $bddClient->Select("*","addresse_facturation WHERE id_client=".$valeur[0]['id_client']);
			

			if ($bddGet==null){
				return null;
			}else{
				if( $bddGet[0]['addfac_npai']==1){
				
					return "N'habite pas à l'adresse indiqué";
				}else	{
					return "Habite à l'adresse indiqué";
				}
			}
		}
}

function getButtons(){

	if (isset($_GET['parent'])){
		echo '<input type="hidden" name="parent" value='.$_GET['parent'].'>';
		echo '<p><input type="submit" name="updateParent"  value="     Modifier     " formaction="index.php?" >
		  </p>';
	}elseif(isset($_POST['ajoutFamille'])){
		
		echo '<p><input type="submit" name="insertParent"  value="     Ajouter     " formaction="index.php?" >
		  </p>';

	}
	elseif (isset($_POST['connexion'])){

		echo '<p><input type="submit" name="insert"  value="     Créer     " formaction="index.php?">
		  </p>';
	} elseif (!isset($_POST['connexion'])){
	  	echo'<p>	
			  <input type="submit" name="update"  value="     Modifier     " formaction="index.php?">
			 </p>';
	}
	/*echo '<p>	
	  <input type="submit" name="exit"  value="     Sortir     " formaction="index.php?">
	  </p>';*/
	
}


?>