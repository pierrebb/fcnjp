const Page_D = "GesActeur_D.php";
const Page_InacD = "GesActeurInac_D.php";
const Page_R = "GesActeur_R.php";

function VerifForm() {
	putMessageInformationHautBas(C_MES_PATIENTEZ_MODIF);
	var strErreur;
	strErreur = '';

	// Init du mdp
	if (document.frmAdmin.ActionPHP.value == C_INIT_MDP){return true};
	
	document.frmAdmin.Nom.value=trim(document.frmAdmin.Nom.value.toUpperCase());
	if (document.frmAdmin.Nom.value=="") {
		strErreur+= C_TAB + C_NOM + C_BR;
	}

	document.frmAdmin.Prenom.value=trim(document.frmAdmin.Prenom.value.toUpperCase());
	if (document.frmAdmin.Prenom.value=="") {
		strErreur+= C_TAB + C_PRENOM_AGENT + C_BR;
	}

	var Login=trim(document.frmAdmin.Login.value.toLowerCase());
	Login = Login.replace(" ", "");
	document.frmAdmin.Login.valu = Login;
	
	if (document.frmAdmin.Login.value == "") {
		strErreur+= C_TAB + C_LOGIN + C_BR;
	}

	Affiche_champs(document.frmAdmin.select_Role, document.frmAdmin.Role);
	Affiche_champs(document.frmAdmin.select_MagP, document.frmAdmin.MagP);
	Affiche_champs(document.frmAdmin.select_MagS, document.frmAdmin.MagS);

	var array=[];
	var NBTmp=0;
	var NB=document.frmAdmin.NB.value;
	for (var i=0 ; i<NB ; i++) {
		var Action = 'Action' + i;
		var IdCout = 'IdCout' + i;
		if (document.getElementById(Action).value != C_DELETE) {
			if (document.getElementById(IdCout).value=="0") {
				strErreur+=C_TAB + C_CODE_COUT + C_BR;
			}
			array[i]=document.getElementById(IdCout).value;
			NBTmp++;
		}
	}
	// Verification des doubles (code cout)
	if ((RemoveDupArray(array))!= NBTmp) { strErreur+=C_TAB + C_DOUBLE_CODE + C_BR;}

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

function VerifFormInactif() {
	document.frmAdmin.ActionPHP.value = C_UPDATE;
	document.frmAdmin.action.value = Page_D;
	document.frmAdmin.Bdd.value=1;
	return true;
}

function VerifAdministrateur(){
	if (document.frmAdmin.Administrateur[0].checked){
		document.frmAdmin.elements.liste_Role.disabled=false;
		document.frmAdmin.elements.selectR.disabled=false;
		document.frmAdmin.elements.deselectR.disabled=false;
		document.frmAdmin.elements.select_Role.disabled=false;
		}else{
		Affiche_champs_Init(document.frmAdmin.liste_Role,document.frmAdmin.select_Role);
		document.frmAdmin.elements.liste_Role.disabled=true;
		document.frmAdmin.elements.selectR.disabled=true;
		document.frmAdmin.elements.deselectR.disabled=true;
		document.frmAdmin.elements.select_Role.disabled=true;
		}
}

function Insert(){
	putMessageInformationHautBas();
	if(document.getElementById("IdItem")) {document.frmAdmin.IdItem.value=0;}
	if(document.getElementById("Nom")) {document.frmAdmin.Nom.value="";}
	if(document.getElementById("Prenom")) {document.frmAdmin.Prenom.value="";}
	if(document.getElementById("Login")) {document.frmAdmin.Login.value="";}
	if(document.getElementById("Administrateur")) {document.frmAdmin.Administrateur.value=0;}

	document.frmAdmin.ActionPHP.value=C_INSERT;
	document.frmAdmin.action = Page_D;
	document.frmAdmin.submit();
}

function AddCout() {

    var maTable = document.getElementById("tableCout");
    var NB=document.getElementById("NB").value;

    var NB=parseInt(NB);
    var NbNew=NB+1;
    var newRow = maTable.insertRow(NbNew);
    
    var J=0;

	// On met le bon nom de la liste
	var ListeCoutTmp=ListeCout;
	var reg=new RegExp("(IdCout)", "g");
	ListeCoutTmp = ListeCoutTmp.replace(reg,"IdCout"+NB) ;

    var newCell = newRow.insertCell(J++);
    newCell.innerHTML+="<input type='hidden' name='Action"+NB+"' id='Action"+NB+"' value='"+C_INSERT+"'><span name='SAction"+NB+"' id='SAction"+NB+"'><a href='javascript:DeleteCout("+NB+")'><img src='"+C_SITE_REPERTOIRE+"Images/Icono/IcoSupprimer.gif' name='DeleteC ' value='DeleteC' border='0'></a></span>";

    var newCell = newRow.insertCell(J++);
    newCell.innerHTML+="<span name='SIdCout"+NB+"' id='SIdCout"+NB+"'>"+ListeCoutTmp+"</span>";

    var newCell = newRow.insertCell(J++);
    newCell.innerHTML+="<input type='hidden' name='CodeActeur"+NB+"' id='CodeActeur"+NB+"' value='0'>";

    var newCell = newRow.insertCell(J++);
    newCell.innerHTML+="";

    document.getElementById("NB").value=NbNew;
    getModifTrue();
}

function DeleteCout(Id){
	var SAction = "SAction"+Id;
	var Action = "Action"+Id;
	var SIdCout = "SIdCout"+Id;

	document.getElementById(Action).value = C_DELETE;
	document.getElementById(SAction).innerHTML = "";
	document.getElementById(SIdCout).innerHTML = "";
	getModifTrue();
}

function Select(Id, Actif){
	document.frmAdmin.IdItem.value=Id;
	document.frmAdmin.ActionPHP.value = C_UPDATE;
	if (Actif==1){
		document.frmAdmin.action = Page_D;
	}else{
		document.frmAdmin.action = Page_InacD;
	}
	document.frmAdmin.submit();
}

function selection_Mag(champs_init, champs_selectP, maxP, champs_selectS, maxS){

	if(champs_selectP.length >= maxP){
		selection_champs(champs_init, champs_selectS, maxS);	
	}else{
		selection_champs(champs_init, champs_selectP, maxP);	
	}
}

function deSelection_Mag(champs_selectP, champs_selectS, champs_init){
	var Mag = document.getElementById('Mag').value;
	
	switch(Mag){ 
		case C_MAG_P: 
			selection_champs(champs_selectP, champs_init , 0);	
			document.getElementById('Mag').value = "";
			break; 
		case C_MAG_S: 
			selection_champs(champs_selectS, champs_init , 0);
			document.getElementById('Mag').value = "";
			break; 
		default:
	}
}

function SelectMag(Mag){
	document.getElementById('Mag').value=Mag
}


function CalculLogin(){
	var Nom = document.getElementById('Nom').value;
	Nom = Nom.replace(" ", "");
	var Prenom = document.getElementById('Prenom').value;
	Prenom = Prenom.replace(" ", "");
	var Login = Nom.toLowerCase()+Prenom.toLowerCase().substr(0,1);
		
	document.getElementById('Login').value=Login;
}

function InitMdp(){
	document.frmAdmin.ActionPHP.value = C_INIT_MDP;
	document.frmAdmin.action = Page_D;
	document.frmAdmin.Bdd.value=1;
	document.frmAdmin.submit();
}

function SelectActeur($Id){
	var indCode = 'Code'+$Id
	var Code = document.getElementById(indCode).value;
	window.opener.CodeAdd(Code);
	QuitterForm();
}
