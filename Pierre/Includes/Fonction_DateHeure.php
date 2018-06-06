<?php
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:	--> Johan Le Galliot
// DATE Mai 2010
//function DateMysqltoFr($DateMysql ,$Conv)
//function NaissancetoFc ($NaissanceMysql, $Conv)
//function DateHeureMinute($H)
//function DateJour()
//function DateHeureJour()
//function DateDebutMoisCourant()
//function DateDernierJourMois($M,$A)
//function DateCalculTemps($HeureDebut,$HeureFin)
//function DateConversionTemps100($Temps)
//function DateDiff($Date1, $Date2)
//function DateAddJour($DateDo,$nbrJours)
//function DateAddMinuteToHeure($Heure, $NombreMinute)
//function Date_week_date($week,$year)
//function Date_week_number($Date)
//function Date_day_name($Date)
//function Date_day_name_abr($Date)
//function Date_mois($Date)
//function Date_annee($Date)
//function GET_DateMinuteToHeure($NombreMinute)
//function GET_DateMonthByNum($numMonth)
//function PUT_Heure($H, $M, $bGras)

function DateMysqltoFr($DateMysql , $Conv){
	$Aa = "";
	$Mm = "";
	$Jj = "";
	if ($DateMysql != ""){
		switch($Conv)
		{
			case C_DATE_FR:
				if (strpos($DateMysql, "-") > 0){
					list($Aa, $Mm, $Jj) = explode("-", (string)$DateMysql);
					return ($Jj."/".$Mm."/".$Aa);
					break;
						
				}
			case C_DATE_MYSQL:
			if (strpos($DateMysql, "/") > 0){
				list($Jj, $Mm, $Aa) = explode("/", (string)$DateMysql);
				return ($Aa."-".$Mm."-".$Jj);
				break;
			}
		}
	}
	return "";
}

function NaissanceMysqltoFr($NaissanceMysql , $Conv){
	$Aa = "";
	$Mm = "";
	$Jj = "";
	if ($NaissanceMysql != ""){
		switch($Conv)
		{
			case C_NAISSANCE_FR:
				if (strpos($NaissanceMysql, "-") > 0){
					list($Aa, $Mm, $Jj) = explode("-", (string)$NaissanceMysql);
					return ($Jj."/".$Mm."/".$Aa);
					break;
						
				}
			case C_NAISSANCE_MYSQL:
			if (strpos($NaissanceMysql, "/") > 0){
				list($Jj, $Mm, $Aa) = explode("/", (string)$NaissanceMysql);
				return ($Aa."-".$Mm."-".$Jj);
				break;
			}
		}
	}
	return "";
}


function DateHeureMinute($H){
	 	if ($H==""){return "";}
		
		// Au cas ou afin d'etre au bon format
	 	$H=$H.':00:00';
	 	
	 	$Hh = "";
	 	$Mm = "";
	 	$Ss = "";
		list($Hh, $Mm, $Ss) = explode(":", (string)$H);
		return ($Hh.":".$Mm);
}

function DateJour(){return date("d/m/Y");}
function NaissanceJour(){return date("d/m/Y");}

function DateDebutMoisCourant(){return date("01/m/Y");}
function NaissanceDebutMoisCourant(){return date("01/m/Y");}

function DateHeureJour(){return date("H:i");}
function NaissanceHeureJour(){return date("H:i");}

// Retourne le nombre de jour dans un mois
function DateDernierJourMois($M,$A){
	$dernJour = 28;
	while (checkdate($M, $dernJour , $A)){$dernJour++;}
	return --$dernJour;
}

function NaissanceDernierJourMois($M,$A){
	$dernJour = 28;
	while (checkdate($M, $dernJour , $A)){$dernJour++;}
	return --$dernJour;
}

// Calcul du temps entre 2 heures (meme journée)
function DateCalculTemps($HeureDebut,$HeureFin){
	$HhD = "";
	$MmD = "";
	$HhF = "";
	$MmF = "";

	list($HhD, $MmD) = explode(":", (string)$HeureDebut);
	list($HhF, $MmF) = explode(":", (string)$HeureFin);
	$Debut=$HhD*60+$MmD;
	$Fin=$HhF*60+$MmF;

	return $Fin-$Debut;
}

// Conversion d'une durée en minute en 100/h
function DateConversionTemps100($Temps){return round($Temps/60,2);}

// Nombre de jours entre 2 dates
// Transforme la date jj/mm/aaaa en mm/jj/aaaa (format US)
function DateDiff($Date1, $Date2){
 	$Jj = "";
 	$Mm = "";
 	$Aa = "";
	list($Jj,$Mm, $Aa) = explode("/", (string)$Date1);
	$Date1=$Mm."/".$Jj."/".$Aa;

	list($Jj,$Mm, $Aa) = explode("/", (string)$Date2);
	$Date2=$Mm."/".$Jj."/".$Aa;

	$s = strtotime($Date2)-strtotime($Date1);
	$d = intval($s/86400)+1;
	return "$d";
}

// Ajoutter un nombre de jour à une date
function DateAddJour($DateDo,$nbrJours){
 	$Jj = "";
 	$Mm = "";
 	$Aa = "";
	list($Jj,$Mm, $Aa) = explode("/", (string)$DateDo);
	$DateDo=$Mm."/".$Jj."/".$Aa;

	$timeStamp = strtotime($DateDo);
	$timeStamp += 24 * 60 * 60 * $nbrJours;
	$newDate = date("d/m/Y", $timeStamp);
	return  $newDate;
}

