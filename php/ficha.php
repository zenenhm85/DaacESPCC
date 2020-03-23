<?php 
	
	session_start();
	
	$db_host = "localhost";
    $username="root";
    $password="";
    $db='daac';
    $sdb =mysqli_connect($db_host,$username,$password,$db);

    $notas = $_POST['Notas'];
    $ano = date("Y");
    $tudobem = 1;
    foreach ($notas as $value) {
    	//echo $value['bi']."-->".$value['nome']."-->".$value['class']."\n";

    	$bif = $value['bi'];
    	$nomef = $value['nome'];
    	$class = $value['class'];


    	$query = "SELECT * FROM est_dis WHERE bi='$bif' AND nome = '$nomef'";
    	$lista = mysqli_query($sdb, $query);
    	$f=mysqli_fetch_array($lista);
    	if(count($f) == 0){

    		$query2 = "INSERT INTO est_dis(bi,nome,class,ano) VALUES('$bif','$nomef','$class','$ano')";
    		$lista2 =  mysqli_query($sdb, $query2);
    		if(!$lista2){
    			$tudobem = 0;
    			break;
    		}
    		
    	}
    	else{

    		$query2 = "UPDATE est_dis SET class='$class', ano='$ano' WHERE bi='$bif' AND nome = '$nomef'";
    		$lista2 =  mysqli_query($sdb, $query2);

    		if(!$lista2){
    			$tudobem = 0;
    			break;
    		}
    		
    	}    	
    }
    echo $tudobem;
   

?>