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
	$FrmQuitter="GesInfColective_L.php";
	$prg_Javascript='MEnt/JSGesInfCollective.js';
	
	$ActionPHP = "";
	$IdItem = 0;

	if (isset($_POST['ActionPHP'])) {$ActionPHP=$_POST['ActionPHP'];}
	if (isset($_POST['IdItem'])) {$IdItem=$_POST['IdItem'];}
	if (!ctype_digit((string) $IdItem)){header("location: ".C_SITE_BLANK);}

	require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."MAdm/GenEquipe_Class.php";
	
	if ($ActionPHP == C_DELETE && $IdItem != 0){
	    require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."MEnt/GenInfCollective_Class.php";
		
		$cInfCollective= new classInfCollective();
		$cInfCollective->InitClass($IdItem);
		$Status = $cInfCollective->Delete();
		unset($cInfCollective);
		if ($Status != 1) {
			header("location: ".C_SITE_DELETE_IMPOSSIBLE."?Retour=".C_SITE_REPERTOIRE."www/MEnt/".$FrmQuitter);
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

</head>

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
				<th data-sort="string" nowrap><?=get_DecodeChaine(C_EQUIPE_NOM)?></th>
				<th data-sort="string" nowrap><?=get_DecodeChaine(C_DATE_NOM)?></th>
				<th data-sort="string" nowrap><?=get_DecodeChaine(C_LIEU_NOM)?></th>
				<th data-sort="string" nowrap><?=get_DecodeChaine(C_MOMENT_NOM)?></th>
				<th data-sort="string" nowrap><?=get_DecodeChaine(C_LIBELLE_NOM)?></th>
			</tr>
			
			<?=get_TableDataOutils("");?>
			<?=get_TableDataDeco("");?>
	    </thead>
		<tbody>
			<?
				$ILigne=0;

				$Sql= new classSQL();
				$TabSql=$Sql->SelectSQL($ps_InfCollectiveSelectAll, C_LOG_NOLOG);
				unset($Sql);
				$NbL = count ($TabSql);
				
				if ($TabSql[0][0]!=null){
					for($i=0; $i<$NbL; $i++){
						$IdItem = "";
						$IdEquipe = "";
						$NomEquipe = "";
						$DateEnt = "";
						$Lieux="";
						$Moment="";
						$Libelle="";
						
						$j=0;
	
						$IdItem=$TabSql[$i][$j++];
						$IdEquipe=$TabSql[$i][$j++];
						$DateEnt=$TabSql[$i][$j++];
						$Lieux=$TabSql[$i][$j++];
						$Moment=$TabSql[$i][$j++];
						$Libelle=$TabSql[$i][$j++];
						
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
						echo "<td nowrap>$NomEquipe</td>";
						echo "<td nowrap>".DateMysqltoFr($DateEnt, C_DATE_FR)."</td>";
						echo "<td nowrap>$Lieux</td>";
						echo "<td nowrap>$Moment</td>";
						echo "<td nowrap>$Libelle</td>";
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
