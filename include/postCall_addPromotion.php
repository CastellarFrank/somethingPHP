<?php
	require("../config/config.php");
	require("../include/include.php");
	addPromotion($_POST['startDate'],$_POST['endDate'],$_POST['city'],$_POST['country'],$_POST['state'],$_POST['description']);
    header('Location: ../index.php');

?>