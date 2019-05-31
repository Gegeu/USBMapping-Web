<?php
session_start();
include('verifica_login.php');

include('conexao.php');

?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>USBMapping</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<?php
    $query = "SELECT * FROM maquina WHERE data_mapeamento ORDER BY data_mapeamento DESC";
    $resultado = mysqli_query($conexao,$query);  
?>
<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <div class ="box">
                            <?php
                                if(isset($_SESSION['maquina_excluida'])):
                            ?>
                            <div class="notification is-success">
                              <p>Máquina excluída com sucesso.</p>
                            </div>
                            <?php
                            endif;
                            unset($_SESSION['maquina_excluida']);
                            ?>
                        <h2>Olá, <?php echo $_SESSION['nome'];?></h2>
                        <h2><?php echo $_SESSION['administrador'];?></h2>
                        <h2><a href="logout.php">Sair</a></h2> 
                    		<p>
                    			<form action="cadastro.php">
                    			    <button type="submit" class="button is-block is-link is-medium is-fullwidth">Cadastrar usuário</button>
                                </form>
                    		</p>
                    </div>
                </div>
            </div>
        </div>
         <div class="hero-body">
                <div class="table-container" style=" width: 1000px; height: 300px; overflow: scroll;">
                    <table class="table">
                            <thead>
                                <tr>
                                    <th><abbr title="ID">ID</abbr></th>
                                    <th><abbr title="Processador">Processador</abbr></th>
                                    <th><abbr title="Hostname">Nome do Computador</abbr></th>
                                    <th><abbr title="MacAddress">Mac Address</abbr></th>
                                    <th><abbr title="DataMapeamento">Data do Mapeamento</abbr></th>
                                    <th><abbr title="NomeTecnico">Nome do Técnico</abbr></th>
                                    <th><abbr title="LocalMapeamento">Local do Mapeamento</abbr></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php

                                        while ($linha = mysqli_fetch_assoc($resultado)) {
                                            echo '<tr>';
                                            echo '<th>'. $linha['id_maquina'].'</th>';
                                            echo '<td>'. $linha['processador'].'</td>';
                                            echo '<td>'. $linha['sis_hostname'].'</td>';
                                            echo '<td>'. $linha['rede_macaddress'].'</td>';
                                            echo '<td>'. $linha['data_mapeamento'].'</td>';
                                            echo '<td>'. $linha['nome_tecnico'].'</td>';
                                            echo '<td>'. $linha['local_mapeamento'].'</td>';
                                            echo "<td><a class='button is-block is-link is-medium modal-button' href=excluir_maquina.php?id=".$linha['id_maquina'].">Excluir</a></td>";
                                        }
                                    ?>
                                </tr>
                            </tbody>
                    </table>
                </div>
            </div>
            <div class="hero-body">
                <div class="container">
                    <div class="column is-5 is-offset-5">
                        <form method="post" action="exportar.php">
                            <button type="submit" name="exportar" class="button is-block is-link is-medium">Exportar</button>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</body>

</html>


