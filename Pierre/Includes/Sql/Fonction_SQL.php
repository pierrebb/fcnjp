<?php
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:	-->
//
//<!-- LISTE DES FONCTION -->
//function GET_ValeurParam($CodeParam)
//function GET_MagasinPrincipal()
//function GET_MagasinPrincipalByActeur()
//function GET_ActeurById($IdActeur)
//function GET_ActeurById($IdActeur)
//function GET_CoutById($IdCout)
//
//function SET_MajDossierHeureFin()
//<!-- FIN -->

// valeur d'un param de la table parametre
function GET_ValeurParam($CodeParam){
	require "Procedure_SQL.php";

	$LibelleParam = "";
	$ValParam = "";
	$TypeParam = "";

	$Sql= new ClassSQL();
 	$PS = $ps_paramSelectByCode;
	$PS = $Sql->ConstruireSQL("@CodeParam", $CodeParam, $PS);
	$TabSql=$Sql->SelectSQL($PS);
	unset($Sql);

	if ($TabSql[0][0]!=null){
		$i=0;
		$CodeParam=$TabSql[$i][0];
		$LibelleParam=$TabSql[$i][1];
		$ValParam=$TabSql[$i][2];
		$TypeParam=get_Parametre($TabSql[$i][3]);
	 }
	return $ValParam;
 }

// Magasin principal
function GET_MagasinPrincipal(){
	require "Procedure_SQL.php";

	$MagasinPrincipal = 0;
	$Sql= new classSQL();
	$TabSql=$Sql->SelectSQL($ps_magasinSelectPrincipal);
	unset($Sql);
	if ($TabSql[0][0]!=null){
		$MagasinPrincipal=$TabSql[0][0];
	}
	return $MagasinPrincipal;
}

function GET_MagasinPrincipalByActeur($IdActeur){
	require "Procedure_SQL.php";

	$MagasinPrincipal = 0;
	$Sql= new classSQL();
	$PS = $ps_magActeurPrincipalByIdActeur;
	$PS = $Sql->ConstruireSQL("@IdActeur", $IdActeur, $PS);
	$TabSql=$Sql->SelectSQL($PS);
	unset($Sql);
	if ($TabSql[0][0]!=null){
		$MagasinPrincipal=$TabSql[0][0];
	}
	return $MagasinPrincipal;
}

// Détail d'un agent Par Id
function GET_ActeurById($IdActeur){
	require "Procedure_SQL.php";

	$Sql= new classSQL();
	$PS = $ps_acteurSelectById;
	$PS = $Sql->ConstruireSQL("@IdActeur", $IdActeur, $PS);
	$TabSql=$Sql->SelectSQL($PS);
	unset($Sql);

	return $TabSql;
}

// Détail d'un agent par Code cout
function GET_ActeurByCodeActeur($CodeActeur){
	require "Procedure_SQL.php";

	$Sql= new classSQL();
	$PS = $ps_acteurSelectByCodeCout;
	$PS = $Sql->ConstruireSQL("@CodeActeur", $CodeActeur, $PS);
	$TabSql=$Sql->SelectSQL($PS);
	unset($Sql);

	return $TabSql;
}

// MAJ de la date de fin des dossier
// $Tous = 0 : jusqu a hier
// $Tous = 1  :Tous
function SET_MajDossierHeureFin($Tous){
	require "Procedure_SQL.php";

   	$Status=false;
	$ValParam = GET_ValeurParam(C_HEU_FIN_JOURNEE);
	if ($ValParam!=""){
		$Sql= new ClassSQL();
		if ($Tous == 1){
			$PS = $ps_intervientUpdateHeureFin;
		}else{
			$PS = $ps_intervientUpdateHeureFinAvant;
		}
		$PS = $Sql->ConstruireSQL("@HeureFin", $ValParam, $PS);
		$Status=$Sql->UpdateSql($PS);
		unset($Sql);
	}
	return $Status;
 }
?>
