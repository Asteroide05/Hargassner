<?php	
declare(strict_types=1);

$lang = $_GET['langID'] ?? 'en';
echo $_GET['langID'];
include('locale/' . $lang . '.php');

echo title;
	require("header.php");
    include("dessin.inc.php");
    include("graph_silo.inc.php"); 
    include("graph_live.inc.php");
    include("footer.php");



?>

<!-- ************************************************************************
*** Supervision chaudiere Hargassner avec touchtronic
*** Auteur : Jahislove
*** licence GPL-3.0-or-later
************************************************************************
*** version php 7.x
*** le serveur php doit etre lancé avec les extensions mysqli, zip et openssl

/ -->


    
