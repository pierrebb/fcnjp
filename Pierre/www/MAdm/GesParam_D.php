<?php
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:	-->

	ob_start();
	require_once $_SERVER['DOCUMENT_ROOT']."/Pierre/"."Includes/Include.php";
	ProfilVerif(C_PROFIL_ADM);

	put_log(__FILE__, 'FILE');
	$Ref = substr(basename($_SERVER['SCRIPT_NAME']),0, strpos(basename($_SERVER['SCRIPT_NAME']), "."));
	$FrmTitre=C_TITRE_PARAMETRE;
	$FrmAction="GesParam_D.php";
	$FrmQuitter="GesParam_L.php";
	$prg_Javascript='MAdm/JSGesParam.js';

	$ActionPHP = "";
	$Bdd = 0;
	$Message = "";
	$MessageCode = "";
	
	$Code = "0";
	$CodeType = "";
	$Libelle = "";
	$TypeParam = "";
	$ValParam = "";

	if (isset($_POST['ActionPHP'])) {$ActionPHP=$_POST['ActionPHP'];}
	if (($ActionPHP != C_UPDATE)&&($ActionPHP != C_INSERT)){header("location: ".C_SITE_BLANK);}
	if (isset($_POST['Bdd'])) {$Bdd=$_POST['Bdd'];}
	
	if (isset($_POST['Code'])) {$Code = $_POST['Code'];}
	if (isset($_POST['ValParam'])) {$ValParam = $_POST['ValParam'];}

	require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."MAdm/GenParam_Class.php";

	// MAJ
	if ($Bdd == 1){
	    $bOk=1;

		$cParam = new classParam();
		$cParam->InitClass($Code);
		$cParam->PutValeur($ValParam);

		$Message = C_MES_SAVE_NOK;
		if ($cParam->Validate($ActionPHP)) {
			$Message = C_MES_SAVE_OK;
			$Code=$cParam->GetCode();
			$ActionPHP = C_UPDATE;
		}
		else{
			$MessageCode=C_MES_CODE_EXIST;
		}
		unset($cParam);
	}
	$Bdd = 0;
	?>

<html>
<head>

<title><?=C_APP_TITRE;?></title>

<?require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/Include_Meta.php";?>
<?require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/Include_Css.php";?>
<?require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/Include_JavaScript.php";?>
<script type='text/javascript' src='<?=C_SITE_REPERTOIRE_JAVASCRIPT?><?=$prg_Javascript?>'></script>

</head>
<?
	if ($Code != ""){
		$cParam= new classParam();
		$cParam->InitClass($Code);
		$Code = $cParam->GetCode();
		$Libelle = $cParam->GetLibelle();
		$ValParam = $cParam->GetValeur();
		$TypeParam = $cParam->GetType();
		$CodeType = $cParam->GetCodeType(); 
		unset($cParam);
	}
?>

<body onload="" style="background-color: rgb(255, 255, 255);">
<form name="frmAdmin" action="GesParam_D.php" method="Post" onsubmit="Javascript:return VerifForm('<?=$TypeParam?>')">
	<input type="hidden" name="Code" id="Code" value="<?echo($Code);?>"/>
	<input type="hidden" name="ActionPHP" id="ActionPHP" value="<?echo($ActionPHP);?>"/>
	<input type="hidden" name="Bdd" id="Bdd" value="0"/>
	
	<?=get_pageHaut($FrmTitre, $Ref);?>
		
	<table border="0" cellpadding="1" cellspacing="0" width="100%">
		<tbody>
			<tr>
				<td colspan=2>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
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
									<table border="0" width="100%">
										<tbody>
											<tr>
												<td class="tableau_libellescolonnes cgCodefonce" nowrap>
													<?=get_DecodeChaine(C_CODE_NOM)?>
												</td>
												<td width="100%">
													<?=$Code?>
												</td>
											</tr>
											<tr>
												<td class="tableau_libellescolonnes cgCodefonce" nowrap>
													<?=get_DecodeChaine(C_NOM_NOM)?>
												</td>
												<td width="100%">
													<?=$Libelle?>
												</td>
											</tr>
											<tr>
												<td class="tableau_libellescolonnes cgCodefonce" nowrap>
													<?=get_DecodeChaine(C_VALEUR_NOM)?>
												</td>
												<td width="100%">
													<input type="text" name="ValParam" id="ValParam" size="<?=C_PARAM_LEN?>" maxlength="<?=C_PARAM_MAX?>" value="<?=$ValParam?>">
													<?=put_MessageCode($MessageCode);?>
												</td>
											</tr>
											<tr>
												<td class="tableau_libellescolonnes cgCodefonce" nowrap>
													<?=get_DecodeChaine(C_TYPE_NOM)?>
												</td>
												<td width="100%">
													<?=$CodeType?>
												</td>
											</tr>
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
					<?=get_TableMessageBas(get_DecodeChaine($Message)) ?>
				</td>
			</tr>

		</tbody>
	</table>
</form>
</body>
</html>
