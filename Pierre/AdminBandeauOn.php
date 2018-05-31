<?php
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:	-->

require_once $_SERVER['DOCUMENT_ROOT']."/Pierre/"."Includes/Include.php";
if (GET_Connect()){
	?>
	
	<?
	$IdActeur = "";
	$Nom ="";
	$Prenom ="";
	$Administration = "";
	$Client = "";
	$Article = "";
	$Dossier = "";
	$Horaire = "";
	$TabRDV = null;
	
	if(isset($_SESSION['IDACTEUR'])) {$IdActeur=$_SESSION['IDACTEUR'];}
	if(isset($_SESSION['NOM'])) {$Nom=$_SESSION['NOM'];}
	if(isset($_SESSION['PRENOM'])) {$Prenom=$_SESSION['PRENOM'];}
	if(isset($_SESSION['ADMINISTRATION'])) {$Administration=ProfilNom($_SESSION['ADMINISTRATION']);}
	if(isset($_SESSION['CLIENT'])) {$Client=ProfilNom($_SESSION['CLIENT']);}
	if(isset($_SESSION['ARTICLE'])) {$Article=ProfilNom($_SESSION['ARTICLE']);}
	if(isset($_SESSION['DOSSIER'])) {$Dossier=ProfilNom($_SESSION['DOSSIER']);}
	if(isset($_SESSION['HORAIRE'])) {$Horaire=ProfilNom($_SESSION['HORAIRE']);}
	
	$Connect = $IdActeur == 0 ? get_HTMLentities("Se connecter" ) : get_HTMLentities("Se déconnecter" );
	
	// Page de demarrage
	$ValParam = "";
	$ValParam = GET_ValeurParam(C_PAGE_ACCUEIL);
	
	?>
	<html>
	<head>
	<title><?=C_APP_TITRE;?></title>
	
	<?require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/Include_Meta.php";?>
	<?require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/Include_CssBandeau.php";?>
	<?require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/Include_JavaScript.php";?>
	
	<style>
	
	.bandeaulogo {
		background-image: url('Images/Logo/logo_gen.gif');
		background-position: top right;
		background-repeat: no-repeat;
		background-color: transparent;
	}
	
	.bandeaulogomini {
		background-image: url('application/Images/Logo/logo_gen_mini.gif');
		background-position: top right;
		background-repeat: no-repeat;
		background-color: transparent;
	}
	</style>
	
	   <script type="text/javascript">
    //<!--Interdire click droit sur le menu
        document.oncontextmenu = new Function("return false");
    //-->
    </script>	
    
	<script type="text/javascript">
	function Aide(strUrl, strNom) {
		msgWindow=window.open(strUrl, strNom, 'width=700,height=600,scrollbars=yes');
	}
	
	function APropos(theURL,xx,yy) {
		winAPropos = window.open(theURL,"apropos","status=0,toolbar=0,location=0,menu=0,scrollbars=0,width="+xx+",height="+yy);
		winAPropos.focus();
	}

	</script>
		
	</script>
	</head>
	
	<body>
	<form name="" method="Post">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr valign="top">
			<td width="100" align="right" class="bandeaulogo"><img src="Images/spacer.gif" width="80" height="60" alt=""></td>
			<td>
				<table width="100%" cellspacing="0" cellpadding="0" border="0">
					<tr class="CGcodefonce">
						<td height="30" class="bandeautitre"><?=get_HTMLentities(C_APP_TITRE_LOGIN);?></td>
						<td align="right">
							<table border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td class="bandeauoutils">
										<a href="javascript:APropos('AdminAPropos.php',300,320)">A propos</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td height="22" colspan="2" class="CGnoir">
							<table border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td class="bandeauchemin"><a href="<?=$ValParam?>" target="contenu">Accueil</a></td>
									<td class="bandeauchemin">&nbsp;</td>
									<td class="bandeauchemin" width='100%' align='Center'><span id='sNextRdv' name='sNextRdv'></span></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center" valign="top" class="bandeauidentite">
							<strong>
								<?
									echo get_HTMLentities($Prenom );
									echo "&nbsp;";
									echo get_HTMLentities($Nom );
									echo "&nbsp;";
									echo get_HTMLentities($Administration );
									echo get_HTMLentities($Client );
									echo get_HTMLentities($Article );
									echo get_HTMLentities($Dossier );
									echo get_HTMLentities($Horaire );
								?>
							</strong>
							<?=C_ESPACE?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	
	<table width="100%" cellspacing="0" cellpadding="0" border="0">
		<tr valign="middle" align="right">
			<td width="254" name="PLUS_OU_MOINS" id="PLUS_OU_MOINS" >
				<a href="javascript:ComposantMenu_HideMenu()" target="_top"><img src="<?=C_SITE_REPERTOIRE?>Images/bt_ajust_frame_plus.gif" alt="" width="65" height="23" border="0"></a></td>
			<td class="bandeaubas"><a href="javascript:window.parent.location.href='authentification.php'"><?=$Connect?></a></td>
		</tr>
	</table>
	
	</form>
	</body>
	</html>
<?}?>