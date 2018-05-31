<?php
class classActeur{

	private $Id = 0;
	private $Nom = "";
	private $Prenom = "";
	private $Login = "";
	private $Administrateur = "";
	private $DateSuppression = "";
	private $Actif = "";
	
	private $CodeActeur = "";
	
	private $Role = "";
	private $Magasin = "";
		
	function __construct(){}

	function __destruct(){
		$this->Id = 0;
		$this->Nom = "";
		$this->Prenom = "";
		$this->Login = "";
		$this->Administrateur = "";
		$this->DateSuppression = "";
		$this->Actif = "";
				
		$this->CodeActeur = "";
		
		$this->Role = "";
		$this->Magasin = "";
	}

	function InitClass($Id){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
		
		$Status = false;
		$this->__destruct();
		
		if ($Id > 0){
			$Sql= new ClassSQL();
			$PS = $ps_acteurSelectById;
			$PS = $Sql->ConstruireSQL("@IdActeur", $Id, $PS);

			$TabSql=$Sql->SelectSQL($PS, C_LOG_NOLOG);
			unset($Sql);

			if ($TabSql[0][0]!=null){
				$i=0;
				$j=0;
				$this->Id=$TabSql[$i][$j++];
				$this->Nom=$TabSql[$i][$j++];
				$this->Prenom=$TabSql[$i][$j++];
				$this->Login=$TabSql[$i][$j++];
				$this->Administrateur=$TabSql[$i][$j++];
				$this->DateSuppression=$TabSql[$i][$j++];
				$Status = true;
			}
		}
		return $Status;
	}

	function InitActeurByCode($Code){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
		$Id = 0;
		
		$Sql= new ClassSQL();
		$PS = $ps_acteurSelectIdByCodeActeur;
		$PS = $Sql->ConstruireSQL("@CodeActeur", $Code, $PS);
		$TabSql=$Sql->SelectSQL($PS);
		unset($Sql);
		
		if ($TabSql[0][0]!=null){
			$Id=$TabSql[0][0];
				
			if ($Id > 0) {
				$this->InitClass($Id);
				$this->PutCodeActeur($Code);
			}
		}
		return $Id;
	}
	
	function GetId(){return $this->Id;}
	function GetNom(){return $this->Nom;}
	function GetPrenom(){return $this->Prenom;}	
	function GetLogin(){return $this->Login;}	
	function GetAdministrateur(){return $this->Administrateur;}
	function GetDateSuppression(){return $this->DateSuppression;}
	
	function GetTabCout(){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
		
		$Sql= new ClassSQL();
		$PS = $ps_acteurSelectCoutByIdActeur;
		$PS = $Sql->ConstruireSQL("@IdActeur", $this->Id, $PS);
		$TabCout=$Sql->SelectSQL($PS);
		return ($TabCout);
	}

	function GetIdCout(){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
		
		$Sql= new ClassSQL();
		$PS = $ps_alecoutIdCoutByCodeActeur;
		if ($this->CodeActeur != ''){
			$PS = $Sql->ConstruireSQL("@CodeActeur", $this->CodeActeur, $PS);
			$TabSql=$Sql->SelectSQL($PS);
			if ($TabSql[0][0] != null) {$Id=$TabSql[0][0];}
		}		
		unset($Sql);
		return ($Id);
	}
	
	function PutNom($Nom){$this->Nom = $Nom;}
	function PutPrenom($Prenom){$this->Prenom = $Prenom;}
	function PutLogin($Login){$this->Login = strtolower($Login);}
	function PutAdministrateur($Administrateur){$this->Administrateur = $Administrateur;}
	function PutActif($Actif){$this->Actif = $Actif;}
	function PutCodeActeur($Code){$this->CodeActeur = $Code;}
	function PutRole($Role){$this->Role = $Role;}
	function PutMagasin($Magasin){$this->Magasin = $Magasin;}
	
