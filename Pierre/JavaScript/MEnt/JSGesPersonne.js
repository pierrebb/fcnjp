const Page_D = "GesPersonne_D.php";
const Page_L = "GesPersonne_L.php";

function VerifForm() {
	putMessageInformationHautBas(C_MES_PATIENTEZ_MODIF);
	var strErreur;
	strErreur = '';
	
	if (document.frmAdmin.IdProfil.value == 0){
		strErreur+= C_TAB + C_PROFIL + C_BR;
	}
	
	if (document.frmAdmin.IdStatut.value == 0){
		strErreur+= C_TAB + C_STATUT + C_BR;
	}
	
	if (document.frmAdmin.IdPoste.value == 0){
		strErreur+= C_TAB + C_POSTE + C_BR;
	}
	
	if (document.frmAdmin.IdEquipe.value == 0){
		strErreur+= C_TAB + C_EQUIPE + C_BR;
	};
	
	document.frmAdmin.Nom.value = trim(document.frmAdmin.Nom.value);
	if (!isDate(document.frmAdmin.Nom.value)) {	
		strErreur+= C_TAB + C_NOM + C_BR;
	}

	document.frmAdmin.Prenom.value = trim(document.frmAdmin.Prenom.value);
	if (document.frmAdmin.Prenom.value=="") {
		strErreur+= C_TAB + C_PRENOM + C_BR;
	}
	
	document.frmAdmin.Telephone.value = trim(document.frmAdmin.Prenom.value);
	if (document.frmAdmin.Telephone.value=="") {
		strErreur+= C_TAB + C_TELEPHONE + C_BR;
	}
		document.frmAdmin.Courriel.value = trim(document.frmAdmin.Courriel.value);
	if (document.frmAdmin.Courriel.value=="") {
		strErreur+= C_TAB + C_COURRIEL + C_BR;
	}
		document.frmAdmin.Adresse.value = trim(document.frmAdmin.Adresse.value);
	if (document.frmAdmin.Adresse.value=="") {
		strErreur+= C_TAB + C_ADRESSE + C_BR;
	}
		document.frmAdmin.Naissance.value = trim(document.frmAdmin.Naissance.value);
	if (document.frmAdmin.Naissance.value=="") {
		strErreur+= C_TAB + C_NAISSANCE + C_BR;
	}
			document.frmAdmin.Actif.value = trim(document.frmAdmin.Actif.value);
	if (document.frmAdmin.Actif.value=="") {
		strErreur+= C_TAB + C_ACTIF + C_BR;
	};
	if (strErreur != ""){
		strErreur = C_ERREUR + strErreur;
		alert(strErreur);
		putMessageInformationHautBas("");
		return false;
	}else{
		document.frmAdmin.Bdd.value=1;
		return true;
	}
}

function Insert(){
	putMessageInformationHautBas();
	if(document.getElementById("IdItem")) {document.frmAdmin.IdItem.value=0;}
	if(document.getElementById("Code")) {document.frmAdmin.Code.value="";}
	
	document.frmAdmin.ActionPHP.value=C_INSERT;
	document.frmAdmin.action = Page_D;
	document.frmAdmin.submit();
}

function Delete(Id){
	if(confirm(C_DELETE_ITEM)){
		getDelete(Id, Page_L);
	}
}

function Select(Id){
	getSelect(Id, Page_D);
}