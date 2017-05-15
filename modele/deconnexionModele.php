<?php

class deconnexionModele{
public function draw(){
	$toPop="style='".genereStylePop(1.0,1.0)."'";
	include'\vue\deconnexion.php';
	$_SESSION['RobinFace']->draw();
}

public function drawOld(){

	$toPop="style='".genereStyleDePop(1.0,0)."'";
	include'\vue\deconnexion.php';
	$_SESSION['RobinFace']->drawOld();
}

}
?>