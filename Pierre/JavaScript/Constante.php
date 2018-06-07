<?php
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:	-->

//////////////////////////////////////////////////////////////////////////////////// APPLICATION ////////////////////////////////////////////////////////////////////////////////////
define("C_APP_DATE_VERSION","24/04/2018");
define("C_APP_NAISSANCE_VERSION","24/04/2018");
define("C_APP_TITRE","Gestion Data FC NANTES");
define("C_APP_TITRE_LOGIN","Gestion Data FC NANTES");
define("C_APP_TITRE_CLIENT","Pierre");
define("C_APP_VERSION","4.0.13");
define("C_APP_MAIL_CTRL","eric@legalliot.fr");

//////////////////////////////////////////////////////////////////////////////////// FIN APPLICATION ////////////////////////////////////////////////////////////////////////////////////

// Actif
define("C_ACTIF_NOM","Actif");

// Bouton
define("C_BOUTON_WIDTH",80);
define("C_BOUTON_WIDTH_40",40);
define("C_BOUTON_WIDTH_50",50);
define("C_BOUTON_WIDTH_60",60);
define("C_BOUTON_WIDTH_70",70);
define("C_BOUTON_WIDTH_80",80);
define("C_BOUTON_WIDTH_90",90);
define("C_BOUTON_WIDTH_100",100);
define("C_BOUTON_WIDTH_110",110);
define("C_BOUTON_WIDTH_120",120);
define("C_BOUTON_WIDTH_130",130);
define("C_BOUTON_WIDTH_140",140);
define("C_BOUTON_WIDTH_150",150);
define("C_BOUTON_WIDTH_160",160);
define("C_BOUTON_WIDTH_170",170);
define("C_BOUTON_WIDTH_180",180);
define("C_BOUTON_WIDTH_190",190);
define("C_BOUTON_WIDTH_200",200);

// Code
define ("C_CODE_NOM", "Code");
define("C_CODE_OBLIGATOIRE",'*');
define("C_CODE_LEN",30);
define("C_CODE_MAX",20);



// Code HTML
define ("C_ESPACE", "&nbsp;&nbsp;&nbsp;");

// HTML couleur
define("C_HTML_BLANC","#FFFFFF");
define("C_HTML_GRIS","#E8E8E8");
define("C_HTML_COULEUR_MESSAGE_HAUT_BAS","#B40431");


// Etat
define("C_AJOUT","AJOUT");
define("C_CLOSE","CLOSE");
define("C_DELETE","DELETE");
define("C_FIND","FIND");
define("C_INIT_MDP", "C_INIT_MDP");
define("C_INSERT","INSERT");
define("C_SELECT","SELECT");
define("C_UPDATE","UPDATE");

//Maladie
define("C_MALADIE_NOM",'MALADIE');

// Log
define("C_LOG_NOLOG",0);

// Login
define("C_LOGIN_LEN",20);
define("C_LOGIN_NOM",'Login');
define("C_LOGIN_MAX",20);

// Login Etat
define("C_ACTEUR_INACTIF","1");
define("C_ACTEUR_TXT_INACTIF","Ce compte est inactif.");
define("C_COUT_INACTIF","2");
define("C_COUT_TXT_INACTIF","Ce code est inactif.");
define("C_ROLE_INACTIF","3");
define("C_ROLE_TXT_INACTIF","Votre compte n'a pas de rôle défini.");
define("C_LOGIN_INACTIF","4");
define("C_LOGIN_TXT_INACTIF","Erreur de login.");

define("C_PAGE_ACCUEIL","PAGE_ACCUEIL");

// Message
//////////////////////////////////////////////////////////////////////////////////// MESSAGE ////////////////////////////////////////////////////////////////////////////////////

define("C_MES_ATTENTION"," !!! ");

define("C_MES_CHAMP_REMARQUE","Les champs marqués d'un astérisque(*) sont obligatoires. La prise en compte des saisies nécessite une validation.");
define("C_MES_CODE_EXIST","<b>Erreur : Ce code existe déja.<b>");
define("C_MES_SAVE_NOK", C_MES_ATTENTION."Erreur : enregistrement non effectuée".C_MES_ATTENTION."<span>");
define("C_MES_SAVE_OK",  C_MES_ATTENTION."Enregistrement effectué".C_MES_ATTENTION."<span>");

//////////////////////////////////////////////////////////////////////////////////// FIN MESSAGE ////////////////////////////////////////////////////////////////////////////////////

// Parametre
//////////////////////////////////////////////////////////////////////////////////// PARAMETRE ////////////////////////////////////////////////////////////////////////////////////

define("C_MES_DELETE_IMP","!!! Impossible de supprimer un enregistrement référencé dans la base !!!");

// Nom des parametre de la table Parametre (entreprise)
define("C_ENTREPRISE_ADRESSE","ENTREPRISE_ADRESSE");
define("C_ENTREPRISE_ADRESSE_S","ENTREPRISE_ADRESSE_S");
define("C_ENTREPRISE_APE","ENTREPRISE_APE");
define("C_ENTREPRISE_CP","ENTREPRISE_CP");
define("C_ENTREPRISE_EMAIL","ENTREPRISE_EMAIL");
define("C_ENTREPRISE_FAX","ENTREPRISE_FAX");
define("C_ENTREPRISE_ID_CLIENT","ENTREPRISE_ID_CLIENT");
define("C_ENTREPRISE_IDPAYS","ENTREPRISE_IDPAYS");
define("C_ENTREPRISE_NOM","ENTREPRISE_NOM");
define("C_ENTREPRISE_PAYS","ENTREPRISE_PAYS");
define("C_ENTREPRISE_SIRET","ENTREPRISE_SIRET");
define("C_ENTREPRISE_TELEPHONE","ENTREPRISE_TELEPHONE");
define("C_ENTREPRISE_TVA","ENTREPRISE_TVA");
define("C_ENTREPRISE_VILLE","ENTREPRISE_VILLE");

