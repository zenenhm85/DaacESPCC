<?php
	session_start();
	
	$db_host = "localhost";
    $username="root";
    $password="";
    $db='daac';
    $sdb =mysqli_connect($db_host,$username,$password,$db);
    
    $bi = $_POST['bi'];
    $query = "DELETE FROM estudante WHERE bi = '$bi'";
    $lista = mysqli_query($sdb, $query);
    $query = "DELETE FROM est_dis WHERE bi = '$bi'";
    $lista = mysqli_query($sdb, $query);

?>