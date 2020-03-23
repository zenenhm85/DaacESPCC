<?php
	session_start();
	
	$db_host = "localhost";
    $username="root";
    $password="";
    $db='daac';
    $sdb =mysqli_connect($db_host,$username,$password,$db);

    $bia = $_POST['bia'];
    $bi = $_POST['bi'];
    $nome = $_POST['nome'];
    $pai = $_POST['pai'];
    $mae = $_POST['mae'];
    $direcaoa = $_POST['direcaoa'];
    $data = $_POST['data'];
    $ano = $_POST['ano'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $obs = $_POST['obs'];
    $curso = $_POST['curso'];
    $sexo = $_POST['sexo'];

    $query = "";
    if($bia == $bi){
         $query = "UPDATE estudante SET nome = '$nome', pai = '$pai', mae = '$mae', direcao = '$direcaoa', data = '$data', ano = '$ano', email = '$email', telefone = '$telefone', sexo = '$sexo', curso = '$curso', nota='$obs' WHERE bi='$bia'";
         $lista = mysqli_query($sdb, $query);
         echo '1';
    }
    else{
        $query = "SELECT * FROM estudante WHERE bi = '$bi'";
        $lista = mysqli_query($sdb, $query);
        $f=mysqli_fetch_array($lista);
        if(count($f)==0){
            $query = "UPDATE estudante SET bi='$bi', nome='$nome',pai='$pai',mae='$mae',direcaoa='$direcaoa',data='$data',ano='$ano',email='$email', telefone='$telefone', sexo='$sexo', curso='$curso', nota='$obs' WHERE bi='$bia'";
            $lista = mysqli_query($sdb, $query);
            $query = "UPDATE est_dis SET bi = '$bi' WHERE bi='$bia'";
            $lista = mysqli_query($sdb, $query);
            echo '1';
        }
        else{
            echo "0"; 
        }
    }

    

?>