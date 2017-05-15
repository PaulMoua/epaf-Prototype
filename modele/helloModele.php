<?php



class helloModele{
	private $styleFace;
	private $face;
	private $faceDialogue;
	private $styleFaceDialogue;
	private $styleList;
	private $delaiToPop;
	private $styleFaceDialogueHidden;
	private $xPos;
	private $yPos;
	private $drawWhat;
	private $hiddenToolTipToGenerate;
	public function __construct($xPos, $yPos, $drawWhat){
		$this->hiddenToolTipToGenerate=[];
		$this->xPos=$xPos;
		$this->yPos=$yPos;
		$this->drawWhat=$drawWhat;
		$this->styleList=$_SESSION['style'];
		$this->delaiToPop=0;
		$this->styleFaceDialogueHidden="style=".$this->styleList['facePop07Hidden'];
		if (!isset($_SESSION['id']) or $_SESSION['id']==-1){
			if (isset($_SESSION['start'])){
					$this->styleFace='';
					$this->styleFaceDialogue ='';
			}else{
				$this->styleFace="style=".$this->styleList['facePop05'];
				$this->styleFaceDialogue ="style=".$this->styleList['facePop07'];
			}
			$this->face ="<img src='vue/reindeer-hi.png' alt='dunno' style=' position:relative; top:-30px; left:-20px;'>";
			$this->styleFaceDialogue ="style=".$this->styleList['facePop07'];
			if (isset($_SESSION['reussiteConnexion'])){
				
				if ($_SESSION['reussiteConnexion']==true){
					//$this->faceDialogue ='Ah ! Je ne vous avais pas reconnu !';
				}
			}
			}else{
				$this->face ="<img src='vue/reindeer-hi.png' alt='dunno' style=' position:relative; top:-30px; left:-20px;'>";
				$this->styleFaceDialogue ="style=".$this->styleList['facePop07'];
				$this->faceDialogue='Comment allez-vous ?';
			}
		$_SESSION['hello']=$this;

	}
  	public function draw(){
  		if ($this->drawWhat){
  			  		$this->drawNew();
			$_SESSION['face']=$this->face;
			$_SESSION['faceDialogue']=$this->faceDialogue;



  		}else{
  			$this->drawOld();
  		}

  	}
  	public function drawOld(){
  			$hiddenClass="class='lol'";
		  	$styleFace="";
		  	$face=$_SESSION['face'];
			$styleFaceDialogue="style='".genereStyleDePop(0.5,0.25)."'";
			$this->delaiToPop= $this->delaiToPop+1;
			$faceDialogue=$_SESSION['faceDialogue'];
			$xPos=$this->xPos;
			$yPos=$this->yPos;
			include('\vue\hello\helloFace.php');
			include('\vue\hello\helloFaceDialogue.php');

  	}
  	public function setFaceDialogue($dialogue){
  		$this->faceDialogue=$dialogue;
  	}
  	public function setFaceDialogueOld($dialogue){
  		$_SESSION['faceDialogue']=$dialogue;
  	}

  	public function drawNew(){
  		$hiddenClass="class='lol'";
  		$yPos=$this->yPos;
  		$xPos=$this->xPos;
  		$this->delaiToPop+=1;
  		if (isset($_SESSION['start'])){
  			$styleFace='';
  		}else{
  			$this->delaiToPop=4;
  			$styleFace="style='".genereStylePop(1,$this->delaiToPop)."'";
  			$styleFaceDialogue="style='".genereStylePop(1,$this->delaiToPop)."'";
  		}
	  	$face=$this->face;
	  	if(isset($_SESSION['faceDialogue'])){
		  		$styleFaceDialogue="style='".genereStylePop(0.5,$this->delaiToPop)."'";
		 }

		$faceDialogue=$this->faceDialogue;
		
		include('\vue\hello\helloFace.php');
		include('\vue\hello\helloFaceDialogue.php');
		$this->generateHiddenToolTip();
		
  	}
  	public function SetValuesForFace(){
  		
  	}
  	public function SetValuesForFaceDialogue($dialogue){
		$this->faceDialogue =$dialogue;
  		
  	}
  	public function checkDialogue(){
  		if (isset($_SESSION['faceDialogue'])){
  			
  		
	  		if ($_SESSION['faceDialogue']==$this->faceDialogue){
	  			$this->styleFaceDialogue ='';

	  		} else{
	  			
	  		}
	  	}
  		
  	}
  	public function addHiddenToolTip($hiddenClass,$faceDialogue){
  		$this->hiddenToolTipToGenerate[count($this->hiddenToolTipToGenerate)]=[$hiddenClass,$faceDialogue];
  	}
  	public function generateHiddenToolTip(){
  		$yPos=$this->yPos;
  		$xPos=$this->xPos;
  		$styleFaceDialogue="style='".genereStylePop(1,$this->delaiToPop)."'";
  		foreach($this->hiddenToolTipToGenerate as $toGenerate){
  			$hiddenClass='class="'.$toGenerate[0].'"';
  			$faceDialogue=$toGenerate[1];
  			include('\vue\hello\helloFaceDialogue.php');
  		} 
  		


  	}
}



?>