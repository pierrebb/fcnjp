<?php
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:	--> Johan Le Galliot
// DATE Mai 2010

	require_once $_SERVER['DOCUMENT_ROOT']."/Pierre/"."Includes/Include.php";
	ProfilVerif(C_PROFIL_CON);
?>

<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/globale.css">
	<link rel="stylesheet" type="text/css" href="css/cg_commun.css">
	<link rel="stylesheet" type="text/css" href="css/cg_codeBleuCiel.css">
	<link rel="icon" type="image/png" href="Images/favicon.png"/>
<script type="text/javascript">
</script>
</head>
<body class="CGgristresclair" leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" onLoad="">

<table width="300px" height="320px" border="0" cellspacing="0" cellpadding="1" align="center" class="CGgristresclair">
	<tr class="CGcodefonce">
		<td nowrap><strong>A Propos</strong></td>
		<td align="right"><img src="Images/Logo/LogoELG.png" border=0 alt="" width='100px'></td>
		<td>&nbsp;</td>
		</tr>
	<tr class="CGcodefonce">
		<td></td>
		<td align="right"><a href='http://www.legalliot.fr' target='_blank'>www.legalliot.fr</a></td>
		<td>&nbsp;</td>
	</tr>
	<tr valign="top">
		<td colspan="2" align="right">
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td width="100%">
		<p><strong><?=C_APP_TITRE?></strong></p>
		<p>Version <?=C_APP_VERSION?><br>du <?=C_APP_DATE_VERSION?></p>
		<p class="nota">
			Version PHP du serveur : <?=phpversion();?>
			<br>
			Version Bdd du serveur : 
    		<?
        		$Sql= new ClassSQL();
        		echo $Sql->VersionSql();
        		unset($Sql);
        	?>
        </p>		
		<p class="nota">Ce logiciel est prot&eacute;g&eacute; par la loi relative au droit d'auteur et par les conventions internationales.
		Toutes personne ne respectant pas ces dispositions se rendra coupable du d&eacute;lit de contrefa&ccedil;on et sera passible des sanctions p&eacute;nales pr&eacute;vues par la loi.</p>
		</td>
		<td>&nbsp;</td>
		</tr>
	<tr>
		<td colspan="2" align="right">
				<a href="javascript:window.close();">
					<img name="BtFermer" src="icono/Images/IcoAnnuler.gif" border=0 alt="Fermer">
				</a>
		</td>
		<td>&nbsp;</td>
	</tr>
</table>

</body>
</html>