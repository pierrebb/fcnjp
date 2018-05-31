<?php
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:
// 
	require_once $_SERVER['DOCUMENT_ROOT']."/Pierre/"."Includes/Include.php";
?>

<?
	// Page de demarrage
	$ValParam = "";
	$ValParam = GET_ValeurParam(C_PAGE_ACCUEIL);
?>

<html>
<head>
	<title>Gestion Sportive</title>
	<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'/>
</head>
<frameset cols="220,*" framespacing="0" frameborder="0" name="second" id="second">
		<frame src="AdminMenuOn.php" name="menu" id="menu" frameborder="0" scrolling="Auto" noresize marginwidth="0" marginheight="0">
		<frame src='<?=$ValParam?>' name='contenu' id='contenu' frameborder='0' scrolling='Auto' noresize marginwidth='0' marginheight='0'>
</frameset><noframes></noframes>
</html>