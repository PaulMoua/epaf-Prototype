<?php

/* Cette class permet d'accéder au table d'une base de donné.

Select($sSelect,$sTable) => envoi une requête de type Select. S'il y a un tri à faire, rajouter le "WHERE" dans $sTable.
$bdd->Select("nom", "client WHERE nom='Paul'");

VerifConnection($pLogin,$pPassword) => Vérifie si le login envoyé correspond au mot de passe envoyé. Renvoie -1 si ce n'est pas le cas. Dans le cas contraire, renvoie l'id de l'utilisateur correspondant.

NewClient($pcivilite, $pnom, $pprenom, $pprenom2, $ptelephone, $pGSM, $pFax, $pEMail, $psituationFamiale, $pdateSituation, $pdateNaissance, $phandicape, $pdepartementResidence, $pouvrantDroit, $pministere, $pdirection, $pcategorie, $ptypeClient, $ptelephonePro, $pGSMPro, $pFaxPro, $pEMailPro, $pdelegation, $ppersonneMorale, $psociete, $plogin, $pPWD, $ptarif, $pCLIStatut, $pRFR, $pparts, $pQF, $panneeFiscale, $padresse, $padresse2, $pBP, $pCP, $pville, $pcedex, $ppays, $pNPAI, $padresseF, $padresse2F, $pBPF, $pCPF, $pvilleF, $pcedexF, $ppaysF, $pNPAIF)=> Crée un nouvel utilisateur. Fais un insert dans trois bases de données. Si le login du nouvel utilisateur existe déjà, la fonction renvoie une erreur.


UpdateClient($pcivilite, $pnom, $pprenom, $pprenom2, $ptelephone, $pGSM, $pFax, $pEMail, $psituationFamiale, $pdateSituation, $pdateNaissance, $phandicape, $pdepartementResidence, $pouvrantDroit, $pministere, $pdirection, $pcategorie, $ptypeClient, $ptelephonePro, $pGSMPro, $pFaxPro, $pEMailPro, $pdelegation, $ppersonneMorale, $psociete, $plogin, $pPWD, $ptarif, $pCLIStatut, $pRFR, $pparts, $pQF, $panneeFiscale, $padresse, $padresse2, $pBP, $pCP, $pville, $pcedex, $ppays, $pNPAI, $padresseF, $padresse2F, $pBPF, $pCPF, $pvilleF, $pcedexF, $ppaysF, $pNPAIF, $pid) => met a jour l'entrée dans la base de données correspondant à l'id donné.*/

include_once '/modele/BDDConnect.php';
/*MMM La connexion est initialisée dans cet objet "mère" puis stockée dans $conn MMM*/


class BDDClient extends BDDConnect{

	/*WWW Cette fonction récupère les informations demandés WWW*/
	public function Select($sSelect,$sTable){
		$return='';

		try {
		    $stmt = $this->conn->prepare("SELECT ".$sSelect." FROM ". $sTable);
		    $stmt->execute();

		    // set the resulting array to associative
		    $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
		    $return = $result;
		   
		    
		
		}
		catch(PDOException $e) {
		    $return = null;
		}
		
		
		return $return;
		}
	public function lol(){
		echo"lol";
	}

