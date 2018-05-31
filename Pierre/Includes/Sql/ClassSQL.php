<?php
class classSQL{

	private $connexion = null;
	private $db = null;

	function __construct(){
		$serveur="127.0.0.1";//nom du serveur
		//$user="dbo_neot";//votre nom utilisateur
		//$password="dbo_neot";//votre mot de passe
		//$base="bdd_neot5";//nom de la base de donnée
		$user="dbo_pierre";//votre nom utilisateur
		$password="dbo_pierre";//votre mot de passe
		$base="bdd_pierre";//nom de la base de donnée
		//$this->connexion = mysql_connect($serveur,$user,$password) or die("impossible de se connecter : ". mysql_error());
		$this->connexion = mysqli_connect($serveur,$user,$password, $base) or die("impossible de se connecter : ". mysqli_connect_error());
		$db = mysqli_select_db($this->connexion, $base)  or die("impossible de sélectionner la base : ". mysqli_connect_error());
	}

	function BeginTransactionSQL($Libelle=""){
		//Log
		put_log("BEGIN Transaction ".$Libelle, 'TRANSACTION');		
		if (isset($this->connection)){
			return 0;
		}
     	$result = mysqli_query($this->connexion, "BEGIN");
      	return $result;
     }

	function EndTransactionSQl($bOk, $Libelle=""){
		if (isset($this->connection)){
			return 0;
		}
		if ($bOk){
			//Log
			put_log("COMMIT Transaction ".$Libelle, 'TRANSACTION');		
			return mysqli_query($this->connexion, "COMMIT");
		}else{
			//Log
			put_log("ROLLBACK Transaction ".$Libelle, 'TRANSACTION');		
			return mysqli_query($this->connexion, "ROLLBACK");
		}
	}

	function __destruct(){
		if (isset($this->connexion)){
			mysqli_close($this->connexion);
			$this->connexion = null;
		}
	}

	function SelectSQL($Sql, $bLog=0){
		//Log
		if ($bLog == 1) {put_log($Sql, 'SELECT');}		
		if (isset($this->connection)){
			return null;
		}
		
//		$result = mysql_query($Sql, $this->connexion) or exit(mysql_error() . "<br/>".$Sql);
		$result = mysqli_query($this->connexion, $Sql);

		if ($result == false){
			return null;
		}

		$num_rows = mysqli_num_rows($result);
		$num_cols = mysqli_num_fields($result);
		$j = 0;
		if($num_rows==0 ){
			return null;
		}else{
			$tab[]= null;
			while ($row=mysqli_fetch_array($result)){
				for($i=0; $i<$num_cols; $i++){
					$tab[$j][$i]=str_replace(C_QUOTE_ANTI, C_QUOTE, $row[$i]);
				}
				$j++;
			}
		}
		return $tab;
	}

	function SelectSQLUnique($Sql){
		if (isset($this->connection)){
			return null;
		}
		//		$result = mysql_query($Sql, $this->connexion) or exit(mysql_error() . "<br/>".$Sql);
		$result = mysqli_query($this->connexion, $Sql);
	
		if ($result == false){
			return null;
		}
	
		$num_rows = mysqli_num_rows($result);
		$num_cols = mysqli_num_fields($result);
		$j = 0;
		if($num_rows==0 ){
			return null;
		}else{
			$tab[]= null;
			while ($row=mysqli_fetch_array($result)){
				for($i=0; $i<$num_cols; $i++){
					$tab[$j]=str_replace(C_QUOTE_ANTI, C_QUOTE, $row[$i]);
				}
				$j++;
			}
		}
		return $tab;
	}
	
	function ConstruireSQL($Search, $Replace, $PS){
		$Replace=str_replace(C_QUOTE_ANTI, C_QUOTE, $Replace);
		return str_replace($Search, str_replace(C_QUOTE, C_QUOTE_ANTI, $Replace), $PS);
	}

	function ConstruireWhereSQL($Search, $Replace, $PS){
		return str_replace($Search, $Replace, $PS);
	}

	function UpdateSQL($Sql, $bLog=1){
		//Log
		if ($bLog == 1) { put_log($Sql, 'UPDATE'); }
		if (isset($this->connection)){
			return 0;
		}
		return mysqli_query($this->connexion, $Sql);
	}

	function UpdateSQLStatus($Sql){
		if (isset($this->connection)){
			return 0;
		}
		return mysql_affected_rows();
	}

	function InsertSql($Sql, $bLog=1){
		//Log
		if ($bLog == 1) { put_log($Sql, 'INSERT'); }
		
		if (isset($this->connection)){
			return 0;
		}
		if (mysqli_query($this->connexion, $Sql)){
			return mysqli_insert_id($this->connexion);
		}
		else{
			return false;
		}
	}
	
	function VersionSql(){
	    //Log
	    if (isset($this->connection)){
	        return 0;
	    }
	    return mysqli_get_server_info($this->connexion);
	}
}
?>