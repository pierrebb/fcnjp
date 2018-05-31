<?php
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:	-->

	ob_start();
	require_once $_SERVER['DOCUMENT_ROOT']."/Pierre/"."Includes/Include.php";
	ProfilVerif(C_PROFIL_ADM);

	put_log(__FILE__, 'FILE');
	$Ref = substr(basename($_SERVER['SCRIPT_NAME']),0, strpos(basename($_SERVER['SCRIPT_NAME']), "."));
	$FrmTitre=C_TITRE_LISTE_PARAMETRE;
	$FrmQuitter="GesParam_L.php";
	$prg_Javascript='MAdm/JSGesParam.js';

	$ActionPHP = "";
	$IdItem = 0;
?>
<html>
<head>

<title><?=C_APP_TITRE;?></title>

<?require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/Include_Meta.php";?>
<?require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/Include_Css.php";?>
<?require_once $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/Include_JavaScript.php";?>
<script type='text/javascript' src='<?=C_SITE_REPERTOIRE_JAVASCRIPT?><?=$prg_Javascript?>'></script>

</head>

<body onload="" style="background-color: rgb(255, 255, 255);">
<form name="frmAdmin" method="POST">
	<input type="hidden" name="Code" id="Code" value=""/>
	<input type="hidden" name="ActionPHP" id="ActionPHP" value=""/>
	
	<?=get_pageHaut($FrmTitre, $Ref);?>
	
	<?=get_TableDataHead("");?>
		<tbody>
			<tr class="tableau_libellescolonnes cgCodefonce">
				<td <?= C_WITH_ICON?>></td>
				<td nowrap><?=get_DecodeChaine(C_CODE_NOM)?></td>
				<td nowrap><?=get_DecodeChaine(C_VALEUR_NOM)?></td>
				<td nowrap><?=get_DecodeChaine(C_NOM_NOM)?></td>
			</tr>
			
			<?=get_TableDataOutils("");?>
			<?=get_TableDataDeco("");?>
			
			<?
				$ILigne=0;

				$Sql= new classSQL();
				$TabSql=$Sql->SelectSQL($ps_paramSelectAll, C_LOG_NOLOG);
				unset($Sql);
				$NbL = count ($TabSql);

				if ($TabSql[0][0]!=null){
					for($i=0; $i<$NbL; $i++){
						$Code = "";
						$Libelle = "";
						$ValParam = "";
						$TypeParam = "";

						$j = 0;
						$Code=$TabSql[$i][$j++];
						$Libelle=$TabSql[$i][$j++];
						$ValParam=$TabSql[$i][$j++];
						$TypeParam=$TabSql[$i][$j++];

						if ($Code != C_PASSWORD_DEFAUT){
							get_TrColor($ILigne++);
							echo "<td nowrap>";
							if ($TypeParam != 7 ){ echo get_boutonSelect('Select("'.$Code.'")'); }
							echo "</td>";
							echo "<td nowrap>$Code</td>";
							echo "<td nowrap>$ValParam</td>";
							echo "<td nowrap>$Libelle</td>";
							echo "</tr>";
						}
					}
				}
			?>
		</tbody>
		<?=get_FootTable(11);?>		
	</table>
	<?=get_FootPageListe()?>	
</form>
</body>
</html>
