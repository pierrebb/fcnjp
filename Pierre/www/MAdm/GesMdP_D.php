<?
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2014-->
//<!-- Modif:	-->

	ob_start();
	require_once $_SERVER['DOCUMENT_ROOT']."/Pierre/"."Includes/Include.php";
	ProfilVerif(C_PROFIL_CON);

	put_log(__FILE__, 'FILE');
	$Ref = substr(basename($_SERVER['SCRIPT_NAME']),0, strpos(basename($_SERVER['SCRIPT_NAME']), "."));
	$FrmTitre="Changer son mot de passe";
	$FrmAction="GesMdP_D.php";
	$FrmQuitter="../../blank.html";
	$prg_Javascript='MAdm/JSGesMdP.js';

	$ActionPHP = "";
	$Bdd = 0;
	$IdActeur = 0;
	$Message = "";
	
	$MessageCodeMdp = "";
	$MdpMD5 = "";

	if (isset($_POST['ActionPHP'])) {$ActionPHP=$_POST['ActionPHP'];}
	if (isset($_POST['Bdd'])) {$Bdd=$_POST['Bdd'];}
	
	if (isset($_SESSION['IDACTEUR'])) {$IdActeur = $_SESSION['IDACTEUR'];}
	
	require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."MAdm/GenActeur_Class.php";

	// MAJ
	if ($Bdd == 1){
		if (isset($_POST['MdpMD5'])) {$MdpMD5=$_POST['MdpMD5'];}

	 	$Mdp = GET_ValeurParam(C_PASSWORD_DEFAUT);
		if ($Mdp == $MdpMD5){
				$Message = C_MES_SAVE_NOK;
				$MessageCodeMdp = C_MES_PASSWORD_NONINITIALISE;
		}else{
	 		$cActeur = new classActeur();
	 		$cActeur->InitClass($IdActeur);
	 		if ($cActeur->MdpVerifLast($MdpMD5) == 1){
		 		$Message = C_MES_SAVE_NOK;
				if ($cActeur->MdpUpdate($MdpMD5, 0)) {
					$Message = C_MES_SAVE_OK;
					$MessageCodeMdp = C_MES_PASSWORD_INITIALISE;
				}else{
					$MessageCodeMdp = C_MES_SAVE_NOK;
				}
				unset($cActeur);
	 		}else{
	 			$Message = C_MES_ATTENTION.str_replace("@MDP_LAST", C_MDP_NBLAST, C_MES_PASSWORD_NONINITIALISE_LAST).C_MES_ATTENTION;
	 		}
	 	}
		unset($Sql);
	}

	$MdpMD5 = "";
	$Bdd = 0;
	
	if ($IdActeur > 0){
		$cActeur = new classActeur();
		$cActeur->InitClass($IdActeur);
		//$Message = C_MES_SAVE_NOK;
		if ( $cActeur->MdpNbJour() > C_MDP_NBDAY){
			$Nb = 0;
			$Nb = $cActeur->MdpNbJour();
			$Message = C_MES_ATTENTION.str_replace("@MDP_DAY", $Nb, C_MES_MDP_A_MODIF).C_MES_ATTENTION;
		}
		unset($cActeur);
		
	}
?>
<html>
<head>

<title><?=C_APP_TITRE;?></title>

<?require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/Include_Meta.php";?>
<?require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/Include_Css.php";?>
<?require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/Include_JavaScript.php";?>
<script type='text/javascript' src='<?=C_SITE_REPERTOIRE?>JavaScript/<?=$prg_Javascript?>'></script>

</head>

<body onload="javascript:InitPassword()" style="background-color: rgb(255, 255, 255);">
<form name="frmAdmin" action="<?=$FrmAction;?>" method="Post" onsubmit="Javascript:return VerifForm()">
	<input type="hidden" name="ActionPHP" id="ActionPHP" value="<?echo($ActionPHP);?>"/>
	<input type="hidden" name="Bdd" id="Bdd" value="0"/>
	<input type="hidden" name="MdpMD5" id="MdpMD5" value=""/>

	<?=get_pageHaut($FrmTitre, $Ref);?>
		
	<table border="0" cellpadding="1" cellspacing="0" width="100%">
		<tbody>
			<tr>
				<td colspan=2>
					<table width=100% border="0" cellspacing="0" cellpadding="0" align="center">
					    <tr class="tableau_navig" align="left">
							<td>
								<?=get_boutonValider()?>
							</td>
							<td>
								<?=get_boutonQuitter("'".$FrmQuitter."'")?>
							</td>
					        <?=get_TableMessageHaut(get_DecodeChaine($Message))?>
					    </tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan=2>
					<span class="CGtxgrismoyen CGblanc" style="font-weight: bold;">
						<?=get_DecodeChaine(C_MES_CHAMP_REMARQUE)?>
					</span>
					<table class="CGcodetresclair" style="border: 0px solid rgb(255, 255, 255);" cellpadding="0" cellspacing="0" width="100%">
						<tbody>
							<tr>
								<td>
									<span class="CGtxcodeclair CGblanc" style="font-weight: bold;">
									</span>
									<table border="0" width=100%>
										<tbody>
											<tr>
												<td class="tableau_libellescolonnes cgCodefonce" nowrap>
													<?=get_DecodeChaine(C_PASSWORD_NOUVEAU_NOM).C_CODE_OBLIGATOIRE?>
												</td>
												<td width="100%" style="font-weight: bold;">
													<?=get_InputPassword('Mdp1', C_PASSWORD_LEN, C_PASSWORD_MAX, '')?>
													<?=$MessageCodeMdp?>
												</td>
											</tr>
											<tr>
												<td class="tableau_libellescolonnes cgCodefonce" nowrap>
													<?=get_DecodeChaine(C_PASSWORD_NOUVEAU_2_NOM).C_CODE_OBLIGATOIRE?>
												</td>
												<td width=100%>
													<?=get_InputPassword('Mdp2', C_PASSWORD_LEN, C_PASSWORD_MAX, '')?>
												</td>
											</tr>
											<tr>
												<td class="tableau_libellescolonnes cgCodefonce" nowrap>
													Remarque
												</td>
											<td>
												Le mot de passe doit contenir au moins 8 caractères et respecter les rêgles suivantes :
												<ul>
													 <li>Au moins une majuscule, </li>
													 <li>Une minuscule,</li>
													 <li>Un chiffre.</li>
												 </ul>
											</td>											
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>

			<tr>
				<td colspan=2>
					<?=get_TableMessageBas($Message) ?>
				</td>
			</tr>

		</tbody>
	</table>
	<script type='text/javascript'>	
		InitPassword()
	</script>
</form>
</body>
</html>