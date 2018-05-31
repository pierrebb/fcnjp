
function InitPassword()
{
	document.frmAdmin.Mdp1.value = '';
	document.frmAdmin.Mdp2.value = '';
	document.frmAdmin.MdpMD5.value = '';
	
}

function checkPassword(Mdp)
{
	var Test = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{8,}$/;
	return Test.test(Mdp);
}

function VerifForm()
{
	putMessageInformationHautBas(C_MES_PATIENTEZ_MODIF);
	if(document.frmAdmin.Mdp1.value != "" && document.frmAdmin.Mdp2.value == document.frmAdmin.Mdp2.value)
	{
		if(!checkPassword(document.frmAdmin.Mdp1.value))
			{
				alert(C_MDP_REGLE);
				document.frmAdmin.Mdp1.focus();
				putMessageInformationHautBas("");  
				return false;
			}
	} else {
	 	alert(C_MDP_ERR);
	 	document.frmAdmin.Mdp1.focus();
	 	putMessageInformationHautBas("");
	 	return false;
	 }

	 document.frmAdmin.MdpMD5.value=hex_md5(document.frmAdmin.Mdp1.value);
	 document.frmAdmin.Bdd.value=1;
	return true;
}