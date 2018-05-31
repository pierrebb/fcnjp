<?
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2014-->
//<!-- Modif:
//
// function get_DecodeChaine
// function get_FootPage
// function get_FootPageListe
// function get_InputFile
// function get_InputPassword
// function get_InputLogin($s_Name, $s_Size='', $s_Length='')
// function get_InputText
// function get_InputHidden
// funcyion get_InputTextArea
// function get_Iconv
// function get_HTMLentities
// function get_pageHaut($FrmTitre, $Ref, $Width="100%")
// function get_TableDataHead($Name)
// function get_TableDataOutils()
// function get_TableDataDeco()
// function get_TableMessageBas
// function get_TabRechHaut()
// function get_TrColor
// function get_Patientez

	function get_DecodeChaine($s_Chaine)
	{
		return (get_HTMLentities($s_Chaine));
	}

	function get_FootPageListe(){
		$Foot = "<table border='0' cellpadding='1' cellspacing='0' width='100%'>";
		$Foot .= "<tbody>";
		$Foot .= "<tr class='tableau_navig'>";
		$Foot .= "<td colspan='2'><img src='../../Images/spacer.gif' alt='' height='6' width='1'></td>";
		$Foot .= "</tr>";
		$Foot .= "<tr>";
		$Foot .= "<td class='navigdeco_p1' height='16'><img src='../../Images/spacer.gif' alt='' height='16' width='1'></td>";
		$Foot .= "<td class='navigdeco_p2' align='center' width='240'>";
		$Foot .= "</tr>";
		$Foot .= "</tbody>";
		$Foot .= "</table>";	
		return $Foot;
	}
	
	function get_FootTable($Span=99){
		$Foot = "<tfoot>";
		$Foot .= "<tr class='tableau_deco'>";
		$Foot .= "<td style='width: 61px;' colspan='".$Span."'><img src='../../Images/spacer.gif' alt='' height='4' width='1'></td>";
		$Foot .= "</tr>";
		$Foot .= "<tr class='tableau_fin CGcodefonce'>";
		$Foot .= "<td style='width: 61px;' colspan='".$Span."'></td>";
		$Foot .= "</tr>";
		$Foot .= "</tfoot>";
		return $Foot;
	}	

	function get_InputFile($s_Name, $s_Ext='*.*')
	{
		$Html = '';
		$Html = "<input type='file' name='".$s_Name."' id='".$s_Name."' accept='".$s_Ext."' />";
		return ($Html);
	}
	
	function get_InputPassword($s_Name, $s_Size='', $s_Length='', $s_Value='')
	{
		$Html = '';
		$Html = "<input type='password' name='".$s_Name."' id='".$s_Name."' size='".$s_Size."' maxlength='".$s_Length."' value='".$s_Value."' autocomplete='false' readonly onfocus='this.removeAttribute(\"readonly\");'>";
		return ($Html);
	}

	function get_InputLogin($s_Name, $s_Size='', $s_Length='', $s_Value)
	{
		$Html = '';
		$Html = "<input type='text' name='".$s_Name."' id='".$s_Name."' size='".$s_Size."' maxlength='".$s_Length."' value='".$s_Value."' autocomplete='false' readonly onfocus='this.removeAttribute(\"readonly\");'>";;
		return ($Html);
	}
	
	function get_InputText($s_Name, $s_Size='', $s_Length='', $s_Value='', $Style='', $JS= '')
	{
		$s_Value=get_HTMLentities($s_Value);
		$Html = '';
		$Html = "<input type='text' name='".$s_Name."' id='".$s_Name."' size='".$s_Size."' maxlength='".$s_Length."' value=\"".$s_Value."\" $Style $JS><span class='notaErreur' name='s".$s_Name."' id='s".$s_Name."'></span>";
		return ($Html);
	}

	function get_InputHidden($s_Name, $s_Value='')
	{
		$s_Value=get_HTMLentities($s_Value);
		$Html = '';
		$Html = "<input type='hidden' name='".$s_Name."' id='".$s_Name."' value='".$s_Value."'>";
		return ($Html);
	}

	function get_InputTextArea($s_Name, $s_Row='3', $s_Col='50', $s_Value='')
	{
		$s_Value=get_HTMLentities($s_Value);
		$Html = '';
		$Html = "<textarea name='".$s_Name."' rows='".$s_Row."' cols='".$s_Col."'>".$s_Value."</textarea>";
		return ($Html);
	}

	function get_Iconv($Txt)
	{
		return iconv("ISO-8859-1//TRANSLIT","UTF-8", $Txt);
	}
	
	
	function get_HTMLentities($Txt)
	{
		//return htmlentities($Txt, ENT_IGNORE, "ISO-8859-1");
		//return htmlentities($Txt);
		
		$Txt = str_replace('â', '&acirc;', $Txt);
		$Txt = str_replace('à', '&agrave;', $Txt);
		$Txt = str_replace('ç', '&ccedil;', $Txt);
		$Txt = str_replace('é', '&eacute;', $Txt);
		$Txt = str_replace('ê', '&ecirc;', $Txt);
		$Txt = str_replace('è', '&egrave;', $Txt);
		$Txt = str_replace('°', '&deg;', $Txt);
		$Txt = str_replace('Ø', '&#248;', $Txt);
		
		//$Txt = str_replace("'", '&quote;', $Txt);
		return $Txt;
	}

	function get_pageHaut($FrmTitre, $Ref, $Width="100%"){
		$Html = "";
		$Html .= "<table border='0' cellpadding='1' cellspacing='0' width='".$Width."'>";
		$Html .= "<tbody>";
		$Html .= "<tr class='zone_titre'>";
		$Html .= "<td class='zone_titre_p1' width='65%'>".get_DecodeChaine($FrmTitre)."</td>";
		$Html .= "<td class='zone_titre_p2' width='35%'>&nbsp;</td>";
		$Html .= "</tr>";
		$Html .= "<tr style='background: rgb(0, 0, 0) none repeat scroll 0% 50%; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial; height: 10px;'>";
		$Html .= "<td align='right' colspan='2' rowspan='1' style='color: white;'><span class='CGtxgrismoyen' style='font-size: 11px;'>".$Ref."</span></td>";
		$Html .= "</tr>";
		$Html .= "</tbody>";
		$Html .= "</table>";
		return $Html;
	}

	function get_TableDataHead($Name, $Width="width='100%'"){
		$Html = "";
		$Html .= "<table class='tableau_data' cellpadding='2px' $Width id='$Name' name='$Name'>";
		return $Html;
	}

	function get_TableDataOutils($Message=""){
		$Html = "";
		$Html .= "<tr class='tableau_outils'>";
		$Html .= "<td colspan='99'>";
		if ($Message == "" ){
			$Html .= "<img src='../../Images/spacer.gif' alt='' height='4' vspace='0' width='1'>";
		}else{
			$Html .= $Message;
		}
		$Html .= "</td>";
		$Html .= " </tr>";
		return $Html;
	}

	function get_TableDataDeco(){
		$Html = "";
		$Html .= "<tr class='tableau_deco'>";
		$Html .= "<td colspan='99'><img src='../../Images/spacer.gif' alt='' height='4' width='1'></td>";
		$Html .= "</tr>";
		return $Html;
	}
	
	function get_TableMessageHaut($Message){
		$Html = "<td width='100%' align='center' valign='center'><b><span name='MessageHaut' id='MessageHaut' style='color:".C_HTML_COULEUR_MESSAGE_HAUT_BAS."'>$Message</span></b></td>";
		return $Html;
	}
	
	
	
	function get_TableMessageBas($Message){
		$Html = "<table width='100%' border=0 cellspacing=0 cellpadding=0 align=center width='100%'>";
		$Html .= "<tr class='tableau_navig' align='left'>";
		$Html .= "<td>&nbsp;</td>";
		$Html .= "<td width='100%' align='center' valign='center'><b><span name='MessageBas' id='MessageBas' style='color:".C_HTML_COULEUR_MESSAGE_HAUT_BAS."'>$Message</span></b></td>";
		$Html .= "</tr>";
		$Html .= "</table>";
		return $Html;
	}
	
	function get_TabRechHaut($FrmTitre, $Ref){
		$Html = "";
		$Html .= "<tr bgcolor='#f1f1f1' valign='top'>";
		$Html .= "<td class='bord_gauche' width='8'><img src='".C_SITE_REPERTOIRE."Images/rech_bord_hg.gif' alt='' height='5' width='8'></td>";
		$Html .= "<td class='bord_haut_p1' valign='bottom' width='50%'>";
		$Html .= "<h3>".$FrmTitre."</h3>";
		$Html .= "</td>";
		$Html .= "<td width='21'><img src='".C_SITE_REPERTOIRE."Images/rech_bord_h_arr.gif' alt='' height='25' width='21'></td>";
		$Html .= "<td class='bord_haut_p2' bgcolor='".C_HTML_BLANC."' width='50%'></td>";
		$Html .= "<td bgcolor='".C_HTML_BLANC."' valign='bottom' width='8'><img src='".C_SITE_REPERTOIRE."Images/rech_bord_hd.gif' alt='' height='6' width='8'></td>";
		$Html .= "</tr>";
		$Html .= "<tr bgcolor='#f1f1f1' valign='top'>";
		$Html .= "<td class='bord_gauche' width='8'><img src='".C_SITE_REPERTOIRE."Images/spacer.gif' alt='' height='1' width='8'></td>";
		$Html .= "<td colspan='3' align='right'><span class='CGtxgrismoyen'>".Trim($Ref)."</span></td>";
		$Html .= "<td class='bord_droit' width='8'><img src='".C_SITE_REPERTOIRE."Images/spacer.gif' alt='' height='1' width='8'></td>";
		$Html .= "</tr>";
		return $Html;
	}
	
	function get_TrColor($ILigne)
	{
		if ($ILigne % 2 == 1){
			echo "<tr bgcolor='".C_HTML_GRIS."' valign='top' onMouseOver=\"javascript:this.className='TrSelected'\" onMouseOut=\"javascript:this.className='TrNormal'\">\n";
		}else{
			echo "<tr bgcolor='".C_HTML_BLANC."' valign='top' onMouseOver=\"javascript:this.className='TrSelected'\" onMouseOut=\"javascript:this.className='TrNormal'\">\n";
		}
	}
	
	function get_Patientez(){
		$Patientez = "";
		$Patientez.="<table width='100%' border=0>";
		$Patientez.="<tr><td align='center'>";
		$Patientez.="<b><span id='MessageHaut' name='MessageHaut'>&nbsp;</span></b>";
		$Patientez.="</td></tr>";
		$Patientez.="</table>";
		return $Patientez;	
	}
	
?>
