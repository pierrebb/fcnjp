//function addDaysToDate(old_date, delta_days)
//function DateCompare(pDateDebut, pDateFin)
//function DateJour()
//function DateVerif(pDate)
//function difHeure(HeureDeb,HeureFin)
//function isDate(d) 
//function isHeure(h)

// Ajoutter des jours à une date
function addDaysToDate(old_date, delta_days){
   // Date plus quelques jours
   var split_date = old_date.split('/');
   // Les mois vont de 0 a 11 donc on enleve 1, cast avec *1
   var new_date = new Date(split_date[2], split_date[1]*1 - 1, split_date[0]*1 + delta_days);
   var new_day = new_date.getDate();
       new_day = ((new_day < 10) ? '0' : '') + new_day; // ajoute un zero devant pour la forme
   var new_month = new_date.getMonth() + 1;
       new_month = ((new_month < 10) ? '0' : '') + new_month; // ajoute un zero devant pour la forme
   var new_year = new_date.getYear();
       new_year = ((new_year < 200) ? 1900 : 0) + new_year; // necessaire car IE et FF retourne pas la meme chose
   var new_date_text = new_day + '/' + new_month + '/' + new_year;
   return new_date_text;
}

function TransformeDate(date){
	var d = new Date(date[2], date[1] - 1, date[0]);
	return d.getTime();
}

//Comparaison de date (format jj/mm/yyyy)
function DateCompare(pDateDebut, pDateFin){
	
	var debut = TransformeDate(pDateDebut.split("/"));
	var fin = TransformeDate(pDateFin.split("/"));
	var nb = (fin - debut) / (1000 * 60 * 60 * 24);
	return nb;
}

// Date du jour
function DateJour(){
    var DateJ = new Date() ;
    return(DateJ.getDate() + "/" + (DateJ.getMonth()+1) + "/" + DateJ.getFullYear()) ;
}

// Verification format de la date jj/mm/yyyy
function DateVerif(pDate){

	var format = /^(\d{1,2}\/){2}\d{4}$/;
	if(!format.test(pDate)){return 0;}
	else{
		var date_temp = pDate.split('/');
		date_temp[1] -=1;        // On rectifie le mois !!!
		var ma_date = new Date();
		ma_date.setFullYear(date_temp[2]);
		ma_date.setMonth(date_temp[1]);
		ma_date.setDate(date_temp[0]);
		if(ma_date.getFullYear()==date_temp[2] && ma_date.getMonth()==date_temp[1] && ma_date.getDate()==date_temp[0]){
			return 1;
		}
		else{
			return 0;
		}
	}
}


// Calcul la difference d'heure.
function difHeure(HeureDeb,HeureFin){

	var Erreur = 0;
	if(!isHeure(HeureDeb)){
		Erreur=-1;
	}

	if(!isHeure(HeureFin)){
		if (Erreur==-1){
			Erreur=-3;
		}else{
			Erreur=-2;
		}
	}
	if (Erreur!=0){
		return Erreur;
	}

	hd=HeureDeb.split(":");
	hf=HeureFin.split(":");

	hd[0]=eval(hd[0]);
	hd[1]=eval(hd[1]);
	hf[0]=eval(hf[0]);
	hf[1]=eval(hf[1]);

	if (parseInt(hd[0],10)>parseInt(hf[0],10)){
		return (-4);
	}
	if (parseInt(hd[0],10)==parseInt(hf[0],10)){
		if (parseInt(hd[1],10)>parseInt(hf[1],10)){
			return (-4);
		}
	}

	if(hf[1]<hd[1]){hf[0]=hf[0]-1;hf[1]=hf[1]+60;}
	if(hf[0]<hd[0]){hf[0]=hf[0]+24;}

	var Temps=((hf[0]-hd[0]) + ":" + (hf[1]-hd[1]));

	var hh = parseInt(Temps.split(":")[0],10); // Heure
	var mm = parseInt(Temps.split(":")[1],10); // minute

	return(hh*60+mm);
}

function isDate(d) {
	// Cette fonction permet de verifier la validite d'une date au format jj/mm/aa ou jj/mm/aaaa

	if (d == "") // si la variable est vide on retourne faux
		return false;

	e = new RegExp("^[0-9]{1,2}\/[0-9]{1,2}\/([0-9]{2}|[0-9]{4})$");

	if (!e.test(d)) // On teste l'expression reguliere pour valider la forme de la date
		return false; // Si pas bon, retourne faux

	// On separe la date en 3 variables pour verification, parseInt() converti du texte en entier
	j = parseInt(d.split("/")[0], 10); // jour
	m = parseInt(d.split("/")[1], 10); // mois
	a = parseInt(d.split("/")[2], 10); // ann�e

	// Si l'annee n'est compos�e que de 2 chiffres on complete automatiquement
	if (a < 1000) {
		if (a < 10)	a+=2000; // Si a < 89 alors on ajoute 2000 sinon on ajoute 1900
		else a+=1900;
	}

	// Definition du dernier jour de fevrier
	// Ann�e bissextile si annnee divisible par 4 et que ce n'est pas un si�cle, ou bien si divisible par 400
	if (a%4 == 0 && a%100 !=0 || a%400 == 0) fev = 29;
	else fev = 28;

	// Nombre de jours pour chaque mois
	nbJours = new Array(31,fev,31,30,31,30,31,31,30,31,30,31);

	// Enfin, retourne vrai si le jour est bien entre 1 et le bon nombre de jours, idem pour les mois, sinon retourn faux
	return ( m >= 1 && m <=12 && j >= 1 && j <= nbJours[m-1] );
}

function isHeure(h) {
	if (h == "") // si la variable est vide on retourne faux
		return false;


	// Cette fonction permet de verifier la validit� d'une heure au format hh:mm
	var ctl = /^([0-1]?[0-9]|2[0-4])[:][0-5]?[0-9]$/

	if (!ctl.exec(h))
		return false;

	var hh = parseInt(h.split(":")[0],10); // Heure
	var mm = parseInt(h.split(":")[1],10); // minute

	return ( hh >= 1 && hh <=23 && mm >= 0 && mm <= 59 );
}
