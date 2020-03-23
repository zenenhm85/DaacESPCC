<?php
	session_start();
	
	$db_host = "localhost";
    $username="root";
    $password="";
    $db='daac';
    $sdb =mysqli_connect($db_host,$username,$password,$db);

    $nome = $_POST['Nome'];
    $nomea = $_POST['Nomea'];

    $query = "SELECT * FROM curso WHERE nome = '$nome'";
    $lista = mysqli_query($sdb, $query);
    $f=mysqli_fetch_array($lista);
    if(count($f)==0){
        $query = "UPDATE curso SET nome = '$nome' WHERE nome='$nomea'";
        $lista = mysqli_query($sdb, $query);
        $query = "UPDATE estudante SET curso = '$nome' WHERE curso='$nomea'";
        $lista = mysqli_query($sdb, $query);
        echo '1';
    }
    else{
        echo "0"; 
    }

?>