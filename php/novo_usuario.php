<?php
	session_start();

	$db_host = "localhost";
	$username="root";
	$password="";
	$db='daac';
	$sdb =mysqli_connect($db_host,$username,$password,$db);	


	$user = $_POST['User'];
	$senha = $_POST['Senha'];
	$tipo = $_POST['Tipo'];

	$cons = "SELECT * FROM user WHERE nome='".$user."'";
	$query = mysqli_query($sdb,$cons);
	$f=mysqli_fetch_array($query);
	
	if(count($f)==0){

		$cons = "INSERT INTO user(nome,senha,tipo) VALUES ('".$user."','".$senha."','".$tipo."')";
		$query = mysqli_query($sdb,$cons);
		if($query){
			echo "1";
		}
		else{
			echo "0";
		}
				
	}
	else{
		echo "0";
	}

?>