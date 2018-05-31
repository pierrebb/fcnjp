//function FormatNum(valeur, decimal, separateur)
//function TestInt(Entier)
//function TestIntPositif(Entier)
//function TestFloat(Reel)
//function TestFloatPositif(Reel)
//function TestDecimal(Mnt)

// Tester un entier (negatif, positif)
function TestInt(Entier){
  var verif = /^-[0-9]+$|^[0-9]+$/;
  if (verif.exec(Entier) == null){
  		return false;
  	}else{
 		return true;
 	}
}

function TestIntPositif(Entier){
  var verif = /^[0-9]+$/;
  if (verif.exec(Entier) == null){
  		return false;
  	}else{
 		return true;
 	}
}

// Tester un reel (negatif, positif)
function TestFloat(Reel){
	var NaN=Reel;
	return !isNaN(NaN);
}

// Tester un reel (positif)
function TestFloatPositif(Reel){
	var NaN=Reel;
	if (isNaN(NaN)){
		return false;
	}else{
		if (NaN>=0){
			return true;
		}else{
			return false;
		}
	};
}

// Tester un decimal (max N digit)
function TestDecimal(Mnt, Decimal) {
	
	if( typeof(Decimal) == C_UNDEFINED ){Decimal = 2;}
	
	Tab = Mnt.split(".");
	if (Tab.length>1){
		if(Tab[1].length > Decimal){
	 			return false;
		}
	}

	var verif = /^[0-9]*\.?[0-9]+$/;
	if (verif.exec(Mnt) == null){
			return false;
		}else{
			return true;
		}
}

	  
// formate un chiffre avec 'decimal' chiffres apres la virgule et un separateur
function FormatNum(valeur, decimal, separateur) {
	var deci=Math.round( Math.pow(10,decimal)*(Math.abs(valeur)-Math.floor(Math.abs(valeur)))) ;
	var val=Math.floor(Math.abs(valeur));
	if ((decimal==0)||(deci==Math.pow(10,decimal))) {val=Math.floor(Math.abs(valeur)); deci=0;}
	var val_format=val+"";
	var nb=val_format.length;
	
	if (decimal>0) {
		var decim="";
		for (var J=0; J<(decimal-deci.toString().length); J++) {decim+="0";}
		deci=decim+deci.toString();
		val_format=val_format+"."+deci;
	}
	
	if (parseFloat(valeur)<0) {val_format="-"+val_format;}
	if (TestFloat(val_format)) { 
		return val_format;
	}else{
		return 0;
	}
	
	
}

