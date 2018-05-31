const Page_D = "GesEquipe_D.php";
const Page_L = "GesEquipe_L.php";

function VerifForm() {
	putMessageInformationHautBas(C_MES_PATIENTEZ_MODIF);
	var strErreur;
	strErreur = '';
	
	document.frmAdmin.Code.value=trim(document.frmAdmin.Code.value.toUpperCase());
	if (document.frmAdmin.Code.value=="") {
		strErreur+= C_TAB + C_CODE + C_BR;
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
	if(document.getElementById("Actif")) {document.frmAdmin.Actif.value="";}
	
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