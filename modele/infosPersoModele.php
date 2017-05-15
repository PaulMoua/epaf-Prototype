<?php
class infosPersoModele{
	private $toShow;
	private $styleRub;
	private $typeRub;
	private $toFade;
	private $id;
	public function __construct(){
		$_SESSION['RobinFace']->SetFaceDialogue('Cliquer sur les différentes fiches pour consulter les informations qu\'elles contiennent!');
		$this->styleRub=array('','','','','');
		$this->typeRub=array('a','a','a','a','a');
		$this->id='infosPerso';
		if(isset($_GET['rub'])){

			switch ($_GET['rub']){
				case 1:
					$this->styleRub[0]='style="'.genereStyleFormInfosPersoIn().'"';
					$this->typeRub[0]='div';
					$_SESSION['RobinFace']->SetFaceDialogue('Nous avons besoin de quelques informations de base pour savoir qui vous êtes!');
					
					break;
				case 2:
					$this->styleRub[1]='style="'.genereStyleFormInfosPersoIn().'"';
					$this->typeRub[1]='div';
					$_SESSION['RobinFace']->SetFaceDialogue('Vos coordonnées nous seront utiles pour vous envoyer du courrier...');
					break;
				case 3:
					$this->styleRub[2]='style="'.genereStyleFormInfosPersoIn().'"';
					$this->typeRub[2]='div';
					$_SESSION['RobinFace']->SetFaceDialogue('Adresse de facturation... Ne vous trompez pas !');
					break;
				case 4:
					$this->styleRub[3]='style="'.genereStyleFormInfosPersoIn().'"';
					$this->typeRub[3]='div';
					$_SESSION['RobinFace']->SetFaceDialogue('Ces informations sont utiles pour nous !');
					break;
				case 5:
					$this->styleRub[4]='style="'.genereStyleFormInfosPersoIn().'"';
					$this->typeRub[4]='div';
					$_SESSION['RobinFace']->SetFaceDialogue('Ces informations concernent votre emploi !');
					break;
			}
						if(isset($_SESSION['rub'])){
				if($_SESSION['rub']==$_GET['rub']){
					switch ($_GET['rub']){
						case 1:
							$this->styleRub[0]='style="'.genereStyleFormInfosPersoStay().'"';
							$this->typeRub[0]='div';
							break;
						case 2:
							$this->styleRub[1]='style="'.genereStyleFormInfosPersoStay().'"';
							$this->typeRub[1]='div';
							break;
						case 3:
							$this->styleRub[2]='style="'.genereStyleFormInfosPersoStay().'"';
							$this->typeRub[2]='div';
							break;
						case 4:
							$this->styleRub[3]='style="'.genereStyleFormInfosPersoStay().'"';
							$this->typeRub[3]='div';
							break;
						case 5:
							$this->styleRub[4]='style="'.genereStyleFormInfosPersoStay().'"';
							$this->typeRub[4]='div';
							break;
					}
				}else{
					switch ($_SESSION['rub']){
						case 1:
							$this->styleRub[0]='style="'.genereStyleFormInfosPersoOut().'"';
							
							break;
						case 2:
							$this->styleRub[1]='style="'.genereStyleFormInfosPersoOut().'"';
							
							break;
						case 3:
							$this->styleRub[2]='style="'.genereStyleFormInfosPersoOut().'"';
							
							break;
						case 4:
							$this->styleRub[3]='style="'.genereStyleFormInfosPersoOut().'"';
							
							break;
						case 5:
							$this->styleRub[4]='style="'.genereStyleFormInfosPersoOut().'"';
							
							break;
					}
				}
			}


		}else{

		}
	}
	public function getId(){
		return $this->id;
	}
	public function draw(){
		$styleRub1=$this->styleRub[0];
		$styleRub2=$this->styleRub[1];
		$styleRub3=$this->styleRub[2];
		$styleRub4=$this->styleRub[3];
		$styleRub5=$this->styleRub[4];
		$typeRub1=$this->typeRub[0];
		$typeRub2=$this->typeRub[1];
		$typeRub3=$this->typeRub[2];
		$typeRub4=$this->typeRub[3];
		$typeRub5=$this->typeRub[4];
		if (isset($_SESSION['contentId']) and $_SESSION['contentId']==$this->id){
			$toFade="style=''";
		}else{
  			$toFade="style='".genereStyleFade(1.0,1.0)."'";
  		}
		include('\vue\accueil\infosPerso.php');

	  	
		$_SESSION['RobinFace']->draw();
		echo'</div>';
		$_SESSION['contentId']=$this->id;

		
		if (isset($_GET['rub'])){
			$_SESSION['rub']=$_GET['rub'];
		}
	}
	public function drawOld(){
		$styleRub1=$this->styleRub[0];
		$styleRub2=$this->styleRub[1];
		$styleRub3=$this->styleRub[2];
		$styleRub4=$this->styleRub[3];
		$styleRub5=$this->styleRub[4];
		$typeRub1=$this->typeRub[0];
		$typeRub2=$this->typeRub[1];
		$typeRub3=$this->typeRub[2];
		$typeRub4=$this->typeRub[3];
		$typeRub5=$this->typeRub[4];
		$toFade="style='".genereStyleDeFade(1.0,0)."'";
		if (isset($_SESSION['contentId']) and $_SESSION['contentId']!=$this->id){
			include('\vue\accueil\infosPerso.php');
			$_SESSION['RobinFace']->drawOld();
			echo'</div>';
		
		}

		
	}

}

?>