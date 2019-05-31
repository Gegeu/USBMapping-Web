<?php
session_start();
include('conexao.php');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=download.xls');
header('Content-Type: text/html; charset=utf-8');
$output = '';
if(isset($_POST["exportar"]))
{
 $query = "SELECT * FROM maquina WHERE data_mapeamento ORDER BY data_mapeamento DESC";
 $result = mysqli_query($conexao, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="0">  
                    <tr>  
                         <th>ID Maquina</th> 
                         <th>Processador</th>  
                         <th>Fabricante Placa Mae</th>  
                         <th>Modelo Placa Mae</th>  
                         <th>Numero de Serie Placa Mae</th>  
                         <th>Nome do Computador</th>
                         <th>Versao do Sistema</th>
                         <th>Data de Instalcao</th>
                         <th>Dominio</th>
                         <th>Arquitetura</th>
                         <th>Usuario Atual</th>
                         <th>Endereco IPV4</th>
                         <th>Endereco MacAddress</th>  
                         <th>Servidor DNS</th>
                         <th>Memoria RAM</th>
                         <th>Espaco HD</th>
                         <th>Nome do Tecnico</th>
                         <th>Local do Mapeamento</th>  
                         <th>Data do Mapeamento</th>  
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["id_maquina"].'</td>  
                         <td>'.$row["processador"].'</td>  
                         <td>'.$row["mb_fabricante"].'</td> 
                         <td>'.$row["mb_modelo"].'</td>
                         <td>'.$row["mb_num_serie"].'</td>
                         <td>'.$row["sis_hostname"].'</td>
                         <td>'.$row["sis_versao_sistema"].'</td>
                         <td>'.$row["sis_data_instalacao"].'</td>
                         <td>'.$row["sis_dominio"].'</td>
                         <td>'.$row["sis_arquitetura"].'</td>
                         <td>'.$row["sis_usuario_atual"].'</td>
                         <td>'.$row["rede_ipv4"].'</td>
                         <td>'.$row["rede_macaddress"].'</td>
                         <td>'.$row["rede_srv_dns"].'</td>
      					 <td>'.$row["memoria_ram"].'</td>		
      					 <td>'.$row["total_hd"].'</td>
      					 <td>'.$row["nome_tecnico"].'</td>
      					 <td>'.$row["local_mapeamento"].'</td>
      					 <td>'.$row["data_mapeamento"].'</td>
     </tr>
   ';
  }
  $output .= '</table>';
  echo $output;
 }
}

$conexao->close();
?>