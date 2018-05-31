var httpSession = getHTTPObject();

function AskFicheActeur(Param){
	HttpMajData(httpSession, C_SITE_REPERTOIRE+"Includes/Http/HttpSessionActeur.php?Id="+Param, handleHttpResponseSessionActeur);
}

function handleHttpResponseSessionActeur() {
	if (httpSession.readyState == 4) { Fiche(C_SITE_REPERTOIRE+'www/MAdm/GesActeur_Txt.php') };
}

function AskFicheClient(Param){
	HttpMajData(httpSession, C_SITE_REPERTOIRE+"Includes/Http/HttpSessionClient.php?Id="+Param, handleHttpResponseSessionClient);
}

function handleHttpResponseSessionClient() {
	if (httpSession.readyState == 4) { Fiche(C_SITE_REPERTOIRE+'www/MClient/Export/GesClient_Txt.php') };
}

function AskRechercheArticleClient(Param){
	HttpMajData(httpSession, C_SITE_REPERTOIRE+"Includes/Http/HttpSessionClient.php?Id="+Param, handleHttpResponseSessionRechercheArticleClient);
}

function handleHttpResponseSessionRechercheArticleClient() {
	if (httpSession.readyState == 4) { OpenWindow( C_SITE_REPERTOIRE+'www/MArticle/GesArtiCmd_R.php') };
}

function AskFicheEnt(Param){
	HttpMajData(httpSession, C_SITE_REPERTOIRE+"Includes/Http/HttpSessionDossier.php?Id="+Param, handleHttpResponseSessionEnt);
}

function handleHttpResponseSessionEnt() {
	if (httpSession.readyState == 4) { Fiche(C_SITE_REPERTOIRE+'www/MDossier/Export/GesDoss_Ent.php') };
}

function AskFicheDos(Param){
	HttpMajData(httpSession, C_SITE_REPERTOIRE+"Includes/Http/HttpSessionDossier.php?Id="+Param, handleHttpResponseSessionDos);
}

function handleHttpResponseSessionDos() {
	if (httpSession.readyState == 4) { Fiche(C_SITE_REPERTOIRE+'www/MDossier/Export/GesDoss_Txt.php') };
}

function AskFicheCmd(Param){
	HttpMajData(httpSession, C_SITE_REPERTOIRE+"Includes/Http/HttpSessionCmd.php?Id="+Param, handleHttpResponseSessionCmd);
}

function handleHttpResponseSessionCmd() {
	if (httpSession.readyState == 4) { Fiche(C_SITE_REPERTOIRE+'www/MCommande/Export/GesCmd_Txt.php') };
}

function AskFicheCmdRec(Param){
	HttpMajData(httpSession, C_SITE_REPERTOIRE+"Includes/Http/HttpSessionCmdRec.php?Id="+Param, handleHttpResponseSessionCmdRec);
}

function handleHttpResponseSessionCmdRec() {
	if (httpSession.readyState == 4) { Fiche(C_SITE_REPERTOIRE+'www/MArticle/GesArtiCmdRec_R.php') };
}

function AskFicheOF(Param, Etat){
	HttpMajData(httpSession, C_SITE_REPERTOIRE+"Includes/Http/HttpSessionOF.php?Id="+Param+"&Etat="+Etat, handleHttpResponseSessionOF);
}

function handleHttpResponseSessionOF() {
	if (httpSession.readyState == 4) { Fiche(C_SITE_REPERTOIRE+'www/MOrdreFab/Export/GesOF_Txt.php') };
}

function AskFicheArticle(Param){
	HttpMajData(httpSession, C_SITE_REPERTOIRE+"Includes/Http/HttpSessionArticle.php?Id="+Param, handleHttpResponseSessionArticle);
}

function handleHttpResponseSessionArticle() {
	if (httpSession.readyState == 4) { Fiche(C_SITE_REPERTOIRE+'www/MArticle/Export/GesArti_Txt.php') };
}

function AskFicheArticleDC(Param){
	HttpMajData(httpSession, C_SITE_REPERTOIRE+"Includes/Http/HttpSessionArticle.php?Id="+Param, handleHttpResponseSessionArticleDC);
}

function handleHttpResponseSessionArticleDC() {
	if (httpSession.readyState == 4) { Fiche(C_SITE_REPERTOIRE+'www/MArticle/Export/GesArtiStock_Txt.php') };
}

function AskFicheNomen(Param){
	HttpMajData(httpSession, C_SITE_REPERTOIRE+"Includes/Http/HttpSessionNomen.php?Id="+Param, handleHttpResponseSessionNomen);
}

function handleHttpResponseSessionNomen() {
	if (httpSession.readyState == 4) { Fiche(C_SITE_REPERTOIRE+'www/MNomenclature/Export/GesNomen_Txt.php') };
}

function AskFicheNomenDC(Param){
	HttpMajData(httpSession, C_SITE_REPERTOIRE+"Includes/Http/HttpSessionNomen.php?Id="+Param, handleHttpResponseSessionNomenDC);
}

function handleHttpResponseSessionNomenDC() {
	if (httpSession.readyState == 4) { Fiche(C_SITE_REPERTOIRE+'www/MNomenclature/Export/GesNomenStock_Txt.php') };
}

function AskFicheHorSemaine(IdItem, DateDep){
	HttpMajData(httpSession, C_SITE_REPERTOIRE+"Includes/Http/HttpSessionHorSem.php?Id="+IdItem+"&Da="+DateDep, handleHttpResponseSessionHorSemaine);
}

