<?php
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:	--> Johan Le Galliot
// 		DATE Mai 2010
// 		Ajout de repas et nuit
//<!-- Modif:	--> Eric Le Galliot
// 		DATE Mai 2013
// 		Ajout de art_mag

////////////////////////////////////////////////////////////////////////////////////   ACTEUR ////////////////////////////////////////////////////////////////////////////////////
$ps_acteurSelectByCodeActeur="SELECT a.IdActeur, a.Nom, a.Prenom, a.Administrateur, IFNULL(a.DateSuppression,''), '', 1, a.MdPDef, DATEDIFF(CURDATE(), a.MdpDateModif) FROM acteur a WHERE a.Login = '@Login' AND a.Mdp = '@MdP'";

////////////////////////////////////////////////////////////////////////////////////   EQUIPE ////////////////////////////////////////////////////////////////////////////////////
$ps_EquipeSelectAll="SELECT * FROM equipe ORDER BY CodeE";
$ps_EquipeSelectById="SELECT * FROM equipe WHERE IdEquipe = '@IdEquipe'";
$ps_EquipeVerifCodeInsert="SELECT count(*) FROM equipe WHERE CodeE='@CodeE'";
$ps_EquipeVerifCodeUpdate="SELECT count(*) FROM equipe WHERE IdEquipe<>'@IdEquipe' AND CodeE='@CodeE'";
$ps_EquipeListeSelectAll="SELECT DISTINCT M.IdEquipe, TRIM(M.CodeE) FROM equipe M ORDER BY TRIM(CodeE)";
//
$ps_EquipeInsert="INSERT INTO equipe (CodeE, Actif) VALUES ('@CodeE', '@Actif')";
//
$ps_EquipeUpdate="UPDATE equipe SET CodeE='@CodeE', Actif='@Actif' WHERE IdEquipe='@IdEquipe'";
//
$ps_EquipeDeleteById="DELETE FROM equipe WHERE IdEquipe = '@IdEquipe'";

///////////////////////////////////////////////////////////////////////////////////   BLESSURE ////////////////////////////////////////////////////////////////////////////////////
$ps_BlesseSelectAll="SELECT * FROM defblessure ORDER BY CodeBls";
$ps_BlesseSelectById="SELECT * FROM defblessure WHERE IdBle = '@IdBle'";
$ps_BlesseVerifCodeInsert="SELECT count(*) FROM defblessure WHERE CodeBls='@CodeBls'";
$ps_BlesseVerifCodeUpdate="SELECT count(*) FROM defblessure WHERE IdBLE<>'@IdBLE' AND CodeBls='@CodeBls'";
$ps_BlesseListeSelectAll="SELECT DISTINCT M.IdBLE, TRIM(M.CodeBls) FROM defblessure M ORDER BY TRIM(CodeBls)";
//
$ps_BlesseInsert="INSERT INTO defblessure (CodeBls) VALUES ('@CodeBls')";
//
$ps_BlesseUpdate="UPDATE defblessure SET CodeBls='@CodeBls' WHERE IdBLE='@IdBle'";
//
$ps_BlesseDeleteById="DELETE FROM defblessure WHERE IdBle = '@IdBle'";

///////////////////////////////////////////////////////////////////////////////////   INFORMATION COLLECTIVE ////////////////////////////////////////////////////////////////////////////////////
$ps_InfCollectiveSelectAll="SELECT * FROM informationcollective ORDER BY DateEntrainement DESC";
//
$ps_InfCollectiveSelectById="SELECT * FROM informationcollective WHERE IdInfoCollective = '@IdInfoCollective'";
//
$ps_InfCollectiveInsert="INSERT INTO informationcollective (IdEquipe, DateEntrainement, Lieux, Moment, Libelle) VALUES ('@IdEquipe', '@DateEntrainement', '@Lieux', '@Moment', '@Libelle')";
//
$ps_InfCollectiveUpdate="UPDATE informationcollective SET IdEquipe='@IdEquipe', DateEntrainement='@DateEntrainement', Lieux='@Lieux', Moment='@Moment', Libelle='@Libelle' WHERE IdInfoCollective = '@IdInfoCollective'";
//
$ps_InfCollectiveDeleteById="DELETE FROM informationcollective WHERE IdInfoCollective = '@IdInfoCollective'";

