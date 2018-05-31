<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/Pierre/"."Includes/Include.php";

if (!isset($_SESSION['IDSESSION'])) {
	session_destroy();
	header("location: ".C_SITE_REPERTOIRE);
}else{
	header("location: blank.html");
}
?>