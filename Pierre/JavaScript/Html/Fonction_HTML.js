// function get_boutonDelete($s_js, $s_lib)
// function get_boutonEditer($s_js, $s_lib)
// function get_boutonJSQuitter($s_js)
// function get_CloseSpan($Span)
// function get_InputText
// function get_boutonJSValider($s_js, $s_lib)
// function putMessageInformationHautBas()

	function get_boutonDelete($s_js, $s_lib)
	{
		$s_lib = (typeof $s_lib !== C_UNDEFINED) ?  "Supprimer item" : $s_lib;
		$bouton = "<a href='javascript:"+$s_js+"'><span class='animation_icone'><img src='"+C_SITE_REPERTOIRE+"Images/Icono/IcoSupprimer.gif' id='btSupprimer' name='btSupprimer' onmouseover=\"this.style.cursor='hand'\" border='0' title='"+$s_lib+"'></span></a>";
		return ($bouton);
	}
	
	function get_boutonEditer($s_js, $s_lib)
	{
		$s_lib = (typeof $s_lib !== C_UNDEFINED) ?  "Editer" : $s_lib;
		$bouton = "<a href='javascript:"+$s_js+"'><span class='animation_icone'><img src='"+C_SITE_REPERTOIRE+"Images/Icono/IcoEditer.gif' id='btEditer' name='btEditer' onmouseover=\"this.style.cursor='hand'\" border='0' title='"+$s_lib+"'></span></a>";
		return ($bouton);
	}
	
	function get_boutonJSQuitter($s_js)
	{
		$bouton= "<a href='javascript:"+$s_js+"'><span class='animation_icone'><img src='"+C_SITE_REPERTOIRE+"Images/Icono/IcoAnnuler.gif' id='btQuitter' name='btQuitter' border='0' title='Quitter'></span></a>";
		return ($bouton);
	}

	function get_CloseSpan($Span){
		if(document.getElementById($Span)) { document.getElementById($Span).innerHTML = ""; }
	}

	function get_InputText($s_Name, $s_Size, $s_Length, $s_Value, $Style, $JS)
	{
		$Html = '';
		$Html = "<input type='text' name='"+$s_Name+"' id='"+$s_Name+"' size='"+$s_Size+"' maxlength='"+$s_Length+"' value=\""+$s_Value+"\" "+$Style+" "+$JS+">";
		return ($Html);
	}

	function get_boutonJSValider($s_js, $s_lib)
	{
		$s_lib = (typeof $s_lib !== C_UNDEFINED) ?  "Valider" : $s_lib;
		$bouton = "<a href='javascript:"+$s_js+"'><span class='animation_icone'><img src='"+C_SITE_REPERTOIRE+"Images/Icono/IcoValider.gif' id='btValider' name='btValider' onmouseover=\"this.style.cursor='hand'\" border='0' title='"+$s_lib+"'></span></a>";
		return ($bouton);
	}
	
	function putMessageInformationHautBas(Message){

		var Style = "style='color:"+C_HTML_COULEUR_MESSAGE_HAUT_BAS+"'";
		if (typeof Message == C_UNDEFINED){
			Message = "<span "+Style+">"+C_MES_PATIENTEZ+"</span>";
			document.body.style.cursor = 'wait';
		}else{
			if (Message == "") {document.body.style.cursor = 'default';};
			 Message = "<span "+Style+">"+Message+"</span>";
		}
		
		if(document.getElementById("MessageHaut")) {document.getElementById("MessageHaut").innerHTML = Message;}
		if(document.getElementById("MessageBas")) {document.getElementById("MessageBas").innerHTML = Message;}
	}
	
