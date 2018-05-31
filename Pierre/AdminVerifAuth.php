<?php
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:	-->

	//require_once $_SERVER['DOCUMENT_ROOT']."/Pierre/Includes/Include_Login.php";
	ob_start();
	require_once('Includes/Include.php');
?>

<?
	$CodeActeurLogin = "";
	$MdP = "";

	$IdActeur = 0;
	$CodeActeur = "";
	$Nom = "";
	$Prenom = "";
	$Administrateur = 0;
	$Principal = 0;
	$DateSuppression = "";
	$Role = "";
	$Cout = "";
	$Actif = 0;
	$MdPDef = 0;
	$MdpNbModif = "";

	$NbRole=0;
	$Article = "";
	$Client = "";
	$Commande = "";
	$Dossier = "";
	$Horaire = "";
	$HoraireFic = "";

	if (isset($_POST['Login'])) {$CodeActeurLogin = $_POST['Login'];}
	if (isset($_POST['MdpMD5'])) {$MdP = $_POST['MdpMD5'];}

	// Log
	put_log($CodeActeurLogin);
	
	$Sql= new ClassSQL();

	$PS=$ps_acteurSelectByCodeActeur;
	$PS = $Sql->ConstruireSQL("@Login", $CodeActeurLogin, $PS);
	$PS = $Sql->ConstruireSQL("@MdP", $MdP, $PS);
	$TabSql=$Sql->SelectSQL($PS);

	unset($Sql);

	if ($TabSql[0][0]==null){
		// Log
		put_log("authentification.php?Status=4");
		header("location: authentification.php?Status=4");
	}else{
		$i=0;
		$j=0;
		$IdActeur = $TabSql[$i][$j++];
		$Nom = $TabSql[$i][$j++];
		$Prenom = $TabSql[$i][$j++];
		$Administrateur = $TabSql[$i][$j++];
		$DateSuppression = $TabSql[$i][$j++];
		$CodeActeur = $TabSql[$i][$j++];
		$Actif = $TabSql[$i][$j++];
		$MdPDef = $TabSql[$i][$j++];
		$MdpNbModif = $TabSql[$i][$j++];
		
		if ($Administrateur == 1){
			$Administrateur = C_PROFIL_ADM;
			$NbRole++;
		}else{
			$Administrateur="";
		}


		$_SESSION['IDSESSION'] = session_id();
		$_SESSION['IDACTEUR'] = $IdActeur;
		$_SESSION['CODEACTEUR'] = $CodeActeur;
		$_SESSION['NOM'] = $Nom;
		$_SESSION['PRENOM'] = $Prenom;
		$_SESSION['ADMINISTRATION'] = $Administrateur;
				
				
		// Log
		put_log('AdminIndexOn.html', 'FILE');
		header("location: AdminIndexOn.html");
	}

?>