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

        <title>CEDAAC- Inserir Disciplina</title>

        <?php include  'head_common.php';?>   

    </head>

    <body>

        <div id="wrapper">
            <?php include  'nav.php';?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header blue">Inserir Disciplina</h1>
                            <?php 
                            if(empty($_POST['nomed'])){
                                ?>
                                <form action="" method="post">
                                  <div class="form-group">
                                    <label for="nome">Nome disciplina:</label>
                                    <input type="text" class="form-control" id="nomed" name="nomed" autofocus required>
                                  </div>                   
                                  <div class="form-group">
                                    <label for="anoadmisao">Ano que se ministra:</label>
                                    <input type="number" class="form-control" id="anod" name="anod" min="1"  max="5" value="1" required onkeypress="return event.charCode >= 0 && event.charCode <= 1">
                                  </div>
                                  <div class="form-group">
                                    <label for="anoadmisao">Semestre:</label>
                                    <input type="number" class="form-control" id="semestred" name="semestred" min="1"  max="2" value="1" required onkeypress="return event.charCode >= 0 && event.charCode <= 1">
                                  </div>                                                    
                                  <button type="submit" class="btn btn-primary btn-lg" id="submitcurso">Inserir</button>
                                  <button type="reset" class="btn btn-warning btn-lg float">Apagar tudo</button>
                                  <br><br>
                                </form> 
                            <?php
                            }
                            else{
                                $nomed = $_POST['nomed'];
                                $anod = $_POST['anod'];
                                $semestred = $_POST['semestred'];                                
                                $db_host = "localhost";
                                $username="root";
                                $password="";
                                $db='daac';
                                $sdb =mysqli_connect($db_host,$username,$password,$db);       
                                $query = "SELECT * FROM disciplinas WHERE nome = '$nomed'";
                                $lista = mysqli_query($sdb, $query);
                                $f=mysqli_fetch_array($lista);

                                if(count($f)==0){
                                    $query = "INSERT INTO disciplinas(nome, ano, semestre) VALUES ('".$nomed."', '".$anod."', '".$semestred."')";
                                    $lista = mysqli_query($sdb, $query);
                                    ?>
                                    <h2 class="h3 justify-content-center text-center">Disciplina inserida com sucesso. <a href="inserir_disciplina.php"> Inserir Disciplina </a></h2>
                                    <?php
                                }
                                else{
                                    ?>
                                    <h2 class="h3 justify-content-center text-center">O nome desta disciplina já existe neste curso. <a href="inserir_disciplina.php"> Inserir Disciplina  </a></h2>
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
