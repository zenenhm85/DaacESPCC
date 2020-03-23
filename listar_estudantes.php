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

        <title>CEDAAC- Lista de Estudantes</title>

        <?php include  'head_common.php';?>   

    </head>

    <body>
        <div id="wrapper">
            <?php include  'nav.php';?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 table-responsive">
                            <h1 class="page-header blue">Lista de Estudantes Existentes</h1>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="curso">Nome do Curso:</label>
                                    <select class="form-control" id="cursoestudantelista" name="cursoestudantelista">                                
                                    <?php 
                                    $db_host = "localhost";
                                    $username="root";
                                    $password="";
                                    $db='daac';
                                    $sdb =mysqli_connect($db_host,$username,$password,$db);       
                                    $query = "SELECT * FROM curso";
                                    $lista = mysqli_query($sdb, $query);
                                    if(!empty($_GET['Cursoestudantelista'])){
                                        
                                        while ( $f=mysqli_fetch_array($lista)) {
                                            if($f['nome'] == $_GET['Cursoestudantelista']){
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
                                    }
                                    else{
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

                                    }
                                    
                                    ?>                                                                           
                                  </select>       
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                      <label for="anoadmisao">Ano de admissão:</label>
                                      <?php 
                                       if(!empty($_GET['Cursoestudantelista'])){
                                        ?>
                                            <input type="number" class="form-control" id="anoadmisaolista" name="anoadmisaolista" min="2013" value="<?php echo $_GET['Anoadmisaolista'] ;?>" required>
                                        <?php
                                       }
                                       else{
                                        ?>
                                        <input type="number" class="form-control" id="anoadmisaolista" name="anoadmisaolista" min="2013" value="2014" required>
                                        <?php
                                       }

                                      ?>
                                      
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover"> 
                                
                                <thead> 
                                    <tr> 
                                        <th>BI</th> 
                                        <th>Nome Completo</th> 
                                        <th>Telefone</th> 
                                        <th>Email</th>
                                        <th>Data de nascimento</th>
                                        <th>Modificar</th>
                                        <th>Eliminar</th>
                                        <th>Informação</th>
                                    </tr> 
                                </thead> 
                                <tbody class="estudanteslista"> 
                                    <?php    
                                    $db_host = "localhost";
                                    $username="root";
                                    $password="";
                                    $db='daac';
                                    $sdb =mysqli_connect($db_host,$username,$password,$db);
                                    $query = "";

                                    if(!empty($_GET['Anoadmisaolista'])){
                                        $anoadmisaolista = $_GET['Anoadmisaolista'];
                                        $cursoestudantelista = $_GET['Cursoestudantelista'];
                                        $query = "SELECT * FROM estudante WHERE ano ='$anoadmisaolista' AND curso = '$cursoestudantelista' ORDER BY nome ASC";

                                    }  
                                    else
                                    {
                                        $query = "SELECT * FROM estudante WHERE ano ='2014' AND curso = 'Informática para Gestão' ORDER BY nome ASC";
                                    }                             
                                           
                                    
                                    $lista = mysqli_query($sdb, $query);                                   
                                    $i=0;
                                    while ( $f=mysqli_fetch_array($lista)) {
                                        if($i % 2 == 0){
                                            ?>
                                            <tr  class="active">
                                             <td data-id="<?php echo $f['bi'];?>" class="bi"><?php echo $f['bi'];?></td> 
                                             <td data-id="<?php echo $f['bi'];?>" class="nomee"><?php echo $f['nome'];?></td> 
                                             <td data-id="<?php echo $f['bi'];?>" class = "telefone"><?php echo $f['telefone'];?></td>
                                             <td data-id="<?php echo $f['bi'];?>" class = "email"><?php echo $f['email'];?></td>
                                             <td data-id="<?php echo $f['bi'];?>" class = "datae"><?php echo $f['data'];?></td>
                                             <td><button type="button" class="btn btn-success modificare" data-toggle="modal" data-target="#myModale1" data-id="<?php echo $f['bi'];?>" data-nome="<?php echo $f['nome'];?>" data-nome="<?php echo $f['nome'];?>" data-nome="<?php echo $f['nome'];?>" data-pai="<?php echo $f ['pai'];?>" data-mae="<?php echo $f['mae'];?>"  data-direcao="<?php echo $f['direcao'];?>" data-data="<?php echo $f['data'];?>" data-ano="<?php echo $f['ano'];?>" data-curso="<?php echo $f['curso'];?>" data-obs="<?php echo $f['nota'];?>" data-email="<?php echo $f['email'];?>" data-telefone="<?php echo $f['telefone'];?>" data-sexo="<?php echo $f['sexo'];?>"><i class="fa fa-undo fa-fw"></i></button></td>  
                                             <td><button type="button" class="btn btn-danger eliminare" data-toggle="modal" data-target="#myModale2" data-id="<?php echo $f['bi'];?>"><i class="fa  fa-trash-o fa-fw"></i></button></td> 
                                             <td><button type="button" class="btn btn-info infoestu" data-toggle="modal" data-target="#myModale3" data-id="<?php echo $f['bi'];?>"><i class="fa fa-info fa-fw"></i></button></td> 
                                            </tr>
                                            <?php
                                        }
                                        else {
                                            ?>
                                            <tr class="warning">
                                             <td data-id="<?php echo $f['bi'];?>" class="bi"><?php echo $f['bi'];?></td> 
                                             <td data-id="<?php echo $f['bi'];?>" class="nomee"><?php echo $f['nome'];?></td> 
                                             <td data-id="<?php echo $f['bi'];?>" class = "telefone"><?php echo $f['telefone'];?></td>
                                             <td data-id="<?php echo $f['bi'];?>" class = "email"><?php echo $f['email'];?></td>
                                             <td data-id="<?php echo $f['bi'];?>" class = "datae"><?php echo $f['data'];?></td>
                                             <td><button type="button" class="btn btn-success modificare" data-toggle="modal" data-target="#myModale1" data-id="<?php echo $f['bi'];?>" data-nome="<?php echo $f['nome'];?>" data-pai="<?php echo $f ['pai'];?>" data-mae="<?php echo $f['mae'];?>"  data-direcao="<?php echo $f['direcao'];?>" data-data="<?php echo $f['data'];?>" data-ano="<?php echo $f['ano'];?>" data-curso="<?php echo $f['curso'];?>" data-obs="<?php echo $f['nota'];?>" data-email="<?php echo $f['email'];?>" data-telefone="<?php echo $f['telefone'];?>" data-sexo="<?php echo $f['sexo'];?>"><i class="fa fa-undo fa-fw"></i></button></td> 
                                             <td><button type="button" class="btn btn-danger eliminare" data-toggle="modal" data-target="#myModale2" data-id="<?php echo $f['bi'];?>"><i class="fa  fa-trash-o fa-fw"></i></button></td> 
                                             <td><button type="button" class="btn btn-info infoestu" data-toggle="modal" data-target="#myModale3" data-id="<?php echo $f['bi'];?>"><i class="fa fa-info fa-fw"></i></button></td>
                                            </tr> 
                                            <?php                                            
                                        }

                                        $i = $i + 1;
                                    }
                                    ?>                                                          
                                </tbody> 
                            </table>
                            <!-- Modal -->
                            <div class="modal fade" id="myModale1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
                                <div class="modal-dialog"> 
                                    <div class="modal-content"> 
                                        <div class="modal-header"> 
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button> 
                                            <h4 class="modal-title" id="myModalLabel"> Modificar Estudante </h4> 
                                        </div> 
                                        <div class="modal-body"> 
                                            <form role="form">
                                            <div class="row">
                                             <div class="col-lg-6">
                                              <div class="form-group">
                                                <label for="nome">Nome completo:</label>
                                                <input type="text" class="form-control m" id="nomeea" name="nomeea" autofocus required>
                                              </div>
                                              <div class="form-group">
                                                <label for="bi">Identificação (BI):</label>
                                                <input type="text" class="form-control m" id="bia" name="bia" required >
                                              </div>
                                              <div class="form-group">
                                                <label for="pai">Nome do pai:</label>
                                                <input type="text" class="form-control m" id="paia" name="paia" required>
                                              </div>
                                              <div class="form-group">
                                                <label for="mae">Nome da mãe:</label>
                                                <input type="text" class="form-control" id="maea" name="maea" required>
                                              </div>
                                              <div class="form-group">
                                                <label for="direcao">Direção completa:</label>
                                                <input type="text" class="form-control m" id="direcaoa" name="direcaoa" placeholder="Província, Município, Rua, Número de casa" required>
                                              </div>
                                              <div class="form-group">
                                                <label for="data">Data de nascimento:</label>
                                                <input type="date" class="form-control m" id="dataa" name="dataa" required>
                                              </div>
                                               <div class="form-group">
                                                  <label for="anoadmisao">Ano de admissão:</label>
                                                  <input type="number" class="form-control" id="anoadmisaoa" name="anoadmisaoa" min="2013" value="2018" required>
                                                </div>
                                             </div>
                                             <div class="col-lg-6">                                        
                                                <div class="form-group">
                                                  <label for="email">Email:</label>
                                                  <input type="email" class="form-control m" id="emaila" name="emaila" required>
                                                </div>
                                                
                                                <div class="form-group">
                                                  <label for="telefone">Telefone:</label>
                                                  <input type="tel" class="form-control telefone m" id="telefonea" name="telefonea" required >
                                                </div>
                                                <fieldset class="form-group">
                                                  <label for="telefone">Sexo:</label>
                                                  <div class="form-check" id="verificarsexo" data-id="" >
                                                    <input class="form-check-input" type="radio" name="sexoa" id="sexoah" value="homem">
                                                    <label class="form-check-label" for="sexo">
                                                      Homem
                                                    </label>
                                                  </div>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="sexoa" id="sexoam" value="mulher">
                                                    <label class="form-check-label" for="sexo">
                                                      Mulher
                                                    </label>
                                                  </div>       
                                                </fieldset>
                                                                        
                                                <div class="form-group">
                                                  <label for="curso">Nome do Curso:</label>
                                                  <select class="form-control" id="cursoestudantea" name="cursoestudantea">
                                                    
                                                    <?php 
                                                    $db_host = "localhost";
                                                    $username="root";
                                                    $password="";
                                                    $db='daac';
                                                    $sdb =mysqli_connect($db_host,$username,$password,$db);       
                                                    $query = "SELECT * FROM curso";
                                                    $lista = mysqli_query($sdb, $query);
                                                    while ( $f=mysqli_fetch_array($lista)) {
                                                        ?>
                                                        <option class="cursosmod"><?php echo $f['nome'] ;?></option>
                                                     <?php
                                                    }
                                                    ?>                                                                           
                                                  </select>                                
                                                </div>
                                                 <div class="form-group">
                                                    <label for="comment">Observações:</label>
                                                    <textarea class="form-control" rows="6" id="obsa" name="obsa"></textarea>
                                                 </div>
                                              </div>
                                            </div>                                  
                                          </form>
                                        </div> 
                                        <div class="modal-footer"> 
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
                                            <button type="button" class="btn btn-primary" data-id="" id="modifiestudante">Modificar</button> 
                                        </div> 
                                    </div><!-- /.modal-content --> 
                                </div>
                            </div>
                            <!-- /.modal -->
                            <!-- Modal2 -->
                            <div class="modal fade" id="myModale2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
                                <div class="modal-dialog"> 
                                    <div class="modal-content"> 
                                        <div class="modal-header"> 
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button> 
                                            <h4 class="modal-title" id="myModalLabel">Eliminar Estudante</h4> 
                                        </div> 
                                        <div class="modal-body">
                                        <h5>Tem segurança de realizar esta ação?</h5>                                            
                                        </div> 
                                        <div class="modal-footer"> 
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
                                            <button type="button" class="btn btn-danger" data-id = "" id="eliminarea">Eliminar</button> 
                                        </div> 
                                    </div><!-- /.modal-content --> 
                                </div>
                            </div>
                            <!-- /.modal -->
                           
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
