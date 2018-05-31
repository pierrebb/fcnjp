<?php
class classParam{

	private $Code = "";
	private $Libelle = "";
	private $Valeur = "";
	private $Type = 0;

	function __construct(){}

	function __destruct(){
		$this->Code = "";
		$this->Libelle = "";
		$this->Valeur = 0;
		$this->Type = 0;
	}

	function InitClass($Id){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');
		
		$Status = false;
		$this->__destruct();
		
		if ($Id <> ""){
			$Sql= new ClassSQL();
			$PS = $ps_paramSelectByCode;
			$PS = $Sql->ConstruireSQL("@CodeParam", $Id, $PS);
			$TabSql=$Sql->SelectSQL($PS, C_LOG_NOLOG);
			unset($Sql);

			if ($TabSql[0][0]!=null){
				$i=0;
				$j=0;
				$this->Code=$TabSql[$i][$j++];
				$this->Libelle=$TabSql[$i][$j++];
				$this->Valeur=$TabSql[$i][$j++];
				$this->Type=$TabSql[$i][$j++];
				$Status = true;
			}
		}
		return $Status;
	}

	function GetCode(){return $this->Code;}
	function GetLibelle(){return $this->Libelle;}
	function GetValeur(){return $this->Valeur;}
	function GetType(){return $this->Type;}
	
	function GetCodeType(){
		
		$Type = "";
		switch($this->Type)
		{
			case C_PARAM_TYPE_1:
				$Type=C_PARAM_TYPE_DATE;
				break;
			case C_PARAM_TYPE_2:
				$Type=C_PARAM_TYPE_NUM;
				break;
			case C_PARAM_TYPE_3:
				$Type=C_PARAM_TYPE_CHAR;
				break;
			case C_PARAM_TYPE_4:
				$Type=C_PARAM_TYPE_LISTE_STOCK;
				break;
			case C_PARAM_TYPE_5:
				$Type=C_PARAM_TYPE_GESTION_BL;
				break;
			case C_PARAM_TYPE_6:
				$Type=C_PARAM_TYPE_EXCELL_DEC;
				break;
			case C_PARAM_TYPE_7:
				$Type=C_PARAM_TYPE_7;
				break;
			case C_PARAM_TYPE_8:
				$Type=C_PARAM_TYPE_REEL;
				break;
				$Type= '?';
			default:
		}
		
		return $Type;
	}
				
	function PutValeur($Valeur){$this->Valeur = $Valeur;}

	function Validate(){
		require $_SERVER['DOCUMENT_ROOT'].C_SITE_REPERTOIRE."Includes/"."Sql/Procedure_SQL.php";
		put_log(__METHOD__, 'METHOD');

		$Sql= new ClassSQL();
		$PS=$ps_paramUpdate;
		$PS = $Sql->ConstruireSQL("@CodeParam", $this->Code, $PS);
		$PS = $Sql->ConstruireSQL("@ValParam", $this->Valeur, $PS);
		$Status=$Sql->UpdateSQL($PS);

		unset($Sql);
		return $Status;
	}

}
?>
