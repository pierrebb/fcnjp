<?php
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:	-->

	ob_start();
	require_once $_SERVER['DOCUMENT_ROOT']."/Pierre/"."Includes/Include.php";
	ProfilVerif(C_PROFIL_ADM);

	put_log(__FILE__, 'FILE');
	$Ref = substr(basename($_SERVER['SCRIPT_NAME']),0, strpos(basename($_SERVER['SCRIPT_NAME']), "."));
	$FrmTitre=C_TITRE_INFOPERSONNE;
	$FrmAction="GesPersonne_D.php";
	$FrmQuitter="GesPersonne_L.php";
	$prg_Javascript='MEnt/JSGesPersonne.js';

	$ActionPHP = "";
	$Bdd = 0;
	$Message = "";
	$MessageCode = "";
	
	$IdItem = 0;
	$IdProfil = "";
	$IdStatut = "";
    $IdPoste = "";
    $IdEquipe = "";
    $Nom = "";
    $Prenom = "";
	$Telephone = "";
    $Courriel = "";
    $Adresse = "";
    $Naissance = "";
	$Actif = "";
	
	if (isset($_POST['ActionPHP'])) {$ActionPHP=$_POST['ActionPHP'];}
	if (($ActionPHP != C_UPDATE)&&($ActionPHP != C_INSERT)){header("location: ".C_SITE_BLANK);}
	if (isset($_POST['Bdd'])) {$Bdd=$_POST['Bdd'];}

	if (isset($_POST['IdItem'])) {$IdItem=$_POST['IdItem'];}
	if (!ctype_digit($IdItem)){header("location: ".C_SITE_BLANK);}
	
	if (isset($_POST['IdProfil'])) {$IdProfil = $_POST['IdProfil'];}
	if (isset($_POST['IdStatut'])) {$IdStatut = $_POST['IdStatut'];}
	if (isset($_POST['IdPoste'])) {$IdPoste= $_POST['IdPoste'];}
	if (isset($_POST['IdEquipe'])) {$IdEquipe = $_POST['IdEquipe'];}
	if (isset($_POST['Nom'])) {$Nom = $_POST['Nom'];}
	if (isset($_POST['Prenom'])) {$Prenom = $_POST['Prenom'];}
	if (isset($_POST['Telephone'])) {$Telephone = $_POST['Telephone'];}
	if (isset($_POST['Courriel'])) {$Courriel = $_POST['Courriel'];}
	if (isset($_POST['Adresse'])) {$Adresse = $_POST['Adresse'];}
	if (isset($_POST['Naissance'])) {$Naissance = $_POST['Naissance'];}	
	if (isset($_POST['Actif'])) {$Actif = $_POST['Actif'];}
	
	
	require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."MEnt/GenPersonne_Class.php";

	// MAJ
	if ($Bdd == 1){
	    $bOk=1;

	    $cPersonne= new classPersonne();
	    $cPersonne->InitClass($IdItem);
	    $cPersonne->PutIdProfil($IdProfil);
	    $cPersonne->PutIdStatut($IdStatut);
	    $cPersonne->PutIdPoste($IdPoste);
	    $cPersonne->PutIdEquipe($IdEquipe);
	    $cPersonne->PutNom($Nom);
	    $cPersonne->PutPrenom($Prenom);
	    $cPersonne->PutTelephone($Telephone);
	    $cPersonne->PutCourriel($Courriel);
	    $cPersonne->PutAdresse($Adresse);
	    $cPersonne->PutNaissance($Naissance);
		$cPersonne->PutActif($Actif);
		
		$Message = C_MES_SAVE_NOK;
		if ($cPersonne->Validate($ActionPHP)) {
			$Message = C_MES_SAVE_OK;
			$IdItem=$cPersonne->GetId();
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
	    $cPersonne= new classPersonne();
	    $cPersonne->InitClass($IdItem);
	    $IdProfil = $cPersonne->GetIdProfil();
	    $IdStatut = $cPersonne->GetIdStatut();
	    $IdPoste = $cPersonne->GetIdPoste();
	    $IdEquipe = $cPersonne->GetIdEquipe();
	    $Nom = $cPersonne->GetNom();
		$Prenom = $cPersonne->GetPrenom();
	    $Telephone = $cPersonne->GetTelephone();
	    $Courriel = $cPersonne->GetCourriel();
	    $Adresse = $cPersonne->GetAdresse();
	    $Naissance = $cPersonne->GetNaissance();
		$Actif = $cPersonne->GetActif();
	    $ActionPHP = C_UPDATE;
		unset($cPersonne);
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
													<?=get_DecodeChaine(C_PROFIL_NOM).C_CODE_OBLIGATOIRE?>
												</td>
												<td width="100%">
													<?
													echo GET_MakeListeSQL($ps_ProfilListeSelectAll, $IdProfil, "IdProfil");
													?>
												</td>
											</tr>
											<tr>
												<td nowrap class="tableau_libellescolonnes cgCodefonce"  >
													<?=get_DecodeChaine(C_STATUT_NOM).C_CODE_OBLIGATOIRE?>
												</td>
												<td width="100%">
													<?
													echo GET_MakeListeSQL($ps_StatutListeSelectAll, $IdStatut, "IdStatut");
													?>
												</td>
											</tr>
											<tr>
												<td nowrap class="tableau_libellescolonnes cgCodefonce"  >
													<?=get_DecodeChaine(C_POSTE_NOM).C_CODE_OBLIGATOIRE?>
												</td>
												<td width="100%">
													<?
													echo GET_MakeListeSQL($ps_PosteListeSelectAll, $IdPoste, "IdPoste");
													?>
												</td>
											</tr>
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
													<?=get_DecodeChaine(C_NOM_NOM).C_CODE_OBLIGATOIRE?>
												</td>
												<td width="100%">
													<?=get_InputText('Nom', C_NOM_LEN, C_NOM_MAX, $Nom)?>
												</td>
											</tr
											<tr>
												<td nowrap class="tableau_libellescolonnes cgCodefonce"  >
													<?=get_DecodeChaine(C_PRENOM_NOM).C_CODE_OBLIGATOIRE?>
												</td>
												<td width="100%">
													<?=get_InputText('Prenom', C_PRENOM_LEN, C_PRENOM_MAX, $Prenom)?>
												</td>
											</tr
											<tr>
												<td nowrap class="tableau_libellescolonnes cgCodefonce"  >
													<?=get_DecodeChaine(C_TELEPHONE_NOM).C_CODE_OBLIGATOIRE?>
												</td>
												<td width="100%">
													<?=get_InputText('Telephone', C_TELEPHONE_LEN, C_TELEPHONE_MAX, $Telephone)?>
												</td>
											</tr
											<tr>
												<td nowrap class="tableau_libellescolonnes cgCodefonce"  >
													<?=get_DecodeChaine(C_COURRIEL_NOM).C_CODE_OBLIGATOIRE?>
												</td>
												<td width="100%">
													<?=get_InputText('Courriel', C_COURRIEL_LEN, C_COURRIEL_MAX, $Courriel)?>
												</td>
											</tr	
											<tr>
												<td nowrap class="tableau_libellescolonnes cgCodefonce"  >
													<?=get_DecodeChaine(C_ADRESSE_NOM).C_CODE_OBLIGATOIRE?>
												</td>
												<td width="100%">
													<?=get_InputText('Adresse', C_ADRESSE_LEN, C_ADRESSE_MAX, $Adresse)?>
												</td>
											</tr
											<tr>
												<td nowrap class="tableau_libellescolonnes cgCodefonce"  >
													<?=get_DecodeChaine(C_NAISSANCE_NOM).C_CODE_OBLIGATOIRE?>
												</td>
												<td width="100%">
													<?=get_InputText('Naissance', C_NAISSANCE_LEN, C_NAISSANCE_MAX, DateMysqltoFr($Naissance, C_DATE_FR))?>
												</td>
											</tr		
											<tr>
												<td nowrap class="tableau_libellescolonnes cgCodefonce"  >
													<?=get_DecodeChaine(C_ACTIF_NOM).C_CODE_OBLIGATOIRE?>
												</td>
												<td width="100%">
													<?=GET_ListeOuiNon('Actif',$Actif,'onchange=javascript:getModifTrue()');?>
												</td>
											</tr>
											
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
