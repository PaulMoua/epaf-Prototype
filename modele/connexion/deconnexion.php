

Au revoir !
<?php
/* Se déconnecte de la session et renvoie à la page d'accueil !*/
unset($_SESSION['id']);
session_destroy();
header('Refresh: 2;url=index.php');

?>

