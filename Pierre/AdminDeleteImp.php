<?php
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:	-->

	require_once $_SERVER['DOCUMENT_ROOT']."/Pierre/"."Includes/Include.php";
	//ProfilVerif(C_PROFIL_CON);
?>
<?
	$Retour = C_SITE_BLANK;
	if (isset($_GET['Retour'])) {$Retour=$_GET['Retour'];}
?>
<html>
<head>
<title><?=C_APP_TITRE;?></title>

<?
echo "<link rel='stylesheet' type='text/css' href='css/Admin.css'>\n";
echo "<link rel='stylesheet' type='text/css' href='css/cg_codeBleuCiel.css'>\n";
echo "<link rel='stylesheet' type='text/css' href='css/cg_commun.css'>\n";
echo "<link rel='stylesheet' type='text/css' href='css/globale.css'>\n";
?>

</head>
<body>
<form>
<table align='center'>
	<tr>
		<td nowrap align="center">&nbsp;</td>
	</tr>
	<tr>
		<td nowrap align="center"><img src='Images/impossible.png' width='30px'></b><?=C_MES_DELETE_IMP?><b><img src='Images/impossible.png' width='30px'></td>
	</tr>
	<tr>
		<td nowrap align="center">&nbsp;</td>
	</tr>
	<tr>
		<td nowrap align="center">
			<?echo get_bouton("Continuer", $Retour, "Continuer", C_BOUTON_WIDTH_90);?>
		</td>
	</tr>
</table>
</form>
</body>
</html>
