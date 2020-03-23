
<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="principal.php"><strong class="blue tamanho">CEDAAC</strong></a>
                
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">               
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li><a href="trocarsenha.php"><i class="fa fa-gear fa-fw"></i> Trocar senha</a>
                        </li>
                        <li class="divider"></li>
                        <li class="fecharsessao"><a href="index.php"><i class="fa fa-sign-out fa-fw x"></i> Fechar sessão</a>
                        </li>
                        <li class="divider"></li>
                        <?php 
                        if(isset($_SESSION['Usuario'])){
                            $usuario = $_SESSION['Usuario'];
                            if($usuario['tipo']=='Administrador'){
                                ?>
                                 <li>
                                    <a href="novo_usuario.php"><i class="fa fa-smile-o fa-fw"></i> Novo Usuário</a>
                                 </li>
                                <?php 
                            }
                        }
                        ?>   
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">                        
                                   
                        <li>
                            <a href="#"><i class="fa fa-graduation-cap fa-fw"></i> Estudantes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="inserir_estudante.php"><i class="fa  fa-save fa-fw"></i> Inserir</a>
                                </li>
                                <li>
                                    <a href="listar_estudantes.php"><i class="fa fa-th-list fa-fw"></i> Listar</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-book fa-fw"></i> Disciplinas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="inserir_disciplina.php"> <i class="fa  fa-save fa-fw"></i> Inserir</a>
                                </li>
                                
                                <li>
                                    <a href="listar_disciplinas.php"><i class="fa fa-th-list fa-fw"></i> Listar</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-university fa-fw"></i> Cursos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="inserir_curso.php"> <i class="fa  fa-save fa-fw"></i> Inserir</a>
                                </li>
                               
                                <li>
                                    <a href="listar_curso.php"><i class="fa fa-th-list fa-fw"></i> Listar</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                            <?php 
                            if(isset($_SESSION['Usuario'])){
                                $usuario = $_SESSION['Usuario'];
                                if($usuario['tipo']=='Administrador'){
                                    ?>
                                     <li>
                                        <a href="ficha_academica.php"><i class="fa fa-certificate fa-fw"></i> Ficha Académica</a>
                                     </li>
                                    <?php 
                                }
                            }
                            ?>
                        
                         <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Estatísticas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="melhor_estudante.php"> <i class="fa fa-eye fa-fw"></i> Melhores estudantes</a>
                                </li>
                                <li>
                                    <a href="melhor_disciplina.php"><i class="fa fa-eye fa-fw"></i> Melhores disciplinas</a>
                                </li>
                                <li>
                                    <a href="piores_disciplinas.php"><i class="fa fa-eye fa-fw"></i> Piores disciplinas</a>
                                </li>
                                <li>
                                    <a href="melhores_anos.php"><i class="fa fa-eye fa-fw"></i> Melhores anos</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Usuário<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="trocarsenha.php"> <i class="fa fa-gear fa-fw"></i>Trocar senha</a>
                                </li>
                                <li class="fecharsessao">
                                    <a href=""><i class="fa fa-sign-out fa-fw"></i> Fechar sessão</a>
                                </li>     
                                <?php 
                                if(isset($_SESSION['Usuario'])){
                                    $usuario = $_SESSION['Usuario'];
                                    if($usuario['tipo']=='Administrador'){
                                        ?>
                                         <li>
                                            <a href="novo_usuario.php"><i class="fa fa-smile-o fa-fw"></i> Novo Usuário</a>
                                         </li>
                                        <?php 
                                    }
                                }
                                ?>                           
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>