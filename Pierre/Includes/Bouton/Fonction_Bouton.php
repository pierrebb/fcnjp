<?
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:
// DATE Avril 2012
//
// function get_bouton()
// function get_boutonActualiser($s_js, $s_lib="Actualiser")
// function get_boutonCalendrier($s_js="cal1.popup()", $s_lib="Calendrier")
// function get_boutonCodeBarre($s_js, $s_lib="Export")
// function get_boutonCompteur($s_js, $s_lib="")
// function get_boutonDelete($s_js, $s_lib="")
// function get_boutonEditer($s_js = "ExportExcel()", $s_lib="Editer")
// function get_boutonExcel($s_js = "ExportExcel()", $s_lib="Export Excel")
// function get_boutonFiche($s_js, $s_lib="Fiche")
// function get_boutonFacture($s_js, $s_lib="Facture")
// function get_boutonInsert($s_js = "Insert()", $s_lib="")
// function get_boutonImporterNomen($s_js, $s_lib="")
// function get_boutonLook($s_js, $s_lib="Editer item")
// function get_boutonOpenMenu($Menu)
// function get_boutonPdf($s_js = "ExportPDF()", $s_lib="Export pdf")
// function get_boutonJSQuitter($s_js)
// function get_boutonQuitter($s_qui="")
// function get_boutonPrecedent($s_js, $s_lib="Précédente")
// function get_boutonReOuvrir($s_js, $s_lib="Ouvrir item")
// function get_boutonSelect($s_js, $s_lib="Editer item")
// function get_boutonSuivant($s_js, $s_lib="Suivant")
// function get_boutonJSValider($s_js, $s_lib="Valider")
// function get_boutonValider()
// function get_LienOpenMenu($Item, $Menu)

	function get_bouton($s_lib, $s_lien, $s_id, $s_length="", $s_class="", $b_blank=FALSE)
	{
		$s_blank= "";
		$s_style;
		if ($b_blank == TRUE) {
			$s_blank = "target='_blank'";
		}
		if ($s_length <> "") {
			$s_length = "style='width:".$s_length."px'";
		}

		if ($s_class!=''){
			$s_lib = '&nbsp;&nbsp;'.$s_lib;
		}
		$bouton  = "<a class='bouton' href=\"".$s_lien."\" id=\"".$s_id."\" name=\"".$s_id."\"".$s_blank.">";
		$bouton .= "<span class='left".$s_class."'></span><span class='center' ".$s_length.">".$s_lib."</span><span class='right'></span></a>";

		return ($bouton);
	}

	function get_boutonActualiser($s_js, $s_lib="Actualiser")
	{
		$bouton = "<a href='javascript:$s_js'><span class='animation_icone'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoActualiser.gif' id='btOuvrir' name='btOuvrir' onmouseover=\"this.style.cursor='hand'\" border='0' title='$s_lib'></span></a>";
		return ($bouton);
	}
	
	function get_boutonCalendrier($s_js="cal1.popup()", $s_lib="Calendrier")
	{
		$bouton = "<a href='javascript:$s_js'><span class='animation_icone'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoCalendrier.gif' id='btCalendrier' name='btCalendrier' onmouseover=\"this.style.cursor='hand'\" border='0' title='$s_lib'></span></a>";
		return ($bouton);
	}
	
	function get_boutonCodeBarre($s_js, $s_lib="Export")
	{
		$bouton = "<a href='javascript:$s_js'><span class='animation_icone'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoCD.gif' id='btCodeBarre' name='btCodeBarre' onmouseover=\"this.style.cursor='hand'\" border='0' title='$s_lib'></span></a>";
		return ($bouton);
	}
	
	function get_boutonCompteur($s_js, $s_lib="")
	{
		$bouton = "<a href='javascript:$s_js'><span class='animation_icone'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoCompteur.gif' id='btCodeBarre' name='btCodeBarre' onmouseover=\"this.style.cursor='hand'\" border='0' title='$s_lib'></span></a>";
		return ($bouton);
	}
	
	function get_boutonDelete($s_js, $s_lib="Supprimer item")
	{
		$bouton = "<a href='javascript:$s_js'><span class='animation_icone'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoSupprimer.gif' id='btSupprimer' name='btSupprimer' onmouseover=\"this.style.cursor='hand'\" border='0' title='$s_lib'></span></a>";
		return ($bouton);
	}
	
	function get_boutonDupliquer($s_js, $s_lib="Dupliquer item")
	{
		$bouton = "<a href='javascript:$s_js'><span class='animation_icone'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoActualiser.gif' id='btDupliquer' name='btDupliquer' onmouseover=\"this.style.cursor='hand'\" border='0' title='$s_lib'></span></a>";
		return ($bouton);
	}
	
	function get_boutonEditer($s_js = "ExportExcel()", $s_lib="Editer")
	{
		$bouton = "<a href='javascript:$s_js'><span class='animation_icone'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoEditer.gif' id='btEditer' name='btEditer' onmouseover=\"this.style.cursor='hand'\" border='0' title='$s_lib'></span></a>";
		return ($bouton);
	}
	
	function get_boutonExcel($s_js = "ExportExcel()", $s_lib="Export Excel")
	{
		$bouton = "<a href='javascript:$s_js'><span class='animation_icone'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoExportExcel.gif' id='btExcel' name='btExcel' onmouseover=\"this.style.cursor='hand'\" border='0' title='$s_lib'></span></a>";
		return ($bouton);
	}
	
	function get_boutonFiche($s_js, $s_lib="Fiche")
	{
		$bouton = "<a href='javascript:$s_js'><span class='animation_icone'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoFiche.gif' id='btFiche' name='btFiche' onmouseover=\"this.style.cursor='hand'\" border='0' title='$s_lib'></span></a>";
		return ($bouton);
	}
	
	function get_boutonFicheArticle($s_js, $c_Code, $s_lib="Fiche Article")
	{
		$bouton = "<a href='javascript:$s_js'><span class='animation_icone'>".$c_Code."</span></a>";
		return ($bouton);
	}
	
	function get_boutonFicheNomen($s_js, $s_lib="Fiche nomenclature")
	{
		$bouton = "<a href='javascript:$s_js'><span class='animation_icone'>".C_NOMEN_NOM."</span></a>";
		return ($bouton);
	}
	
	function get_boutonFacture($s_js, $s_lib="Facture")
	{
		$bouton = "<a href='javascript:$s_js'><span class='animation_icone'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoFacture.gif' id='btFacture' name='btFacture' onmouseover=\"this.style.cursor='hand'\" border='0' title='$s_lib'></span></a>";
		return ($bouton);
	}
	
	function get_boutonInsert($s_js = "Insert()", $s_lib="Créer item")
	{
		$bouton= "<a href='javascript:$s_js' Title='".$s_lib."'><span class='animation_icone'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoAjout.gif' id='btInsert' name='btInsert' onmouseover=\"this.style.cursor='hand'\" border='0'></span></a>";
		return ($bouton);
	}

	function get_boutonImporterNomen($s_js, $s_lib="")
	{
		$bouton = "<a href='javascript:$s_js'><span class='animation_icone'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoImporter.gif' id='btCodeBarre' name='btCodeBarre' onmouseover=\"this.style.cursor='hand'\" border='0' title=\"$s_lib\"></span></a>";
		return ($bouton);
	}
	
	function get_boutonListe($s_js, $s_lib="Fiche", $s_text)
	{
		$bouton = "<a href='javascript:$s_js'><span class='animation_icone'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoListe.gif' id='btFiche' name='btFiche' onmouseover=\"this.style.cursor='hand'\" border='0' title='$s_lib'><b>$s_text</b></span></a>";
		return ($bouton);
	}
	
	function get_boutonLook($s_js, $s_lib="Editer item")
	{
		$bouton = "<a href='javascript:$s_js'><span class='animation_icone'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoLoupe.gif' id='btEditer' name='btEditer' onmouseover=\"this.style.cursor='hand'\" border='0' title='$s_lib'></span></a>";
		return ($bouton);
	}
	
	function get_boutonOpenMenu($Menu)
	{
		$bouton="<a href='javascript:".$Menu."'><span class='animation_icone'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoOuvrir.gif' id='btEditer' name='btEditer' onmouseover=\"this.style.cursor='hand'\" border='0' title='Ouvrir le menu'></span></a>";
		return ($bouton);
	}
	
	function get_boutonPdf($s_js = "ExportPDF()", $s_lib="Export pdf")
	{
		$bouton = "<a href='javascript:$s_js'><span class='animation_icone'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoFichierPdf.gif' id='btPdf' name='btPdf' onmouseover=\"this.style.cursor='hand'\" border='0' title='$s_lib'></span></a>";
		return ($bouton);
	}
	
	function get_boutonJSQuitter($s_js)
	{
		$bouton= "<a href='javascript:$s_js'><span class='animation_icone'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoAnnuler.gif' id='btQuitter' name='btQuitter' border='0' title='Quitter'></span></a>";
		return ($bouton);
	}
	
	function get_boutonPrecedent($s_js, $s_lib="Précédente")
	{
		$bouton = "<a href=\"javascript:$s_js\"><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoPrecedent.gif' id='btPrecedent' name='btPrecedent' border='0' title ='$s_lib'></a>";
		return ($bouton);
	}
	
	function get_boutonQuitter($s_qui="")
	{
		$bouton= "<a href=".$s_qui."><span class='animation_icone'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoAnnuler.gif' id='btQuitter' name='btQuitter' border='0' title='Quitter'></span></a>";
		return ($bouton);
	}

	function get_boutonReOuvrir($s_js, $s_lib="Ouvrir item")
	{
		$bouton = "<a href='javascript:$s_js'><span class='animation_icone'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoActualiser.gif' id='btOuvrir' name='btOuvrir' onmouseover=\"this.style.cursor='hand'\" border='0' title='$s_lib'></span></a>";
		return ($bouton);
	}
	
	function get_boutonSelect($s_js, $s_lib="Editer item")
	{
		$bouton = "<a href='javascript:$s_js'><span class='animation_icone'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoEditer.gif' id='btEditer' name='btEditer' onmouseover=\"this.style.cursor='hand'\" border='0' title='$s_lib'></span></a>";
		return ($bouton);
	}
	
	function get_boutonSuivant($s_js, $s_lib="Suivant")
	{
		$bouton = "<a href=javascript:$s_js><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoSuivant.gif' id='btSuivant' name='btSuivant' border='0' title ='$s_lib'></a>";
		return ($bouton);
	}
	
	function get_boutonJSValider($s_js, $s_lib="Valider")
	{
		$bouton = "<a href='javascript:$s_js'><span class='animation_icone'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoValider.gif' id='btValider' name='btValider' onmouseover=\"this.style.cursor='hand'\" border='0' title='$s_lib'></span></a>";
		return ($bouton);
	}
	
	function get_boutonValider()
	{
		$bouton= "<span class='animation_icone'><input type=image src='".C_SITE_REPERTOIRE."Images/Icono/IcoValider.gif' alt='Valider' id='btValider' name='btValider' onmouseover=\"this.style.cursor='hand'\" border='0' title='Valider'></span>";
		return ($bouton);
	}

	function get_boutonValiderVide()
	{
		$bouton= "<input type=image src='' alt='' id='btValider' name='btValider'  border='0' title='Valider'>";
		return ($bouton);
	}
	
	function get_lienValider()
	{
		$bouton= "<span class='animation_icone'><a href='javascript:VerifForm()'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoValider.gif' alt='Valider' id='btValider' name='btValider' onmouseover=\"this.style.cursor='hand'\" border='0' title='Valider'></a></span>";
		return ($bouton);
	}
	
	// Bouton de selection
	function get_boutonDeSelection($s_js, $Name)
	{
		$bouton= "<button class='bouton' type='button' id='$Name' name='$Name' OnClick='$s_js'><span class='animation_icone'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoPrecedent.gif'  onmouseover=\"this.style.cursor='hand'\" border='0' title=''></span></button>";
		return ($bouton);
	}
	function get_boutonSelection($s_js, $Name)
	{
		$bouton= "<button class='bouton' type='button' id='$Name' name='$Name' OnClick='$s_js'><span class='animation_icone'><img src='".C_SITE_REPERTOIRE."Images/Icono/IcoSuivant.gif'  onmouseover=\"this.style.cursor='hand'\" border='0' title=''></span></button>";
		return ($bouton);
	}
	
	
	function get_LienOpenMenu($Item, $Menu)
	{
		$Lien="<a href='javascript:".$Menu."' class='TitreMenu'>$Item</a>";
		return ($Lien);
	}
	?>
