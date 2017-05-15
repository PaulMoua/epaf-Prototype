<?php
$_SESSION['RobinFace']->setFaceDialogue("Bonjour ! Bienvenue sur l'espace Client de l'<strong>EPAF</strong> ! Puis-je vous demander de vous identifier ?");
?>

<div class='contentPos'>
  <div class='connexionPanel'> 
 
  <div <?=$toPop?> >
   
    <div class='RobinBox' style='position:relative'>
      <p>Connectez-vous avec votre login et votre password !</p>
      <form action="index.php?" method="POST">
        <input type="hidden" name="connexion">
        First name:<br>
        <input type="text" name="log" placeholder="LOGIN">
        <br>
        Last name:<br>
        <input type="text" name="pass" placeholder="PASSWORD">
        <br><br>
        <?php
          /*Formulaire pour se connecter*/
          if (isset($_POST['falseLog'])){
          	//echo 'mauvais login ou password';
          }
        ?>
        <input type="submit" value="Connexion">
      </form>

    </div>
    <div class='triangle-left'></div>
    <div class='baton'></div>

</div>
</div>

