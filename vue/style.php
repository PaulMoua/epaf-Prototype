<style>
body{
	width :100%;
    height :100%;
    min-width: :900px;
    min-height: :100%;

    background-image: url('/vue/Mountain_Panorama.jpg');
	
}
a {text-decoration: none}
a.RobinBox:visited  {
    text-decoration: none
    color:black;
}

.RobinFaceWrapper, .RobinFaceDialogueWrapper{

	position:absolute;
	top: -200px;
	margin :10px 60px 10px 50px;
	display:inline-block;
	
	
}
.RobinFaceWrapper{

}
.RobinFaceDialogueWrapper{
	left:175px;
	min-width: 600px

}
.contentPos{
	position:absolute;
	top:200px;
	width: 75%;
	min-width: 600px
	

}
.connexionPanel{
	position:relative;
	left:40%;
	
	top :125px;

}

.RobinBoxD,.RobinBox{
    position:absolute;
	background-color:purple;
	border-style: dashed;
	border-radius:10px;
	padding:15px;
	float: top;

	font-family: Verdana;
	font-size: 20px;
}
.RobinBox{
	text-align: center;
    color:black;

}
.RobinBoxD{
    
	padding:15px 30px 15px 35px;
	border-radius:1000px;

}
.iconMenu{
    opacity: 1;
    color: rgba(0,0,0,1);
    animation-fill-mode: forwards;
    
}
.iconMenuParente, .iconMenuInfosPerso, .iconMenuSortie {

    animation-fill-mode: forwards;
       animation-duration: 1s;

    
}
.iconMenu:hover{
    animation-name: iconHover;
    animation-duration: 1s;
    animation-fill-mode: forwards;
}
.iconMenuParente:hover, .iconMenuInfosPerso:hover, .iconMenuSortie:hover {

    animation-name: iconHover;
    animation-duration: 1s;
    animation-fill-mode: forwards;
}
.iconMenuParente:hover ~ .defaultRobinDialogue,.iconMenuInfosPerso:hover ~.defaultRobinDialogue,.iconMenuSortie:hover ~ .defaultRobinDialogue {
     transform : scale(0,0);
     animation-fill-mode: forwards;
     transition: transform 1s;
     transform-origin: 500px -100px;
 }
.defaultRobinDialogue{
         transition: transform 1s;
     transform-origin: 500px -100px;
}
.iconMenuParente:hover ~ .parente {
     transform : scale(1,1);
     animation-fill-mode: forwards;
     transition: transform 1s;
     
 }
.iconMenuInfosPerso:hover ~ .infosPerso {
     transform : scale(1,1);
     animation-fill-mode: forwards;
     transition: transform 1s;
     
 }
.iconMenuSortie:hover ~ .sortie {
     transform : scale(1,1);
     animation-fill-mode: forwards;
     transition: transform 1s;
     
 }
 .parente, .sortie, .infosPerso{
    transform : scale(0,0);
    transition: transform 0.7s;
    transform-origin: 500px -100px;
}
.accueilWrapper{
    position: relative;
    top : 100px;
}


.formInfosPerso p,.formInfosPerso1 p,.formInfosPerso2 p,.formInfosPerso3 p, .formInfosPerso4 p{
    text-align: left;
    
    
    padding:  0px 0px 0px 0px;
     margin: 0px 0px 0px 0px;

     width : 350px;
    
     font-size: 23px;
    pointer-events: auto;
       margin: 0px 0px 0px 0px;
    padding: 10px 10px 10px 10px;
    
    
    display: inline-block;

}

.formInfosPerso select, .formInfosPerso input,.formInfosPerso1 select, .formInfosPerso1 input,.formInfosPerso2 select, .formInfosPerso2 input,.formInfosPerso3 select, .formInfosPerso3 input, .formInfosPerso4 select, .formInfosPerso4 input{
    text-align: left;
    background-color:green;
    display: inline-block;
    padding:  0px 0px 0px 0px;
     margin: 0px 0px 0px 0px;
     
     width : 325px;
     font-size: 20px;
}

.formInfosPerso,.formInfosPerso1,.formInfosPerso2,.formInfosPerso3,.formInfosPerso4{
    width:800px;
    transform-origin: 400px 200px;
    background-color: ghostwhite ;
    color:black;
    font-family: Arial;
    text-align: center;
}
.formInfosPerso:hover,.formInfosPerso1:hover,.formInfosPerso2:hover,.formInfosPerso3:hover,.formInfosPerso4:hover{
    background:white;
}
.formInfosPerso{
    transform : rotate(10deg);
    position : absolute;
    box-shadow: -3px 3px 5px darkgrey;
    top:100px;
    left:-100px;

    }
.formInfosPerso1{
        transform : rotate(10deg);
    position : absolute;
    box-shadow: 3px -3px 10px grey;
    top:175px;
    left:-100px;

    }
