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

        

        <title>CEDAAC</title>

        <?php include  'head_common.php';?>   

    </head>

    <body>

        <div id="wrapper">
            <?php include  'nav.php';?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <h3 class="page-header"><strong class="blue">C</strong>ontrolo de <strong class="blue">E</strong>studante do <strong class="blue">D</strong>epartamento <strong class="blue">A</strong>ssuntos <strong class="blue">A</strong>cademicos <strong class="blue">C</strong>uando Cubango</h3>

                            

                        </div>
                        <div class="col-lg-1"></div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    
                </div>
                <!-- /.container-fluid -->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10 col-md-10 col-sm-10">                          
                            <img src="img/1.jpg" class="img-responsive" alt="CEDAAC">
                        </div>
                        <div class="col-lg-1"></div>
                    </div>  
                </div>
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php include 'footer_common.php';?>    

    </body>

</html>

