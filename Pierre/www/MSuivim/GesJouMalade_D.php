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
	$FrmAction="GesJouMalade_D.php";
	$FrmQuitter="GesJouMalade_L.php";
	$prg_Javascript='MSuivim/JSGesJouMalade.js';

	$ActionPHP = "";
	$Bdd = 0;
	$Message = "";
	$MessageCode = "";
	
	$IdPersonne = "";
	$IdMal = "";
	$DateDebut = "";
    $DateReprise = "";

    
	if (isset($_POST['ActionPHP'])) {$ActionPHP=$_POST['ActionPHP'];}
	if (($ActionPHP != C_UPDATE)&&($ActionPHP != C_INSERT)){header("location: ".C_SITE_BLANK);}
	if (isset($_POST['Bdd'])) {$Bdd=$_POST['Bdd'];}

	if (isset($_POST['IdItem'])) {$IdItem=$_POST['IdItem'];}
	if (!ctype_digit($IdItem)){header("location: ".C_SITE_BLANK);}
	
	if (isset($_POST['IdPersonne'])) {$IdPersonne = $_POST['IdPersonne'];}
	if (isset($_POST['IdMal'])) {$IdMal = $_POST['IdMal'];}
	if (isset($_POST['DateDebut'])) {$DateDebut = $_POST['DateDebut'];}
	if (isset($_POST['DateReprise'])) {$DateReprise = $_POST['DateReprise'];}
	
	require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."MSuivim/GenJouMalade_Class.php";

	// MAJ
	if ($Bdd == 1){
	    $bOk=1;

	    $cJouMalade= new classJouMalade();
	    $cJouMalade->PutIdPersonne($IdPersonne);
	    $cJouMalade->PutIdMal($IdMal);
	    $cJouMalade->PutDateDebut($DateDebut);
	    $cJouMalade->PutReprise($DateReprise);
	    $cJouMalade->PutMoment($Moment);
	    
		$Message = C_MES_SAVE_NOK;
		if ($cJouMalade->Validate($ActionPHP)) {
			$Message = C_MES_SAVE_OK;
			$IdPersonne=$cJouMalade->GetId();
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
	    $cJouMalade= new classJouMalade();
	    $IdPersonne = $cJouMalade->GetIdPersonne();
	    $IdMal = $cJouMalade->GetIdMal();
	    $DateDebut = $cJouMalade->GetDateDebut();
	    $DateReprise = $cJouMalade->GetDateReprise();
	    $ActionPHP = C_UPDATE;
		unset($cJouMalade);
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
													<?=get_DecodeChaine(C_PERSONNE_NOM).C_CODE_OBLIGATOIRE?>
												</td>
												<td width="100%">
													<?
													echo GET_MakeListeSQL($ps_PersonneListeSelectAll, $IdPersonne, "IdPersonne");
													?>
												</td>
											</tr>
											<tr>
												<td nowrap class="tableau_libellescolonnes cgCodefonce"  >
													<?=get_DecodeChaine(C_MALADIE_NOM).C_CODE_OBLIGATOIRE?>
												</td>
												<td width="100%">
													<?
													echo GET_MakeListeSQL($ps_MaladieListeSelectAll, $IdMal, "IdMal");
													?>
												</td>
											</tr>
											<tr>
												<td nowrap class="tableau_libellescolonnes cgCodefonce"  >
													<?=get_DecodeChaine(C_DATEDEBUT_NOM).C_CODE_OBLIGATOIRE?>
												</td>
												<td width="100%">
													<?=get_InputText('DateDEBUT', C_DATE_LEN, C_DATE_MAX, DateMysqltoFr($DateReprise, C_DATE_FR))?>
												</td>
											</tr>
											<tr>
												<td nowrap class="tableau_libellescolonnes cgCodefonce"  >
													<?=get_DecodeChaine(C_DATEREPRISE_NOM)?>
												</td>
												<td width="100%">
													<?=get_InputText('DateReprise', C_DATE_LEN, C_DATE_MAX, DateMysqltoFr($DateReprise, C_DATE_FR))?>
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
