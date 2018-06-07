// Constante de message
const C_BR = "\n";
const C_TAB = "  - ";

const C_ATTENTION_MES = "Attention : ";

// Constante de message
const C_BL_ERR = "Il manque une référence de BL.";
const C_BL_GEN = "Voulez-vous générer ce BL?";
const C_BL_GEN_IMPOSSIBLE = "Impossible de générer le BL. Aucune ligne n'est sélectionnée.";

const C_CIV =  "Une civilité ou un nom pour l'interlocuteur : ";
const C_CLIENT = "Un nom de client.";
const C_CMD_ANNULER = "Voulez-vous annuler cette commande ?";
const C_CMD_CLOSE = "Voulez-vous fermer cette commande ?";
const C_CMD_DELETE = "Voulez-vous supprimer cette commande ?";
const C_CMD_MODIF = "Voulez-vous modifier cette commande ?";
const C_CMD_OPEN = "Voulez-vous reouvrir cette commande ?";
const C_CMD_RECEP = "Voulez-vous réceptionner cette commande?\nRemarque : Vous ne pourez plus modifier son contenu.";
const C_CODE = "Un code.";
const C_CODE_AGENT = "Il manque un code agent.";
const C_CODE_AGENT_DELETE = "Votre code agent pour supprimer la ligne : ";
const C_CODE_ART_DE_REMPLACEMENT_ERR = "Un code article de remplacement valide.";
const C_CODE_ART_DIFFERENT_ERR = "2 codes articles différents.";
const C_CODE_ART_ERR = "Un code article contenant que des caractères alphanumériques.";
const C_CODE_ART_VIDE_ERR = "Un code article.";
const C_CODE_COUT = "Un code coût.";
const C_CODE_COUT_LIGNE = "Un code coût ligne :";
const C_CODE_DOSSIER = "Un code dossier ligne : ";
const C_CODE_FAM = "Un code famille.";
const C_CODE_NOMEN_ERR = "Un code nomenclature contenant que des caractères alphanumériques.";
const C_CODE_SFAM = "Un code sous-famille.";
const C_COEF_ERR = "Le Coefficient doit être un rêel (séparateur le point, 5 digits max. après le point).";
const C_COUT = "Un coût.";
const C_CRITERE_REC = "Erreur : Vous devez rentrer un critère de recherche ";

const C_DATE_COMP = "La date de fin doit être égale ou supérieure à la date de début.";
const C_DATE_CMDT = "Le format de la date de commande pour l'article : ";
const C_DATE_DEB = "Le format de la date de début est incorrect (jj/mm/aaaa).";
const C_DATE_FIN = "Le format de la date de fin est incorrect (jj/mm/aaaa).";
const C_DATE_FORMAT = "Le format de la date doit être du type : jj/mm/aaaa.";
const C_DATE_INCORRECT = "Le format de la date est incorrect (jj/mm/aaaa).";
const C_DATE_LIGNE = "Une date ligne : ";
const C_DATE_RECEP = "Le format de la date de réception est incorrect (jj/mm/aaaa).";
const C_DATE_RECEP_ART = "Le format de la date de réception  pour l'article : ";
const C_DELETE_FOUR = "Voulez-vous supprimer ce fournisseur ?";
const C_DELETE_INT = "Voulez-vous supprimer cet interlocuteur ?";
const C_DELETE_ITEM = "Voulez vous supprimer cet item?";
const C_DELETE_QTE = "Voulez-vous supprimer cette quantité ?";
const C_DELETE_RDV = "Voulez-vous supprimer ce rendez-vous ?";
const C_DEVISE = "Une devise.";
const C_DOS_CLOSE = "Voulez-vous fermer ce dossier ?";
const C_DOUBLE_ART = "Vous avez des données en double (code article)";
const C_DOUBLE_ART_DOS = "Attention : Article déja sélectionné pour ce dossier : ";
const C_DOUBLE_ART_MAG = "Vous avez des données en double (code article / magasin)";
const C_DOUBLE_CODE = "Vous avez des codes en double.";
const C_DOUBLE_FOURNISSEUR = "Vous avez plusieurs fois le même fournisseur / code article.";
const C_DOUBLE_GROUPE = "Vous avez des données en double (code article / magasin) dans le groupe : ";
const C_DOUBLE_MAGASIN = "Vous avez plusieurs fois le même magasin";
const C_DOUBLE_NOMENCLATURE = "Vous avez des lignes à supprimer (article en double dans des sous-nomenclatures).";
const C_DUPLIQUER_ITEM = "Voulez vous dupliquer cet item?";

const C_EMAIL = "Une adresse email correcte.";
const C_EMAIL_INT = "Une adresse email correcte pour l'interlocuteur : ";
const C_ERREUR = "Erreur : Il manque :\n";
const C_ERREUR_SIMPLE = "Erreur : ";

const C_ESTINC = " est incorrecte.";
const C_FAMILLE = "Une famille.";

const C_FOURNISSEUR = "Un fournisseur.";
const C_FOURNISSEUR_PRIN = "Un (et un seul) fournisseur principal.";
const C_FOURNISSEUR_REF = "Une ref. fournisseur.";
const C_FOURNISSEUR_SEL = 'Vous devez sélectionner un fournisseur.';

const C_GENERER_BL = 'Générer Bon de livraison';
const C_GENERER_FACPF = 'Editer facture Pro-Forma';
const C_GROUPE_DELETE = "Voulez-vous supprimer ce groupe ?";
const C_GROUPE_DU = " du groupe : ";
const C_GROUPE_OPEN = "Voulez-vous ouvrir ce groupe ?";

