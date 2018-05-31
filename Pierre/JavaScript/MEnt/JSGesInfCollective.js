const Page_D = "GesInfCollective_D.php";
const Page_L = "GesInfCollective_L.php";

function VerifForm() {
	putMessageInformationHautBas(C_MES_PATIENTEZ_MODIF);
	var strErreur;
	strErreur = '';
	
	if (document.frmAdmin.IdEquipe.value == 0){
		strErreur+= C_TAB + C_EQUIPE + C_BR;
	};
	
	document.frmAdmin.DateE.value = trim(document.frmAdmin.DateE.value);
	if (!isDate(document.frmAdmin.DateE.value)) {	
		strErreur+= C_TAB + C_DATE + C_BR;
	}

	document.frmAdmin.Lieu.value = trim(document.frmAdmin.Lieu.value);
	if (document.frmAdmin.Lieu.value=="") {
		strErreur+= C_TAB + C_LIEU + C_BR;
	}
	
	if (document.frmAdmin.Moment.value == 0){
		strErreur+= C_TAB + C_MOMENT + C_BR;
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