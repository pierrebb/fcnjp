<?php

//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:	--> Johan Le Galliot
// DATE Mai 2010
// Ajout des function Affiche_0123
//			 function Liste_0123
//		     function ListeOuiNon
//
// function Debug($Mes1, $Mes2)
// function get_Affiche_0123($Id)
// function get_AdresseEnt()
// function get_Civilite($Id)
// function get_CompteurBl($Sql)
// function get_CompteurDos($Sql)
// function get_Espace($Len)
// function get_EtatOFCMD($Etat)
// function get_OuiNon($Id)
// function get_Parametre($Id)
// function get_ParametreFind()
// function get_split($Sep, $Chaine)
// function get_StrPad($Id, $Len, $Pad)
// function get_StrPadRef($Id, $Len, $Pad)
// function get_TitreAction($Id)

// function put_SessionMAZ()

// function put_log($Message)
// function put_MessageCode($MessageCode)

// function GenMDP()

// Function SenDMail($From, $To, $Subject, $Message)
// function SubstrAffiche($ValChamp)

function Debug($Mes1='', $Mes2=''){
	echo '--- Debug---';
	echo "<br>";
	if ($Mes1 == ''){
		$Mes1 = $Mes2;
		$Mes2 = '';
	}

	$Txt = DateJour(). " ". DateHeureJour()."< ".$Mes1 . " >-< ". $Mes2 ." >";
	echo $Txt;
	echo "<br>";
}

function get_Affiche_0123($Id){
	switch($Id)
	{
	case 0:
		$Rep = "0";
		break;
	case 1:
		$Rep = "1";
	break;
	case 2:
		$Rep = "2";
	break;
	case 3:
		$Rep = "3";
	break;
	default:
		$Rep = '';
	}
	return $Rep;
}

function get_AdresseEnt(){
	$AdresseEnt = "";
	$AdresseEnt = GET_ValeurParam(C_ENTREPRISE_ADRESSE);
	$AdresseEnt .= (GET_ValeurParam(C_ENTREPRISE_ADRESSE_S) == "" ? "" : "<br>".GET_ValeurParam(C_ENTREPRISE_ADRESSE_S));
	$AdresseEnt .= "<br>" . GET_ValeurParam(C_ENTREPRISE_CP)." ".GET_ValeurParam(C_ENTREPRISE_VILLE);
	$AdresseEnt .= GET_ValeurParam(C_ENTREPRISE_PAYS);
	return $AdresseEnt;
}

function get_Civilite($Id){
	switch($Id){
	case 1:
		$Rep = 'Melle';
	break;
	case 2:
		$Rep = 'Mme';
	break;
	case 3:
		$Rep = 'M.';
	break;
	default:
		$Rep = '';
	break;
	}
	return $Rep;
}

function get_CompteurBl($Sql){
	
		$AnneEnCours = date("Y");
		
		//$Sql->BeginTransactionSQL();

		$PS = "SELECT MAX(annee) FROM compteur_bl";
		$TabSql=$Sql->SelectSQL($PS);
		if ($TabSql[0][0] != ""){
			if ($TabSql[0][0] != $AnneEnCours){
				$PS="DELETE from compteur_bl";
				$Status=$Sql->UpdateSQL($PS);

				$PS="ALTER TABLE compteur_bl AUTO_INCREMENT = 1";
				$Status=$Sql->UpdateSQL($PS);
			}
		}

		$PS="INSERT INTO compteur_bl (Annee) VALUES ('$AnneEnCours')";
		$PS = $Sql->ConstruireSQL("'@Annee'", $AnneEnCours, $PS);

		$Id = 0;
		$Id=$Sql->InsertSql($PS);

		$PS="DELETE from compteur_bl WHERE IdCompteur < $Id";
		$Status=$Sql->UpdateSQL($PS);

		$Status = 1;
		//$Sql->EndTransactionSQl($Status);

		return $Id;
}

function get_CompteurDos($Sql){
	
		$AnneEnCours =date("Y");
		
		//$Sql->BeginTransactionSQL();

		$PS = "SELECT MAX(annee) FROM compteur_dos";
		$TabSql=$Sql->SelectSQL($PS);
		if ($TabSql[0][0] != ""){
			if ($TabSql[0][0] != $AnneEnCours){
				$PS="DELETE from compteur_dos";
				$Status=$Sql->UpdateSQL($PS);

				$PS="ALTER TABLE compteur_dos AUTO_INCREMENT = 1";
				$Status=$Sql->UpdateSQL($PS);
			}
		}

		$PS="INSERT INTO compteur_dos (Annee) VALUES ('@Annee')";
		$PS = $Sql->ConstruireSQL("'@Annee'", $AnneEnCours, $PS);

		$Id = 0;
		$Id=$Sql->InsertSql($PS);

		$PS="DELETE from compteur_dos WHERE IdCompteur < $Id";
		$Status=$Sql->UpdateSQL($PS);

		$Status = 1;
		//$Sql->EndTransactionSQl($Status);

		return $Id;
}

function get_Espace($Len) {return str_repeat("&nbsp;", $Len);}

function get_EtatOFCMD($Etat){
	
	$LibEtat = "";
	switch($Etat)
	{
		case C_CMD_ETAT_CREATION:
		case C_CMD_ETAT_PREPARATION:
			$LibEtat=C_CMD_PREPARE_HTML;
			break;
		case C_CMD_ETAT_VERIFIER:
			$LibEtat=C_CMD_VERIFIE_HTML;
			break;
		case C_CMD_ETAT_RECEPTION:
			$LibEtat=C_CMD_COMMANDE_HTML;
			break;
		case C_CMD_ETAT_PREP_FERME:
		case C_CMD_ETAT_COM_FERME;
		case C_CMD_ETAT_REC_FERME;
			$LibEtat=C_FERME_HTML;
		break;
		case C_CMD_ETAT_REC_SOLDE;
			$LibEtat=C_SOLDE_HTML;
		break;
		case C_CMD_ETAT_REC_ANNULER;
			$LibEtat=C_ANNULER_HTML;
		break;
		default:
	}

	return $LibEtat;
}

