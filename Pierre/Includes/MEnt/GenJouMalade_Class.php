<?php
class classJouMalade{

	private $Id = 0;
	private $IdEquipe = 0;
	private $DateE = "";
	private $Lieu = "";
	private $Moment = "";
	private $Libelle = "";
	
	function __construct(){}

	function __destruct(){
		$this->IdPersonne = 0;
		$this->IdMal = 0;
		$this->DateDebut = 0;
		$this->Reprise = 0;
		}

	function InitClass($Id){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
		
		$Status = false;
		$this->__destruct();
		
		if ($Id > 0){
			$Sql= new ClassSQL();
			$PS = $ps_JouMaladeSelectById;
			$PS = $Sql->ConstruireSQL("@IdPersonne", $Id, $PS);
			$TabSql=$Sql->SelectSQL($PS, C_LOG_NOLOG);
			
			unset($Sql);

			if ($TabSql[0][0]!=null){
				$i=0;
				$j=0;
				$this->IdPersonne=$TabSql[$i][$j++];
				$this->IdMal=$TabSql[$i][$j++];
				$this->DateDebut=$TabSql[$i][$j++];
				$this->Reprise=$TabSql[$i][$j++];
				$Status = true;
			}
		}
		return $Status;
	}

	function GetIdPersonne(){return $this->IdPersonne;}
	function GetIdMal(){return $this->IdMal;}
	function GetDateDebut(){return $this->DateDebut;}
	function GetReprise(){return $this->Reprise;}
	
	function PutIdPersonne($IdPersonne){$this->IdPersonne = $IdPersonne;}
	function PutIdMal($IdMal){$this->IdMal = $IdMal;}
	function PutDateDebut($DateDebut){$this->DateDebut = $DateDebut;}
	function PutReprise($Reprise){$this->Reprise = $Reprise;}
	
	function Delete(){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
		
		$Status=0;
		
		if ($this->Id > 0){
			$Sql= new ClassSQL();
			$PS=$ps_JouMaladeDeleteById;
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
		    $PS=$ps_JouMaladeInsert;
		break;
		case C_UPDATE:
		    $PS=$ps_JouMaladeUpdate;
		break;
		default:
			$PS = "";
		}

		$PS = $Sql->ConstruireSQL("@IdPersonne", $this->IdPersonne, $PS);
		$PS = $Sql->ConstruireSQL("@IdMal", $this->IdMal, $PS);
		$PS = $Sql->ConstruireSQL("@DateDebut", DateMysqltoFr($this->DateE, C_DATE_MYSQL), $PS);
		$PS = $Sql->ConstruireSQL("@Reprise", DateMysqltoFr($this->DateE, C_DATE_MYSQL), $PS);
;
		
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