///////////////////////////////////////////////////////////////////////////////////   JOU_MALADE ////////////////////////////////////////////////////////////////////////////////////
$ps_JouMaladeSelectAll="SELECT * FROM jou_mala ORDER BY DateDebut DESC";
//
$ps_JouMaladeSelectById="SELECT * FROM jou_mala WHERE IdPersonne = '@IdPersonne'";
//
$ps_JouMaladeInsert="INSERT INTO jou_mala (IdPersonne, IdMal, DateDebut, Reprise) VALUES ('@IdPersonne', '@IdMal', '@DateDebut', '@Reprise')";
//
$ps_JouMaladeUpdate="UPDATE jou_mala SET IdPersonne='@IdPersonne', IdMal='@IdMal', DateDebut='@DateDebut'";
//
$ps_JouMaladeDeleteById="DELETE FROM jou_mala WHERE IdPersonne = '@IdPersonne'";


///////////////////////////////////////////////////////////////////////////////////   PERSONNE ////////////////////////////////////////////////////////////////////////////////////
$ps_PersonneSelectAll="SELECT * FROM personne ORDER BY IDEquipe DESC";
//
$ps_PersonneSelectById="SELECT * FROM personne WHERE IdPersonne = '@IdPersonne'";
//
$ps_PersonneInsert="INSERT INTO personne (IdProfil, IdStatut, IdPoste, IdEquipe, Nom, Prenom, Telephone, Courriel, Adresse, Naissance, Actif) VALUES ('@IdProfil', '@IdStatut', '@IdPoste', '@IdEquipe','@Nom', '@Prenom', '@Telephone', '@Courriel', '@Adresse', '@Naissance', '@Actif')";
//
$ps_PersonneUpdate="UPDATE personne SET IdProfil='@IdProfil', IdStatut='@IdStatut', IdPoste='@IdPoste', IdEquipe='@IdEquipe', Nom='@Nom', Prenom='@Prenom', Telephone='@Telephone', Courriel='@Courriel', Adresse='@Adresse', Naissance='@Naissance', Actif='@Actif'  WHERE IdPersonne = '@IdPersonne'";
//
$ps_PersonneDeleteById="DELETE FROM personne WHERE IdPersonne = '@IdPersonne'";

///////////////////////////////////////////////////////////////////////////////////  LOCALISATION ////////////////////////////////////////////////////////////////////////////////////
$ps_LocalisationSelectAll="SELECT * FROM deflocalisation ORDER BY CodeLoc";
$ps_LocalisationSelectById="SELECT * FROM deflocalisation WHERE IdLoc = '@IdLoc'";
$ps_LocalisationVerifCodeInsert="SELECT count(*) FROM deflocalisation WHERE CodeLoc='@CodeLoc'";
$ps_LocalisationVerifCodeUpdate="SELECT count(*) FROM deflocalisation WHERE IdLoc<>'@IdLoc' AND CodeLoc='@CodeLoc'";
$ps_LocalisationListeSelectAll="SELECT DISTINCT M.IdLOC, TRIM(M.CodeLoc) FROM defLocalisation M ORDER BY TRIM(CodeLoc)";
//
$ps_LocalisationInsert="INSERT INTO deflocalisation (CodeLoc) VALUES ('@CodeLoc')";
//
$ps_LocalisationUpdate="UPDATE deflocalisation SET CodeLoc='@CodeLoc' WHERE IdLOC='@IdLoc'";
//
$ps_LocalisationDeleteById="DELETE FROM deflocalisation WHERE IdLoc = '@IdLoc'";

