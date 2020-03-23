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

        <title>CEDAAC- Inserir Estudante</title>

        <?php include  'head_common.php';?>   

    </head>

    <body>

        <div id="wrapper">
            <?php include  'nav.php';?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header blue">Inserir Estudante</h1>
                            <?php
                              if(empty($_POST['nomee'])){
                                    ?>
                                    <form action="" method="post">
                                        <div class="row">
                                         <div class="col-lg-6">
                                          <div class="form-group">
                                            <label for="nome">Nome completo:</label>
                                            <input type="text" class="form-control" id="nomee" name="nomee" autofocus required>
                                          </div>
                                          <div class="form-group">
                                            <label for="bi">Identificação (BI):</label>
                                            <input type="text" class="form-control" id="bi" name="bi" required pattern="[0-9]{9}[A-Za-Z]{2}[0-9]{3}" title="Deve escrever o BI na forma correta. São 9 dígitos, seguidos de 2 letras e depois 3 dígitos">
                                          </div>
                                          <div class="form-group">
                                            <label for="pai">Nome do pai:</label>
                                            <input type="text" class="form-control" id="pai" name="pai" required>
                                          </div>
                                          <div class="form-group">
                                            <label for="mae">Nome da mãe:</label>
                                            <input type="text" class="form-control" id="mae" name="mae" required>
                                          </div>
                                          <div class="form-group">
                                            <label for="direcao">Direção completa:</label>
                                            <input type="text" class="form-control" id="direcao" name="direcao" placeholder="Província, Município, Rua, Número de casa" required>
                                          </div>
                                          <div class="form-group">
                                            <label for="data">Data de nascimento:</label>
                                            <input type="date" class="form-control" id="data" name="data" required>
                                          </div>
                                           <div class="form-group">
                                              <label for="anoadmisao">Ano de admissão:</label>
                                              <input type="number" class="form-control" id="anoadmisao" name="anoadmisao" min="2013" value="2018" required>
                                            </div>
                                         </div>
                                         <div class="col-lg-6">
                                           
                                            
                                            <div class="form-group">
                                              <label for="email">Email:</label>
                                              <input type="email" class="form-control" id="email" name="email">
                                            </div>
                                            
                                            <div class="form-group">
                                              <label for="telefone">Telefone:</label>
                                              <input type="tel" class="form-control telefone" id="telefone" name="telefone" required pattern="[0-9]{9}" title="Deve escrever um número de 9 dígitos">
                                            </div>
                                            <fieldset class="form-group">
                                              <label for="telefone">Sexo:</label>
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sexo" id="homme" value="homem" checked>
                                                <label class="form-check-label" for="sexo">
                                                  Homem
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sexo" id="mulher" value="mulher">
                                                <label class="form-check-label" for="sexo">
                                                  Mulher
                                                </label>
                                              </div>       
                                            </fieldset>
                                                                    
                                            <div class="form-group">
                                              <label for="curso">Nome do Curso:</label>
                                              <select class="form-control" id="cursoestudante" name="cursoestudante">
                                                
                                                <?php 
                                                $db_host = "localhost";
                                                $username="root";
                                                $password="";
                                                $db='daac';
                                                $sdb =mysqli_connect($db_host,$username,$password,$db);       
                                                $query = "SELECT * FROM curso";
                                                $lista = mysqli_query($sdb, $query);
                                                while ( $f=mysqli_fetch_array($lista)) {
                                                 if($f['nome'] == 'Informática para Gestão' ){
                                                      ?>
                                                      <option selected><?php echo $f['nome'] ;?></option>
                                                      <?php
                                                  }
                                                  else{
                                                      ?>
                                                      <option><?php echo $f['nome'] ;?></option>
                                                      <?php
                                                  }     
                                                }
                                                ?>                                                                           
                                              </select>                                
                                            </div>
                                             <div class="form-group">
                                                <label for="comment">Observações:</label>
                                                <textarea class="form-control" rows="6" id="obs" name="obs"></textarea>
                                             </div>
                                             </div>

                                          </div>
                                        
                                                                       
                                        <button type="submit" class="btn btn-primary btn-lg">Inserir</button>
                                        <button type="reset" class="btn btn-warning btn-lg float">Apagar tudo</button>
                                        <br><br>
                                      </form> 
                                    <?php 
                                }
                                else{
                                    $bi = $_POST['bi'];
                                    $db_host = "localhost";
                                    $username="root";
                                    $password="";
                                    $db='daac';
                                    $sdb =mysqli_connect($db_host,$username,$password,$db);       
                                    $query = "SELECT * FROM estudante WHERE bi = '$bi'";
                                    $lista = mysqli_query($sdb, $query);
                                    $f=mysqli_fetch_array($lista);
                                    if(count($f)==0){
                                      $nomee = $_POST['nomee'];
                                      $pai = $_POST['pai'];
                                      $mae = $_POST['mae'];
                                      $direcao = $_POST['direcao'];
                                      $data = $_POST['data'];
                                      $anoadmisao = $_POST['anoadmisao'];
                                      $email = $_POST['email'];
                                      $telefone = $_POST['telefone'];
                                      $sexo = $_POST['sexo'];
                                      $nomecurso = $_POST['cursoestudante'];
                                      $obs = $_POST['obs'];
                                      $query = "INSERT INTO estudante(nome,bi,pai,mae,direcao,data,ano,curso,nota,email,telefone, sexo) VALUES ('".$nomee."','".$bi."','".$pai."','".$mae."','".$direcao."','".$data."','".$anoadmisao."','".$nomecurso."','".$obs."','".$email."','".$telefone."','".$sexo."')";
                                      $lista = mysqli_query($sdb, $query);
                                      ?>
                                      <h2 class="h3 justify-content-center text-center">Estudante inserido com sucesso. <a href="inserir_estudante.php"> Inserir Estudante </a></h2>
                                      <?php
                                    }
                                    else{
                                        ?>                                      
                                        <h2 class="h3 justify-content-center text-center">Já existe um estudante com este BI, pode eliminá-lo ou modificar seus dados pessoais. <a href="inserir_estudante.php"> Inserir Estudante </a></h2>

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
