<?
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2014-->
//<!-- Modif:
//
// function get_ExcellAdresse($Adresse1, $Adresse2, $CP, $Ville, $Pays)
// function get_ExcellHeader
// function get_ExcellNombre($Nombre)
// function get_ExcellTexte($Texte, $Span=1)
// function get_ExcellTexteTop($Texte, $Span=1)
// function get_ExcellTitre($Titre, $Span=1)
// function get_ExcellTitreCenter($Titre, $Span=1)
// function get_ExcellTitreNombre($Texte)

//
	function get_ExcellAdresse($Adresse1, $Adresse2, $CP, $Ville, $Pays)
	{
		$Adresse = "";
		$Adresse .= get_Iconv($Adresse1);
		$Adresse .= ($Adresse2 == "" ? "" : "\r".get_Iconv($Adresse2));
		$Adresse .= ($CP == "" ? "\r" : "\r".get_Iconv($CP));
		$Adresse .= ($Ville == "" ? " " : ($CP == "" ? get_Iconv($Ville) : " ".get_Iconv($Ville)));
		$Adresse .= ($Pays == "" ? "" : "\r".get_Iconv($Pays));
		return ($Adresse);
	}
		function get_ExcellHeader($Identifiant)
	{
		$Html = "";
		$Html .= "header(\"Content-Type: application/vnd.ms-excel\")\n";
		$Html .= "header(\"Expires: 0\")\n";
		$Html .= "header(\"Cache-Control: must-revalidate, post-check=0, pre-check=0\")\n";
		$Html .= "header(\"content-disposition: attachment;filename=Export".$Identifiant.DateJour().".xls\")\n";
		return ($Html);
	}

	function get_ExcellNombre($Nombre)
	{
		
		$Html = "<td align='right'>".SeparateurNumeriqueExcell($Nombre)."</td>";
		return ($Html);
	}
	
	function get_ExcellTexte($Texte="", $Span=1)
	{
		$Html = "<td colspan=".$Span.">".$Texte."&nbsp;</td>";
		return ($Html);
	}
	
	function get_ExcellTexteTop($Texte, $Span=1)
	{
		$Html = "<td colspan=".$Span.">".$Texte."</td>";
		return ($Html);
	}
	
	function get_ExcellTitre($Titre, $Span=1, $boBgColor=0)
	{
		$BgColor= "";
		if ($boBgColor==1){$BgColor = "bgcolor='".C_COULEUR_GRIS_GAINSBORO."'";}
		$Html = "<td colspan=".$Span." $BgColor><b>".$Titre."</b></td>";
		return ($Html);
	}
	
	function get_ExcellTitreCenter($Titre="", $Span=1)
	{
		$Html = "<td align='center' colspan=".$Span."><b>".$Titre."</b></td>";
		return ($Html);
	}
	
	function get_ExcellTitreNombre($Texte)
	{
		$Html = "<td align='right'><b>".$Texte."</b></td>";
		return ($Html);
	}
	
?>
