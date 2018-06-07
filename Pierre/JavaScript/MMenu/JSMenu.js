const C_ENT_NOM = 'Gestion Entrainement';
const C_ENT = 'ENT';

const C_MATCH_NOM = 'Gestion Match';
const C_MATCH = 'MATCH';

const C_ETAT_NOM = 'Etat Forme';
const C_ETAT= 'ETAT';

const C_TEST_NOM = 'Gestion Test';
const C_TEST = 'TEST';

const C_SUIVIM_NOM = 'Suivi Medical';
const C_SUIVIM = 'SUIVIM';

const C_IMPORTATION_NOM = 'Importation GPS';
const C_IMPORTATION = 'IMPORTATION';

const C_ADM_NOM = 'Parametres';
const C_ADM = 'ADM';

const C_MDP_NOM = 'Mot de passe';
const C_MDP = 'MDP';

const C_TITLE_CLOSE = 'Fermer le menu';
const C_TITLE_OPEN = 'Ouvrir le menu';
const C_TITLE_OPEN_ONGLET ='Ouvrir cette option du menu dans un nouvel onglet du navigateur';

var http = getHTTPObject();

function handleHttpResponse() {}

function Cacher(Item){
	
	if (Item != 'Cal' && Item != 'Mdp') {
		var Menu = 'Menu'+ Item;
		var Lien = 'Lien'+ Item;
		var TitreItem = 'Titre'+ Item;
		var Titre = "C_"+Item.toUpperCase()+"_NOM"; 
		
		if (document.getElementById(Menu)) { document.getElementById(Menu).innerHTML=""; }
		if (document.getElementById(TitreItem)) { document.getElementById(TitreItem).innerHTML="<a href='javascript:Afficher"+Item+"()' class='TitreMenu' title='"+eval(Titre)+"'>"+eval(Titre)+"</a>"; }
		if (document.getElementById(TitreItem)) { document.getElementById(Lien).innerHTML="<a href='javascript:Afficher"+Item+"()'><img src='Images/Icono/IcoOuvrir.gif' title='"+C_TITLE_OPEN+"'></a>"; }
	}
}

function OuvrirLien (Url){ window.open(Url, '_blank'); }

function AfficherENT(){
	var Menu="";
	Menu = "<table border='0' width='100%'>";
	
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MEnt/GesInfCollective_L.php' target='contenu' title='Gestion des ent. col.'>Entrainement Coll</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MEnt/GesInfCollective_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	Menu += "</table>";
	
	document.getElementById("MenuENT").innerHTML = Menu;
	document.getElementById("TitreENT").innerHTML="<a href=\"javascript:Cacher('"+C_ENT+"')\" class='TitreMenu' title='"+C_ENT_NOM+"'>"+C_ENT_NOM+"</a>";
	document.getElementById("LienENT").innerHTML="<a href=\"javascript:Cacher('"+C_ENT+"')\"><img src='Images/Icono/IcoFermer.gif' title='"+C_TITLE_CLOSE+"'></a>";
	InitMenuCacher(C_ENT);
}


function AfficherMATCH(){
	var Menu="";
	Menu = "<table border='0' width='100%'>";
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MEnt/GesJouMalade_L.php' target='contenu' title='Gestion des joueurs malades'>Joueurs malade</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MEnt/GesJouMalade_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	Menu += "</table>";

	document.getElementById("MenuMATCH").innerHTML = Menu;
	document.getElementById("TitreMATCH").innerHTML="<a href=\"javascript:Cacher('"+C_MATCH+"')\" class='TitreMenu' title='"+C_MATCH_NOM+"'>"+C_MATCH_NOM+"</a>";
	document.getElementById("LienMATCH").innerHTML="<a href=\"javascript:Cacher('"+C_MATCH+"')\"><img src='Images/Icono/IcoFermer.gif' title='"+C_TITLE_CLOSE+"'></a>";
	InitMenuCacher(C_MATCH);
}

function AfficherETAT(){
	var Menu="";
	Menu = "<table border='0' width='100%'>";
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MEnt/GesJouMalade_L.php' target='contenu' title='Gestion des joueurs malades'>Joueurs malade</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MEnt/GesJouMalade_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	Menu += "</table>";

	document.getElementById("MenuETAT").innerHTML = Menu;
	document.getElementById("TitreETAT").innerHTML="<a href=\"javascript:Cacher('"+C_ETAT+"')\" class='TitreMenu' title='"+C_ETAT_NOM+"'>"+C_ETAT_NOM+"</a>";
	document.getElementById("LienETAT").innerHTML="<a href=\"javascript:Cacher('"+C_ETAT+"')\"><img src='Images/Icono/IcoFermer.gif' title='"+C_TITLE_CLOSE+"'></a>";
	InitMenuCacher(C_ETAT);
}

function AfficherTEST(){
	var Menu="";
	Menu = "<table border='0' width='100%'>";
	
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MEnt/GesInfCollective_L.php' target='contenu' title='Gestion des ent. col.'>Entrainement Coll</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MEnt/GesInfCollective_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	Menu += "</table>";

	document.getElementById("MenuTEST").innerHTML = Menu;
	document.getElementById("TitreTEST").innerHTML="<a href=\"javascript:Cacher('"+C_TEST+"')\" class='TitreMenu' title='"+C_TEST_NOM+"'>"+C_TEST_NOM+"</a>";
	document.getElementById("LienTEST").innerHTML="<a href=\"javascript:Cacher('"+C_TEST+"')\"><img src='Images/Icono/IcoFermer.gif' title='"+C_TITLE_CLOSE+"'></a>";
	InitMenuCacher(C_TEST);
}

