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
	$FrmQuitter="GesPersonne_L.php";
	$prg_Javascript='MAdm/JSGesPersonne.js';
	
	$ActionPHP = "";
	$IdItem = 0;

	if (isset($_POST['ActionPHP'])) {$ActionPHP=$_POST['ActionPHP'];}
	if (isset($_POST['IdItem'])) {$IdItem=$_POST['IdItem'];}
	if (!ctype_digit((string) $IdItem)){header("location: ".C_SITE_BLANK);}

	require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."MAdm/GenEquipe_Class.php";
	require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."MAdm/GenProfil_Class.php";
	require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."MAdm/GenStatut_Class.php";
	require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."MAdm/GenPoste_Class.php";
	
	
	if ($ActionPHP == C_DELETE && $IdItem != 0){
	    require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."MAdm/GenPersonne_Class.php";
		
		$cPersonne= new classPersonne();
		$cPersonne->InitClass($IdItem);
		$Status = $cPersonne->Delete();
		unset($cPersonne);
		if ($Status != 1) {
			header("location: ".C_SITE_DELETE_IMPOSSIBLE."?Retour=".C_SITE_REPERTOIRE."www/MAdm/".$FrmQuitter);
		}
		$ActionPHP = "";
	}
?>
<html>
<head>

<title><?=C_APP_TITRE;?></title>

<?require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/Include_Meta.php";?>
<?require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/Include_Css.php";?>
<?require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/Include_JavaScript.php";?>
<?require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/Include_JQuery.php";?>
<script type='text/javascript' src='<?=C_SITE_REPERTOIRE?>JavaScript/<?=$prg_Javascript?>'></script>
<script>$(function(){$("table").stupidtable();});</script>
	   
<body onload="" style="background-color: rgb(255, 255, 255);">
<form name="frmAdmin" method="POST">
	<input type="hidden" name="ActionPHP" id="ActionPHP" value=""/>
	<input type="hidden" name="IdItem" id="IdItem" value=""/>
	
	<?=get_pageHaut($FrmTitre, $Ref);?>
	<?=get_TableDataHead("");?>
	    <thead>
			<tr class="tableau_libellescolonnes cgCodefonce">
				<th <?= C_WITH_ICON?>><?=get_boutonInsert()?></th>
				<th <?= C_WITH_ICON?>></th>
				<th data-sort="string" nowrap><?=get_DecodeChaine(C_PROFIL_NOM)?></th>
				<th data-sort="string" nowrap><?=get_DecodeChaine(C_STATUT_NOM)?></th>
				<th data-sort="string" nowrap><?=get_DecodeChaine(C_POSTE_NOM)?></th>
				<th data-sort="string" nowrap><?=get_DecodeChaine(C_EQUIPE_NOM)?></th>
				<th data-sort="string" nowrap><?=get_DecodeChaine(C_NOM_NOM)?></th>
				<th data-sort="string" nowrap><?=get_DecodeChaine(C_PRENOM_NOM)?></th>
				<th data-sort="string" nowrap><?=get_DecodeChaine(C_TELEPHONE_NOM)?></th>
				<th data-sort="string" nowrap><?=get_DecodeChaine(C_COURRIEL_NOM)?></th>
				<th data-sort="string" nowrap><?=get_DecodeChaine(C_ADRESSE_NOM)?></th>
				<th data-sort="string" nowrap><?=get_DecodeChaine(C_NAISSANCE_NOM)?></th>
				<th data-sort="string" nowrap><?=get_DecodeChaine(C_ACTIF_NOM)?></th>
			</tr>
			
			<?=get_TableDataOutils("");?>
			<?=get_TableDataDeco("");?>
	    </thead>
		<tbody>
			<?
				$ILigne=0;

				$Sql= new classSQL();
				$TabSql=$Sql->SelectSQL($ps_PersonneSelectAll, C_LOG_NOLOG);
				unset($Sql);
				$NbL = count ($TabSql);
				
				if ($TabSql[0][0]!=null){
					for($i=0; $i<$NbL; $i++){
						$IdItem = "";
						$IdProfil = "";
						$NomProfil = "";
						$IdStatut = "";
						$NomStatut = "";
						$IdPoste = "";
						$NomPoste = "";
						$IdEquipe = "";
						$NomEquipe = "";
						$Nom = "";
						$Prenom="";
						$Telephone="";
						$Courriel="";
						$Adresse = "";
						$Naissance = "";
						$Actif = "";
		
						$j=0;
	
						$IdItem=$TabSql[$i][$j++];
						$IdProfil=$TabSql[$i][$j++];
						$IdStatut=$TabSql[$i][$j++];
						$IdPoste=$TabSql[$i][$j++];
						$IdEquipe=$TabSql[$i][$j++];
						$Nom=$TabSql[$i][$j++];
						$Prenom=$TabSql[$i][$j++];
						$Telephone=$TabSql[$i][$j++];
						$Courriel=$TabSql[$i][$j++];
						$Adresse=$TabSql[$i][$j++];
						$Naissance=$TabSql[$i][$j++];
						$Actif=$TabSql[$i][$j++];
						
						$cProfil= new classProfil();
						$cProfil->InitClass($IdProfil);
						$NomProfil = $cProfil->GetCode();
						unset($cProfil);
						
						$cStatut= new classStatut();
						$cStatut->InitClass($IdStatut);
						$NomStatut = $cStatut->GetCode();
						unset($cStatut);
						
						$cPoste= new classPoste();
						$cPoste->InitClass($IdPoste);
						$NomPoste = $cPoste->GetCode();
						unset($cPoste);
						
						$cEquipe= new classEquipe();
						$cEquipe->InitClass($IdEquipe);
						$NomEquipe = $cEquipe->GetCode();
						unset($cEquipe);
																							
						get_TrColor($ILigne++);
						echo "<td nowrap>";
						echo get_boutonSelect('Select('.$IdItem.')');
						echo "</td>";
						echo "<td nowrap>";
						echo get_boutonDelete('Delete('.$IdItem.')');
						echo "</td>";
						echo "<td nowrap>$NomProfil</td>";
						echo "<td nowrap>$NomStatut</td>";
						echo "<td nowrap>$NomPoste</td>";
						echo "<td nowrap>$NomEquipe</td>";
						echo "<td nowrap>$Nom</td>";
						echo "<td nowrap>$Prenom</td>";
						echo "<td nowrap>$Telephone</td>";
						echo "<td nowrap>$Courriel</td>";
						echo "<td nowrap>$Adresse</td>";
						echo "<td nowrap>$Naissance</td>";
						echo "<td nowrap>$Actif</td>";
						echo "</tr>";
					}
				}
			?>
			</tbody>
		<?=get_FootTable(11);?>		
	</table>
	<?=get_FootPageListe();?>	
</form>
</body>
</html>
