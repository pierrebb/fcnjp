<?php
class classInfCollective{

	private $Id = 0;
	private $IdEquipe = 0;
	private $DateE = "";
	private $Lieu = "";
	private $Moment = "";
	private $Libelle = "";
	
	function __construct(){}

	function __destruct(){
		$this->Id = 0;
		$this->IdEquipe = 0;
		$this->DateE = 0;
		$this->Lieu = 0;
		$this->Moment = 0;
		$this->Libelle = 0;
		}

	function InitClass($Id){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
		
		$Status = false;
		$this->__destruct();
		
		if ($Id > 0){
			$Sql= new ClassSQL();
			$PS = $ps_InfCollectiveSelectById;
			$PS = $Sql->ConstruireSQL("@IdInfoCollective", $Id, $PS);
			$TabSql=$Sql->SelectSQL($PS, C_LOG_NOLOG);
			
			unset($Sql);

			if ($TabSql[0][0]!=null){
				$i=0;
				$j=0;
				$this->Id=$TabSql[$i][$j++];
				$this->IdEquipe=$TabSql[$i][$j++];
				$this->DateE=$TabSql[$i][$j++];
				$this->Lieu=$TabSql[$i][$j++];
				$this->Moment=$TabSql[$i][$j++];
				$this->Libelle=$TabSql[$i][$j++];
				$Status = true;
			}
		}
		return $Status;
	}

	function GetId(){return $this->Id;}
	function GetIdEquipe(){return $this->IdEquipe;}
	function GetDateE(){return $this->DateE;}
	function GetLieu(){return $this->Lieu;}
	function GetMoment(){return $this->Moment;}
	function GetLibelle(){return $this->Libelle;}
	
	function PutIdEquipe($IdEquipe){$this->IdEquipe = $IdEquipe;}
	function PutDateE($DateE){$this->DateE = $DateE;}
	function PutLieu($Lieu){$this->Lieu = $Lieu;}
	function PutMoment($Moment){$this->Moment = $Moment;}
	function PutLibelle($Libelle){$this->Libelle = $Libelle;}
	
	function Delete(){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
		
		$Status=0;
		
		if ($this->Id > 0){
			$Sql= new ClassSQL();
			$PS=$ps_InfCollectiveDeleteById;
			$PS = $Sql->ConstruireSQL("@IdInfoCollective", $this->Id, $PS);
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
		    $PS=$ps_InfCollectiveInsert;
		break;
		case C_UPDATE:
		    $PS=$ps_InfCollectiveUpdate;
		break;
		default:
			$PS = "";
		}

		$PS = $Sql->ConstruireSQL("@IdInfoCollective", $this->Id, $PS);
		$PS = $Sql->ConstruireSQL("@IdEquipe", $this->IdEquipe, $PS);
		$PS = $Sql->ConstruireSQL("@DateEntrainement", DateMysqltoFr($this->DateE, C_DATE_MYSQL), $PS);
		$PS = $Sql->ConstruireSQL("@Lieux", $this->Lieu, $PS);
		$PS = $Sql->ConstruireSQL("@Moment", $this->Moment, $PS);
		$PS = $Sql->ConstruireSQL("@Libelle", $this->Libelle, $PS);
		
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
