const Page_D = "GesJouMalade_D.php";
const Page_L = "GesJouMalade_L.php";

function VerifForm() {
	putMessageInformationHautBas(C_MES_PATIENTEZ_MODIF);
	var strErreur;
	strErreur = '';
	
	if (document.frmAdmin.IdPersonne.value == 0){
		strErreur+= C_TAB + C_PERSONNE + C_BR;
	};
	
	if (document.frmAdmin.IdMal.value == 0){
		strErreur+= C_TAB + C_MALADE + C_BR;
	};
	
	document.frmAdmin.DateDebut.value = trim(document.frmAdmin.DateDebut.value);
	if (!isDate(document.frmAdmin.DateDebut.value)) {	
		strErreur+= C_TAB + C_DATE + C_BR;
	};

	document.frmAdmin.Repriset.value = trim(document.frmAdmin.Reprise.value);
	if (!isDate(document.frmAdmin.Reprise.value)) {	
		strErreur+= C_TAB + C_DATE + C_BR;
	}
	
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