///////////////////////////////////////////////////////////////////////////////////  MALADIE ////////////////////////////////////////////////////////////////////////////////////
$ps_MaladieSelectAll="SELECT * FROM defmaladie ORDER BY CodeMal";
$ps_MaladieSelectById="SELECT * FROM defmaladie WHERE IdMal = '@IdMal'";
$ps_MaladieVerifCodeInsert="SELECT count(*) FROM defmaladie WHERE CodeMal='@CodeMal'";
$ps_MaladieVerifCodeUpdate="SELECT count(*) FROM defmaladie WHERE IdMal<>'@IdMal' AND CodeMal='@CodeMal'";
$ps_MaladieListeSelectAll="SELECT DISTINCT M.IdMAL, TRIM(M.CodeMal) FROM defMaladie M ORDER BY TRIM(CodeMal)";
//
$ps_MaladieInsert="INSERT INTO defmaladie (CodeMal) VALUES ('@CodeMal')";
//
$ps_MaladieUpdate="UPDATE defmaladie SET CodeMal='@CodeMal' WHERE IdMal='@IdMal'";
//
$ps_MaladieDeleteById="DELETE FROM defmaladie WHERE IdMal = '@IdMal'";


///////////////////////////////////////////////////////////////////////////////////  TEST ////////////////////////////////////////////////////////////////////////////////////
$ps_TestSelectAll="SELECT * FROM deftest ORDER BY CodeTest";
$ps_TestSelectById="SELECT * FROM deftest WHERE IdTest = '@IdTest'";
$ps_TestVerifCodeInsert="SELECT count(*) FROM deftest WHERE CodeTest='@CodeTest'";
$ps_TestVerifCodeUpdate="SELECT count(*) FROM deftest WHERE IdTest<>'@IdTest' AND CodeMal='@CodeTest'";
$ps_TestListeSelectAll="SELECT DISTINCT M.IdTEST, TRIM(M.CodeTest) FROM defTest M ORDER BY TRIM(CodeTest)";
//
$ps_TestInsert="INSERT INTO deftest (CodeTest) VALUES ('@CodeTest')";
//
$ps_TestUpdate="UPDATE deftest SET CodeTest='@CodeTest' WHERE IdTest='@IdTest'";
//
$ps_TestDeleteById="DELETE FROM deftest WHERE IdTest = '@IdTest'";

///////////////////////////////////////////////////////////////////////////////////  INFOINDIVMATCH ////////////////////////////////////////////////////////////////////////////////////
$ps_InfoindivmatchSelectAll="SELECT * FROM indivmatch ORDER BY CodeName";
$ps_InfoindivmatchSelectById="SELECT * FROM indivmatch WHERE IdInfoindivmatch = '@IdInfoindivmatch'";
$ps_InfoindivmatchVerifCodeInsert="SELECT count(*) FROM indivmatch WHERE CodeName='@CodeName'";
$ps_InfoindivmatchVerifCodeUpdate="SELECT count(*) FROM indivmatch WHERE IdInfoindivmatch<>'@IdInfoindivmatch' AND CodeName='@CodeName'";
$ps_InfoindivmatchListeSelectAll="SELECT DISTINCT M.IdInfoindivmatch, TRIM(M.CodeName) FROM indivmatch M ORDER BY TRIM(CodeName)";
//
$ps_InfoindivmatchInsert="INSERT INTO indivmatch (CodeName) VALUES ('@CodeName')";
//
$ps_InfoindivmatchUpdate="UPDATE indivmatch SET CodeName='@CodeName' WHERE IdInfoindivmatch='@IdInfoindivmatch'";
//
$ps_InfoindivmatchDeleteById="DELETE FROM indivmatch WHERE IdInfoindivmatch = '@IdInfoindivmatch'";

///////////////////////////////////////////////////////////////////////////////////  INFOCOLLMATCH ////////////////////////////////////////////////////////////////////////////////////
$ps_InfocollmatchSelectAll="SELECT * FROM collectivematch ORDER BY CodeName";
$ps_InfocollmatchSelectById="SELECT * FROM collectivematch WHERE IdInfocollmatch = '@IdInfocollmatch'";
$ps_InfocollmatchVerifCodeInsert="SELECT count(*) FROM collectivematch WHERE CodeName='@CodeName'";
$ps_InfocollmatchVerifCodeUpdate="SELECT count(*) FROM collectivematch WHERE IdInfocollmatch<>'@IdInfocollmatch' AND CodeName='@CodeName'";
$ps_InfocollmatchListeSelectAll="SELECT DISTINCT M.IdInfocollmatch, TRIM(M.CodeName) FROM collectivematch M ORDER BY TRIM(CodeName)";
//
$ps_InfocollmatchInsert="INSERT INTO collectivematch (CodeName) VALUES ('@CodeName')";
//
$ps_InfocollmatchUpdate="UPDATE collectivematch SET CodeName='@CodeName' WHERE IdInfocollmatch='@IdInfocollmatch'";
//
$ps_InfocollmatchDeleteById="DELETE FROM collectivematch WHERE IdInfocollmatch = '@IdInfocollmatch'";

