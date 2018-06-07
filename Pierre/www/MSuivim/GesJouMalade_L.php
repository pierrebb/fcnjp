<?php
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:	-->

	ob_start();
	require_once $_SERVER['DOCUMENT_ROOT']."/Pierre/"."Includes/Include.php";
	ProfilVerif(C_PROFIL_ADM);

	put_log(__FILE__, 'FILE');
	$Ref = substr(basename($_SERVER['SCRIPT_NAME']),0, strpos(basename($_SERVER['SCRIPT_NAME']), "."));
	$FrmTitre=C_TITRE_JoueurMalade;
	$FrmQuitter="GesJouMalade_L.php";
	$prg_Javascript='MSuivim/JSGesJouMalade.js';
	
	$ActionPHP = "";
	$IdItem = 0;

	if (isset($_POST['ActionPHP'])) {$ActionPHP=$_POST['ActionPHP'];}
	if (isset($_POST['IdItem'])) {$IdItem=$_POST['IdItem'];}
	if (!ctype_digit((string) $IdItem)){header("location: ".C_SITE_BLANK);}

	require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."MAdm/GenMaladie_Class.php";
	require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."MAdm/GenPersonne_Class.php";
	
	if ($ActionPHP == C_DELETE && $IdItem != 0){
	    require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."MSuivim/GenJouMalade_Class.php";
		
		$cJouMalade= new classJouMalade();
		$cJouMalade->InitClass($IdItem);
		$Status = $cJouMalade->Delete();
		unset($cJouMalade);
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
				<th data-sort="string" nowrap><?=get_DecodeChaine(C_PERSONNE_NOM)?></th>
				<th data-sort="string" nowrap><?=get_DecodeChaine(C_MALADIE_NOM)?></th>
				<th data-sort="string" nowrap><?=get_DecodeChaine(C_DATE_NOM)?></th>
				<th data-sort="string" nowrap><?=get_DecodeChaine(C_DATE_NOM)?></th>
			</tr>
			
			<?=get_TableDataOutils("");?>
			<?=get_TableDataDeco("");?>
	    </thead>
		<tbody>
			<?
				$ILigne=0;

				$Sql= new classSQL();
				$TabSql=$Sql->SelectSQL($ps_JouMaladeSelectAll, C_LOG_NOLOG);
				unset($Sql);
				$NbL = count ($TabSql);
				
				if ($TabSql[0][0]!=null){
					for($i=0; $i<$NbL; $i++){
						$IdPersonne = "";
						$IdMaladie = "";
						$DateDebut = "";
						$Reprise = "";
						$NomPersonne = "";
						$NomMaladie = "";
						
						$j=0;
	
						$IdPersonne=$TabSql[$i][$j++];
						$IdMaladie=$TabSql[$i][$j++];
						$DateDebut=$TabSql[$i][$j++];
						$Reprise=$TabSql[$i][$j++];

						$cPersonne= new classPersonne();
						$cPersonne->InitClass($IdPersonne);
						$NomPersonne = $cPersonne->GetNom();
						unset($cPersonne);
						
						$cMaladie= new classMaladie();
						$cMaladie->InitClass($IdMaladie);
						$NomMaladie = $cMaladie->GetCode();
						unset($cMaladie);
						
						get_TrColor($ILigne++);
						echo "<td nowrap>";
						echo get_boutonSelect('Select('.$IdItem.')');
						echo "</td>";
						echo "<td nowrap>";
						echo get_boutonDelete('Delete('.$IdItem.')');
						echo "</td>";
						echo "<td nowrap>$NomPersonne</td>";
						echo "<td nowrap>$NomMaladie</td>";
						echo "<td nowrap>".DateMysqltoFr($DateDebut, C_DATE_FR)."</td>";
						echo "<td nowrap>".DateMysqltoFr($Reprise, C_DATE_FR)."</td>";					

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
