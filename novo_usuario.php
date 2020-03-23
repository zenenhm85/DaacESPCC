<?php 
    session_start(); 

    if(isset($_SESSION['Usuario'])){
        $usuario = $_SESSION['Usuario'];
        if($usuario['tipo']!='Administrador'){
            exit();
        }                                    
    } 
    else{
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

        <title>CEDAAC- Criar novo usuário</title>

        <?php include  'head_common.php';?>   

    </head>

    <body>

        <div id="wrapper">
            <?php include  'nav.php';?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header blue">Criar novo usuário</h1>
                             <form action="#">
                              <div class="form-group">
                                <label for="nome">Nome Usuário:</label>
                                <input type="text" class="form-control" id="usernew" name="usernew" autofocus>
                              </div>
                              <div class="form-group">
                                <label for="nome">Senha:</label>
                                <input type="password" class="form-control" id="senhanovo" name="senhanovo" required>
                              </div>
                              <div class="form-group">
                                <label for="nome">Repetir Senha:</label>
                                <input type="password" class="form-control" id="senharep" name="senharep" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Tipo:</label>
                                <select class="form-control" id="tipouser" name="tipouser">
                                  <option>Técnico</option>
                                  <option>Administrador</option>                                  
                                </select>
                              </div>                             
                              <button type="button" id= "criarnovousuario" class="btn btn-primary btn-lg">Criar usuário</button>
                              <button type="reset" class="btn btn-warning btn-lg float">Apagar tudo</button>
                              <br><br>
                            </form> 
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
