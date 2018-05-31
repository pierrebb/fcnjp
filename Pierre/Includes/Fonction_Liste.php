<?php
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:	--> Johan Le Galliot
// DATE Mai 2010
// Ajout des function Affiche_0123
//			 function Liste_0123
//		     function ListeOuiNon
//
//function GET_ListeCivilite($NomListe, $IdDef, $ActionPHP="")
//function GET_ListeOuiNon($NomListe, $IdDef, $ActionPHP="")
//function GET_ListeVenteAchat($NomListe, $IdType, $ActionPHP="")
//function GET_EtatDossier($NomListe, $IdDef, $ActionPHP="")
//function GET_EtatDossierOuvert($NomListe, $IdDef, $ActionPHP="")
//function GET_EtatOpenClose($NomListe, $IdDef, $ActionPHP="")
//function GET_ListeSeuil($NomListe, $IdDef, $ActionPHP="")
//function GET_Liste0123($NomListe, $IdDef, $ActionPHP="")
//function GET_makeListeTab($TabListe, $NomListe, $IdDef, $ActionPHP)
//function GET_MakeListeSQL($Ps,$IdS,$NomListe,$ActionPHP)

function GET_ListeCivilite($NomListe, $IdDef, $ActionPHP=""){
	$TabListe = array("", "Melle", "Mme", "M.");
	return GET_makeListeTab($TabListe, $NomListe, $IdDef, $ActionPHP);
}

function GET_ListeMouvement($NomListe, $IdDef, $ActionPHP=""){
	$TabListe = array("Tout", "Mouvement de stock", "Mouvement de tarif");
	return GET_makeListeTab($TabListe, $NomListe, $IdDef, $ActionPHP);
}

function GET_ListeOuiNon($NomListe, $IdDef, $ActionPHP=""){
	$TabListe = array("Non", "Oui");
	return GET_makeListeTab($TabListe, $NomListe, $IdDef, $ActionPHP);
}

function GET_EtatDossier($NomListe, $IdDef, $ActionPHP=""){
	$TabListe = array("", "Ouvert", "Fermé");
	return GET_makeListeTab($TabListe, $NomListe, $IdDef, $ActionPHP);
}

function GET_EtatDossierOuvert($NomListe, $IdDef, $ActionPHP=""){
	$TabListe = array("Ouvert");
	return GET_makeListeTab($TabListe, $NomListe, $IdDef, $ActionPHP);
}

function GET_EtatCommande($NomListe, $IdDef, $ActionPHP=""){
	$TabListe = array("", C_CMD_PREPARE_HTML, C_CMD_VERIFIE_HTML, C_CMD_COMMANDE_HTML, C_FERME_HTML, C_SOLDE_HTML, C_ANNULER_HTML);
	return GET_makeListeTab($TabListe, $NomListe, $IdDef, $ActionPHP);
}

function GET_EtatOF($NomListe, $IdDef, $ActionPHP=""){
	$TabListe = array("", C_CMD_PREPARE_HTML, C_CMD_VERIFIE_HTML, C_CMD_COMMANDE_HTML, C_FERME_HTML, C_SOLDE_HTML, C_ANNULER_HTML);
	return GET_makeListeTab($TabListe, $NomListe, $IdDef, $ActionPHP);
}

function GET_EtatOpenClose($NomListe, $IdDef, $ActionPHP=""){
	$TabListe = array("Inactif", "Actif");
	return GET_makeListeTab($TabListe, $NomListe, $IdDef, $ActionPHP);
}

function GET_ListeSeuil($NomListe, $IdDef, $ActionPHP=""){
	$TabListe = array("Tous", "Supérieur", "Inférieur");
	return GET_makeListeTab($TabListe, $NomListe, $IdDef, $ActionPHP);
}

function GET_Liste0123($NomListe, $IdDef, $ActionPHP=""){
	$TabListe = array("0", "1", "2", "3");
	return GET_makeListeTab($TabListe, $NomListe, $IdDef, $ActionPHP);
}

function GET_Moment($NomListe, $IdDef, $ActionPHP=""){
    $TabListe = array("", "AM", "PM");
    return GET_makeListeTab($TabListe, $NomListe, $IdDef, $ActionPHP);
}


function GET_ListeType($NomListe, $IdType, $ActionPHP=""){
	$Liste="";
	$Liste="<select id='$NomListe' name='$NomListe' $ActionPHP>";
	
	$Liste.="<option value='0'";
	if (strval($IdType) == strval('0')) {$Liste.=" SELECTED";}
	$Liste.="></option>";
	
	$Liste.="<option value='".C_TYPE_AR."'";
	if (strval($IdType) == strval(C_TYPE_AR)) {$Liste.=" SELECTED";}
	$Liste.=">".C_ARTICLE_NOM."</option>";
	
	$Liste.="<option value='".C_TYPE_NO."'";
	if (strval($IdType) == strval(C_TYPE_NO)) {$Liste.=" SELECTED";}
	$Liste.=">".C_NOMEN_NOM."</option>";
	
	$Liste.="</select>";
	return $Liste;
}

function GET_makeListeTab($TabListe, $NomListe, $IdDef, $ActionPHP){
	$NbL = count ($TabListe);
	$Liste="";
	$Liste="<select id='$NomListe' name='$NomListe' $ActionPHP>";
	for($i=0; $i<$NbL; $i++){
		$Code = "";
		$Code=$TabListe[$i];
		$Liste.="<option value='$i'";
		if ($i == $IdDef) {$Liste.=" SELECTED";}
		$Liste.=">$Code</option>";
	}
	$Liste.="</select>";
	return $Liste;
}

function GET_MakeListeSQL($Ps, $IdS, $NomListe, $ActionPHP="", $Action=C_UPDATE, $LigneVide=1){
	require_once "Sql/Procedure_SQL.php";
	$Sql= new classSQL();
	$TabSql=$Sql->SelectSQL($Ps);
	unset($Sql);
	$NbL = count ($TabSql);
	$Liste="<select id='$NomListe' name='$NomListe' $ActionPHP>";
	
	if ($NbL > 1 || $Action == C_FIND){
		if ($LigneVide==1){$Liste.="<option value=0></option>";}
	}
	
	if ($TabSql[0][0]!=null){
		for($i=0; $i<$NbL; $i++){
			$Id = "";
			$Code = "";

			$Id=$TabSql[$i][0];
			$Code=$TabSql[$i][1];

			$Liste.="<option value=$Id";
			if ($Id == $IdS) {$Liste.=" SELECTED";}
			$Liste.=">$Code</option>";
		}
	}
	$Liste.="</select>";
	return $Liste;
}
?>
