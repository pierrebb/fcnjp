<?php
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:	-->

	ob_start();
	require_once $_SERVER['DOCUMENT_ROOT']."/Pierre/"."Includes/Include.php";
	ProfilVerif(C_PROFIL_ADM);

	put_log(__FILE__, 'FILE');
	$Ref = substr(basename($_SERVER['SCRIPT_NAME']),0, strpos(basename($_SERVER['SCRIPT_NAME']), "."));
	$FrmTitre=C_TITRE_INFOCOLLECTIVE;
	$FrmAction="GesInfCollective_D.php";
	$FrmQuitter="GesInfCollective_L.php";
	$prg_Javascript='MEnt/JSGesInfCollective.js';

	$ActionPHP = "";
	$Bdd = 0;
	$Message = "";
	$MessageCode = "";
	
	$IdItem = 0;
	$IdEquipe = "";
	$DateE = "";
    $Lieu = "";
    $Moment = "";
    $Libelle = "";
    
	if (isset($_POST['ActionPHP'])) {$ActionPHP=$_POST['ActionPHP'];}
	if (($ActionPHP != C_UPDATE)&&($ActionPHP != C_INSERT)){header("location: ".C_SITE_BLANK);}
	if (isset($_POST['Bdd'])) {$Bdd=$_POST['Bdd'];}

	if (isset($_POST['IdItem'])) {$IdItem=$_POST['IdItem'];}
	if (!ctype_digit($IdItem)){header("location: ".C_SITE_BLANK);}
	
	if (isset($_POST['IdEquipe'])) {$IdEquipe = $_POST['IdEquipe'];}
	if (isset($_POST['DateE'])) {$DateE = $_POST['DateE'];}
	if (isset($_POST['Lieu'])) {$Lieu = $_POST['Lieu'];}
	if (isset($_POST['Moment'])) {$Moment = $_POST['Moment'];}
	if (isset($_POST['Libelle'])) {$Libelle = $_POST['Libelle'];}
	
	require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."MEnt/GenInfCollective_Class.php";

	// MAJ
	if ($Bdd == 1){
	    $bOk=1;

	    $cInfCollective= new classInfCollective();
	    $cInfCollective->InitClass($IdItem);
	    $cInfCollective->PutIdEquipe($IdEquipe);
	    $cInfCollective->PutDateE($DateE);
	    $cInfCollective->PutLieu($Lieu);
	    $cInfCollective->PutMoment($Moment);
	    $cInfCollective->PutLibelle($Libelle);
	    
		$Message = C_MES_SAVE_NOK;
		if ($cInfCollective->Validate($ActionPHP)) {
			$Message = C_MES_SAVE_OK;
			$IdItem=$cInfCollective->GetId();
			$ActionPHP = C_UPDATE;
		}
		else{
		    $Message=C_MES_SAVE_NOK;
		}
		
		unset($cEquipe);
	}
	$Bdd = 0;
?>

<html>
<head>

<title><?=C_APP_TITRE;?></title>

<?require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/Include_Meta.php";?>
<?require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/Include_Css.php";?>
<?require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/Include_JavaScript.php";?>
<script type='text/javascript' src='<?=C_SITE_REPERTOIRE?>JavaScript/<?=$prg_Javascript?>'></script>

</head>
<?
	if (($IdItem > 0) && ($ActionPHP==C_UPDATE) && ($Bdd==0) && ($MessageCode=="")){
	    $cInfCollective= new classInfCollective();
	    $cInfCollective->InitClass($IdItem);
	    $IdEquipe = $cInfCollective->GetIdEquipe();
	    $DateE = $cInfCollective->GetDateE();
	    $Lieu = $cInfCollective->GetLieu();
	    $Moment = $cInfCollective->GetMoment();
	    $Libelle = $cInfCollective->GetLibelle();
	    $ActionPHP = C_UPDATE;
		unset($cInfCollective);
	}
?>

<body onload="" style="background-color: rgb(255, 255, 255);">
<form name="frmAdmin" action="<?=$FrmAction;?>" method="Post" onsubmit="Javascript:return VerifForm()">
	<input type="hidden" name="ActionPHP" id="ActionPHP" value="<?echo($ActionPHP);?>"/>
	<input type="hidden" name="Bdd" id="Bdd" value="0"/>
	<input type="hidden" name="IdItem" id="IdItem" value="<?echo($IdItem);?>"/>
	
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
							<?if($IdItem!=0){?>
							<td>
								<?=get_boutonInsert()?>
							</td>
							<?}?>
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
												<td nowrap class="tableau_libellescolonnes cgCodefonce"  >
													<?=get_DecodeChaine(C_EQUIPE_NOM).C_CODE_OBLIGATOIRE?>
												</td>
												<td width="100%">
													<?
													echo GET_MakeListeSQL($ps_EquipeListeSelectAll, $IdEquipe, "IdEquipe");
													?>
												</td>
											</tr>
											<tr>
												<td nowrap class="tableau_libellescolonnes cgCodefonce"  >
													<?=get_DecodeChaine(C_DATE_NOM).C_CODE_OBLIGATOIRE?>
												</td>
												<td width="100%">
													<?=get_InputText('DateE', C_DATE_LEN, C_DATE_MAX, DateMysqltoFr($DateE, C_DATE_FR))?>
												</td>
											</tr>
											<tr>
												<td nowrap class="tableau_libellescolonnes cgCodefonce"  >
													<?=get_DecodeChaine(C_LIEU_NOM).C_CODE_OBLIGATOIRE?>
												</td>
												<td width="100%">
													<?=get_InputText('Lieu', C_LIEU_LEN, C_LIEU_MAX, $Lieu)?>
												</td>
											</tr
											<tr>
												<td nowrap class="tableau_libellescolonnes cgCodefonce"  >
													<?=get_DecodeChaine(C_MOMENT_NOM).C_CODE_OBLIGATOIRE?>
												</td>
												<td width="100%">
													<?=GET_Moment('Moment', $Moment)?>
												</td>
											</tr>
											<tr>
												<td nowrap class="tableau_libellescolonnes cgCodefonce"  >
													<?=get_DecodeChaine(C_LIBELLE_NOM)?>
												</td>
												<td width="100%">
													<?=get_InputTextArea('Libelle',3, 80, $Libelle)?>
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
