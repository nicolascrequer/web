<?php
// On supprime ce qui a déjà été écrit dans le buffer de sortie
// car on va afficher une page "indépendente"
ob_clean();

// On affiche la page de mot de passe perdu
$echec = !empty($_GET['echec']) ? (bool) $_GET['echec'] : false;
$smarty->assign('echec', $echec);
$smarty->display('mot_de_passe_perdu.html');

// On s'arrête là pour ne pas afficher le pied de page
exit;
?>