	function GetIdentiteUnique($ActionPHP){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
		
		$Status=1;
		$Sql= new ClassSQL();
	
		// Verification de l'identite unique
		switch($ActionPHP)
		{
			case C_INSERT:
				$PS=$ps_AgentVerifIdenInsert;
				break;
			case C_UPDATE:
				$PS=$ps_AgentVerifIdenUpdate;
				break;
			default:
				$Status=0;
		}
	
		// Verification
		if ($Status){
			$PS = $Sql->ConstruireSQL("@IdActeur", $this->Id, $PS);
			$PS = $Sql->ConstruireSQL("@Nom", strtoupper($this->Nom), $PS);
			$PS = $Sql->ConstruireSQL("@Prenom", strtoupper($this->Prenom), $PS);

			$TabSql=$Sql->SelectSQL($PS);
			if ($TabSql[0][0]!=null){
				if ($TabSql[0][0]>0){
					$Status=0;
				};
			}
		}
		unset($Sql);
		return $Status;
	}

	function GetLoginUnique($ActionPHP){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
		
		$Status=1;
		$Sql= new ClassSQL();
	
		// Verification de l'identite unique
		switch($ActionPHP)
		{
			case C_INSERT:
				$PS=$ps_AgentVerifLoginInsert;
				break;
			case C_UPDATE:
				$PS=$ps_AgentVerifLoginUpdate;
				break;
			default:
				$Status=0;
		}
	
		// Verification
		if ($Status){
			$PS = $Sql->ConstruireSQL("@IdActeur", $this->Id, $PS);
			$PS = $Sql->ConstruireSQL("@Login", strtoupper($this->Login), $PS);
			$TabSql=$Sql->SelectSQL($PS);
			if ($TabSql[0][0]!=null){
				if ($TabSql[0][0]>0){
					$Status=0;
				};
			}
		}
		unset($Sql);
		return $Status;
	}
	
	function Validate($ActionPHP, $TabCout){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');

		$Mdp = GET_ValeurParam(C_PASSWORD_DEFAUT);
		
		$Sql= new ClassSQL();
		
		$Sql->BeginTransactionSQL(__METHOD__);		
		
		switch($ActionPHP)
			{
		    case C_INSERT:
				$PS=$ps_acteurInsert;
		        break;
		    case C_UPDATE:
				$PS=$ps_acteurUpdate;
		        break;
		    default:
		    }

			$PS = $Sql->ConstruireSQL("@IdActeur", $this->Id, $PS);
			$PS = $Sql->ConstruireSQL("@Nom", $this->Nom, $PS);
			$PS = $Sql->ConstruireSQL("@Prenom", $this->Prenom, $PS);
			$PS = $Sql->ConstruireSQL("@Login", strtolower($this->Login), $PS);
			$PS = $Sql->ConstruireSQL("@MdP", $Mdp, $PS);
			$PS = $Sql->ConstruireSQL("@Administrateur", $this->Administrateur, $PS);
			
			switch($ActionPHP)
			{
		    case C_INSERT:
		    	$Status=false;
				$IdActeur=$Sql->InsertSql($PS);
				if ($IdActeur>0){
					$this->Id = $IdActeur;
					$Status=true;
				}
		        break;
		    case C_UPDATE:
				$Status=$Sql->UpdateSQL($PS);
		        break;
		    default:
		    }
		    // Role
		    if ($Status) {
		    	$PS=$ps_aleroleDeleteByIdActeur;
		    	$PS = $Sql->ConstruireSQL("@IdActeur", $this->Id, $PS);
		    	$Status=$Sql->UpdateSQL($PS);
		    }
		    
		    if ($Status) {
		    	$Tableau=get_split(';',$this->Role);
		  		$Nb = 0;
		    	$Nb = count ($Tableau)-1;
		    
		    	for($i=0; $i<$Nb; $i++){
		    		$PS=$ps_aleroleInsert;
		    		$PS = $Sql->ConstruireSQL("@IdActeur", $this->Id, $PS);
		    		$PS = $Sql->ConstruireSQL("@IdRole", $Tableau[$i], $PS);
		    		$Status=$Sql->UpdateSQL($PS);
		    	}
		    }

		    // Magasin
		    $PS=$ps_magActeurDeleteByIdActeur;
		    if ($Status) {
		    	$PS = $Sql->ConstruireSQL("@IdActeur", $this->Id, $PS);
		    	$Status=$Sql->UpdateSQL($PS);
		    }
		    
		    if ($Status) {
		    	$Tableau=get_split(';',$this->Magasin);
		  		$Nb = 0;
		    	$Nb = count ($Tableau)-1;
		    
		    	for($i=0; $i<$Nb; $i++){
		    		$PS=$ps_magActeurInsert;
		    		$PS = $Sql->ConstruireSQL("@IdActeur", $this->Id, $PS);
		    		$PS = $Sql->ConstruireSQL("@IdMagasin", $Tableau[$i], $PS);
		    		$PS = $Sql->ConstruireSQL("@Ordre", $i+1, $PS);
		    		$Status=$Sql->UpdateSQL($PS);
		    	}
		    }

		$Sql->EndTransactionSQl($Status, __METHOD__);
		
		unset($Sql);
		// Cout
		if ($Status) {$Status=$this->ValidateCout($TabCout);}
		// Inactif ?
		if ($Status && $this->Actif==0) {$Status=$this->ValidateInActif();}

		return $Status;
	}