.formInfosPerso2{
        transform : rotate(10deg);
    position : absolute;
    box-shadow: 3px -3px 5px grey;
    top:250px;
    left:-100px;

}.formInfosPerso3{
        transform : rotate(10deg);
    position : absolute;
    box-shadow: 3px -3px 5px grey;
    top:325px;
    left:-100px;

} .formInfosPerso4{
        transform : rotate(10deg);
    position : absolute;
    box-shadow: 3px -3px 5px grey;
    top:400px;
    left:-100px;
}

.returnButton{
    position : absolute;
    top:600px;

}
@keyframes pop {
     from {transform :scale(0,0);}
     to {transform :scale(1,1);}
}
@keyframes depop {
     from {transform :scale(1,1);}
     to {transform :scale(0,0);}
}

@keyframes CMinus130 {
    from {transform:  rotate(-130deg);}
    to {transform: rotate(0deg);}
}
@keyframes CPlus130 {
    from {transform:  rotate(0deg);}
    to {transform: rotate(130deg);}
}
@keyframes iconMenuFadeIn{
    from{ color: rgba(0,0,0,0.0); opacity: 0;}
    to { color: rgba(0,0,0,1); opacity: 1;}
}
@keyframes iconMenuFadeOut{
    from{ color: rgba(0,0,0,1); opacity: 1;}
    to { color: rgba(0,0,0,0.0); opacity: 0;}
}

@keyframes iconHover{
    from{opacity: 0.75;
    color: rgba(0,0,0,0.65);
    transform: scale(1.0,1.0);}
    to{opacity: 1;
    color: rgba(0,0,0,1);
    transform : scale(1.1,1.1);}
}


@keyframes slideIn{
    from{background:white;}
    to{background:white;left:800px;
            transform: rotate(0deg);
            top:50px;}
}
@keyframes slideOut{
    from{background:white; left:800px;
            transform: rotate(0deg);
            top:50px;}
    to{}
}


<?php

    function genereStylePop($dure, $delai){
        $style="
        position: absolute;
        transform: scale(0,0);
        animation-name:pop;
        animation-duration:".$dure."s;
        animation-delay:".$delai."s;
        animation-fill-mode: forwards;
        
        
        
        transform-origin: 50% 50%;

        ";
        return $style;
    }
       function genereStyleDePop($dure, $delai){
        $style="
        position: absolute;
        transform: scale(1.0,1.0);
        animation-name:depop;
        animation-duration:".$dure."s;
        animation-delay:".$delai."s;
        animation-fill-mode: forwards;
        
        
        
        ";
        return $style;
    }
    function genereStyleRotate($dure, $delai){
        $style="
        position: absolute;
            -ms-transform: rotate(130deg);
            transform: rotate(130deg);
            transform-style: preserve-3d;
            animation-name:CMinus130;
            animation-duration:".$dure."s;
            transform-origin: 250px 600px;
            animation-delay:".$delai."s;
            animation-fill-mode: forwards;
        ";
        return $style;
    }
        function genereStyleDeRotate($dure, $delai){
        $style="
            -ms-transform: rotate(0deg);
            transform: rotate(0deg);
            transform-style: preserve-3d;
            animation-name:CPlus130;
            animation-duration:".$dure."s;
            transform-origin: bottom;
            animation-delay:".$delai."s;

            animation-fill-mode: forwards;
        ";
        return $style;
    }
        function genereStyleFade($dure, $delai){
        $style="
            position: absolute;
            opacity: 0;
            color: rgba(0,0,0,0);
            animation-name:iconMenuFadeIn;
            animation-duration:".$dure."s;
            animation-delay:".$delai."s;
            animation-fill-mode: forwards;
            width :800px;
        ";
        return $style;
    }
        function genereStyleDeFade($dure, $delai){
        $style="
         position: absolute;

            animation-name:iconMenuFadeOut;
            animation-duration:".$dure."s;
            animation-delay:".$delai."s;
            animation-fill-mode: forwards;
            pointer-events: none;
            width:800px;
        ";
        return $style;
    }
    function genereStyleFormInfosPersoIn(){
        $style="
            position: absolute;
            animation-name: slideIn;
            animation-duration: 1s;
            animation-delay: 1s;
            animation-fill-mode: forwards;


        ";
        return $style;
    }
    function genereStyleFormInfosPersoOut(){
        $style="
            position: absolute;
            animation-name: slideOut;
            animation-duration: 1s;
            animation-delay: 0s;
            animation-fill-mode: forwards;

        ";
        return $style;
    }
    function genereStyleFormInfosPersoStay(){
        $style="
            left:800px;
            transform: rotate(0deg);
            top:50px;

        ";
        return $style;
    }


?>
</style>