function handleHttpResponseSessionHorSemaine() {
	if (httpSession.readyState == 4) { Fiche(C_SITE_REPERTOIRE+'www/MHoraire/Export/GesHorSemaine_Txt.php') };
}

function AskFicheHorMois(IdItem, Mois, An){
	HttpMajData(httpSession, C_SITE_REPERTOIRE+"Includes/Http/HttpSessionHorMois.php?Id="+IdItem+"&Mo="+Mois+"&An="+An, handleHttpResponseSessionHorMois);
}

function handleHttpResponseSessionHorMois() {
	if (httpSession.readyState == 4) { Fiche(C_SITE_REPERTOIRE+'www/MHoraire/Export/GesHorMois_Txt.php') };
}

function AskFicheHorDetail(Param){
	HttpMajData(httpSession, C_SITE_REPERTOIRE+"Includes/Http/HttpSessionDate.php?Id="+Param, handleHttpResponseSessionHorDetail);
}

function handleHttpResponseSessionHorDetail() {
	if (httpSession.readyState == 4) { Fiche(C_SITE_REPERTOIRE+'www/MHoraire/Export/GesHorAvecDetail_Excel.php') };
}

function AskFicheHorSsDetail(Param){
	HttpMajData(httpSession, C_SITE_REPERTOIRE+"Includes/Http/HttpSessionDate.php?Id="+Param, handleHttpResponseSessionHorSsDetail);
}

function handleHttpResponseSessionHorSsDetail() {
	if (httpSession.readyState == 4) { Fiche(C_SITE_REPERTOIRE+'www/MHoraire/Export/GesHorSansDetail_Excel.php') };
}

function AskFicheDossBLExcell(IdItem, IdGroupe){
	HttpMajData(httpSession, C_SITE_REPERTOIRE+"Includes/Http/HttpSessionDossierBL.php?Id="+IdItem+"&IdG="+IdGroupe, handleHttpResponseSessionDossBLExcell);
}

function handleHttpResponseSessionDossBLExcell() {
	if (httpSession.readyState == 4) { Fiche(C_SITE_REPERTOIRE+'www/MDossier/Export/GesDoss_BL_Excell.php') };
}

function AskFicheDossFacExcell(IdItem, IdGroupe){
	HttpMajData(httpSession, C_SITE_REPERTOIRE+"Includes/Http/HttpSessionDossierBL.php?Id="+IdItem+"&IdG="+IdGroupe, handleHttpResponseSessionDossFacExcell);
}

function handleHttpResponseSessionDossFacExcell() {
	if (httpSession.readyState == 4) { Fiche(C_SITE_REPERTOIRE+'www/MDossier/Export/GesDoss_Fac_Excell.php') };
}

function AskFicheDossFacPFExcell(IdItem, IdGroupe, NGroupe){
	HttpMajData(httpSession, C_SITE_REPERTOIRE+"Includes/Http/HttpSessionDossierBL.php?Id="+IdItem+"&IdG="+IdGroupe+"&IdN="+NGroupe, handleHttpResponseSessionDossFacPFExcell);
}

function handleHttpResponseSessionDossFacPFExcell() {
	if (httpSession.readyState == 4) { Fiche(C_SITE_REPERTOIRE+'www/MDossier/Export/GesDoss_FacPF_Excell.php') };
}

function AskFicheDossBLArtExcell(IdItem, IdGroupe){
	HttpMajData(httpSession, C_SITE_REPERTOIRE+"Includes/Http/HttpSessionDossierBL.php?Id="+IdItem+"&IdG="+IdGroupe, handleHttpResponseSessionDDossBLArtExcell);
}

function handleHttpResponseSessionDDossBLArtExcell() {
	if (httpSession.readyState == 4) { Fiche(C_SITE_REPERTOIRE+'www/MDossier/Export/GesDoss_BLArt_Excell.php') };
}

function AskFicheDossAR(Param){
	HttpMajData(httpSession, C_SITE_REPERTOIRE+"Includes/Http/HttpSessionDossier.php?Id="+Param, handleHttpResponseSessionDossAR);
}

function handleHttpResponseSessionDossAR() {
	if (httpSession.readyState == 4) { Fiche(C_SITE_REPERTOIRE+'www/MDossier/Export/GesDoss_AR_Excell.php') };
}

function AskFicheListeDos(Param){
	HttpMajData(http,C_SITE_REPERTOIRE+"Includes/Http/HttpListeDos.php?Id="+Param, handleHttpListeDosCmdResponse);
}

function AskFicheListeNomen(Param){
	HttpMajData(http,C_SITE_REPERTOIRE+"Includes/Http/HttpListeNomen.php?Id="+Param, handleHttpListeDosResponse);
}

function AskFicheListeCmd(Param){
	HttpMajData(http,C_SITE_REPERTOIRE+"Includes/Http/HttpListeCmd.php?Id="+Param, handleHttpListeDosResponse);
}

function AskFicheListeOF(Param){
	HttpMajData(http,C_SITE_REPERTOIRE+"Includes/Http/HttpListeOF.php?Id="+Param, handleHttpListeDosOFResponse);
}

function AskFicheListeRecap(Param){
	HttpMajData(http,C_SITE_REPERTOIRE+"Includes/Http/HttpListeRecap.php?Id="+Param, handleHttpListeDosResponse);
}

function AskFicheListeDosRecap(Param){
	HttpMajData(http,C_SITE_REPERTOIRE+"Includes/Http/HttpListeDosRecap.php?Id="+Param, handleHttpListeDosResponse);
}
