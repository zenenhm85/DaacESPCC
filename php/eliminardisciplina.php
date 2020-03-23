<?php
	session_start();
	
	$db_host = "localhost";
    $username="root";
    $password="";
    $db='daac';
    $sdb =mysqli_connect($db_host,$username,$password,$db);

    $nome = $_POST['Nome'];

    $query = "DELETE FROM disciplinas WHERE nome = '$nome'";
    $lista = mysqli_query($sdb, $query);
    $query = "DELETE FROM est_dis WHERE nome = '$nome'";
    $lista = mysqli_query($sdb, $query);
?>