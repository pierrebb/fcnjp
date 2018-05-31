//function Detail(Url)
//function Fiche(Url)
//function getDelete(Id, Page)
//function getLength(Champ,Limite)
//function getModifTrue()
//function getSelect(Id, Page)
//function Imprimer()
//function InitMessage()
//function ltrim(aString)
//function OpenWindow(url, nom)
//function OpenURL(url)
//function QuitterForm()
//function rtrim(aString)
//function strPad(input, length, string)
//function TestEmail(Email)
//function trim(aString)
//function VerifCaratere(){

var regExpBeginning = /^\s+/;
var regExpEnd = /\s+$/;

function Detail(Url){OpenWindow(Url,"Detail");}

// Url est une liste de'URL. le | est le separateur de liste.
function Fiche(Url){
	results = Url.split("|");
	var NbA = results.length;
	if (NbA > 0){
		for(I=0; I<NbA; I++) {
			if (trim(results[I]) != "") {OpenWindow(results[I], "Fiche_"+I);}
		}
	}
	//putMessageInformationHautBas();
}

function getDelete(Id, Page){
	document.frmAdmin.IdItem.value=Id;
	document.frmAdmin.ActionPHP.value = C_DELETE;
	document.frmAdmin.action = Page;
	document.frmAdmin.submit();
}

function getDeleteARNO(Id, Page, Type){
	document.frmAdmin.IdItem.value=Id;
	if (Type == C_TYPE_NO){
		document.frmAdmin.ActionPHP.value = C_DELETE_NO;
	}else{
		document.frmAdmin.ActionPHP.value = C_DELETE_AR;
	}
	document.frmAdmin.action = Page;
	document.frmAdmin.submit();
}

// Limite le nb de char sur un TextArea
function getLength(Champ,Limite){
	var Texte=Champ.value;
	if (Texte.length > Limite){
		Texte = Texte.substring(0,Limite);
		Champ.value = Texte;
	}
}

function getModifTrue(){
	putMessageInformationHautBas(C_CHAMP_SAUVEGARDE);
	if(document.getElementById("Save")) { document.getElementById("Save").value = "1";}
	document.body.style.cursor = 'default';
}

function getSelect(Id, Page, ActionPHP){
	
	if( typeof(ActionPHP) == C_UNDEFINED) { ActionPHP = C_UPDATE; }
	if (Id > 0 ) { putMessageInformationHautBas(); }
	if(document.frmAdmin.IdItem) { document.frmAdmin.IdItem.value=Id; }
	document.frmAdmin.ActionPHP.value = ActionPHP;
	document.frmAdmin.action = Page;
	document.frmAdmin.submit();
}

function Imprimer(){javascript:window.print();}

// Supprime les espaces inutiles en debut de la chaine passee en parametre.
function ltrim(aString) {return aString.replace(regExpBeginning, "");}

function OpenWindow(url, nom){

	putMessageInformationHautBas("");

	var taille_w = C_TAILLE_W;
	var taille_h = C_TAILLE_H;
	var top_w    = 0;
	var top_h    = 0;
	if (screen.height > taille_h)
	{
		top_h = (screen.height - taille_h) / 2;
	}
	if (screen.width > taille_w)
	{
		top_w = (screen.width - taille_w) / 2;
	}
	window.winref= window.open(url, nom, "top="+top_h+",left="+top_w+",width="+taille_w+",height="+taille_h+",scrollbars=yes,resizeble=0,menubar=yes,toolbar=yes,location=no");
	if (window.winref) {window.winref.focus(); }
}

function OpenURL(Url){
	putMessageInformationHautBas("");
	document.location.href = Url;
}

function QuitterForm() { window.close(); }

// Supprime les espaces inutiles en fin de la chaene passee en parametre.
function rtrim(aString) {return aString.replace(regExpEnd, "");}

// Fonction pour completer une chaine
function strPad(input, length, string) {
    string = string || '0'; input = input + '';
    return input.length >= length ? input : new Array(length - input.length + 1).join(string) + input;
}

// Tester une adresse Email
function TestEmail(Email){
	var verif   =/^([a-zA-Z0-9]+(([\.\-\_]?[a-zA-Z0-9]+)+)?)\@(([a-zA-Z0-9]+[\.\-\_])+[a-zA-Z]{2,3})$/

	if (verif.exec(Email) == null){
		return false;
	}
	else
	{
		return true;
	}
}

// Supprime les espaces inutiles en debut et fin de la chaine passee en parametre.
function trim(aString) {
	if (typeof aString != C_UNDEFINED) {
		return aString.replace(regExpBeginning, "").replace(regExpEnd, "");
	}else{
		return "";
	}
}

// Supprimer les doublons dans un tableau
function RemoveDupArray(array){
	array.sort();
	for (var i = 1; i < array.length; i++){
	  if (array[i-1] === array[i])
	    array.splice(i, 1);
	}
	return array.length;
}

function VerifCaratere(Champ){
	
	var regex = new RegExp(/([^A-Za-z0-9])/);
	
	  //if (regex.test(trim(document.frmAdmin.CodeArticleAH.value))) {
	  if (regex.test(trim(document.getElementById(Champ).value))) {
          return false;
	  }
	  return true;
}

function get_TrColor(ILigne)
{
	if (ILigne % 2 == 1){
		return "<tr bgcolor='"+C_HTML_GRIS+"' valign='top' onMouseOver=\"javascript:this.className='TrSelected'\" onMouseOut=\"javascript:this.className='TrNormal'\">\n";
	}else{
		return "<tr bgcolor='"+C_HTML_BLANC+"' valign='top' onMouseOver=\"javascript:this.className='TrSelected'\" onMouseOut=\"javascript:this.className='TrNormal'\">\n";
	}
}
