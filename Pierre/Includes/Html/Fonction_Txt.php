<?
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2014-->
//<!-- Modif:

	function get_ficTable($Border=0, $cellpadding=1, $cellspacing=0) 
	{
		$Html = "<table border='$Border' cellpadding='".$cellpadding."' cellspacing='".$cellspacing."' width='100%'>\n";
		return $Html;		
	}
	
	function get_FicEntete($Titre, $Span=4)
	{
		$Html = "<tr>".get_FicSeparation($Span)."</tr>\n";
		$Html .= "<tr>\n";
		$Html .= "<td><a href='javascript:Imprimer()'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoImprimer.gif' name='IcoImprimer' value='IcoImprimer' border='0'></a></td>\n";
		$Html .= get_FicTitre(GET_ValeurParam(C_ENTREPRISE_NOM));
		$Html .= "<td width='100%' align='center'><b>".$Titre."</b></td>\n";
		$Html .= get_FicTitre(DateJour());
		$Html .= "</tr>\n";
		$Html .= "<tr>".get_FicSeparation($Span)."</tr>\n";		
		return ($Html);
	}

	function get_FicTitreSeparation($Titre)
	{
		$Html = get_ficTable();
		$Html .= "<tr><td>&nbsp;</td></tr>\n";
		$Html .= "<tr>\n";
		$Html .= "<td nowrap><b>".$Titre."</b></td>\n";
		$Html .= get_FicSeparation();
		$Html .= "</tr>\n";
		$Html .= "</table>\n";
		return ($Html);
	}


	function get_FicSeparation($Span=1)
	{
		$Html = "<td width='100%' colspan='".$Span."' align='center'><hr></td>\n";
		return ($Html);
	}

	function get_FicTitre($Titre, $Span=1, $Style='')
	{
		$Html = "<td colspan='".$Span."' nowrap ".$Style."><b>".$Titre."</b></td>\n";
		return ($Html);
	}
	
	function get_FicTitreCenter($Titre, $Span=1, $Style='')
	{
		$Html = "<td colspan='".$Span."' align='center' nowrap ".$Style."><b>".$Titre."</b></td>\n";
		return ($Html);
	}

	function get_FicTitreNombre($Titre, $Span=1)
	{
		$Html = "<td colspan='".$Span."' align='right' nowrap><b>".$Titre."</b></td>\n";
		return ($Html);
	}

	function get_FicTexte($Texte, $Span=1, $Width='', $Nowrap='', $Style='')
	{
		if ($Width != '') { $Width = "width='".$Width."'";}
		$Html = "<td ".$Width." colspan='".$Span."' ".$Nowrap." ".$Style.">".$Texte."</td>\n";
		return ($Html);
	}

	function get_FicTexteTop($Texte, $Span=1)
	{
		$Html = "<td colspan='".$Span."'>".$Texte."</td>\n";
		return ($Html);
	}
	
	function get_FicNombre($Nombre, $Style='')
	{
		$Html = "<td align='right' ".$Style.">".$Nombre."</td>\n";
		return ($Html);
	}
	
	function get_FicImg($Img, $Span=1)
	{
		$Html = "<td colspan='".$Span."'><img src='".$Img."'></td>\n";
		return ($Html);
	}

?>
