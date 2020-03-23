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

        <title>CEDAAC- Lista de Cursos</title>

        <?php include  'head_common.php';?>   

    </head>

    <body>

        <div id="wrapper">
            <?php include  'nav.php';?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 table-responsive">
                            <h1 class="page-header blue">Lista de Cursos Existentes</h1>
                            <table class="table table-striped table-hover"> 
                                
                                <thead> 
                                    <tr> 
                                        <th>Nome</th> 
                                        <th>Modificar</th> 
                                        <th>Eliminar</th> 
                                    </tr> 
                                </thead> 
                                <tbody class="produto"> 
                                    <?php 
                                   
                                    $db_host = "localhost";
                                    $username="root";
                                    $password="";
                                    $db='daac';
                                    $sdb =mysqli_connect($db_host,$username,$password,$db);       
                                    $query = "SELECT * FROM curso";
                                    $lista = mysqli_query($sdb, $query);
                                   
                                    $i=0;

                                    while ( $f=mysqli_fetch_array($lista)) {
                                        if($i % 2 == 0){
                                            ?>
                                            <tr  class="active">
                                             <td data-id="<?php echo $f['nome'];?>"><?php echo $f['nome'];?></td> 
                                             <td><button type="button" class="btn btn-success modificarc" data-toggle="modal" data-target="#myModal" data-nome="<?php echo $f['nome'];?>"><i class="fa fa-undo fa-fw"></i></button></td> 
                                             <td><button type="button" class="btn btn-danger eliminarc"  data-toggle="modal" data-target="#myModal2" data-nome="<?php echo $f['nome'];?>"><i class="fa  fa-trash-o fa-fw"></i></button></td> 
                                            </tr>
                                            <?php
                                        }
                                        else {
                                            ?>
                                            <tr class="warning">
                                             <td data-id="<?php echo $f['nome'];?>"><?php echo $f['nome'];?></td> 
                                             <td><button type="button" class="btn btn-success modificarc" data-toggle="modal" data-target="#myModal" data-nome="<?php echo $f['nome'];?>"><i class="fa fa-undo fa-fw"></i></button></td> 
                                             <td><button type="button" class="btn btn-danger eliminarc"  data-toggle="modal" data-target="#myModal2" data-nome="<?php echo $f['nome'];?>"><i class="fa  fa-trash-o fa-fw"></i></button></td> 
                                            </tr> 
                                            <?php                                            
                                        }

                                        $i = $i + 1;
                                    }
                                    ?>                                                          
                                </tbody> 
                            </table>
                            <!-- Modal1 -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
                                <div class="modal-dialog"> 
                                    <div class="modal-content"> 
                                        <div class="modal-header"> 
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button> 
                                            <h4 class="modal-title" id="myModalLabel"> Modificar Curso </h4> 
                                        </div> 
                                        <div class="modal-body"> 
                                            <form role="form"> 
                                                <div class="form-group"> 
                                                    <label for="name">Nome Anterior:</label> 
                                                    <input type="text" class="form-control" id="nomeanteriorcurso"  disabled> 
                                                </div> 
                                                <div class="form-group"> 
                                                    <label for="name">Novo Nome:</label> 
                                                    <input type="text" class="form-control" id="novonomecurso" placeholder="Entre o novo nome" autofocus> 
                                                </div>                                                  
                                            </form>
                                        </div> 
                                        <div class="modal-footer"> 
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
                                            <button type="button" class="btn btn-primary" id="modificarcurso">Modificar</button> 
                                        </div> 
                                    </div><!-- /.modal-content --> 
                                </div>
                            </div>
                            <!-- /.modal -->
                            <!-- Modal2 -->
                            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
                                <div class="modal-dialog"> 
                                    <div class="modal-content"> 
                                        <div class="modal-header"> 
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button> 
                                            <h4 class="modal-title" id="myModalLabel"> Eliminar Curso </h4> 
                                        </div> 
                                        <div class="modal-body">
                                        <h5>Tem segurança de realizar esta ação?</h5>                                            
                                        </div> 
                                        <div class="modal-footer"> 
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
                                            <button type="button" class="btn btn-danger" data-id = "" id="eliminarcurso">Eliminar</button> 
                                        </div> 
                                    </div><!-- /.modal-content --> 
                                </div>
                            </div>
                            <!-- /.modal -->
                             
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
