<?php 
    session_start();

    if(!isset($_SESSION['Usuario'])){
        exit();                                 
    }  
    
    $bi = $_GET['Bi'];    

    $db_host = "localhost";
    $username="root";
    $password="";
    $db='daac';
    $sdb =mysqli_connect($db_host,$username,$password,$db);
    $query = "SELECT * FROM estudante WHERE bi='$bi'" ;
    $lista = mysqli_query($sdb, $query);
    $f=mysqli_fetch_array($lista);


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

        <title>CEDAAC- Informação do Estudante</title>

        <?php include  'head_common.php';?>   

    </head>

    <body>

        <div id="wrapper">
            <?php include  'nav.php';?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 table-responsive">
                            <h1 class="page-header blue text-uppercase">Ficha académica do Estudante</h1>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><strong>Nome completo: </strong><?php echo $f['nome'];?></p>
                                    <p><strong>BI: </strong><?php echo $f['bi'];?></p>
                                    <p><strong>Nome do pai: </strong><?php echo $f['pai'];?></p>
                                    <p><strong>Nome da mãe: </strong><?php echo $f['mae'];?></p>
                                    <p><strong>Endereço: </strong><?php echo $f['direcao'];?></p>
                                    <p><strong>Data de nascimento: </strong><?php echo $f['data'];?></p>                          
                                </div>
                                <div class="col-lg-6">
                                    <p><strong>Ano de admissão: </strong><?php echo $f['ano'];?></p>
                                    <p><strong>Curso: </strong><?php echo $f['curso'];?></p>
                                    <p><strong>Email: </strong><?php echo $f['email'];?></p>
                                    <p><strong>Telefone: </strong><?php echo $f['telefone'];?></p>
                                    <p><strong>Sexo: </strong><?php echo $f['sexo'];?></p>
                                    <button type="button" class="btn btn-success btn-lg float exportar"><i class="fa fa-file-excel-o fa-fw"></i></button>
                                    <button type="button" class="btn btn-primary btn-lg float printinfoest" style="margin-right: 5px"><i class="fa fa-print fa-fw"></i></button>
                                </div>
                            </div> <br>                 

                            <table class="table table-bordered table-hover" id="estudanteinfo">
                              <thead>
                                
                              </thead>
                              <tbody>
                                <tr class="info">
                                  <th colspan="6" class="text-center"><strong>1<sup>0</sup> Ano</strong></th>           
                                </tr>
                                <tr class="success">
                                    <th class="text-center text-uppercase"><strong>disciplinas do 1<sup>0</sup> semestre</strong></th>
                                    <th class="text-center"><strong>Classificações</strong></th>
                                    <th class="text-center"><strong>Ano Lectivo</strong></th>                                    
                                </tr>
                                <?php 
                                $query = "SELECT est_dis.nome as nome,est_dis.class as class,est_dis.ano as ano FROM est_dis INNER JOIN disciplinas ON (est_dis.nome = disciplinas.nome)  WHERE disciplinas.ano='1' AND disciplinas.semestre = '1' AND est_dis.bi = '$bi' ";                                
                                $lista = mysqli_query($sdb, $query);
                                
                                while ($f=mysqli_fetch_array($lista)) {                                  
                                    ?>
                                    <tr>
                                        <th><?php echo $f['nome'];?></th>
                                        <th class="text-center"><?php echo $f['class'];?> </th>
                                        <th class="text-center"><?php echo $f['ano'];?> </th>                                        
                                    </tr>

                                    <?php
                                } 
                                $query2 = "SELECT AVG(est_dis.class) as media FROM est_dis INNER JOIN disciplinas ON (est_dis.nome = disciplinas.nome)  WHERE disciplinas.ano='1' AND disciplinas.semestre = '1' AND est_dis.bi = '$bi' ";                                
                                $lista2 = mysqli_query($sdb, $query2);
                                $g=mysqli_fetch_array($lista2);
                                $media = $g['media'];                            
                                ?>
                                <tr>
                                    <th class="text-uppercase text-center" > média</th>
                                    <th class="text-uppercase text-center" colspan="2"> <?php echo $media;?></th>               
                                </tr>
                                <tr class="success">
                                    <th class="text-center text-uppercase"><strong>disciplinas do 2<sup>0</sup> semestre</strong></th>
                                    <th class="text-center"><strong>Classificações</strong></th>
                                    <th class="text-center"><strong>Ano Lectivo</strong></th>                                    
                                </tr>
                                <?php 
                                $query = "SELECT est_dis.nome as nome,est_dis.class as class,est_dis.ano as ano FROM est_dis INNER JOIN disciplinas ON (est_dis.nome = disciplinas.nome)  WHERE disciplinas.ano='1' AND disciplinas.semestre = '2' AND est_dis.bi = '$bi' " ;
                                $lista = mysqli_query($sdb, $query);
                                while ($f=mysqli_fetch_array($lista)) {
                                    ?>
                                    <tr>
                                        <th><?php echo $f['nome'];?></th>
                                        <th class="text-center"><?php echo $f['class'];?> </th>
                                        <th class="text-center"><?php echo $f['ano'];?> </th>                                        
                                    </tr>

                                    <?php
                                } 
                                $query2 = "SELECT AVG(est_dis.class) as media FROM est_dis INNER JOIN disciplinas ON (est_dis.nome = disciplinas.nome)  WHERE disciplinas.ano='1' AND disciplinas.semestre = '2' AND est_dis.bi = '$bi' ";                                
                                $lista2 = mysqli_query($sdb, $query2);
                                $g=mysqli_fetch_array($lista2);
                                $media = $g['media'];                            
                                ?>
                                <tr>
                                    <th class="text-uppercase text-center" > média</th>
                                    <th class="text-uppercase text-center" colspan="2"> <?php echo $media;?></th>               
                                </tr>  
                                <?php
                                $query3 = "SELECT AVG(est_dis.class) as media FROM est_dis INNER JOIN disciplinas ON (est_dis.nome = disciplinas.nome)  WHERE disciplinas.ano='1' AND est_dis.bi = '$bi' ";                                
                                $lista3 = mysqli_query($sdb, $query3);
                                $h=mysqli_fetch_array($lista3);
                                $anomedia = $h['media'];  
                                ?>
                                <tr class="warning">
                                    <th class="text-uppercase text-center" > índice geral do ano</th>
                                    <th class="text-uppercase text-center" colspan="2"> <?php echo $anomedia;?></th>               
                                </tr>  
                                <!-- ---------------------------------- 2 ANO---------------------------------------------------- -->
                                <tr class="info">
                                  <th colspan="6" class="text-center"><strong>2<sup>0</sup> Ano</strong></th>           
                                </tr>
                                <tr class="success">
                                    <th class="text-center text-uppercase"><strong>disciplinas do 1<sup>0</sup> semestre</strong></th>
                                    <th class="text-center"><strong>Classificações</strong></th>
                                    <th class="text-center"><strong>Ano Lectivo</strong></th>                                    
                                </tr>
                                <?php 
                                $query = "SELECT est_dis.nome as nome,est_dis.class as class,est_dis.ano as ano FROM est_dis INNER JOIN disciplinas ON (est_dis.nome = disciplinas.nome)  WHERE disciplinas.ano='2' AND disciplinas.semestre = '1' AND est_dis.bi = '$bi' ";                                
                                $lista = mysqli_query($sdb, $query);
                                
                                while ($f=mysqli_fetch_array($lista)) {                                  
                                    ?>
                                    <tr>
                                        <th><?php echo $f['nome'];?></th>
                                        <th class="text-center"><?php echo $f['class'];?> </th>
                                        <th class="text-center"><?php echo $f['ano'];?> </th>                                        
                                    </tr>

                                    <?php
                                } 
                                $query2 = "SELECT AVG(est_dis.class) as media FROM est_dis INNER JOIN disciplinas ON (est_dis.nome = disciplinas.nome)  WHERE disciplinas.ano='2' AND disciplinas.semestre = '1' AND est_dis.bi = '$bi' ";                                
                                $lista2 = mysqli_query($sdb, $query2);
                                $g=mysqli_fetch_array($lista2);
                                $media = $g['media'];                            
                                ?>
                                <tr>
                                    <th class="text-uppercase text-center" > média</th>
                                    <th class="text-uppercase text-center" colspan="2"> <?php echo $media;?></th>               
                                </tr>
                                <tr class="success">
                                    <th class="text-center text-uppercase"><strong>disciplinas do 2<sup>0</sup> semestre</strong></th>
                                    <th class="text-center"><strong>Classificações</strong></th>
                                    <th class="text-center"><strong>Ano Lectivo</strong></th>                                    
                                </tr>
                                <?php 
                                $query = "SELECT est_dis.nome as nome,est_dis.class as class,est_dis.ano as ano FROM est_dis INNER JOIN disciplinas ON (est_dis.nome = disciplinas.nome)  WHERE disciplinas.ano='2' AND disciplinas.semestre = '2' AND est_dis.bi = '$bi' " ;
                                $lista = mysqli_query($sdb, $query);
                                while ($f=mysqli_fetch_array($lista)) {
                                    ?>
                                    <tr>
                                        <th><?php echo $f['nome'];?></th>
                                        <th class="text-center"><?php echo $f['class'];?> </th>
                                        <th class="text-center"><?php echo $f['ano'];?> </th>                                        
                                    </tr>

                                    <?php
                                } 
                                $query2 = "SELECT AVG(est_dis.class) as media FROM est_dis INNER JOIN disciplinas ON (est_dis.nome = disciplinas.nome)  WHERE disciplinas.ano='2' AND disciplinas.semestre = '2' AND est_dis.bi = '$bi' ";                                
                                $lista2 = mysqli_query($sdb, $query2);
                                $g=mysqli_fetch_array($lista2);
                                $media = $g['media'];                            
                                ?>
                                <tr>
                                    <th class="text-uppercase text-center" > média</th>
                                    <th class="text-uppercase text-center" colspan="2"> <?php echo $media;?></th>               
                                </tr>  
                                <?php
                                $query3 = "SELECT AVG(est_dis.class) as media FROM est_dis INNER JOIN disciplinas ON (est_dis.nome = disciplinas.nome)  WHERE disciplinas.ano='2' AND est_dis.bi = '$bi' ";                                
                                $lista3 = mysqli_query($sdb, $query3);
                                $h=mysqli_fetch_array($lista3);
                                $anomedia = $h['media'];  
                                ?>
                                <tr class="warning">
                                    <th class="text-uppercase text-center" > índice geral do ano</th>
                                    <th class="text-uppercase text-center" colspan="2"> <?php echo $anomedia;?></th>               
                                </tr>  
                                <!-- ---------------------------------- 3 ANO------------------------------------------- -->
                                <tr class="info">
                                  <th colspan="6" class="text-center"><strong>3<sup>0</sup> Ano</strong></th>           
                                </tr>
                                <tr class="success">
                                    <th class="text-center text-uppercase"><strong>disciplinas do 1<sup>0</sup> semestre</strong></th>
                                    <th class="text-center"><strong>Classificações</strong></th>
                                    <th class="text-center"><strong>Ano Lectivo</strong></th>                                    
                                </tr>
                                <?php 
                                $query = "SELECT est_dis.nome as nome,est_dis.class as class,est_dis.ano as ano FROM est_dis INNER JOIN disciplinas ON (est_dis.nome = disciplinas.nome)  WHERE disciplinas.ano='3' AND disciplinas.semestre = '1' AND est_dis.bi = '$bi' ";                                
                                $lista = mysqli_query($sdb, $query);
                                
                                while ($f=mysqli_fetch_array($lista)) {                                  
                                    ?>
                                    <tr>
                                        <th><?php echo $f['nome'];?></th>
                                        <th class="text-center"><?php echo $f['class'];?> </th>
                                        <th class="text-center"><?php echo $f['ano'];?> </th>                                        
                                    </tr>

                                    <?php
                                } 
                                $query2 = "SELECT AVG(est_dis.class) as media FROM est_dis INNER JOIN disciplinas ON (est_dis.nome = disciplinas.nome)  WHERE disciplinas.ano='3' AND disciplinas.semestre = '1' AND est_dis.bi = '$bi' ";                                
                                $lista2 = mysqli_query($sdb, $query2);
                                $g=mysqli_fetch_array($lista2);
                                $media = $g['media'];                            
                                ?>
                                <tr>
                                    <th class="text-uppercase text-center" > média</th>
                                    <th class="text-uppercase text-center" colspan="2"> <?php echo $media;?></th>               
                                </tr>
                                <tr class="success">
                                    <th class="text-center text-uppercase"><strong>disciplinas do 2<sup>0</sup> semestre</strong></th>
                                    <th class="text-center"><strong>Classificações</strong></th>
                                    <th class="text-center"><strong>Ano Lectivo</strong></th>                                    
                                </tr>
                                <?php 
                                $query = "SELECT est_dis.nome as nome,est_dis.class as class,est_dis.ano as ano FROM est_dis INNER JOIN disciplinas ON (est_dis.nome = disciplinas.nome)  WHERE disciplinas.ano='3' AND disciplinas.semestre = '2' AND est_dis.bi = '$bi' " ;
                                $lista = mysqli_query($sdb, $query);
                                while ($f=mysqli_fetch_array($lista)) {
                                    ?>
                                    <tr>
                                        <th><?php echo $f['nome'];?></th>
                                        <th class="text-center"><?php echo $f['class'];?> </th>
                                        <th class="text-center"><?php echo $f['ano'];?> </th>                                        
                                    </tr>

                                    <?php
                                } 
                                $query2 = "SELECT AVG(est_dis.class) as media FROM est_dis INNER JOIN disciplinas ON (est_dis.nome = disciplinas.nome)  WHERE disciplinas.ano='3' AND disciplinas.semestre = '2' AND est_dis.bi = '$bi' ";                                
                                $lista2 = mysqli_query($sdb, $query2);
                                $g=mysqli_fetch_array($lista2);
                                $media = $g['media'];                            
                                ?>
                                <tr>
                                    <th class="text-uppercase text-center" > média</th>
                                    <th class="text-uppercase text-center" colspan="2"> <?php echo $media;?></th>               
                                </tr>  
                                <?php
                                $query3 = "SELECT AVG(est_dis.class) as media FROM est_dis INNER JOIN disciplinas ON (est_dis.nome = disciplinas.nome)  WHERE disciplinas.ano='3' AND est_dis.bi = '$bi' ";                                
                                $lista3 = mysqli_query($sdb, $query3);
                                $h=mysqli_fetch_array($lista3);
                                $anomedia = $h['media'];  
                                ?>
                                <tr class="warning">
                                    <th class="text-uppercase text-center" > índice geral do ano</th>
                                    <th class="text-uppercase text-center" colspan="2"> <?php echo $anomedia;?></th>               
                                </tr>  
                                <!-- ---------------------------------- 4 ANO------------------------------------------- -->
                                <tr class="info">
                                  <th colspan="6" class="text-center"><strong>4<sup>0</sup> Ano</strong></th>           
                                </tr>
                                <tr class="success">
                                    <th class="text-center text-uppercase"><strong>disciplinas do 1<sup>0</sup> semestre</strong></th>
                                    <th class="text-center"><strong>Classificações</strong></th>
                                    <th class="text-center"><strong>Ano Lectivo</strong></th>                                    
                                </tr>
                                <?php 
                                $query = "SELECT est_dis.nome as nome,est_dis.class as class,est_dis.ano as ano FROM est_dis INNER JOIN disciplinas ON (est_dis.nome = disciplinas.nome)  WHERE disciplinas.ano='4' AND disciplinas.semestre = '1' AND est_dis.bi = '$bi' ";                                
                                $lista = mysqli_query($sdb, $query);
                                
                                while ($f=mysqli_fetch_array($lista)) {                                  
                                    ?>
                                    <tr>
                                        <th><?php echo $f['nome'];?></th>
                                        <th class="text-center"><?php echo $f['class'];?> </th>
                                        <th class="text-center"><?php echo $f['ano'];?> </th>                                        
                                    </tr>

                                    <?php
                                } 
                                $query2 = "SELECT AVG(est_dis.class) as media FROM est_dis INNER JOIN disciplinas ON (est_dis.nome = disciplinas.nome)  WHERE disciplinas.ano='4' AND disciplinas.semestre = '1' AND est_dis.bi = '$bi' ";                                
                                $lista2 = mysqli_query($sdb, $query2);
                                $g=mysqli_fetch_array($lista2);
                                $media = $g['media'];                            
                                ?>
                                <tr>
                                    <th class="text-uppercase text-center" > média</th>
                                    <th class="text-uppercase text-center" colspan="2"> <?php echo $media;?></th>               
                                </tr>
                                <tr class="success">
                                    <th class="text-center text-uppercase"><strong>disciplinas do 2<sup>0</sup> semestre</strong></th>
                                    <th class="text-center"><strong>Classificações</strong></th>
                                    <th class="text-center"><strong>Ano Lectivo</strong></th>                                    
                                </tr>
                                <?php 
                                $query = "SELECT est_dis.nome as nome,est_dis.class as class,est_dis.ano as ano FROM est_dis INNER JOIN disciplinas ON (est_dis.nome = disciplinas.nome)  WHERE disciplinas.ano='4' AND disciplinas.semestre = '2' AND est_dis.bi = '$bi' " ;
                                $lista = mysqli_query($sdb, $query);
                                while ($f=mysqli_fetch_array($lista)) {
                                    ?>
                                    <tr>
                                        <th><?php echo $f['nome'];?></th>
                                        <th class="text-center"><?php echo $f['class'];?> </th>
                                        <th class="text-center"><?php echo $f['ano'];?> </th>                                        
                                    </tr>

                                    <?php
                                } 
                                $query2 = "SELECT AVG(est_dis.class) as media FROM est_dis INNER JOIN disciplinas ON (est_dis.nome = disciplinas.nome)  WHERE disciplinas.ano='4' AND disciplinas.semestre = '2' AND est_dis.bi = '$bi' ";                                
                                $lista2 = mysqli_query($sdb, $query2);
                                $g=mysqli_fetch_array($lista2);
                                $media = $g['media'];                            
                                ?>
                                <tr>
                                    <th class="text-uppercase text-center" > média</th>
                                    <th class="text-uppercase text-center" colspan="2"> <?php echo $media;?></th>               
                                </tr>  
                                <?php
                                $query3 = "SELECT AVG(est_dis.class) as media FROM est_dis INNER JOIN disciplinas ON (est_dis.nome = disciplinas.nome)  WHERE disciplinas.ano='4' AND est_dis.bi = '$bi' ";                                
                                $lista3 = mysqli_query($sdb, $query3);
                                $h=mysqli_fetch_array($lista3);
                                $anomedia = $h['media'];  
                                ?>
                                <tr class="warning">
                                    <th class="text-uppercase text-center" > índice geral do ano</th>
                                    <th class="text-uppercase text-center" colspan="2"> <?php echo $anomedia;?></th>               
                                </tr>  
                                 <!-- ---------------------------------- 5 ANO------------------------------------------- -->
                                <tr class="info">
                                  <th colspan="6" class="text-center"><strong>5<sup>0</sup> Ano</strong></th>           
                                </tr>
                                <tr class="success">
                                    <th class="text-center text-uppercase"><strong>trabalho do fim de curso</strong></th>
                                    <th class="text-center"><strong>Classificações</strong></th>
                                    <th class="text-center"><strong>Ano Lectivo</strong></th>                                    
                                </tr>
                                <?php 
                                $query2 = "SELECT AVG(est_dis.class) as media FROM est_dis INNER JOIN disciplinas ON (est_dis.nome = disciplinas.nome)  WHERE est_dis.bi = '$bi' AND disciplinas.ano!='5'";                                
                                $lista2 = mysqli_query($sdb, $query2);
                                $g=mysqli_fetch_array($lista2);
                                $media4 = $g['media'];     
                                ?>
                                    <tr>
                                        <th>Média do Plano Curricular</th>
                                        <th class="text-center"><?php echo $media4;?> </th>
                                        <th class="text-center"><?php echo date("Y");?> </th>                                        
                                    </tr>
                                <?php         

                                $query = "SELECT est_dis.nome as nome,est_dis.class as class,est_dis.ano as ano FROM est_dis INNER JOIN disciplinas ON (est_dis.nome = disciplinas.nome)  WHERE disciplinas.ano='5' AND disciplinas.semestre = '1' AND est_dis.bi = '$bi' ";                                
                                $lista = mysqli_query($sdb, $query);
                                $f=mysqli_fetch_array($lista);
                                $media5 = $f['class'];
                                ?>
                                    <tr>
                                        <th><?php echo $f['nome'];?></th>
                                        <th class="text-center"><?php echo $f['class'];?> </th>
                                        <th class="text-center"><?php echo $f['ano'];?> </th>                                        
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-success btn-lg float exportar"><i class="fa fa-file-excel-o fa-fw"></i></button>
                                    <button type="button" class="btn btn-primary btn-lg float printinfoest" style="margin-right: 5px"><i class="fa fa-print fa-fw"></i></button>
                            <br><br><br><br><br><br>
                                         
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