// Password
define("C_PASSWORD_DEFAUT","MDP_DEFAUT");
define("C_PASSWORD_INITIALISE_NOM",'Réinitialiser');
define("C_PASSWORD_LEN",20);
define("C_PASSWORD_MAX",20);
define("C_PASSWORD_NOM",'Mot de passe');
define("C_PASSWORD_NOUVEAU_2_NOM",'Confirmation du mot de passe');
define("C_PASSWORD_NOUVEAU_NOM",'Nouveau mot de passe');

//Profil
//////////////////////////////////////////////////////////////////////////////////// PROFIL ////////////////////////////////////////////////////////////////////////////////////
define("C_PROFIL_ADM",20);
define("C_PROFIL_ADM_TXT","Administrateur");
define("C_PROFIL_JOU",30);
define("C_PROFIL_JOU_TXT","Joueur");
define("C_PROFIL_ETAT",30);
define("C_PROFIL_ETAT_TXT","Etat");
define("C_PROFIL_SUIVIM",40);
define("C_PROFIL_SUIVIM_TXT","SuiviMedical");
define("C_PROFIL_TEST",40);
define("C_PROFIL_TEST_TXT","Test");
define("C_PROFIL_MATCH",40);
define("C_PROFIL_MATCH_TXT","Match");

//////////////////////////////////////////////////////////////////////////////////// FIN PROFIL ////////////////////////////////////////////////////////////////////////////////////

// Quote
define("C_QUOTE","'");
define("C_QUOTE_ANTI","`");

// Repertoire
//////////////////////////////////////////////////////////////////////////////////// REPERTOIRE ////////////////////////////////////////////////////////////////////////////////////
define("C_SITE_BLANK","/Pierre/blank.php");
define("C_SITE_DELETE_IMPOSSIBLE","/Pierre/AdminDeleteImp.php");
define("C_SITE_FIN_SESSION","/Pierre/finSession.php");
define("C_SITE_REPERTOIRE","/Pierre/");
define("C_SITE_REPERTOIRE_JAVASCRIPT","/Pierre/JavaScript/");
//////////////////////////////////////////////////////////////////////////////////// FIN REPERTOIRE ////////////////////////////////////////////////////////////////////////////////////

define("C_TITRE_EQUIPE",'Equipe');
define("C_TITRE_LISTE_EQUIPE", "Liste des équipes");
define("C_TITRE_BLESSE",'Bléssure');
define("C_TITRE_LISTE_BLESSE", "Liste des bléssures");
define("C_TITRE_LOCALISATION",'Localisation');
define("C_TITRE_LISTE_LOCALISATION", "Liste des localisations");
define("C_TITRE_MALADIE",'Maladie');
define("C_TITRE_LISTE_MALADIE", "Liste des maladies");
define("C_TITRE_TEST",'Test');
define("C_TITRE_LISTE_TEST", "Liste des tests");
define("C_TITRE_INFOINDIVMATCH",'Information Individuelle de Match');
define("C_TITRE_LISTE_INFOINDIVMATCH", "Liste des Informations Individuelles de Match");
define("C_TITRE_PARAMETREGPS",'Parametre GPS');
define("C_TITRE_LISTE_PARAMETREGPS", "Liste des Parametres GPS");
define("C_TITRE_POSTE",'Poste');
define("C_TITRE_LISTE_POSTE", "Liste des Postes");
define("C_TITRE_PROFIL",'Profil');
define("C_TITRE_LISTE_PROFIL", "Liste des Profils");
define("C_TITRE_SITUATION",'Situation');
define("C_TITRE_LISTE_SITUATION", "Liste des Situations");
define("C_TITRE_STATUT",'Statut');
define("C_TITRE_LISTE_STATUT", "Liste des Statuts");
define("C_TITRE_DEFQUESTION",'Liste des items etat de forme');
define("C_TITRE_LISTE_DEFQUESTION", "Liste des items etat de forme");
define("C_TITRE_PERSONNE",'Liste Personnes');
define("C_TITRE_LISTE_PERSONNE", "Liste Personnes");
define("C_TITRE_JoueurMalade",'Liste des joueurs malades');
define("C_TITRE_LISTE_JoueurMalade", "Liste des joueurs malades");
// Limit de select pour liste
define("C_SELECT_SQL_LIMIT","LIMIT 0, 250");

// Separateur de liste dynamique
define("C_SEP_DEC",".");

define("C_SEPARATEUR_HTTP","|");
define("C_SEPARATEUR_LISTE_ID",",");
define("C_SEPARATEUR_PARAM_RECH","|");
define("C_SEPARATEUR_PARAM_MDP",";");
define("C_SEPARATEUR_SECONDAIRE_HTTP","$");

// Width
define("C_WITH_ICON","width='20px'");



?>
