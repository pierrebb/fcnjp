<?php
class classTest{

	private $Id = 0;
	private $Code = "";

	function __construct(){}

	function __destruct(){
		$this->Id = 0;
		$this->Code = "";
		}

	function InitClass($Id){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
		
		$Status = false;
		$this->__destruct();
		
		if ($Id > 0){
			$Sql= new ClassSQL();
			$PS = $ps_TestSelectById;
			$PS = $Sql->ConstruireSQL("@IdTest", $Id, $PS);
			$TabSql=$Sql->SelectSQL($PS, C_LOG_NOLOG);
			
			unset($Sql);

			if ($TabSql[0][0]!=null){
				$i=0;
				$j=0;
				$this->Id=$TabSql[$i][$j++];
				$this->Code=$TabSql[$i][$j++];
				$Status = true;
			}
		}
		return $Status;
	}

	function GetId(){return $this->Id;}
	function GetCode(){return $this->Code;}
	
	function PutNom($Nom){$this->Nom = $Nom;}
	function PutCode($Code){$this->Code = $Code;}
	
	function GetCodeUnique($ActionPHP){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
		
		$Status=1;
		$Sql= new ClassSQL();

		// Verification du code unique
		switch($ActionPHP)
		{
		case C_INSERT:
			$PS=$ps_TestVerifCodeInsert;
		break;
		case C_UPDATE:
			$PS=$ps_TestVerifCodeUpdate;
		break;
		default:
		$Status=0;
		}

		$PS = $Sql->ConstruireSQL("@IdTest", $this->Id, $PS);
		$PS = $Sql->ConstruireSQL("@CodeTest", $this->Code, $PS);

		// Verification
		if ($Status){
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

	function Delete(){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
		
		$Status=0;
		
		if ($this->Id > 0){
			$Sql= new ClassSQL();
			$PS=$ps_TestDeleteById;
			$PS = $Sql->ConstruireSQL("@IdTest", $this->Id, $PS);
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
			$PS=$ps_TestInsert;
		break;
		case C_UPDATE:
			$PS=$ps_TestUpdate;
		break;
		default:
			$PS = "";
		}

		$PS = $Sql->ConstruireSQL("@IdTest", $this->Id, $PS);
		$PS = $Sql->ConstruireSQL("@CodeTest", strtoupper($this->Code), $PS);
		
		$Sql->BeginTransactionSQL(__METHOD__);

		switch($ActionPHP)
		{
		case C_INSERT:
		$Status=false;
		$Id = 0;
			$Id=$Sql->InsertSql($PS);
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