///////////////////////////////////////////////////////////////////////////////////  PARAMETRE GPS ////////////////////////////////////////////////////////////////////////////////////
$ps_ParametregpsSelectAll="SELECT * FROM Parametregps ORDER BY CodeGPS";
$ps_ParametregpsSelectById="SELECT * FROM Parametregps WHERE IdPargps = '@IdPargps'";
$ps_ParametregpsVerifCodeInsert="SELECT count(*) FROM Parametregps WHERE CodeGPS='@CodeGPS'";
$ps_ParametregpsVerifCodeUpdate="SELECT count(*) FROM Parametregps WHERE IdPargps<>'@IdPargps' AND CodeGps='@CodeGPS'";
$ps_ParametregpsListeSelectAll="SELECT DISTINCT M.IdPargps, TRIM(M.CodeGPS) FROM Parametregps M ORDER BY TRIM(CodeGPS)";
//
$ps_ParametregpsInsert="INSERT INTO Parametregps (CodeGPS) VALUES ('@CodeGPS')";
//
$ps_ParametregpsUpdate="UPDATE Parametregps SET CodeGPS='@CodeGPS' WHERE IdPargps='@IdPargps'";
//
$ps_ParametregpsDeleteById="DELETE FROM Parametregps WHERE IdPargps = '@IdPargps'";

///////////////////////////////////////////////////////////////////////////////////  Poste ////////////////////////////////////////////////////////////////////////////////////
$ps_PosteSelectAll="SELECT * FROM poste ORDER BY CodePos";
$ps_PosteSelectById="SELECT * FROM poste WHERE IdPoste = '@IdPoste'";
$ps_PosteVerifCodeInsert="SELECT count(*) FROM poste WHERE CodeE='@CodePos'";
$ps_PosteVerifCodeUpdate="SELECT count(*) FROM poste WHERE IdPoste<>'@IdPoste' AND CodePos='@CodePos'";
$ps_PosteListeSelectAll="SELECT DISTINCT M.IdPoste, TRIM(M.CodePos) FROM poste M ORDER BY TRIM(CodePos)";
//
$ps_PosteInsert="INSERT INTO poste (CodePos, Actif) VALUES ('@CodePos', '@Actif')";
//
$ps_PosteUpdate="UPDATE poste SET CodePos='@CodePos', Actif='@Actif' WHERE IdPoste='@IdPoste'";
//
$ps_PosteDeleteById="DELETE FROM poste WHERE IdPoste = '@IdPoste'";

///////////////////////////////////////////////////////////////////////////////////  Profil ////////////////////////////////////////////////////////////////////////////////////
$ps_ProfilSelectAll="SELECT * FROM profil ORDER BY CodePro";
$ps_ProfilSelectById="SELECT * FROM profil WHERE IdProfil = '@IdProfile'";
$ps_ProfilVerifCodeInsert="SELECT count(*) FROM profil WHERE CodeProfil='@CodePro'";
$ps_ProfilVerifCodeUpdate="SELECT count(*) FROM profil WHERE IdProfil<>'@IdProfil' AND CodePro='@CodePro'";
$ps_ProfilListeSelectAll="SELECT DISTINCT M.IdProfil, TRIM(M.CodePro) FROM profil M ORDER BY TRIM(CodePro)";
//
$ps_ProfilInsert="INSERT INTO profil (CodePro, Actif) VALUES ('@CodePro', '@Actif')";
//
$ps_ProfilUpdate="UPDATE profil SET CodePro='@CodePro', Actif='@Actif' WHERE IdProfil='@IdProfil'";
//
$ps_ProfilDeleteById="DELETE FROM profil WHERE IdProfil = '@IdProfil'";

