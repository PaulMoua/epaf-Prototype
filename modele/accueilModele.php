<?php
class accueilModele{
	private $toDraw;
	private $delai;
	private $id;
	public function __construct(){

		$this->id='accueil';

	  	$_SESSION['contentId']='';
	  	$_SESSION['rub']='';
		if (isset($_GET['infosPerso'])){
   			$this->toDraw='\control\infosPersoControler.php';
   		}else{
   			$this->toDraw='\vue\accueil\accueil.php';
   		}
	}
	public function draw(){
		$this->drawNew();
	}
	public function getId(){
		return $this->id;
	}
	public function drawOld(){
		$toFade="style='".genereStyleDeFade(1.0,0)."'";
		$toPop="style='".genereStyleDeFade(1.0,0)."'";
		$drawNew=false;
		include($this->toDraw);
	  	if($this->toDraw=='\control\infosPersoControler.php'){
	  		$_SESSION['RobinFace']->SetFaceDialogue('Cliquer sur les différentes fiches pour consulter les informations qu\'elles contiennent!');
			$_SESSION['RobinFace']->draw();
			echo "</div>";

	  	}elseif($this->toDraw=='\vue\accueil\accueil.php'){
	  		$helloFace = $_SESSION['RobinFace'];
			if($drawNew){
				$helloFace->setFaceDialogue("Que faisons-nous maintenant ? Cliquer sur une des icônes pour choisir votre prochaine activité !");
			}else{
				if(isset($_GET['infosPerso'])){
					$helloFace->setFaceDialogueOld('Cette rubrique vous permet de consulter ou modifier vos <strong>informations</strong>personnels et professionnels.');
				}
			}
			$_SESSION['RobinFace']->SetDecalageVerticale('0px');
			$_SESSION['RobinFace']->drawOld();
			echo "</div>";
			echo "</div>";
			echo "</div>";

	  	}
	}


	public function drawNew(){
  		if (isset($_SESSION['start'])){
  			
  		}else{
  			$this->delai=4;
  		}
  		if (isset($_SESSION['content']) and $_SESSION['content']==$this->toDraw){
  			
  			$toFade='';
  		}else{
  			$toFade="style='".genereStyleFade(1.0,$this->delai+1.0)."'";

  		}
  		$drawNew = true;
	  	include($this->toDraw);
	  	if($this->toDraw=='\control\infosPersoControler.php'){
	  		$_SESSION['RobinFace']->SetFaceDialogue('Cliquer sur les différentes fiches pour consulter les informations qu\'elles contiennent!');
			$_SESSION['RobinFace']->draw();
			echo "</div>";

	  	}elseif($this->toDraw=='\vue\accueil\accueil.php'){
	  		$helloFace = $_SESSION['RobinFace'];
			if($drawNew){
				$helloFace->setFaceDialogue("Que faisons-nous maintenant ? Cliquer sur une des icônes pour choisir votre prochaine activité !");
			}else{
				if(isset($_GET['infosPerso'])){
					$helloFace->setFaceDialogueOld('Cette rubrique vous permet de consulter ou modifier vos <strong>informations</strong>personnels et professionnels.');
				}
			}
			$helloFace->addHiddenToolTip('parente','Vous voulez nous signifier un changement dans votre situation <strong>familiale</strong> ou ajouter un ami à la <strong>famille</strong> ? Cette rubrique est faite pour vous !');
			$helloFace->addHiddenToolTip('infosPerso','Cette rubrique vous permet de consulter ou modifier vos <strong>informations</strong>personnels et professionnels.');
			$helloFace->addHiddenToolTip('parente','Vous voulez nous signifier un changement dans votre situation <strong>familiale</strong> ou ajouter un ami à la <strong>famille</strong> ? Cette rubrique est faite pour vous !');
			$helloFace->addHiddenToolTip('sortie', 'Vous nous <strong>quittez</strong> déjà ? Vous êtes sur le point de vous <strong>déconnecter</strong> !');
			$_SESSION['RobinFace']->SetDecalageVerticale('0px');
			$_SESSION['RobinFace']->draw();
			echo "</div>";
			echo "</div>";
			echo "</div>";

	  	}




	  	$_SESSION['content']=$this->toDraw;


	}

}

?>