	function ValidateCout($TabCout){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
	
		$Sql= new ClassSQL();
		$Status = 1;
		$NB = 0;
		$NB=count($TabCout);
		for($i=0; $i<$NB; $i++){
			$IdCout=0;
			$Action = "";
			$CodeActeur=0;
			$Actif = 0;
			$j=0;
			$IdCout=$TabCout[$i][$j++];
			$Action=$TabCout[$i][$j++];
			$CodeActeur=$TabCout[$i][$j++];
			$Actif=$TabCout[$i][$j++];
			
			if ($CodeActeur==0){
				$rand = rand(C_CODE_RAN_ACTEUR_DEB, C_CODE_RAN_ACTEUR_FIN);
				$CodeActeur = C_CODE_ACTEUR.$rand.$this->Id.$IdCout;
			}
	
			if ($IdCout != 0 AND $CodeActeur > 0){
				switch($Action)
				{
					case C_INSERT:
						$PS=$ps_alecoutInsert;
						$PS = $Sql->ConstruireSQL("@IdCout", $IdCout, $PS);
						$PS = $Sql->ConstruireSQL("@IdActeur", $this->Id, $PS);
						$PS = $Sql->ConstruireSQL("@CodeActeur", $CodeActeur, $PS);
						$PS = $Sql->ConstruireSQL("@Actif", 1, $PS);
						$Status=$Sql->InsertSql($PS);
						if ($Status==0){$Status=1;}
						break;
					case C_UPDATE:
						$PS=$ps_alecoutUpdate;
						$PS = $Sql->ConstruireSQL("@IdCout", $IdCout, $PS);
						$PS = $Sql->ConstruireSQL("@Actif", $Actif, $PS);
						$PS = $Sql->ConstruireSQL("@CodeActeur", $CodeActeur, $PS);
						$Status=$Sql->UpdateSQL($PS);
						break;
					case C_DELETE:
						break;
					default:
				}
			}
		}
		unset($Sql);
		return $Status;
	}

	function ValidateInActif(){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
		
		$Status=1;		
		$Sql= new ClassSQL();
		$Sql->BeginTransactionSQL(__METHOD__);
		
	    // Mettre inactif un agent
	    if ($this->Actif==0){
	    	$Date=DateMysqltoFr(DateJour(),C_DATE_MYSQL);
	    	$PS=$ps_acteurInactif;
	    	$PS = $Sql->ConstruireSQL("@IdActeur", $this->Id, $PS);
	    	$PS = $Sql->ConstruireSQL("@DateSuppression", $Date, $PS);
	    	$Status=$Sql->UpdateSQL($PS);
	    
	    	if ($Status){
	    		$PS=$ps_alecoutInactif;
	    		$PS = $Sql->ConstruireSQL("@IdActeur", $this->Id, $PS);
	    		$Status=$Sql->UpdateSQL($PS);
	    	}
	    }
				
		$Sql->EndTransactionSQl($Status, __METHOD__);
		
		unset($Sql);
		return $Status;
	}	
	
