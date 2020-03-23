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

        <title>CEDAAC- Ficha Académica</title>

        <?php include  'head_common.php';?>   

    </head>

    <body>
        <div id="wrapper">
            <?php include  'nav.php';?>
            <div id="page-wrapper">
                <div class="container-fluid ">
                    <div class="row ">
                        <div class="col-lg-12 table-responsive">
                            <h1 class="page-header blue">Ficha Académica</h1>
                            <div class="row ">
                                <div class="col-lg-4">
                                    <label for="curso">Nome do Curso:</label>
                                    <select class="form-control" id="cursolistaficha" name="cursolistaficha">                                
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
                                <div class="col-lg-4">
                                    <div class="form-group">
                                      <label for="anoadmisao">Ano de admissão:</label>
                                      <?php 
                                      $query = "SELECT * FROM disciplinas";
                                      $lista = mysqli_query($sdb, $query);
                                       if(!empty($_GET['Cursoestudantelista'])){
                                        ?>
                                            <input type="number" class="form-control" id="anoadmisaoficha" name="anoadmisaoficha" min="2013" value="<?php echo $_GET['Anoadmisaolista'] ;?>" required>
                                        <?php
                                       }
                                       else{
                                        ?>
                                        <input type="number" class="form-control" id="anoadmisaoficha" name="anoadmisaoficha" min="2013" value="2014" required>
                                        <?php
                                       }

                                      ?>
                                      
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                      <label for="anoadmisao">Disciplinas:</label>
                                      <select class="form-control" id="disiplinaficha" name="disiplinaficha">                   
                                        <?php 
                                        $disiplinaficha = "";
                                        $db_host = "localhost";
                                        $username="root";
                                        $password="";
                                        $db='daac';
                                        $sdb =mysqli_connect($db_host,$username,$password,$db);       
                                        $query = "SELECT * FROM disciplinas";
                                        $lista = mysqli_query($sdb, $query);
                                        if(!empty($_GET['Cursoestudantelista'])){
                                            
                                            while ( $f=mysqli_fetch_array($lista)) {
                                                if($f['nome'] == $_GET['Disciplinaficha']){                                               
                                                   $disiplinaficha = $_GET['Disciplinaficha'];
                                                    ?>
                                                    <option selected><?php echo $_GET['Disciplinaficha'];?></option>
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
                                          $f=mysqli_fetch_array($lista);
                                          $disiplinaficha = $f['nome'];
                                          ?>
                                           <option><?php echo $f['nome'] ;?></option>
                                           <?php
                                            while ( $f=mysqli_fetch_array($lista)) {
                                               ?>
                                               <option><?php echo $f['nome'] ;?></option>

                                               <?php                                           
                                          
                                            }

                                        }
                                        
                                        ?>                                                                           
                                      </select>       
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover"> 
                                
                                <thead> 
                                    <tr> 
                                        <th>BI</th> 
                                        <th>Nome Completo</th>                                         
                                        <th>Nota</th>
                                        
                                    </tr> 
                                </thead> 
                                <tbody class="estudantesficha"> 
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

                                        
                                        $bificha = $f['bi'];
                                        $query2 = "SELECT * FROM est_dis WHERE bi = '$bificha' AND nome = '$disiplinaficha'";
                                        $lista2 = mysqli_query($sdb, $query2);
                                        $g=mysqli_fetch_array($lista2);
                                        $notaficha = 0;
                                        if(count($g)!=0)
                                        {
                                          $notaficha = $g['class'];
                                        }
                                        if($i % 2 == 0){
                                            ?>
                                            <tr  class="active">
                                               <td data-id="<?php echo $f['bi'];?>" class="bificha"><?php echo $f['bi'];?></td> 
                                               <td data-id="<?php echo $f['bi'];?>" class="nomeficha"><?php echo $f['nome'];?></td> 
                                               <td ><input type="number" name="notaf" data-id="<?php echo $f['bi'];?>" class="notaf" min="0" max="20" data-dis= "<?php echo $disiplinaficha?>" value="<?php echo $notaficha ;?>"></td>
                                             </tr>
                                            <?php
                                        }
                                        else {
                                            ?>
                                            <tr class="warning">
                                             <td data-id="<?php echo $f['bi'];?>" class="bificha"><?php echo $f['bi'];?></td> 
                                             <td data-id="<?php echo $f['bi'];?>" class="nomeficha"><?php echo $f['nome'];?></td> 
                                            <td ><input type="number" name="notaf" data-dis= "<?php echo $disiplinaficha?>" data-id="<?php echo $f['bi'];?>" class="notaf" min="0" max="20"  value="<?php echo $notaficha ;?>"></td>
                                            </tr> 
                                            <?php                                            
                                        }

                                        $i = $i + 1;
                                    }
                                    ?>                                                          
                                </tbody> 
                            </table>                           
                           <button type="button" class="btn btn-primary btn-lg" id="salvarficha">Salvar</button>
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
