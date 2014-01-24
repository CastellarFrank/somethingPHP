<?php
$temp = new mainlyProject("promo2go","localhost","root","siniestro");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if(isset($_POST["userName"]) && isset($_POST["userPassword"])){
		$temp->connect();
		$temp->tryToLogUser($_POST["userName"],$_POST["userPassword"]);
		$temp->disconnect();
		exit;
	}else if(isset($_FILES["photo"])){
		$temp->connect();
		$temp->addPromotion(trim($temp->sql_safe($_POST['startDate'])),trim($temp->sql_safe($_POST['endDate'])),trim($temp->sql_safe($_POST['city'])),
			trim($temp->sql_safe($_POST['country'])),trim($temp->sql_safe($_POST['description'])));

		$temp->disconnect();
		echo "<script>alert('The data was introduced succesfully');</script>";

	}else if(isset($_POST["logout"])){
		mainlyProject::callLogOut();
		header("location:index.php");
	}
}else{
	if(isset($_GET["table"])){
		$temp->connect();
		$temp->showTableData($_GET["table"]);
		$temp->disconnect();
		exit;
	}else if(isset($_GET["img"])){
		$temp->connect();
		$temp->getImageLink($_GET["img"]);
		$temp->disconnect();
		exit;
	}
	
}
?>