function AfficherSUIVIM(){
	var Menu="";
	Menu = "<table border='0' width='100%'>";
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MSuivim/GesJouMalade_L.php' target='contenu' title='Gestion des joueurs malades'>Joueurs malade</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MSuivim/GesJouMalade_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	Menu += "</table>";

	document.getElementById("MenuSUIVIM").innerHTML = Menu;
	document.getElementById("TitreSUIVIM").innerHTML="<a href=\"javascript:Cacher('"+C_SUIVIM+"')\" class='TitreMenu' title='"+C_SUIVIM_NOM+"'>"+C_SUIVIM_NOM+"</a>";
	document.getElementById("LienSUIVIM").innerHTML="<a href=\"javascript:Cacher('"+C_SUIVIM+"')\"><img src='Images/Icono/IcoFermer.gif' title='"+C_TITLE_CLOSE+"'></a>";
	InitMenuCacher(C_SUIVIM);
}

function AfficherIMPORTATION(){
	var Menu="";
	Menu = "<table border='0' width='100%'>";
	
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MEnt/GesInfCollective_L.php' target='contenu' title='Gestion des ent. col.'>Entrainement Coll</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MEnt/GesInfCollective_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	Menu += "</table>";
	
	document.getElementById("MenuIMPORTATION").innerHTML = Menu;
	document.getElementById("TitreIMPORTATION").innerHTML="<a href=\"javascript:Cacher('"+C_IMPORTATION+"')\" class='TitreMenu' title='"+C_IMPORTATION_NOM+"'>"+C_IMPORTATION_NOM+"</a>";
	document.getElementById("LienIMPORTATION").innerHTML="<a href=\"javascript:Cacher('"+C_IMPORTATION+"')\"><img src='Images/Icono/IcoFermer.gif' title='"+C_TITLE_CLOSE+"'></a>";
	InitMenuCacher(C_IMPORTATION);
}

function AfficherADM(){
	var Menu="";
	Menu = "<table border='0' width='100%'>";
	
	
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MAdm/GesPersonne_L.php' target='contenu' title='Gestion des personnes'>Gestion des personnes</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MAdm/GesPersonne_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";

	
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MAdm/GesEquipe_L.php' target='contenu' title='Gestion des &eacute;quipes'>Gestion des &eacute;quipes</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MAdm/GesEquipe_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MAdm/GesPoste_L.php' target='contenu' title='Gestion des postes'>Gestion des postes</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MAdm/GesPoste_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MAdm/GesProfil_L.php' target='contenu' title='Gestion des profils'>Gestion des profils</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MAdm/GesProfil_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MAdm/GesStatut_L.php' target='contenu' title='Gestion des statuts'>Gestion des statuts </a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MAdm/GesStatut_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MAdm/GesSituation_L.php' target='contenu' title='Gestion des situations'>Gestion des situations</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MAdm/GesSituation_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MAdm/GesBlesse_L.php' target='contenu' title='Gestion des bl&eacute;ssures'>Gestion des bl&eacute;ssures</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MAdm/GesBlesse_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	
	Menu += "<td colspan='1' width='100%'><a href='www/MAdm/GesLocalisation_L.php' target='contenu' title='Gestion des localisations'>Gestion des localisations</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MAdm/GesLocalition_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MAdm/GesMaladie_L.php' target='contenu' title='Gestion des maladies'>Gestion des maladies</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MAdm/GesMaladie_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MAdm/GesDefquestion_L.php' target='contenu' title='Gestion des items Etat Forme'>Gestion des items etat forme</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MAdm/GesDefquestion_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MAdm/GesTest_L.php' target='contenu' title='GEstion des Tests'>Gestion des tests</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MAdm/GesTests_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MAdm/GesParametreGPS_L.php' target='contenu' title='Gestion des Parametres GPS'>Gestion des parametres GPS</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MAdm/GesParametreGPS_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MAdm/GesInfoIndivMatch_L.php' target='contenu' title='Informations Indiv Matchs'>Informations individuelles M</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MAdm/GesInfoIndivMatch_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MAdm/GesInfoCollMatch_L.php' target='contenu' title='Gestion des infos collectives '>Informations collectives M</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MAdm/GesInfoCollMatch_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";


	
	Menu += "</table>";

	document.getElementById("MenuADM").innerHTML = Menu;
	document.getElementById("TitreADM").innerHTML="<a href=\"javascript:Cacher('"+C_ADM+"')\" class='TitreMenu' title='"+C_ADM_NOM+"'>"+C_ADM_NOM+"</a>";
	document.getElementById("LienADM").innerHTML="<a href=\"javascript:Cacher('"+C_ADM+"')\"><img src='Images/Icono/IcoFermer.gif' title='"+C_TITLE_CLOSE+"'></a>";
	InitMenuCacher(C_ADM);
}



function UrlItem(Url){
	parent.contenu.location.href  = Url;
	InitMenuCacher('');
}

function InitMenuCacher(Id){
	if (Id != C_ENT) { Cacher(C_ENT); }
	if (Id != C_MATCH) { Cacher(C_MATCH); }
	if (Id != C_ETAT) { Cacher(C_ETAT); }
	if (Id != C_TEST) { Cacher(C_TEST); }
	if (Id != C_SUIVIM) { Cacher(C_SUIVIM); }
	if (Id != C_IMPORTATION) { Cacher(C_IMPORTATION); }
	if (Id != C_ADM) { Cacher(C_ADM); }	
	
}

function InitMenuVisible(Id){
}

function InitMenu(){
	InitMenuCacher('');
	InitMenuVisible('');
}