<?php 
	include_once 'modele\gestionClient\ValeursClient.php'; /* Récupère et met en forme les informations nécessaires pour le fomulaire.*/
	include_once 'modele\gestionClient\ValeursFormulaires.php';/* Récupère et met en forme les valeurs nécessaires pour les listes déroulante du fomulaire.*/

?>


<div class='contentPos'>

<div <?=$toFade?>>
	
	<<?=$typeRub1?> href='/index.php?infosPerso&rub=1' class='formInfosPerso' <?=$styleRub1?>>
		<p><strong>I. Informations Personnelles</strong></p>
		<form method="post">
		
		  <p>Civilité </p>	  
		  <SELECT name="civilite"><?= getForm("admin_civilite",'id_civilite','id_civilite','libelle_long');?></SELECT><br>	 
		  <p>Nom </p>
		  <input type="text" name="nom" value="<?=getNom();?>"><br>
		  <p>Prenom</p>
		  <input type="text" name="prenom" value="<?=getPrenom();?>"><br>
		  <p>Prenom 2</p>
		  <input type="text" name="prenom2" value="<?=getPrenom2();?>"><br>
		  <p>Téléphone</p>
		  <input type="text" name="telephone" value="<?=getTelephone() ;?>"><br>
		  <p>GSM</p>
		  <input type="text" name="GSM" value="<?=getGSM();?>"><br>
		  <p>Fax</p>
		  <input type="text" name="Fax" value="<?=getFax();?>"><br>
		  <p>Email</p>
		  <input type="text" name="EMail" value="<?=getEMail() ;?>"><br>
		  <p>Situation Familiale</p>
		  <SELECT name="situationFamiale"><?= getForm("admin_situation_familiale",'id_situation_famille','id_situation_famille','libelle');?></SELECT><br>
		  <p>Date de situation</p>
		  <input type="text" name="dateSituation" class="infoPersoInputBis" value=" ????"><br>
		  <p>Date de naissance*</p>
		  <input type="text" name="dateNaissance" class="infoPersoInputBis" value="<?=getDateNaissance() ;?>"><br>
		  <p>Handicapé</p>
		  <SELECT name="handicape">
		  	<?php getFormHandicape()?> 

		  </SELECT><br>
		  <p> Département de résidence</p>
		  <SELECT name="departementResidence"><?= getForm("admin_departement",'id_departement','id_departement','libelle');?></SELECT><br>
		  <p>Parenté</p>
		  <SELECT name="parente"><?=getFormParente();?></SELECT><br/>
		</form>
	</<?=$typeRub1?>>
	

	
	<<?=$typeRub2?> href='/index.php?infosPerso&rub=2' class="formInfosPerso1" <?=$styleRub2?>>
	
	<p><strong>II. Adresse Personnelles</strong></p>
		<form method="post">
		
		<p>Addresse 1</p>
		  <input type="text" name="adresse" value="<?=getAdresse();?>"><br>
		  <p>Addresse 2 </p>
		  <input type="text" name="adresse2" value="<?=getAdresse2();?>"><br>
		  <p>BP</p>
		  <input type="text" name="BP" value="<?=getBP();?>"><br>
		  <p>Code Postal</p>
		  <input type="text" name="CP" value="<?=getCP();?>"><br>
		  <p>Ville</p>
		  <input type="text" name="ville" value="<?=getVille();?>"><br>
		  <p>Cedex</p>
		  <input type="text" name="cedex" value="<?=getCedex();?>"><br>
		  <p>Pays</p>
		  <input type="text" name="pays" value="<?=getPays();?>"><br>
		  <p>NPAI</p>
		  <SELECT name="NPAI"><?php getFormNPAI();?> </SELECT><br>
		</form>
	
	</<?=$typeRub2?>>

	
	<<?=$typeRub3?> href='/index.php?infosPerso&rub=3' class="formInfosPerso2" <?=$styleRub3?>>
	
	<p><strong>III. Adresse Profesionnelle</strong></p>
		<form method="post">
		  <p>Addresse 1</p>
		  <input type="text" name="adresseF" value="<?=getAdresseF();?>"><br>
		  <p>Addresse 2 </p>
		  <input type="text" name="adresse2F" value="<?=getAdresse2F();?>"><br>
		  <p>BP</p>
		  <input type="text" name="BPF" value="<?=getBPF();?>"><br>
		  <p>Code Postal</p>
		  <input type="text" name="CPF" value="<?=getCPF();?>"><br>
		  <p>Ville</p>
		  <input type="text" name="villeF" value="<?=getVilleF();?>"><br>
		  <p>Cedex</p>
		  <input type="text" name="cedexF" value="<?=getCedexF();?>"><br>
		  <p>Pays</p>
		  <input type="text" name="paysF" value="<?=getPaysF();?>"><br>
		  <p>NPAI</p>
		  <SELECT name="NPAIF"><?php getFormNPAI();?> </SELECT><br>
	</form>
	</<?=$typeRub3?>>
	


	
	<<?=$typeRub4?> href='/index.php?infosPerso&rub=4' class="formInfosPerso3" <?=$styleRub4?>>
	
	<p><strong>IV. Autres</strong></p>
		<form method="post">
		  <p>Personne Morale</p>

		  <SELECT name="personneMorale"><?php getFormPersonneMorale();?> </SELECT><br>
		  <p>Société Association</p>
		  <input type="text" name="societe" value="<?=getSociete();?>"><br>
		  <p>LOGIN</p>
		  <input type="text" name="login" value="<?=getLogin();?>"><br>
		  <p>PWD</p>
		  <input type="text" name="PWD" placeholder="*****"><br>
		  <p>Tarifs finances</p>
		  <SELECT name="tarif"><?php getFormTarif(9)?> </SELECT><br>
		  <p>cli_statut*</p>
		  <input type="text" name="CLIStatut" value="<?=getCLIStatut();?>"><br>
		  <p>RFR*</p>
		  <input type="text" name="RFR" value="<?=getRFR();?>"><br>
		  <p>Nombre de parts*</p>
		  <input type="text" name="parts" value="<?=getNombreParts();?>"><br>
		  <p>QF*</p>
		  <input type="text" name="QF" value="<?=getQF();?>"><br>
		  <p>Année fiscale*</p>
		  <input type="text" name="anneeFiscale" value="<?=getAnneFiscale();?>"><br>

		</form>

	
	</<?=$typeRub4?>>
	
	<<?=$typeRub5?> href='/index.php?infosPerso&rub=5' class="formInfosPerso4" <?=$styleRub5?>>
	
	<p><strong>V. Informations Professionnelles</strong></p>
		<form method="post">
		  <p>Ouvrant droit</p>
		  <input type="text" name="ouvrantDroit" class="infoProInputBis" value=" ????"><br>
		  		 
		  <p>Ministère</p>
		  <SELECT name="ministere"><?php getForm("admin_ministere",'id_ministere', 'id_ministere','libelle')?></SELECT><br>
		  <p>Direction</p>
		  <SELECT name="direction"><?php getForm("admin_direction",'id_direction', 'id_direction','libelle')?> </SELECT><br>
		  <p>Catégorie</p>
		  <SELECT name="categorie"><?php getForm("admin_categorie",'id_categorie', 'id_categorie','libelle')?> </SELECT><br>
		  <p>Type client</p>
		  <SELECT name="typeClient"><?php getForm("admin_type_client",'id_type_client', 'id_type_client','libelle')?> </SELECT><br>
		  <p>Téléphone Pro </p>
		  <input type="text" name="telephonePro" value="<?=getTelephonePro();?>"><br>
		  <p>GSM Pro</p>
		  <input type="text" name="GSMPro" value="<?=getGSMPro();?>"><br>
		  <p>Fax Pro</p>
		  <input type="text" name="FaxPro" value="<?=getFaxPro();?>"><br>
		  <p>E-mail Pro</p>
		  <input type="text" name="EMailPro" value="<?=getEMailPro();?>"><br>
		  <p>Délégation </p>
		  <SELECT name="delegation"><?php getForm("admin_delegation",'id_delegation', 'id_delegation','libelle')?> </SELECT><br>

		</form>
	</<?=$typeRub5?>>
	
<div class='returnButton'>
<a href='/index.php?' class=RobinBox> Retour à l'accueil.</a>
</div>
</div>


