const Page_D = "GesParam_D.php";

function VerifForm(Type) {
	putMessageInformationHautBas(C_MES_PATIENTEZ_MODIF);
	var Valeur = document.frmAdmin.ValParam.value;
	var strErreur = '';

	switch(Type){ 
		// Date
		case '1': 
			break;
			
		// Numerique 
		case '2': 
			if (!TestIntPositif(Valeur)){
				strErreur = C_PARAM_TYPE_2_MES+" \n";
			}
			break; 
	
		// Caractere
		case '3': 
			break;
	
		// Liste stock
		case '4': 
			if (Valeur != C_STOCK_CALCUL_CMD && Valeur != C_STOCK_CALCUL_LIV){
				strErreur = C_PARAM_TYPE_4_MES+" \n";
			}
			break; 
			
		// Gestion BL
		case '5': 
			if (Valeur != C_BL_AUTO && Valeur != C_BL_MANU){
				strErreur = C_PARAM_TYPE_5_MES+" \n";
			}
			break; 
	
		// Separateur excell
		case '6': 
			if (Valeur != C_POINT && Valeur != C_VIRGULE){
				strErreur = C_PARAM_TYPE_6_MES+" \n";
			}
			break; 
	
		// Mdp
		case '7': 
			break; 
	
		// Reel 
		case '8': 
			if (!TestFloat(Valeur)){
				strErreur = C_PARAM_TYPE_8_MES+" \n";
			}
			break; 
	
		default:
			strErreur = C_PARAM_TYPE_X_MES + Type;
	}

	if (strErreur != ""){
		alert(strErreur);
		putMessageInformationHautBas("");
		return false;
	}else{
		document.frmAdmin.Bdd.value=1;
		return true;
	}
}

function Select(Id){
//	getSelect(Id, Page_D);
	putMessageInformationHautBas();
	document.frmAdmin.Code.value=Id;
	document.frmAdmin.ActionPHP.value=C_UPDATE;
	document.frmAdmin.action = Page_D;
	document.frmAdmin.submit();	
}
