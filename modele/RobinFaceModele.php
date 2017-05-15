<?php

ob_start();

$page =ob_get_contents();
ob_end_clean();

echo $page;


class RobinFaceModele{
	private $Dialogue;
	private $animeStyleDialogue;
	private $animeStyleFace;
	private $isNew;
	private $delaiToPop;
	private $hiddenToolTipToGenerate;
	private $DecalageVerticale;
	public function __construct(){
		$this->Dialogue='';
		$this->delaiToPop=1;
		$this->DecalageVerticale=0;
		$this->hiddenToolTipToGenerate=null;
	}
	public function draw(){

	
		
		$this->drawNew();
	}
  	public function setFaceDialogueOld($dialogue){
  		$_SESSION['faceDialogue']=$dialogue;
  	}

	public function drawNew(){

		$animeStyleDialogue='style="top:-'.$this->DecalageVerticale.';"';
		include('\vue\Robin\RobinFace.php');
		$animeStyleDialogue= 'style="top:-'.$this->DecalageVerticale.';'.genereStylePop(1, $this->delaiToPop).'"';
		$Dialogue=$this->Dialogue;
		$hiddenClass='class="defaultRobinDialogue"';
		include('\vue\Robin\RobinFaceDialogue.php');
		
		$_SESSION['faceDialogue']=$this->Dialogue;
		$this->generateHiddenToolTip();

	}
	public function SetDecalageVerticale($decalage){
		$this->DecalageVerticale=$decalage;
	}
  	public function setFaceDialogue($dialogue){
  		$this->Dialogue=$dialogue;
  	}
  	public function drawOld(){
  			$hiddenClass="class='old'";
			$animeStyleDialogue="style='top:-".$this->DecalageVerticale."; top:-".$this->DecalageVerticale.";".genereStyleDePop(0.5,0.25)."'";
			$this->delaiToPop= $this->delaiToPop+1;
			$Dialogue=$_SESSION['faceDialogue'];
			
			include('\vue\Robin\RobinFaceDialogue.php');

  	}
  	public function addHiddenToolTip($hiddenClass,$faceDialogue){
  		$this->hiddenToolTipToGenerate[count($this->hiddenToolTipToGenerate)]=[$hiddenClass,$faceDialogue];
  	}
  	public function generateHiddenToolTip(){
  		$styleFaceDialogue="style='".genereStylePop(1,$this->delaiToPop)."'";
  		if (!is_null($this->hiddenToolTipToGenerate)){


	  		foreach($this->hiddenToolTipToGenerate as $toGenerate){
	  			$hiddenClass='class="'.$toGenerate[0].'"';
	  			$Dialogue=$toGenerate[1];
	  			$animeStyleDialogue= 'style="top:-'.$this->DecalageVerticale.';"';
	  			include('\vue\Robin\RobinFaceDialogue.php');
	  		}
  		}
  		


  	}




}
?>