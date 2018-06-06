<?php
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:	-->

require_once $_SERVER['DOCUMENT_ROOT']."/Pierre/"."Includes/Include.php";
if (GET_Connect()){
	
		$prg_Javascript='MMenu/JSMenu.js';
	?>
	<html>
	<head>

	<title><?=C_APP_TITRE;?></title>
	
	<?require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/Include_Meta.php";?>
	<?require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/Include_JavaScript.php";?>
	<script type='text/javascript' src='<?=C_SITE_REPERTOIRE_JAVASCRIPT?><?=$prg_Javascript?>'></script>
   <script type="text/javascript">
    //<!--Interdire click droit sur le menu
        document.oncontextmenu = new Function("return false");
    //-->
    </script>	
	<title><?=C_APP_TITRE;?></title>
	
	<link href="css/menu.css" type="text/css" rel="stylesheet">
	<link href="css/image.css" type="text/css" rel="stylesheet">
	</head>
	
	<body style="margin: 0px; padding: 0px; background-image: url(Images/fond_bandegrise.gif); background-repeat: repeat-y;">
		<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
			<tbody>
				<tr valign="top">
					<td style="padding-left: 35px;">
						<table border="0" cellpadding="1" cellspacing="0" width="95%" height="100%">
							<tbody>
								<?
								if (GET_Administration()){
									echo "<tr class='TitreMenu'>";
									echo "<td class='TitreMenu'><span id='TitreADM' name='TitreADM'></span></td><td ".C_WITH_ICON."><span id='LienADM' name='LienADM'>".get_boutonOpenMenu('AfficherADM()')."</span></td>\n";
									echo "</tr>";
									echo "<tr>";
									echo "<td colspan='2'>";
									echo "<span id='MenuADM' name='MenuADM'></span>";
									echo "</td>";
									echo "</tr>";
								}

								if (GET_Entrainement()){
								    echo "<tr class='TitreMenu'>";
								    echo "<td class='TitreMenu'><span id='TitreENT' name='TitreENT'></span></td><td ".C_WITH_ICON."><span id='LienENT' name='LienENT'>".get_boutonOpenMenu('AfficherENT()')."</span></td>\n";
								    echo "</tr>";
								    echo "<tr>";
								    echo "<td colspan='2'>";
								    echo "<span id='MenuENT' name='MenuENT'></span>";
								    echo "</td>";
								    echo "</tr>";
								}
								
								if (GET_Joueur()){
									echo "<tr class='TitreMenu'>";
									echo "<td class='TitreMenu'><span id='TitreJOU' name='TitreJOU'></span></td><td ".C_WITH_ICON."><span id='LienJOU' name='LienJOU'>".get_boutonOpenMenu('AfficherJOU()')."</span></td>\n";
									echo "</tr>";
									echo "<tr>";
									echo "<td colspan='2'>";
									echo "<span id='MenuJOU' name='MenuJOU'></span>";
									echo "</td>";
									echo "</tr>";
								}
								
								if (GET_Joueur()){
									echo "<tr class='TitreMenu'>";
									echo "<td class='TitreMenu'><span id='TitreETAT' name='TitreETAT'></span></td><td ".C_WITH_ICON."><span id='LienJOU' name='LienJOU'>".get_boutonOpenMenu('AfficherETAT()')."</span></td>\n";
									echo "</tr>";
									echo "<tr>";
									echo "<td colspan='2'>";
									echo "<span id='MenuETAT' name='MenuETAT'></span>";
									echo "</td>";
									echo "</tr>";
								}								
								
								if (GET_Connect()){
									echo "<tr class='TitreMenu'>";
									echo "<td class='TitreMenu'><span id='TitreMdp' name='TitreMdp'><a href='www/MAdm/GesMdP_D.php' target='contenu' class='TitreMenu' title='Changement de mon mot de passe'>Mot de passe</a></span></td><td ".C_WITH_ICON."></td>\n";
									echo "</tr>";
									echo "<tr>";
									echo "<td colspan='2'></td>";
									echo "</tr>";
								}
								
								echo "<tr>";
								echo "<td>&nbsp;</td>";
								echo "</tr>";
									
								if (GET_Connect()){
									echo "<tr class='TitreMenu'>";
									echo "<td class='TitreMenu'><span id='TitreInitMenu' name='TitreInitMenu'><a href='javascript:InitMenu()' class='TitreMenu' title='Initialiser les items du menu applicatif'>Initialiser le menu</a></span></td><td ".C_WITH_ICON."></td>\n";
									echo "</tr>";
								}
								
								?>
								<tr height="100%"><td>&nbsp;</td></tr>
								<tr class='TitreBas'>
									<td class='TitreBas' colspan='2'><?=GET_ValeurParam(C_ENTREPRISE_NOM);?></td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
	<script type="text/javascript">
		InitMenu();
	</script>	
	</body>
	</html>
<? }?>
