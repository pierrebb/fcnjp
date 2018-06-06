const C_ADM_NOM = 'Parametres';
const C_ADM = 'ADM';

const C_ENT_NOM = 'Gestion Entrainement';
const C_ENT = 'ENT';

const C_JOU_NOM = 'Suivi Medical';
const C_JOU = 'JOU';

const C_ETAT_NOM = 'Etat Forme';
const C_ETAT= 'ETAT';

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

function AfficherADM(){
	var Menu="";
	Menu = "<table border='0' width='100%'>";
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MAdm/GesEquipe_L.php' target='contenu' title='Gestion des &eacute;quipes'>Gestion des &eacute;quipes</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MAdm/GesEquipe_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
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
	Menu += "<td colspan='1' width='100%'><a href='www/MAdm/GesInfoIndivMatch_L.php' target='contenu' title='Informations Indiv Matchs'>Gestion des Infos Indiv</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MAdm/GesInfoIndivMatch_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MAdm/GesParametreGPS_L.php' target='contenu' title='Gestion des Parametres GPS'>Gestion des Parametres GPS</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MAdm/GesParametreGPS_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
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
	Menu += "<td colspan='1' width='100%'><a href='www/MAdm/GesSituation_L.php' target='contenu' title='Gestion des situations'>Gestion des situations</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MAdm/GesSituation_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MAdm/GesStatut_L.php' target='contenu' title='Gestion des statuts'>Gestion des statuts </a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MAdm/GesStatut_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MAdm/GesInfoCollMatch_L.php' target='contenu' title='Gestion des infos collectives '>Gestion des infos collectives</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MAdm/GesInfoCollMatch_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	
	Menu += "</table>";

	
	Menu += "</table>";

	document.getElementById("MenuADM").innerHTML = Menu;
	document.getElementById("TitreADM").innerHTML="<a href=\"javascript:Cacher('"+C_ADM+"')\" class='TitreMenu' title='"+C_ADM_NOM+"'>"+C_ADM_NOM+"</a>";
	document.getElementById("LienADM").innerHTML="<a href=\"javascript:Cacher('"+C_ADM+"')\"><img src='Images/Icono/IcoFermer.gif' title='"+C_TITLE_CLOSE+"'></a>";
	InitMenuCacher(C_ADM);
}

function AfficherENT(){
	var Menu="";
	Menu = "<table border='0' width='100%'>";
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MEnt/GesInfCollective_L.php' target='contenu' title='Gestion des ent. col.'>Entrainement Coll</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MEnt/GesInfCollective_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MEnt/GesPersonne_L.php' target='contenu' title='Gestion des personnes'>Personnes</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MEnt/GesPersonne_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	Menu += "</table>";
	

	
	
	
	document.getElementById("MenuENT").innerHTML = Menu;
	document.getElementById("TitreENT").innerHTML="<a href=\"javascript:Cacher('"+C_ENT+"')\" class='TitreMenu' title='"+C_ENT_NOM+"'>"+C_ENT_NOM+"</a>";
	document.getElementById("LienENT").innerHTML="<a href=\"javascript:Cacher('"+C_ENT+"')\"><img src='Images/Icono/IcoFermer.gif' title='"+C_TITLE_CLOSE+"'></a>";
	InitMenuCacher(C_ENT);
}


function AfficherJOU(){
	var Menu="";
	Menu = "<table border='0' width='100%'>";
	Menu += "<tr>";
	Menu += "<td colspan='1' width='100%'><a href='www/MEnt/GesJouMalade_L.php' target='contenu' title='Gestion des joueurs malades'>Joueurs malade</a></td>";
	Menu += "<td colspan='1'><a href=javascript:OuvrirLien('www/MEnt/GesJouMalade_L.php') title='"+C_TITLE_OPEN_ONGLET+"'><span class='animation_icone'><img src='Images/Icono/IcoOnglet.gif'></a></span</td>";
	Menu += "</tr>";
	Menu += "</table>";

	document.getElementById("MenuJOU").innerHTML = Menu;
	document.getElementById("TitreJOU").innerHTML="<a href=\"javascript:Cacher('"+C_JOU+"')\" class='TitreMenu' title='"+C_JOU_NOM+"'>"+C_JOU_NOM+"</a>";
	document.getElementById("LienJOU").innerHTML="<a href=\"javascript:Cacher('"+C_JOU+"')\"><img src='Images/Icono/IcoFermer.gif' title='"+C_TITLE_CLOSE+"'></a>";
	InitMenuCacher(C_JOU);
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


function UrlItem(Url){
	parent.contenu.location.href  = Url;
	InitMenuCacher('');
}

function InitMenuCacher(Id){
	if (Id != C_ADM) { Cacher(C_ADM); }
	if (Id != C_ENT) { Cacher(C_ENT); }
	if (Id != C_JOU) { Cacher(C_JOU); }
	if (Id != C_ETAT) { Cacher(C_ETAT); }
}

function InitMenuVisible(Id){
}

function InitMenu(){
	InitMenuCacher('');
	InitMenuVisible('');
}