<?php
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:	-->

	ob_start();
	require_once $_SERVER['DOCUMENT_ROOT']."/Pierre/"."Includes/Include.php";
	ProfilVerif(C_PROFIL_ADM);

	put_log(__FILE__, 'FILE');
	$Ref = substr(basename($_SERVER['SCRIPT_NAME']),0, strpos(basename($_SERVER['SCRIPT_NAME']), "."));
	$FrmTitre=C_TITRE_LISTE_BLESSE;
	$FrmQuitter="GesBlesse_L.php";
	$prg_Javascript='MAdm/JSGesBlesse.js';
	
	$ActionPHP = "";
	$IdItem = 0;

	if (isset($_POST['ActionPHP'])) {$ActionPHP=$_POST['ActionPHP'];}
	if (isset($_POST['IdItem'])) {$IdItem=$_POST['IdItem'];}
	if (!ctype_digit((string) $IdItem)){header("location: ".C_SITE_BLANK);}

	if ($ActionPHP == C_DELETE && $IdItem != 0){
		require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."MAdm/GenBlesse_Class.php";
		
		$cBlesse= new classBlesse();
		$cBlesse->InitClass($IdItem);
		$Status = $cBlesse->Delete();
		unset($cEquipe);
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
				<th data-sort="string" nowrap><?=get_DecodeChaine(C_CODE_NOM)?></th>
			</tr>
			
			<?=get_TableDataOutils("");?>
			<?=get_TableDataDeco("");?>
	    </thead>
		<tbody>
			<?
				$ILigne=0;

				$Sql= new classSQL();
				$TabSql=$Sql->SelectSQL($ps_BlesseSelectAll, C_LOG_NOLOG);
				unset($Sql);
				$NbL = count ($TabSql);
				
				if ($TabSql[0][0]!=null){
					for($i=0; $i<$NbL; $i++){
						$IdItem = "";
						$Code = "";
						$j=0;
	
						$IdItem=$TabSql[$i][$j++];
						$Code=$TabSql[$i][$j++];
		
						get_TrColor($ILigne++);
						echo "<td nowrap>";
						echo get_boutonSelect('Select('.$IdItem.')');
						echo "</td>";
						echo "<td nowrap>";
						echo get_boutonDelete('Delete('.$IdItem.')');
						echo "</td>";
						echo "<td nowrap>$Code</td>";
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