function get_OuiNon($Id){
	switch($Id){
	case 0:
		$Rep = 'Non';
	break;
	case 1:
		$Rep = 'Oui';
	break;
	default:
		$Rep = '';
	}
	return $Rep;
}

function get_Parametre($Id){
	switch($Id){
	case C_PARAM_VAL_HEURE:
		$Rep = C_PARAM_TXT_HEURE;
	break;
	case C_PARAM_VAL_NUM:
		$Rep = C_PARAM_TXT_NUM;
	break;
	case C_PARAM_VAL_CHAR:
		$Rep = C_PARAM_TXT_CHAR;
	break;
	case C_PARAM_VAL_BOOL:
		$Rep = C_PARAM_TXT_BOOL;
	break;
	default:
		$Rep = C_CODE_INCONNU;
	}
	return $Rep;
}

function get_ParametreFind(){
	$Retour = "";
	$TabRecherche = func_get_args();
	$Nb = count ($TabRecherche);
	$j = 0;
	for ($i=0; $i<$Nb; $i++){
		if ($Retour != "") { $Retour .= C_SEPARATEUR_PARAM_RECH; }
		$Param = "";
		$Param = $TabRecherche[$j++];
		if (!strstr($Param, C_SEPARATEUR_PARAM_RECH)) { $Retour .= $Param; }
	}
	return $Retour;
}

function get_split($Sep, $Chaine){ return explode($Sep, $Chaine); }

function get_StrPad($Id, $Len, $Pad=C_PAD_CARAC) { return (C_PAD_CODE_OUINON == 0)? $Id : str_pad($Id, $Len, $Pad, STR_PAD_LEFT); }
function get_StrPadRef($Id, $Len, $Pad=C_PAD_CARAC) { return (C_PAD_REF_OUINON == 0)? $Id : str_pad($Id, $Len, $Pad, STR_PAD_LEFT); }

function get_TitreAction($Id){
	switch($Id){
	case 0:
		$Rep = 'Création : ';
	break;
	default:
		$Rep = 'Modification : ';
	break;
	}
	return $Rep;
}

function put_SessionMAZ(){
	$_SESSION[C_SESSION_ACTEUR]="";
	$_SESSION[C_SESSION_ARTICLE]="";
	$_SESSION[C_SESSION_CLIENT]="";
	$_SESSION[C_SESSION_COMMANDE]="";
	$_SESSION[C_SESSION_DATE]="";
	$_SESSION[C_SESSION_DOSSIER]="";
	$_SESSION[C_SESSION_GROUPE]="";
	$_SESSION[C_SESSION_NGROUPE]="";
	$_SESSION[C_SESSION_ACTEUR]="";
	$_SESSION[C_SESSION_MOIS]="";
	$_SESSION[C_SESSION_ANNEE]="";
	$_SESSION[C_SESSION_NOMENCLATURE]="";
	$_SESSION[C_SESSION_OF]="";
	$_SESSION[C_SESSION_ETAT]="";
	$_SESSION[C_SESSION_RDV]="";
}

function put_log($Message, $Type = ""){
	
	$IdActeur = "000";
	if (isset($_SESSION['IDACTEUR'])) {$IdActeur = $_SESSION['IDACTEUR'];}
	$IdActeur = str_pad($IdActeur, 3, "0", STR_PAD_LEFT);
	
	$dj = date("Ymd"); //ex _1789_07_14 (et à partir de minuit _1789_07_15 !)
	$fp = fopen( $_SERVER['DOCUMENT_ROOT']."/".C_SITE_REPERTOIRE."/Log/"."log_".C_APP_TITRE_CLIENT."_".$dj."-".$IdActeur.".log", "a+"); // ouverture du fichier log_25_07_2007.txt en ajout. Si le fichier n'existe pas il est créé
	$ligne = date('Y-m-d H:i:s'). "-" . $IdActeur . "-" . $_SERVER['REMOTE_ADDR'] . " - " . (string) $Type . " - " . (string)$Message;
	fputs ($fp, "\r\n" . $ligne); 
	fclose($fp); // on ferme le fichier	
}

function put_MessageCode($MessageCode){
	return "<span style='color:".C_HTML_COULEUR_MESSAGE_HAUT_BAS."'>".get_Espace(3).$MessageCode."</span>";
}

// Génération d'un mot de passe
function GenMDP($nb_car, $chaine = 'AZERTYUIOPQSDFGHJKLWXCVBN123456789')
{
	$nb_lettres = strlen($chaine) - 1;
	$generation = '';
	for($i=0; $i < $nb_car; $i++){
		$pos = mt_rand(0, $nb_lettres);
		$car = $chaine[$pos];
		$generation .= $car;
	}
	return $generation;
}

function SenDMail($From, $To, $Subject, $Message) {
	
	$Message = $Message ."\r\n\r\n";
	
	$Headers = "From: ".$From."\r\n" .
			"Reply-To: " . $From . "\r\n" .
			"X-Mailer: PHP/" . phpversion();
	mail($To, $Subject, $Message, $Headers);
}

function SubstrAffiche($ValChamp){return substr($ValChamp,0 , C_LEN_AFFICHE);}

?>
