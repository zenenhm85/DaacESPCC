<?php
	session_start();
	
	$db_host = "localhost";
    $username="root";
    $password="";
    $db='daac';
    $sdb =mysqli_connect($db_host,$username,$password,$db);

    $nome = $_POST['Nome'];
    $nomea = $_POST['Nomeda'];
    $ano = $_POST['Ano'];
    $semestre = $_POST['Semestre'];

    $query = "UPDATE disciplinas SET nome = '$nome', ano = '$ano', semestre = '$semestre' WHERE nome='$nomea'";
    $lista = mysqli_query($sdb, $query);
    $query = "UPDATE est_dis SET nome = '$nome' WHERE nome='$nomea'";
    $lista = mysqli_query($sdb, $query);
    echo '1';       

?>