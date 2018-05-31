<?php
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:	-->

session_start();
session_destroy();

	require_once('Includes/Include_Login.php');
	$Status = 0;
	if (isset($_GET['Status'])) {$Status=$_GET['Status'];}
?>
	
<html>
<head>
<title><?=C_APP_TITRE;?></title>
<link rel="icon" type="image/png" href="Images/Icono/favicon.png"/>
<?
	require_once ('Includes/Include_CssMenu.php');

?>

<script type="text/javascript">

// fonction executer lors du clic sur le bouton de connexion
function connecter() {
	document.frmAdmin.action = "AdminVerifAuth.php";
	//document.frmAdmin.MdpMD5.value=hex_md5(document.frmAdmin.Mdp.value);
	document.frmAdmin.MdpMD5.value=document.frmAdmin.Mdp.value;
	document.frmAdmin.submit();
}

</script>
</head>
<body onLoad="document.frmAdmin.Login.focus()" bgcolor="#FFFFFF">
<FORM action="javascript:connecter()" method=POST name="frmAdmin" id="frmAdmin" style="text-align: center">
<input type="hidden" name="MdpMD5" id="MdpMD5" value=""/>
<table width="100%" height="80%" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td>
			<div>
				<table width="348" border="0" cellspacing="0" cellpadding="0" align="center">
					<tr>
						<td align="center"><img src="Images/Logo/Logo_admin.png" width="100px"><h1><?=C_APP_TITRE_LOGIN;?></h1></td>
					</tr>
					<tr>
						<td align="center"></td>
					</tr>
					<tr>
						<td align='center'>
							<span id="MessageHaut" name="MessageHaut" style='color:#B40431;'>
							<?
								switch($Status)
								{
									case C_ACTEUR_INACTIF:
										echo C_ACTEUR_TXT_INACTIF;
										break;
									case C_COUT_INACTIF:
										echo C_COUT_TXT_INACTIF;
										break;
									case C_ROLE_INACTIF:
										echo C_ROLE_TXT_INACTIF;
										break;
									case C_LOGIN_INACTIF:
										echo C_LOGIN_TXT_INACTIF;
										break;
										default:
										echo "&nbsp;";
								}							
							?>
							</span>
						</td>
					</tr>
					<tr>
						<td><img src="Images/cnx_haut.gif" alt="" width="348" height="38" border="0"></td>
					</tr>
				</table>
				<table width="348" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#f1f1f1">
					<tr>
						<td width="6" style="background-image: url(Images/cnx_gauche.gif); background-position: left top; background-repeat: repeat-y;"><img src="Images/spacer.gif" width="6" height="1" alt=""></td>
						<td align="center">
							&nbsp;<br>
							<table border="0" cellspacing="0" cellpadding="0" align="center" width="90%">
								<tr>
									<td><?=C_LOGIN_NOM?></td>
									<td align="right">
										<?=get_InputLogin('Login', C_LOGIN_LEN, C_LOGIN_MAX, 'Bezyp')?>
										
									</td>
								</tr>
								<tr>
									<td colspan="2"><img src="Images/spacer.gif" width="1" height="6" alt=""></td>
								</tr>
								<tr>
									<td><?=C_PASSWORD_NOM?></td>
									<td align="right">
										<?=get_InputPassword('Mdp', C_PASSWORD_LEN, C_PASSWORD_MAX, '12345')?>
									</td>
								</tr>
							</table>
						</td>
						<td width="4" style="background-image: url(Images/cnx_droite.gif); background-position: right top; background-repeat: repeat-y;"><img src="Images/spacer.gif" width="4" height="1" alt=""></td>
					</tr>
				</table>
				<table width="348" border="0" cellspacing="0" cellpadding="0" align="center">
					<tr>
						<td height="49" style="background-image: url(Images/cnx_bas.gif); background-position: bottom; background-repeat: no-repeat;">
							<table width="100%">
								<tr>
									<td width="50%" valign="top"></td>
									<td width="50%" align="right"><img src="Images/spacer.gif" width="1" height="8" alt=""><br>
										<input type="image" src="Images/Icono/BoutSeConnect.gif" alt="" name="BoutSeConnect" id="BoutSeConnect" border="0">
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
</table>
</FORM>
</body>
</html>
