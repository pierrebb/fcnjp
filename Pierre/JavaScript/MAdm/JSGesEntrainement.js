const Page_D = "GesEntrainement_D.php";
const Page_L = "GesEntrainement_L.php";

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
	if(document.getElementById("IdInfoCollective")) {document.frmAdmin.IdInfocollective.value=0;}
	if(document.getElementById("IdEquipe")) {document.frmAdmin.IdEquipe.value="";}
	if(document.getElementById("DateEntrainement")) {document.frmAdmin.DateEntrainement.value="";}
	if(document.getElementById("Lieux")) {document.frmAdmin.Lieux.value=0;}
	if(document.getElementById("Moment")) {document.frmAdmin.Moment.value="";}
	if(document.getElementById("Libelle")) {document.frmAdmin.Libelle.value="";}
	
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