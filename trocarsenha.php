<?php 
    session_start();
    if(!isset($_SESSION['Usuario'])){
        exit();                                 
    }  
    else{
      $usuario = $_SESSION['Usuario'];
      $nomeuser = $usuario['user'];
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

        <title>CEDAAC- Trocar Senha Usuario</title>

        <?php include  'head_common.php';?>   

    </head>

    <body>

        <div id="wrapper">
            <?php include  'nav.php';?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header blue">Trocar Senha Usuario</h1>
                             <form action="#">
                              <div class="form-group">
                                <label for="nome" >Nome Usuário:</label>
                                <input type="text" class="form-control" id="dnu" name="dnu" disabled value="<?php echo $nomeuser;?>">
                              </div>
                              <div class="form-group">
                                <label for="nome">Senha anterior:</label>
                                <input type="password" class="form-control" id="senhaanterior" name="senhaanterior" autofocus required>
                              </div>
                              <div class="form-group">
                                <label for="bi">Nova senha:</label>
                                <input type="password" class="form-control" id="novasenha" name="novasenha" required>
                              </div>
                              <div class="form-group">
                                <label for="pai">Repetir Nova senha:</label>
                                <input type="password" class="form-control" id="rnovasenha" name="rnovasenha" required>
                              </div>                              
                              <button type="button" id= "trocarsenha" class="btn btn-primary btn-lg">Trocar senha</button>
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
