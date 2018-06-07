<?php
class classPersonne{

	private $Id = 0;
	private $IdProfil = 0;
	private $IdStatut = 0;
	private $IdPoste = 0;
	private $IdEquipe = 0;
	private $Nom= "";
	private $Prenom = "";
	private $Telephone = "";
	private $Courriel = "";
	private $Adresse = "";
	private $Naissance = "";
	private $Actif = "";
	
	function __construct(){}

	function __destruct(){
		$this->Id = 0;
		$this->IdProfil = 0;
		$this->IdStatut = 0;
		$this->IdPoste = 0;
		$this->IdEquipe = 0;
		$this->Nom = 0;
		$this->Prenom = 0;
		$this->Telephone = 0;
		$this->Courriel = 0;
		$this->Adresse = 0;
		$this->Naissance = 0;
		$this->Actif = 0;
		}

	function InitClass($Id){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
		
		$Status = false;
		$this->__destruct();
		
		if ($Id > 0){
			$Sql= new ClassSQL();
			$PS = $ps_PersonneSelectById;
			$PS = $Sql->ConstruireSQL("@IdPersonne", $Id, $PS);
			$TabSql=$Sql->SelectSQL($PS, C_LOG_NOLOG);
			
			unset($Sql);

			if ($TabSql[0][0]!=null){
				$i=0;
				$j=0;
				$this->Id=$TabSql[$i][$j++];
				$this->IdProfil=$TabSql[$i][$j++];
				$this->IdStatut=$TabSql[$i][$j++];
				$this->IdPoste=$TabSql[$i][$j++];
				$this->IdEquipe=$TabSql[$i][$j++];
				$this->Nom=$TabSql[$i][$j++];
				$this->Prenom=$TabSql[$i][$j++];
				$this->Telephone=$TabSql[$i][$j++];
				$this->Courriel=$TabSql[$i][$j++];
				$this->Adresse=$TabSql[$i][$j++];
				$this->Naissance=$TabSql[$i][$j++];
				$this->Actif=$TabSql[$i][$j++];
				$Status = true;
			}
		}
		return $Status;
	}

	function GetId(){return $this->Id;}
	function GetIdProfil(){return $this->IdProfil;}
	function GetIdStatut(){return $this->IdStatut;}
	function GetIdPoste(){return $this->IdPoste;}
	function GetIdEquipe(){return $this->IdEquipe;}
	function GetNom(){return $this->Nom;}
	function GetPrenom(){return $this->Prenom;}
	function GetTelephone(){return $this->Telephone;}
	function GetCourriel(){return $this->Courriel;}
	function GetAdresse(){return $this->Adresse;}
	function GetNaissance(){return $this->Naissance;}
	function GetActif(){return $this->Actif;}
	
	
	function PutIdProfil($IdProfil){$this->IdProfil = $IdProfil;}
	function PutIdStatut($IdStatut){$this->IdStatut = $IdStatut;}
	function PutIdPoste($IdPoste){$this->IdPoste = $IdPoste;}
	function PutIdEquipe($IdEquipe){$this->IdEquipe = $IdEquipe;}
	function PutNom($Nom){$this->Nom = $Nom;}
	function PutPrenom($Prenom){$this->Prenom = $Prenom;}
	function PutTelephone($Telephone){$this->Telephone = $Telephone;}
	function PutCourriel($Courriel){$this->Courriel= $Courriel;}
	function PutAdresse($Adresse){$this->Adresse = $Adresse;}
	function PutNaissance($Naissance){$this->Naissance = $Naissance;}
	function PutActif($Actif){$this->Actif = $Actif;}
	
	
	
	function Delete(){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
		
		$Status=0;
		
		if ($this->Id > 0){
			$Sql= new ClassSQL();
			$PS=$ps_PersonneDeleteById;
			$PS = $Sql->ConstruireSQL("@IdPersonne", $this->Id, $PS);
			$Status=$Sql->UpdateSQL($PS);
			unset($Sql);
		}
		return ($Status);		
	}

	function Validate($ActionPHP){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
		
		$Sql= new ClassSQL();
		switch($ActionPHP)
		{
		case C_INSERT:
		    $PS=$ps_PersonneInsert;
		break;
		case C_UPDATE:
		    $PS=$ps_PersonneUpdate;
		break;
		default:
			$PS = "";
		}

		$PS = $Sql->ConstruireSQL("@IdPersonne", $this->Id, $PS);
		$PS = $Sql->ConstruireSQL("@IdProfil", $this->IdProfil, $PS);
		$PS = $Sql->ConstruireSQL("@IdStatut", $this->IdStatut, $PS);
		$PS = $Sql->ConstruireSQL("@IdPoste", $this->IdPoste, $PS);
		$PS = $Sql->ConstruireSQL("@IdEquipe", $this->IdEquipe, $PS);
		$PS = $Sql->ConstruireSQL("@Nom", $this->Nom, $PS);
		$PS = $Sql->ConstruireSQL("@Prenom", $this->Prenom, $PS);
		$PS = $Sql->ConstruireSQL("@Telephone", $this->Telephone, $PS);
		$PS = $Sql->ConstruireSQL("@Courriel", $this->Courriel, $PS);
		$PS = $Sql->ConstruireSQL("@Adresse", $this->Adresse, $PS);
		$PS = $Sql->ConstruireSQL("@Naissance", DateMysqltoFr($this->Naissance, C_DATE_MYSQL), $PS);
		$PS = $Sql->ConstruireSQL("@Actif", $this->Actif, $PS);
		
		$Sql->BeginTransactionSQL(__METHOD__);

		switch($ActionPHP)
		{
		case C_INSERT:
		$Status=false;
		$Id = 0;
			$Id=$Sql->InsertSql($PS);
			echo $PS;
			if ($Id>0){
				$Status=true;
				$this->Id = $Id;
			}
		break;
		case C_UPDATE:
		echo $PS;
			$Status=$Sql->UpdateSQL($PS);
		break;
		default:
		}

		$Sql->EndTransactionSQl($Status, __METHOD__);
		unset($Sql);
		
		return $Status;
		}

}
?>