const C_INCORRECT = " est incorrect.";
const C_INTERVENTION_SUP = "Voulez-vous supprimer cette intervention ?";
const C_INTERVENTION_VAL = "Voulez avez une nouvelle intervention à valider.";

const C_LIBELLE = "Un libellé.";
const C_LIGNE = "Erreur sur la ligne : ";
const C_LIGNE_VALIDER = "Avant de continuer, Vous avez une ligne à valider (ajout d'un article).";
const C_LIVRE_SUP = " est supérieur à la qté. commandée.";
const C_LOGIN = "Un login.";

const C_MAGASIN = "Un magasin";
const C_MAGASIN_LE = "Le magasin sur l'article : ";
const C_MAGASIN_MANQUE = "Il manque un magasin pour l'article : ";
const C_MAJ_NOMEN = "Voulez-vous mettre à jour cette nomenclature ?";
const C_MDP_ERR = "Confirmation incorrect. Les mots de passe ne correspondent pas.";
const C_MDP_REGLE = "Le mot de passe n'est pas valide.\nIl doit contenir au moins 8 caractères et respecter les rêgles suivantes :\n - au moins une majuscule,\n - une minuscule,\n - un chiffre.";
const C_MOD_ART = "Voulez-vous modifier cet article ?";
const C_MOD_ART_NOMEN = "Voulez-vous transformer cet article en nomenclature?";
const C_MOD_NOMEN = "Voulez-vous modifier cette nomenclature ?";
const C_MOD_NOMEN_ART = "Voulez-vous transformer cette nomenclature en article ?";
const C_MOD_PRIX = "Voulez-vous modifier le prix des articles sélectionnés ?";
const C_MALADIE= "Une maladie";
const C_NAISSANCE = "Une date de naisance";

const C_OBJET = "Un objet.";
const C_OF_ANNULER = "Voulez-vous annuler cet OF ?";
const C_OF_FERMER = "Voulez-vous fermer cet OF ?";
const C_OF_OUVRIR = "Voulez-vous reouvrir cet OF ?";
const C_OF_SUP = "Voulez-vous supprimer cet OF ?";

const C_PARAM_TYPE_2_MES = "Erreur : La valeur doit être un entier.";
const C_PARAM_TYPE_4_MES = "Erreur : La valeur doit être soit : 'COMMANDE' ou 'LIVRE'.";
const C_PARAM_TYPE_5_MES = "Erreur : La valeur doit être soit : A : Auto, M : Manuel.";
const C_PARAM_TYPE_6_MES = "Erreur : La valeur doit être soit : un point ou une virgule.";
const C_PARAM_TYPE_8_MES = "Erreur : La valeur doit être un réel.\n";
const C_PARAM_TYPE_X_MES = "Erreur : Code : ";
const C_PAYS = "Un pays.";
const C_POIDS_ERR = "Le Poids doit être un rêel (séparateur le point, 3 digits max. après le point).";
const C_POUR_ERR = "Le pourcentage n\'est pas un nombre.";
const C_PRENOM_AGENT = "Un prénom.";
const C_PRIX_ACHAT = "Un Prix d'achat (réel positif).";
const C_PRIX_ACHAT_ART_ERR = "Le prix d'achat de l'article : ";
const C_PRIX_ACHAT_ERR = "Le prix d'achat doit être un montant (séparateur le point, 2 digits max. après le point).";
const C_PRIX_CMD = "Un Prix de commande (réel positif).";
const C_PRIX_VENTE = "Un Prix de vente (réel positif).";
const C_PRIX_VENTE_ART_ERR = "Le prix de vente (séparateur le point, 2 digits max. après le point) de l'article ";
const C_PRIX_VENTE_ERR = "Le prix de vente doit être un montant (séparateur le point, 2 digits max. après le point).";

const C_QUANTITE = "Une quantité (réel).";
const C_QUANTITE_ART = "La quantité de l'article : ";
const C_QUANTITE_ART_CMD = "La quantité cmd. de l'article : ";
const C_QUANTITE_CMD = "Une quantité commander (réel positif).";
const C_QUANTITE_CMD_LIVRE = "La quantité commandée ne peut pas être inférieur à la quantité livrée pour l'article : ";
const C_QUANTITE_ERR = "La quantité doit être un nombre.";
const C_QUANTITE_LIV = "La qté. livrée. sur l'article : ";
const C_QUANTITE_REC = "La quantité de réception de l'article : ";

const C_RDV_VAL = "Voulez avez un nouveau RDV à valider.";
const C_REMISE = "La remise doit être un pourcentage (séparateur le point, 2 digits max. après le point).";

const C_SAUVEGARDE = "Vous n'avez pas sauvegardé vos modifications. Voulez-vous continuer sans sauvegarder vos modifications ?";
const C_SEUIL = "Un seuil mini.";
const C_SEUIL_POS = "Un seuil mini (réel positif)";
const C_SIGNE_MVT = "Attention au signe du mouvement. un signe moins (-) pour un mouvement négatif (retrait du stock).";
const C_SYMBOLE = "Un symbole.";

const C_TAUX_REEL = "Le Taux doit être un réel (séparateur le point).";
const C_TEMP_FORMAT = "Le format du temps est incorrect (numérique).";
const C_TEMP_LIGNE = "Le temps ligne : ";
const C_TRAVAUX_DELETE = "Voulez-vous supprimer cette intervention ?";
const C_TYPE_VENTE_ACHAT = "Il manque le type de modification de tarif : Vente ou Achat?";


const C_UNITE = "Une unité.";
const C_UNITE_LIB = "Unité.";

const C_WARNING_SIMPLE = "Remarque : ";




















