<?php
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:	-->

	require_once $_SERVER['DOCUMENT_ROOT']."/Pierre/"."Includes/Include.php";
	ProfilVerif(C_PROFIL_CON);
?>
<?
	$Retour = "javascript:fermer()";
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

<script language="JavaScript"> 
function fermer() { 
	opener=self; 
	self.close(); 
} 
</script> 

</head>
<body>
	<table align='center'>
		<tr>
			<td nowrap align="center">&nbsp;</td>
		</tr>
		<tr>
			<td nowrap align="center"><img src='Images/attention.png' width='30px'><b>&nbsp;!!!&nbsp;</b><?=C_MES_CODE_NEXISTPAS?><b>&nbsp;!!!&nbsp;</b><img src='Images/attention.png' width='30px'></td>
		</tr>
		<tr>
			<td nowrap align="center">&nbsp;</td>
		</tr>
		<tr>
			<td nowrap align="center">
				<?
					echo get_bouton("Continuer", $Retour, "Continuer", C_BOUTON_WIDTH_90)
				?>
			</td>
		</tr>
	</table>
</body>
</html>
