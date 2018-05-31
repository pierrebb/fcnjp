<?php
//<!-- Realisation : www.legalliot.fr-->
//<!-- Creat:	Eric Le Galliot 2008-->
//<!-- Modif:
//
//function NombreFormat($Nb)
//function MonnaieFormat($Nb)
//function SeparateurNumeriqueExcell($Nb)

function NombreFormat($Nb, $nbDigit=C_NB_DEC){
	if (is_numeric($Nb)){
		return number_format($Nb, $nbDigit, C_SEP_DEC, '');
	}
	return $Nb;
}

function MonnaieFormat($Nb){
	if (is_numeric($Nb)){
		return sprintf('%01.2f', $Nb);
		
		// NE MARCHE PAS
		// setlocale(LC_MONETARY,'fr_FR');
		// return money_format('%i;',$Nb);
	}
	return $Nb;
}

function SeparateurNumeriqueExcell($Nb){

	$Separateur = GET_ValeurParam(EXCELL_SEP_DEC);
	if ($Separateur == C_POINT){
		return  str_replace(',', '.', NombreFormat($Nb));
	}else{
		return  str_replace('.', ',', NombreFormat($Nb));
	}
}

?>
