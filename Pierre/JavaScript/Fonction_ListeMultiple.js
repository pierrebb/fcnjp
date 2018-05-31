//function selection_champs(champs_init,champs_select, max)
//function Affiche_champs(champs_select, Valeur)
//function Affiche_champs_Init(champs_init,champs_affiche)

function selection_champs(champs_init, champs_select, max){
	bOk=1;
	if (max>0 && champs_select.length >=max){
		alert('Opération impossible. Vous avez atteint la limite.');
		bOk=0;
	}

	// Est il possible de faire le changement ?
	if (bOk == 1){
	   //on recupere l'endroit selectionner dans le select source
	    selection = champs_init.selectedIndex;
	    if(selection != -1){
	        //on deselectionne tous les champs du select de destination ou va etre placer le(s) champ(s) selectionner
	        while(champs_select.selectedIndex != -1){
	            champs_select.options[champs_select.selectedIndex].selected = false;
	        }

	        while(champs_init.selectedIndex > -1){
                //on cherche la place de notre champ
                for(place=0;place<champs_select.length;place++){
                    if(champs_select.options[place].text > champs_init.options[champs_init.selectedIndex].text){
                        break;
                    }
                }
                //on decale tous les champs
                for(i=champs_select.length;i>place;i--){
                    champs_select.options[i] = new Option(champs_select.options[(i-1)].text,champs_select.options[(i-1)].value);
                }

                //on insere le champ selectionner
                champs_select.options[place] = new Option(champs_init.options[champs_init.selectedIndex].text,champs_init.options[champs_init.selectedIndex].value);
                champs_init.options[champs_init.selectedIndex] = null;
                champs_select.options[place].selected = true;
	        }

	        if(champs_init.length > 0){
	            if(selection >= champs_init.length ){ selection = champs_init.length-1; }
	            champs_init.options[selection].selected = true;
	        }
	    }
	}
}

function Affiche_champs(champs_select, Valeur){
	var strTmp="";
	for(i=0; i<champs_select.length; i++){
		strTmp=strTmp + champs_select.options[i].value + ";";
	}
	Valeur.value = strTmp;
}

function Affiche_champs_Init(champs_init,champs_affiche){
    for(i=0;i<champs_affiche.length;i++){
        champs_affiche.options[i].selected = true;
    }

    selection_champs(champs_affiche,champs_init);
    for(i=0;i<champs_init.length;i++){
        champs_init.options[i].selected = false;
    }
}