// Ajoutter des minute à une heure
function DateAddMinuteToHeure($Heure, $NombreMinute){
	$Heure2 = GET_DateMinuteToHeure($NombreMinute);
	$h =  strtotime($Heure);
	$h2 = strtotime($Heure2);

	$minute = date("i", $h2);
	$second = date("s", $h2);
	$hour = date("H", $h2);

	$convert = strtotime("+$minute minutes", $h);
	$convert = strtotime("+$second seconds", $convert);
	$convert = strtotime("+$hour hours", $convert);
	return date('H:i', $convert);
}

// ******************************************************
// Function that returns the dates for each day in a week
// ******************************************************
function Date_week_date($week,$year) {
   $week_dates = array();
   // Get timestamp of first week of the year
   $first_day = mktime(12,0,0,1,1,$year);
   $first_week = date("W",$first_day);
   if ($first_week > 1) {
       $first_day = strtotime("+1 week",$first_day); // skip to next if year does not begin with week 1
   }
   // Get timestamp of the week
   $timestamp = strtotime("+$week week",$first_day);

   // Adjust to Monday of that week
   $what_day = date("w",$timestamp); // I wanted to do "N" but only version 4.3.9 is installed :-(
   if ($what_day==0) {
       // actually Sunday, last day of the week. FIX;
       $timestamp = strtotime("-6 days",$timestamp);
   } elseif ($what_day > 1) {
       $what_day--;
       $timestamp = strtotime("-$what_day days",$timestamp);
   }
   $week_dates[1] = date("d/m/Y",$timestamp); // Monday
   $week_dates[2] = date("d/m/Y",strtotime("+1 day",$timestamp)); // Tuesday
   $week_dates[3] = date("d/m/Y",strtotime("+2 day",$timestamp)); // Wednesday
   $week_dates[4] = date("d/m/Y",strtotime("+3 day",$timestamp)); // Thursday
   $week_dates[5] = date("d/m/Y",strtotime("+4 day",$timestamp)); // Friday
   $week_dates[6] = date("d/m/Y",strtotime("+5 day",$timestamp)); // Saturday
   $week_dates[7] = date("d/m/Y",strtotime("+6 day",$timestamp)); // Sunday
   return($week_dates);
}

function Date_week_number($Date){
 	$Jj = "";
 	$Mm = "";
 	$Aa = "";
	list($Jj,$Mm, $Aa) = explode("/", (string)$Date);
	$week_number[1]=date("W", mktime(0, 0, 0, $Mm, $Jj, $Aa)); // semaine
	$week_number[2]=date("o", mktime(0, 0, 0, $Mm, $Jj, $Aa)); // annee
   return($week_number);
}

function Date_day_name($Date){
 	$Jj = "";
 	$Mm = "";
 	$Aa = "";

	list($Jj,$Mm, $Aa) = explode("/", (string)$Date);
	$Tabjour = Array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
	$numJour = date ('w', mktime (0,0,0,$Mm, $Jj, $Aa));
	return $Tabjour[$numJour];
}

function Date_day_name_abr($Date){
 	$Jj = "";
 	$Mm = "";
 	$Aa = "";

	list($Jj,$Mm, $Aa) = explode("/", (string)$Date);
	$Tabjour = Array('Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa');
	$numJour = date ('w', mktime (0,0,0,$Mm, $Jj, $Aa));
	return $Tabjour[$numJour];
}

function Date_mois($Date){
	$Jj = "";
	$Mm = "";
	$Aa = "";
	list($Jj,$Mm, $Aa) = explode("/", (string)$Date);
	return($Mm);
}

function Date_annee($Date){
 	$Jj = "";
 	$Mm = "";
 	$Aa = "";
	list($Jj,$Mm, $Aa) = explode("/", (string)$Date);
	return($Aa);
}

function GET_DateMonthByNum($numMonth)
{
        switch($numMonth)
        {
            case('1'):
	            return 'Janvier';
            break;

            case('2'):
            	return 'Février';
            break;

            case('3'):
        	    return 'Mars';
            break;

            case('4'):
	            return 'Avril';
            break;

            case('5'):
    	        return 'Mai';
            break;

            case('6'):
        	    return 'Juin';
            break;

            case('7'):
	            return 'Juillet';
            break;

            case('8'):
    	        return 'Août';
            break;

            case('9'):
	            return 'Septembre';
            break;

            case('10'):
	            return 'Octobre';
            break;

            case('11'):
	            return 'Novembre';
            break;

            case('12'):
	            return 'Décembre';
            break;

            default:
            return '';
        }
}

function GET_DateMinuteToHeure($NombreMinute){
	$Retour = "";
	if (is_numeric($NombreMinute)) {
		$TotSec = $NombreMinute *60;
		$heures  =  bcdiv($TotSec,  3600,  0);
		$minutes  =  (bcdiv($TotSec,  60,  0)  %  60);
		$Retour =  $heures  .  ":"  .  $minutes;
	}
	return $Retour;
}

function PUT_Heure($H, $M, $bGras=1){
	$HM = "";
	
	if ($bGras == 0){
		return ($M==0) ? "".$H."H00" : "".$H."H".$M."";
	}else {
		return ($M==0) ? "<b>".$H."H00</b>" : "<b>".$H."H".$M."</b>";
	}
}