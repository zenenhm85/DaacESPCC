<?php 
    session_start();   
    if(!isset($_SESSION['Usuario'])){
        exit();                                 
    }   
    $db_host = "localhost";
    $username="root";
    $password="";
    $db='daac';
    $sdb =mysqli_connect($db_host,$username,$password,$db);       
    $query = "SELECT AVG(est_dis.class) as prom, estudante.ano FROM estudante INNER JOIN est_dis ON (estudante.bi = est_dis.bi) GROUP BY(estudante.ano) ORDER BY prom DESC LIMIT 5";
    $lista = mysqli_query($sdb, $query);
  
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

        <title>CEDAAC- Melhores anos</title>

        <?php include  'head_common.php';?>   

    </head>

    <body>

        <div id="wrapper">
            <?php include  'nav.php';?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header blue">Lista  melhores anos</h1>
                            <button type="button" class="btn btn-primary btn-lg float" id="printmelhoresanos"><i class="fa fa-print fa-fw"></i></button>
                            <button type="button" class="btn btn-success btn-lg float"  id="excelmelhoresanos" style="margin-right: 10px"><i class="fa fa-file-excel-o fa-fw"></i></button>
                            <table class="table table-striped table-hover table-bordered" id="listamelhoresanos"> <br><br><br>
                                <thead class="blue"> 
                                  <tr > 
                                    <th class="text-uppercase text-center">No</th> 
                                    <th class="text-uppercase text-center">Ano</th> 
                                    <th class="text-uppercase text-center">Média</th>                                                                             
                                  </tr> 
                                </thead> 
                                <tbody id="melhorestudante"> 

                                  <?php 
                                  $i = 1;
                                  while ($f = mysqli_fetch_array($lista)) {
                                    ?>
                                    <tr>
                                        <th class="text-center"><?php echo $i;?></th>
                                      <th class="text-center"><?php echo $f['ano'];?></th>
                                      <th class="text-center"><?php echo $f['prom'];?></th>                                      
                                    </tr>
                                    <?php 
                                    $i++;                                   
                                  }
                                  ?>
                                                           
                                </tbody> 
                            </table>
                            
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