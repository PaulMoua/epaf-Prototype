<?php
class connexionModele{
	private $toDraw;
	private $delai;
	public function __construct(){
		$this->delai=0;

	}
	public function settin(){
		if (isset($_POST['connexion'])){
			include_once('\modele\connexion\connexion.php');
			if ($_SESSION['reussiteConnexion']){
							//$_SESSION['hello']->SetValuesForFaceDialogue('Bonjour ! Je ne vous avais pas reconnu !');
							$this->toDraw='vue/connexion/connexionReussie.php';
			}else{
							//$_SESSION['hello']->SetValuesForFaceDialogue("Je n'ai pas bien compris qui vous étiez... Vous pouvez répéter ?");
							$this->toDraw='/vue/connexion/connexionIncorrecte.php';
			}
			
	}else{
		
						//$_SESSION['hello']->SetValuesForFaceDialogue('Bonjour, je suis Robin, votre guide ! Est-ce qu\'on ne se serait pas déjà rencontré quelque part ? ');
		
		$this->toDraw='\vue\connexion\connexionFormulaire.php';
		}

	}
	public function draw(){

		$this->delai=1;
		$this->drawNew();
		echo "</div>";

	}
	public function drawOld(){
		$toPop="style='".genereStyleDePop(1.0,0)."'";
	  	include($this->toDraw);
	  	$_SESSION['RobinFace']->drawOld();
		echo "</div>";
	}
	public function drawNew(){
  		if (isset($_SESSION['start'])){
  			
  		}else{
  			$this->delai=4;
  		}
  		if (isset($_SESSION['oldContent']) and $_SESSION['oldContent']==$this->toDraw){
  			
  			$toPop='';
  		}else{
  			$toPop="style='".genereStylePop(1.0,$this->delai+1.0)."'";
  		}
  		$drawNew = true;
	  	include($this->toDraw);
	    $_SESSION['RobinFace']->drawNew();
		echo "</div>";
	  	$_SESSION['content']=$this->toDraw;

	}
	public function getToDraw(){
		return $this->toDraw;
	}
	public function setToDraw($toDraw){
		$this->toDraw=$toDraw;
	}
}

?>