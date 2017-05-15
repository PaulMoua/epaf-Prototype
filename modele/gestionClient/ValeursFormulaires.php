<?php
/* Récupère et met en forme les informations nécessaires pour les listes déroulantes du fomulaire vu\formulaireClient.php. Récupérable via des functions*/


function getFormCivilite(){
	$bddGet;
	global $bddClient;
	global $bddUtilisateur;
	$bddGet = $bddClient->Select("*", "admin_civilite");
	for ($i=0; $i<sizeof($bddGet); $i++){
		if ($bddUtilisateur[0]['id_civilite']==$bddGet[$i]['id_civilite']){
			echo '<option value="'.$bddGet[$i]['id_civilite'].'" selected="selected">'.$bddGet[$i]['libelle_long'].'</option>';

		}else{
			echo '<option value="'.$bddGet[$i]['id_civilite'].'">'.$bddGet[$i]['libelle_long'].'</option>';
		}
	}
}

function getFormParente(){
	$bddGet;
	global $bddClient;
	global $bddUtilisateur;
	$bddGet = $bddClient->Select("*", "admin_parenter");
	for ($i=0; $i<sizeof($bddGet); $i++){
		if ($bddUtilisateur[0]['id_parenter']==$bddGet[$i]['id_parenter']){
			echo '<option value="'.$bddGet[$i]['id_parenter'].'" selected="selected">'.$bddGet[$i]['Libelle_parenter'].'</option>';

		}else{
			echo '<option value="'.$bddGet[$i]['id_parenter'].'">'.$bddGet[$i]['Libelle_parenter'].'</option>';
		}
	}
}

function getForm($pTable, $pCle, $pCleU, $pValeur){
	$bddGet;
	global $bddClient;
	global $bddUtilisateur;
	$bddGet = $bddClient->Select("*", $pTable);
	for ($i=0; $i<sizeof($bddGet); $i++){
		if ($bddUtilisateur[0][$pCleU]==$bddGet[$i][$pCle]){
			echo '<option value='.$bddGet[$i][$pCle].' selected="selected">'.$bddGet[$i][$pValeur].'</option>';

		}else{
			echo '<option value='.$bddGet[$i][$pCle].'>'.$bddGet[$i][$pValeur].'</option>';
		}
	}
}

function getFormHandicape(){
	global $bddClient;
	global $bddUtilisateur;
		if ($bddUtilisateur[0]['is_handicap']==1){
			echo
			"<option value='1' selected> Oui</option>
		  	<option value='0'> Non</option>";

		}else{
			echo
			"<option value='1'> Oui</option>
		  	<option value='0' selected> Non</option>";
		}
}
function getFormPersonneMorale(){
		global $bddClient;
	global $bddUtilisateur;

		if ($bddUtilisateur[0]['personne_physique']==1){
			echo
			"<option value='1' selected='selected'> Oui</option>
		  	<option value='0'> Non</option>";

		}else{
			echo
			"<option value='1'> Oui</option>
		  	<option value='0' selected='selected'> Non</option>";
		}
}
function getFormTarif($pMax){
		global $bddUtilisateur;
		$var = intval($bddUtilisateur[0]['tarif_financier']);
		for ($i=0; $i<=$pMax; $i++){
			
			if ($i==$var){
				echo
				"<option value=".$i." selected='selected'>".$i."</option>";
			  	

			}else{
				
				echo
				"<option value=".$i.">".$i."</option>";
			}

		}

}
function getFormNPAI(){
		$bddGet;
		global $bddClient;
		global $bddUtilisateur;
		$bddGet = $bddClient->Select("*", 'adresse');
		if ($bddUtilisateur[0]['add_npai']==1){
			echo
			"<option value=1 selected='selected'> N'habite pas à l'adresse indiqué</option>
		  	<option value=0> Habite à adresse indiqué</option>";

		}else{
			echo
			"<option value=1 > N'habite pas à l'adresse indiqué</option>
		  	<option value=0 selected='selected'> Habite à adresse indiqué</option>";
		}
}












?>