///////////////////////////////////////////////////////////////////////////////////  SITUATION ////////////////////////////////////////////////////////////////////////////////////
$ps_SituationSelectAll="SELECT * FROM situation ORDER BY CodeSituation";
$ps_SituationSelectById="SELECT * FROM situation WHERE IdSituation = '@IdSituation'";
$ps_SituationVerifCodeInsert="SELECT count(*) FROM situation WHERE CodeSituation='@CodeSituation'";
$ps_SituationVerifCodeUpdate="SELECT count(*) FROM situation WHERE IdSituation<>'@IdSituation' AND CodeSituation='@CodeSituation'";
$ps_SituationListeSelectAll="SELECT DISTINCT M.IdSituation, TRIM(M.CodeSituation) FROM Situation M ORDER BY TRIM(CodeSituation)";
//
$ps_SituationInsert="INSERT INTO situation (CodeSituation) VALUES ('@CodeSituation')";
//
$ps_SituationUpdate="UPDATE Situation SET CodeSituation='@CodeSituation' WHERE IdSituation='@IdSituation'";
//
$ps_SituationDeleteById="DELETE FROM situation WHERE IdSituation = '@IdSituation'";

/////////////////////////////////////////////////////////////////////////////////// STATUT ////////////////////////////////////////////////////////////////////////////////////
$ps_StatutSelectAll="SELECT * FROM statut ORDER BY Fonction";
$ps_StatutSelectById="SELECT * FROM statut WHERE IdStatut = '@IdStatut'";
$ps_StatutVerifCodeInsert="SELECT count(*) FROM statut WHERE Fonction='@Fonction'";
$ps_StatutVerifCodeUpdate="SELECT count(*) FROM statut WHERE IdStatut<>'@IdStatut' AND Fonction='@Fonction'";
$ps_StatutListeSelectAll="SELECT DISTINCT M.IdStatut, TRIM(M.Fonction) FROM statut M ORDER BY TRIM(Fonction)";
//
$ps_StatutInsert="INSERT INTO statut (Fonction, Actif) VALUES ('@Fonction', '@Actif')";
//
$ps_StatutUpdate="UPDATE statut SET Fonction='@Fonction', Actif='@Actif' WHERE IdStatut='@IdStatut'";
//
$ps_StatutDeleteById="DELETE FROM statut WHERE IdStatut = '@IdStatut'";


///////////////////////////////////////////////////////////////////////////////////   ITEMSETATFORME ////////////////////////////////////////////////////////////////////////////////////
$ps_DefquestionSelectAll="SELECT * FROM defquestion ORDER BY CodeQues";
$ps_DefquestionSelectById="SELECT * FROM defquestion WHERE IdQues = '@IdQues'";
$ps_DefquestionVerifCodeInsert="SELECT count(*) FROM defquestion WHERE CodeQues='@CodeQues'";
$ps_DefquestionVerifCodeUpdate="SELECT count(*) FROM defquestion WHERE IdQues<>'@IdQues' AND CodeQues='@CodeQues'";
$ps_DefquestionListeSelectAll="SELECT DISTINCT M.IdQues, TRIM(M.CodeQues) FROM defquestion M ORDER BY TRIM(CodeQues)";
//
$ps_DefquestionInsert="INSERT INTO defquestion (CodeQues) VALUES ('@CodeQues')";
//
$ps_DefquestionUpdate="UPDATE defquestion SET CodeQues='@CodeQues' WHERE IdQues='@IdQues'";
//
$ps_DefquestionDeleteById="DELETE FROM defquestion WHERE IdQues = '@IdQues'";


////////////////////////////////////////////////////////////////////////////////////   PARAM ////////////////////////////////////////////////////////////////////////////////////
$ps_paramSelectAll="SELECT * FROM param ORDER BY CodeParam";
$ps_paramSelectByCode="SELECT * FROM param WHERE CodeParam = '@CodeParam'";
//
$ps_paramUpdate="UPDATE param SET ValParam='@ValParam' WHERE CodeParam='@CodeParam'";



?>
