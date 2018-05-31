<?php
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:	-->

//////////////////////////////////////////////////////////////////////////////////// APPLICATION ////////////////////////////////////////////////////////////////////////////////////
define("C_APP_DATE_VERSION","24/04/2018");
define("C_APP_TITRE","Gestion Data FC NANTES");
define("C_APP_TITRE_LOGIN","Gestion Data FC NANTES");
define("C_APP_TITRE_CLIENT","Pierre");
define("C_APP_VERSION","4.0.13");
define("C_APP_MAIL_CTRL","eric@legalliot.fr");

//////////////////////////////////////////////////////////////////////////////////// FIN APPLICATION ////////////////////////////////////////////////////////////////////////////////////

// Actif
define("C_ACTIF_NOM","Actif");
define("C_ADRESSE_NOM","Adresse");
define("C_ADRESSE_LEN",50);
define("C_ADRESSE_MAX",50);
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
define("C_COURRIEL_NOM","Courriel");
define("C_COURRIEL_LEN",50);
define("C_COURRIEL_MAX",50);
// Code HTML
define ("C_ESPACE", "&nbsp;&nbsp;&nbsp;");

// Date
define("C_DATE_FR","FR");
define("C_DATE_LEN",10);
define("C_DATE_MAX",10);
define("C_DATE_MYSQL","MYSQL");
define("C_DATE_NOM","Date");

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

// Equipe
define("C_EQUIPE_NOM","Equipe");

// Lieu, libelle...
define("C_LIEU_NOM","Lieux");
define("C_LIEU_LEN",50);
define("C_LIEU_MAX",50);
define("C_LIBELLE_NOM","Libelle");

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
define("C_ROLE_TXT_INACTIF","Votre compte n'a pas de r�le d�fini.");
define("C_LOGIN_INACTIF","4");
define("C_LOGIN_TXT_INACTIF","Erreur de login.");

define("C_PAGE_ACCUEIL","PAGE_ACCUEIL");
//Naissance, Nom...
define("C_NAISSANCE_NOM","Naissance");
define("C_NOM_NOM","Nom");
define("C_NOM_LEN",50);
define("C_NOM_MAX",50);
//Prenom
define("C_PRENOM_NOM","Prenom");
define("C_PRENOM_LEN",50);
define("C_PRENOM_MAX",50);
define("C_PERSONNE_NOM","Personne");
define("C_POSTE_NOM","Poste");
define("C_PROFIL_NOM","Profil");


//STATUT
define("C_STATUT_NOM","Statut");

// Message
//////////////////////////////////////////////////////////////////////////////////// MESSAGE ////////////////////////////////////////////////////////////////////////////////////

define("C_MES_ATTENTION"," !!! ");

define("C_MES_CHAMP_REMARQUE","Les champs marqu�s d'un ast�risque(*) sont obligatoires. La prise en compte des saisies n�cessite une validation.");
define("C_MES_CODE_EXIST","<b>Erreur : Ce code existe d�ja.<b>");
define("C_MES_SAVE_NOK", C_MES_ATTENTION."Erreur : enregistrement non effectu�e".C_MES_ATTENTION."<span>");
define("C_MES_SAVE_OK",  C_MES_ATTENTION."Enregistrement effectu�".C_MES_ATTENTION."<span>");

//////////////////////////////////////////////////////////////////////////////////// FIN MESSAGE ////////////////////////////////////////////////////////////////////////////////////

define("C_MOMENT_NOM","Moment");

// Parametre
//////////////////////////////////////////////////////////////////////////////////// PARAMETRE ////////////////////////////////////////////////////////////////////////////////////

define("C_MES_DELETE_IMP","!!! Impossible de supprimer un enregistrement r�f�renc� dans la base !!!");

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
define("C_PASSWORD_INITIALISE_NOM",'R�initialiser');
define("C_PASSWORD_LEN",20);
define("C_PASSWORD_MAX",20);
define("C_PASSWORD_NOM",'Mot de passe');
define("C_PASSWORD_NOUVEAU_2_NOM",'Confirmation du mot de passe');
define("C_PASSWORD_NOUVEAU_NOM",'Nouveau mot de passe');

//Profil
//////////////////////////////////////////////////////////////////////////////////// PROFIL ////////////////////////////////////////////////////////////////////////////////////
define("C_PROFIL_ADM",20);
define("C_PROFIL_ADM_TXT","Administrateur");
define("C_PROFIL_ENT",30);
define("C_PROFIL_ENT_TXT","Entrainement");
define("C_PROFIL_JOU",40);
define("C_PROFIL_JOU_TXT","Joueur");
define("C_PROFIL_CON",100);

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
define("C_TITRE_LISTE_EQUIPE", "Liste des �quipes");
define("C_TITRE_BLESSE",'Bl�ssure');
define("C_TITRE_LISTE_BLESSE", "Liste des bl�ssures");
define("C_TITRE_LOCALISATION",'Localisation');
define("C_TITRE_LISTE_LOCALISATION", "Liste des localisations");
define("C_TITRE_MALADIE",'Maladie');
define("C_TITRE_LISTE_MALADIE", "Liste des maladies");
define("C_TITRE_TEST",'Test');
define("C_TITRE_LISTE_TEST", "Liste des tests");
define("C_TITRE_INFOINDIVMATCH",'Information Individuelle de Match');
define("C_TITRE_INFOCOLLECTIVE",'Information Collective');
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
define("C_TITRE_INFOCOLLMATCH",'Information Collective de Match');
define("C_TITRE_LISTE_INFOCOLLMATCH", "Information Collective de Match");
define("C_TELEPHONE_NOM","Telephone");
define("C_TELEPHONE_LEN",50);
define("C_TELEPHONE_MAX",50);
define("C_TITRE_INFOPERSONNE",'Information Personnes');
define("C_TITRE_LISTE_INFOPERSONNE", "Information Personnes");

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
