<?php
	session_start();

	$db_host = "localhost";
	$username="root";
	$password="";
	$db='daac';
	$sdb =mysqli_connect($db_host,$username,$password,$db);	


	$user = $_POST['User'];
	$senha = $_POST['Senha'];

	$cons = "SELECT * FROM user WHERE (nome='".$user."' AND senha='".$senha."')";
	$query = mysqli_query($sdb,$cons);
	$f=mysqli_fetch_array($query);
	
	if(count($f)>0){
		$usuario = array('user' => $_POST['User'] ,'tipo'=>$f['tipo']);
		$_SESSION['Usuario'] = $usuario;
		echo "1";		
	}
	else{
		echo "0";
	}

?>