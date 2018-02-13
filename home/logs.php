                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Tables
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="<?php echo $lin2['icone']; ?>"></i> <?php echo $lin2['nome']; ?>
                            </li>
                        </ol>
                    </div>
                </div>
                    <div class="col-lg-12">
                        <h2>Logs</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Login</th>
                                        <th>Acontecimento</th>
                                        <th>Local</th>
                                        <th>Hora</th>
                                        <th>Data</th>
                                        <th>IP</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?
                                //depois dar opção de mudar ordem através do order by
                                $sql_log	=	"SELECT * FROM  log order by id desc";
                                $sql_res	=	mysqli_query($mysql,$sql_log);
                                while ( $sql_lin	=	mysqli_fetch_array($sql_res)	) {
                                   


                                ?>
                                    <tr class="<? echo $sql_lin['importancia']; ?>">
                                        <td><? echo $sql_lin['login']; ?> </td>
                                        <td><? echo $sql_lin['acontecimento']; ?></td>
                                        <td><? echo $sql_lin['local']; ?></td>
                                        <td><? echo $sql_lin['hora']; ?></td>
                                        <td><? echo $sql_lin['data']; ?></td>
                                        <td><? echo $sql_lin['ip']; ?></td>
                                    </tr>
                              <? }; ?>  

                                </tbody>
                            </table>
                        </div>