	public function SelectClient($sSelect,$sTable,$sId){

		$return='';

		try {
		    $stmt = $this->conn->prepare("SELECT ".$sSelect." FROM ". $sTable." WHERE id_client=". $sId);
		    $stmt->execute();

		    // set the resulting array to associative
		    $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
		    $return = $result;
		}
		catch(PDOException $e) {
		    
		    $return = null;
		}
		
		
		return $return;
		}
	/*WWW Cette fonction vérifie le log et le password WWW*/
	public function VerifConnection($pLogin,$pPassword){
		$id=-1;
		$bddGet= $this->Select('*', 'client WHERE login="'.$pLogin.'" AND pwd="'.$pPassword.'"');
		if (!$bddGet==null){
			if ($bddGet[0]['login']==$pLogin and $bddGet[0]['pwd']=$pPassword){

				$id=$bddGet[0]['id_client'];
			}else{
				
			}
		}
	
		return $id;
	}
	/*WWW Cette fonction sert à créer de nouveaux utilisateurs   WWW*/
	public function NewClient($pcivilite, $pnom, $pprenom, $pprenom2, $ptelephone, $pGSM, $pFax, $pEMail, $psituationFamiale, $pdateSituation, $pdateNaissance, $phandicape, $pdepartementResidence, $pouvrantDroit, $pministere, $pdirection, $pcategorie, $ptypeClient, $ptelephonePro, $pGSMPro, $pFaxPro, $pEMailPro, $pdelegation, $ppersonneMorale, $psociete, $plogin, $pPWD, $ptarif, $pCLIStatut, $pRFR, $pparts, $pQF, $panneeFiscale, $padresse, $padresse2, $pBP, $pCP, $pville, $pcedex, $ppays, $pNPAI, $padresseF, $padresse2F, $pBPF, $pCPF, $pvilleF, $pcedexF, $ppaysF, $pNPAIF){
		$doesLoginExists =$this->Select('login','client WHERE login="'.$plogin.'"');
		if (!$doesLoginExists==$plogin){


			try {
			    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    $sql = "INSERT INTO client (master, id_civilite, nom, prenom, prenom2, date_naissance, is_handicap, tarif_financier, sexe, login, pwd, statut, id_situation_famille, personne_physique, societe, tel, gsm, fax, mail, id_departement, id_delegation, tel_pro, gsm_pro, fax_pro, mail_pro, id_type_client, id_categorie, id_ministere, id_direction, id_parenter) VALUES ('1', '$pcivilite', '$pnom', '$pprenom', '$pprenom2', '1971-06-20', '$phandicape', '$ptarif', '', '$plogin', '$pPWD', '$pCLIStatut', '$psituationFamiale', '$ppersonneMorale', '$psociete', '$ptelephone', '$pGSM', '$pFax', '$pEMail', '$pdepartementResidence', '$pdelegation', '$ptelephonePro', '$pGSMPro', '$pFaxPro', '$pEMailPro', '$ptypeClient', '$pcategorie', '$pministere', '$pdirection', '1')";
			    // use exec() because no results are returned
			    $this->conn->exec($sql);
			    
			    $temp= $this->Select('*','client WHERE login="'.$plogin.'"');
			    $tempbis=$temp[0]["id_client"];

			    $sql = "INSERT INTO adresse (id_client, add_add1, add_add2, add_bp,add_cp, add_ville, add_cedex, add_pays, add_npai) VALUES ('$tempbis','$padresse', '$padresse2', '$pBP', '$pCP', '$pville', '$pcedex', '$ppays', '$pNPAI')";
			    // use exec() because no results are returned
			    $this->conn->exec($sql);

				$sql = "INSERT INTO addresse_facturation (id_client, addfac_add1, addfac_add2, addfac_bp,addfac_cp, addfac_ville, addfac_cedex, addfac_pays, addfac_npai) VALUES ('$tempbis','$padresseF', '$padresse2F', '$pBPF', '$pCPF', '$pvilleF', '$pcedexF', '$ppaysF', '$pNPAIF')";
			    // use exec() because no results are returned
			    $this->conn->exec($sql);
			    //faire le calcul pour la tanche QF
			    $sql = "INSERT INTO client_qf (id_client, tranche_qf, annee, qf, RFR, NBPARTS) VALUES ('$tempbis','?????', '$panneeFiscale', '$pQF', '$pRFR', '$pparts')";
			    // use exec() because no results are returned
			    $this->conn->exec($sql);

			    echo "Votre compte a été créé avec succès ! Connectez-vous avec votre compte !";
			    }
			catch(PDOException $e)
			    {
			    echo $sql . "<br>" . $e->getMessage();
			    }
		}else{
			echo "Ce login est déjà utilisé ! Recommencé !";
		}

	}
	/*WWW Cette fonction sert à modifier les informations des utilisateurs   WWW*/
	public function UpdateClient($pcivilite, $pnom, $pprenom, $pprenom2, $ptelephone, $pGSM, $pFax, $pEMail, $psituationFamiale, $pdateSituation, $pdateNaissance, $phandicape, $pdepartementResidence, $pouvrantDroit, $pministere, $pdirection, $pcategorie, $ptypeClient, $ptelephonePro, $pGSMPro, $pFaxPro, $pEMailPro, $pdelegation, $ppersonneMorale, $psociete, $plogin, $pPWD, $ptarif, $pCLIStatut, $pRFR, $pparts, $pQF, $panneeFiscale, $padresse, $padresse2, $pBP, $pCP, $pville, $pcedex, $ppays, $pNPAI, $padresseF, $padresse2F, $pBPF, $pCPF, $pvilleF, $pcedexF, $ppaysF, $pNPAIF, $pid){
			


			try {
			    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    $sql = "UPDATE client SET master='1', id_civilite='$pcivilite', nom='$pnom', prenom='$pprenom', prenom2='$pprenom2', date_naissance='1971-06-20', is_handicap='$phandicape', tarif_financier='$ptarif', sexe='', login='$plogin', pwd='$pPWD', statut='$pCLIStatut', id_situation_famille='$psituationFamiale', personne_physique='$ppersonneMorale', societe='$psociete', tel='$ptelephone', gsm='$pGSM', fax='$pFax', mail='$pEMail', id_departement='$pdepartementResidence', id_delegation='$pdelegation', tel_pro='$ptelephonePro', gsm_pro='$pGSMPro', fax_pro='$pFaxPro', mail_pro='$pEMailPro', id_type_client='$ptypeClient', id_categorie='$pcategorie', id_ministere='$pministere', id_direction='$pdirection', id_parenter='1' WHERE id_client=$pid ";
			    // use exec() because no results are returned
			    $this->conn->exec($sql);


			    $sql = "UPDATE adresse SET id_client='$pid', add_add1='$padresse', add_add2='$padresse2', add_bp='$pBP', add_cp='$pCP', add_ville='$pville', add_cedex='$pcedex', add_pays='$ppays', add_npai='$pNPAI' WHERE id_client=$pid ";
			    // use exec() because no results are returned
			    $this->conn->exec($sql);
			    $sql = "UPDATE addresse_facturation SET addfac_add1='$padresseF', addfac_add2='$padresse2F', addfac_bp='$pBPF', addfac_cp='$pCPF', addfac_ville='$pvilleF', addfac_cedex='$pcedexF', addfac_pays='$ppaysF', addfac_npai='$pNPAIF' WHERE id_client=$pid ";
			    // use exec() because no results are returned
			    $this->conn->exec($sql);
			    //faire le calcul pour la tanche QF

			    $sql="UPDATE client_qf SET tranche_qf='?????', annee='$panneeFiscale', qf='$pQF', RFR='$pRFR', NBPARTS='$pparts' WHERE id_client=$pid";
			    // use exec() because no results are returned
			    $this->conn->exec($sql);
			    
			    

			    echo "Mise à jour réussie!";
			    }












			catch(PDOException $e)
			    {
			    echo 'Erreur: <br>"';
			    echo $sql . "<br>" . $e->getMessage();
			    }
		

	}
	public function InsertClientParent($pcivilite, $pnom, $pprenom, $pprenom2, $ptelephone, $pGSM, $pFax, $pEMail, $psituationFamiale, $pdateSituation, $pdateNaissance, $phandicape, $pdepartementResidence, $padresse, $padresse2, $pBP, $pCP, $pville, $pcedex, $ppays, $pNPAI, $pid ,$parente){
			include'modele\famille\valeursFamille.php';


			try {

				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    $sql = "INSERT INTO client (master, id_civilite, nom, prenom, prenom2, date_naissance, is_handicap, id_situation_famille, tel, gsm, fax, mail, id_departement, id_parenter, personne_physique) VALUES ('0', '$pcivilite', '$pnom', '$pprenom', '$pprenom2', '1971-06-20', '$phandicape', '$psituationFamiale', '$ptelephone', '$pGSM', '$pFax', '$pEMail', '$pdepartementResidence', $parente, '1')";
			    // use exec() because no results are returned
			    $this->conn->exec($sql);
			    
			    $temp= $this->Select('*','client WHERE nom="'.$pnom.'" AND prenom="'.$pprenom.'"');
			    $tempbis=$temp[0]["id_client"];


			    $sql="INSERT INTO groupement (id_client_master, id_client_rattacher, lien_parente, rattacher_a) VALUES ('$pid', '$tempbis', '$parente','$pid')";
			    $this->conn->exec($sql);
			 
			    
			    echo "Parent ajouté";
			    }












			catch(PDOException $e)
			    {
			    echo 'Erreur: <br>"';
			    echo $sql . "<br>" . $e->getMessage();
			    }
		

	}
	public function UpdateClientParent($pcivilite, $pnom, $pprenom, $pprenom2, $ptelephone, $pGSM, $pFax, $pEMail, $psituationFamiale, $pdateSituation, $pdateNaissance, $phandicape, $pdepartementResidence, $padresse, $padresse2, $pBP, $pCP, $pville, $pcedex, $ppays, $pNPAI, $pid, $pidParent,$parente){
			include'modele\famille\valeursFamille.php';
			$val =getFamille($pid);
			$valId= $val[$pidParent][0][2];


			try {
			    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    $sql = "UPDATE client SET master='1', id_civilite='$pcivilite', nom='$pnom', prenom='$pprenom', prenom2='$pprenom2', date_naissance='1971-06-20', is_handicap='$phandicape', sexe='', id_situation_famille='$psituationFamiale', tel='$ptelephone', gsm='$pGSM', fax='$pFax', mail='$pEMail', id_departement='$pdepartementResidence', id_parenter='1' WHERE id_client=$valId ";
			    // use exec() because no results are returned
			    $this->conn->exec($sql);


			    $sql = "UPDATE adresse SET id_client='$valId', add_add1='$padresse', add_add2='$padresse2', add_bp='$pBP', add_cp='$pCP', add_ville='$pville', add_cedex='$pcedex', add_pays='$ppays', add_npai='$pNPAI' WHERE id_client=$valId ";
			    // use exec() because no results are returned
			    $this->conn->exec($sql);

			    $sql="UPDATE groupement SET lien_parente='$parente' WHERE id_client_rattacher=$valId"; 
			    $this->conn->exec($sql);
			    //faire le calcul pour la tanche QF
			    echo "Mise à jour réussie!";
			    }












			catch(PDOException $e)
			    {
			    echo 'Erreur: <br>"';
			    echo $sql . "<br>" . $e->getMessage();
			    }
		

	}
		


}