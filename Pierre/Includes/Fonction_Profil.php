<?php
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:	-->
//
//function GET_Administration()

//function ProfilVerif($IdP)
//function ProfilNom($IdP)

// function Get_NomComplet()

session_start();

function GET_Administration(){
	$boOk=0;
	$Administration = "";
	if(isset($_SESSION['ADMINISTRATION'])) {$Administration=$_SESSION['ADMINISTRATION'];}
	if ($Administration == C_PROFIL_ADM){$boOk=1;}
	return $boOk;
}

function GET_Entrainement(){
    $boOk=0;
    $Administration = "";
    $Joueur = "";
    if(isset($_SESSION['ADMINISTRATION'])) {$Administration=$_SESSION['ADMINISTRATION'];}
    if(isset($_SESSION['JOUEUR'])) {$Article=$_SESSION['JOUEUR'];}
    
    if ($Administration == C_PROFIL_ADM){$boOk=1;}
    if ($Joueur == C_PROFIL_JOU){$boOk=1;}
    return $boOk;
}


function GET_Joueur(){
	$boOk=0;
	$Administration = "";
	$Joueur = "";
	if(isset($_SESSION['ADMINISTRATION'])) {$Administration=$_SESSION['ADMINISTRATION'];}
	if(isset($_SESSION['JOUEUR'])) {$Article=$_SESSION['JOUEUR'];}

	if ($Administration == C_PROFIL_ADM){$boOk=1;}
	if ($Joueur == C_PROFIL_JOU){$boOk=1;}
	return $boOk;
}

function GET_SUIVIM(){
	$boOk=0;
	$Administration = "";
	$Joueur = "";
	if(isset($_SESSION['ADMINISTRATION'])) {$Administration=$_SESSION['ADMINISTRATION'];}
	if(isset($_SESSION['JOUEUR'])) {$Article=$_SESSION['JOUEUR'];}

	if ($Administration == C_PROFIL_ADM){$boOk=1;}
	if ($Joueur == C_PROFIL_JOU){$boOk=1;}
	return $boOk;
}

function GET_ETAT(){
	$boOk=0;
	$Administration = "";
	$Joueur = "";
	if(isset($_SESSION['ADMINISTRATION'])) {$Administration=$_SESSION['ADMINISTRATION'];}
	if(isset($_SESSION['JOUEUR'])) {$Article=$_SESSION['JOUEUR'];}

	if ($Administration == C_PROFIL_ADM){$boOk=1;}
	if ($Joueur == C_PROFIL_JOU){$boOk=1;}
	return $boOk;
}

function GET_MATCH(){
	$boOk=0;
	$Administration = "";
	$Joueur = "";
	if(isset($_SESSION['ADMINISTRATION'])) {$Administration=$_SESSION['ADMINISTRATION'];}
	if(isset($_SESSION['JOUEUR'])) {$Article=$_SESSION['JOUEUR'];}

	if ($Administration == C_PROFIL_ADM){$boOk=1;}
	if ($Joueur == C_PROFIL_JOU){$boOk=1;}
	return $boOk;
}

function GET_TEST(){
	$boOk=0;
	$Administration = "";
	$Joueur = "";
	if(isset($_SESSION['ADMINISTRATION'])) {$Administration=$_SESSION['ADMINISTRATION'];}
	if(isset($_SESSION['JOUEUR'])) {$Article=$_SESSION['JOUEUR'];}

	if ($Administration == C_PROFIL_ADM){$boOk=1;}
	if ($Joueur == C_PROFIL_JOU){$boOk=1;}
	return $boOk;
}

function GET_IMPORTATION(){
	$boOk=0;
	$Administration = "";
	$Joueur = "";
	if(isset($_SESSION['ADMINISTRATION'])) {$Administration=$_SESSION['ADMINISTRATION'];}
	if(isset($_SESSION['JOUEUR'])) {$Article=$_SESSION['JOUEUR'];}

	if ($Administration == C_PROFIL_ADM){$boOk=1;}
	if ($Joueur == C_PROFIL_JOU){$boOk=1;}
	return $boOk;
}



function GET_Calendrier(){
	$boOk=0;
	$Administration = "";
	$Calendrier ="";
	if(isset($_SESSION['ADMINISTRATION'])) {$Administration=$_SESSION['ADMINISTRATION'];}
	if(isset($_SESSION['CALENDRIER'])) {$Calendrier=$_SESSION['CALENDRIER'];}

	if ($Administration == C_PROFIL_ADM){$boOk=1;}
	if ($Calendrier == C_PROFIL_CAL){$boOk=1;}
	return $boOk;
}


function GET_Connect(){
	$boOk=0;
	$idSession = "";
	if(isset($_SESSION['IDSESSION'])) {$idSession=$_SESSION['IDSESSION'];}

	if ($idSession != ""){$boOk=1;}
	return $boOk;
}


function ProfilVerif($IdP){
	$boOk=0;

	switch($IdP){
	case C_PROFIL_ADM:
		$boOk=GET_Administration();
	break;
	case C_PROFIL_CON:
	    $boOk=GET_Connect();
	    break;
	case C_PROFIL_ENT:
		$boOk=GET_Article();
	break;
	default:
		$boOk=0;
	}

	if ($boOk == 0){
		session_destroy();
		header("location: ".C_SITE_FIN_SESSION);
	}
	return $boOk;
}

function ProfilNom($IdP){
	$boOk=0;

	switch($IdP){
	case C_PROFIL_ADM:
		return "[".C_PROFIL_ADM_TXT."]";
	break;
	case C_PROFIL_ENT:
		return "[".C_PROFIL_ENT_TXT."]";
	break;
	default:
		return "";
	}
}

function Get_NomComplet(){
	if(isset($_SESSION['NOM'])) {$Nom=$_SESSION['NOM'];}
	if(isset($_SESSION['PRENOM'])) {$Prenom=$_SESSION['PRENOM'];}
	$NomComplet = $Nom . ' ' . $Prenom;
	return $NomComplet;
}
?>