	function ValidateActif(){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
		
		$Status=0;		
		$Sql= new ClassSQL();
		$Sql->BeginTransactionSQL(__METHOD__);
		
		$PS=$ps_acteurActif;
		$PS = $Sql->ConstruireSQL("@IdActeur", $this->Id, $PS);
		$Status=$Sql->UpdateSQL($PS);
		
		$Sql->EndTransactionSQl($Status, __METHOD__);
		
		unset($Sql);
		return $Status;
	}	
	
	function MdpInit(){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
		
		$Mdp = GenMDP(8);
		$MdpMd5 = md5($Mdp);
		
		$Status=0;
		$Sql= new ClassSQL();
		
		$PS = $ps_acteurInitMdp;
		$PS = $Sql->ConstruireSQL("@IdActeur", $this->Id, $PS);
		$PS = $Sql->ConstruireSQL("@Mdp", $MdpMd5, $PS);
		$Status=$Sql->UpdateSQL($PS);
		
		unset($Sql);
		return $Mdp;
		
	}
	
	function MdpUpdate($Mdp){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
	
		$Sql= new ClassSQL();
	
		$PS = $ps_acteurUpdateMdp;
		$PS = $Sql->ConstruireSQL("@IdActeur", $this->Id, $PS);
		$PS = $Sql->ConstruireSQL("@Mdp", $Mdp, $PS);
		$PS = $Sql->ConstruireSQL("@Separateur", C_SEPARATEUR_PARAM_MDP, $PS);
		$Status=$Sql->UpdateSQL($PS);
		
		// Mise a jour des n derniers mdp dans la base.
		$PS = $ps_acteurSelectMdpLast;
		$PS = $Sql->ConstruireSQL("@IdActeur", $this->Id, $PS);
		$TabSql=$Sql->SelectSQL($PS);
		if ($TabSql[0][0] != null){
			$Tab = get_split(C_SEPARATEUR_PARAM_MDP, $TabSql[0][0]);
			$Nb = count($Tab);
			if ($Nb > C_MDP_NBLAST){
				$MdpLast = "";
				$IndDep = $Nb - C_MDP_NBLAST;

				for($i=($Nb-1); $i>=$IndDep; $i--){
					if($MdpLast == "") {
						$MdpLast = trim($Tab[$i]);
					}else{
						$MdpLast = trim($Tab[$i]).";". $MdpLast;
					}
					
				}
				$PS = $ps_acteurUpdateMdpLast;
				$PS = $Sql->ConstruireSQL("@IdActeur", $this->Id, $PS);
				$PS = $Sql->ConstruireSQL("@MdpLast", $MdpLast, $PS);
				$Status=$Sql->UpdateSQL($PS);
			}			
		}
		unset($Sql);
		return 	$Status;
	}	

	function MdpNbJour(){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
		$Status = 0;
		$Sql= new ClassSQL();
	
		$PS = $ps_acteurSelectMdpNbJour;
		$PS = $Sql->ConstruireSQL("@IdActeur", $this->Id, $PS);
		$TabSql=$Sql->SelectSQL($PS);
		if ($TabSql[0][0] != null ){$Status = ($TabSql[0][0]);}
		unset($Sql);
	
		return 	$Status;
	}	

	function MdpVerifLast($Mdp){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
		$Status = 1;
		$Sql= new ClassSQL();
		
		$PS = $ps_acteurSelectMdpLast;
		$PS = $Sql->ConstruireSQL("@IdActeur", $this->Id, $PS);
		$TabSql=$Sql->SelectSQL($PS);
		if ($TabSql[0][0] != null){
			if( strstr($TabSql[0][0], $Mdp.C_SEPARATEUR_PARAM_MDP)) { $Status=0; }
		}
		unset($Sql);
		return 	$Status;
	}
	
	function ListeActeurCout(){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
		
		$TabSql = null;
		$Sql= new ClassSQL();
	
		$PS = $ps_acteurSelectListeAgentCout;
		$TabSql=$Sql->SelectSQL($PS);
		unset($Sql);
		return 	$TabSql;
	}
}
?>
