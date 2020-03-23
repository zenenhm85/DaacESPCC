<?php 
    session_start();
    if(!isset($_SESSION['Usuario'])){
        exit();                                 
    }      
?>
<!DOCTYPE html>
<html lang="pt">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Antonio">

        <link rel="shortcut icon" type="imgage/x-icon" href="img/ico.png" />

        <title>CEDAAC- Inserir Curso</title>

        <?php include  'head_common.php';?>   

    </head>

    <body>

        <div id="wrapper">
            <?php include  'nav.php';?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header blue">Inserir Curso</h1>
                            <?php 
                                if(empty($_POST['nomec'])){
                                    ?>
                                    <form action="" method="post">
                                      <div class="form-group">
                                        <label for="nome">Nome completo do Curso:</label>
                                        <input type="text" class="form-control" id="nomec" name="nomec" autofocus required>
                                      </div>                                                         
                                      <button type="submit" class="btn btn-primary btn-lg">Inserir</button>
                                      <button type="reset" class="btn btn-warning btn-lg float">Apagar tudo</button>
                                      <br><br>
                                    </form> 
                                    <?php 
                                }
                                else{
                                    $nome = $_POST['nomec'];
                                    $db_host = "localhost";
                                    $username="root";
                                    $password="";
                                    $db='daac';
                                    $sdb =mysqli_connect($db_host,$username,$password,$db);       
                                    $query = "SELECT * FROM curso WHERE nome = '$nome'";
                                    $lista = mysqli_query($sdb, $query);
                                    $f=mysqli_fetch_array($lista);

                                    if(count($f)==0){
                                        $query = "INSERT INTO curso(nome) VALUES ('".$nome."')";
                                        $lista = mysqli_query($sdb, $query);
                                        ?>
                                        <h2 class="h3 justify-content-center text-center">Curso inserido com sucesso. <a href="inserir_curso.php"> Inserir Curso </a></h2>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <h2 class="h3 justify-content-center text-center">Este curso já existe. <a href="inserir_curso.php"> Inserir Curso </a></h2>

                                        <?php 
                                    }

                                }
                            ?>                             
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php include 'footer_common.php';?>    

    </body>

</html>
