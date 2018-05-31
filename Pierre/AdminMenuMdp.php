<?php
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:	-->

	require_once $_SERVER['DOCUMENT_ROOT']."/Pierre/"."Includes/Include.php";
?>
<html>
<head>

<title><?=C_APP_TITRE;?></title>

<?require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/Include_Meta.php";?>
<?require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/Include_JavaScript.php";?>

<title>Gestion Sportive</title>

<link href="css/menu.css" type="text/css" rel="stylesheet">

<script type="text/javascript">
</script>
</head>

<body style="margin: 0px; padding: 0px; background-image: url(Images/fond_bandegrise.gif); background-repeat: repeat-y;">
	<table border="0" cellpadding="4" cellspacing="0" width="100%" height="100%">
		<tbody>
			<tr valign="top">
				<td style="padding-left: 35px;">
					<table border="0" width="95%" height="100%">
						<tbody>
							<?
							echo "<tr class='TitreMenu'>";
							echo "<td class='TitreMenu'>Mot de passe</td>";
							echo "<tr>";
							echo "<td><a href='www/MAdm/GesMdP_D.php' target='contenu'>Changer mon mot de passe</a></td>";
							echo "</tr>";
								
							?>
							<tr height="100%"><td>&nbsp;</td></tr>
							<tr class='TitreBas'>
								<td class='TitreBas'><?=GET_ValeurParam(C_ENTREPRISE_NOM);?></td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>
