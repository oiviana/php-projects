<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Transportadoras - Techstore</title>
    <style>
        td a {width: 100%;}
    </style>
</head>


<body>

    <div class="container" style="text-align: center;">
     <h2 style="font-size: 270%;">Todas as Transportadoras</h2>
     
     <table class="centered">
        <thead>
          <tr>
              <th>Nome</th>
              <th>CPF ou CNPJ</th>
              <th>Endereço</th>
              <th>Número</th>
              <th>Bairro</th>
              <th>Cidade</th>
              <th>Estado</th>
              <th>CEP</th>
              <th>Alterar</th>
              <th>Excluir</th>
          </tr>
        </thead>

        <tbody>
        <?php
        include_once '../../bancoDeDados.php';
        $conexao = conectar();
        $sql = "SELECT * FROM transportadora order by nome_trans";
        $resultado = $conexao->query($sql);
        foreach ($resultado as $clientes){      
          echo "<tr>";

           echo "<td>";
           echo $clientes["nome_trans"];
           echo "</td>";

           echo "<td>";
           echo $clientes["cpf_cnpj_trans"];
           echo "</td>";

           echo "<td>";
           echo $clientes["endereco_trans"];
           echo "</td>";

           echo "<td>";
           echo $clientes["numero_trans"];
           echo "</td>";

           echo "<td>";
           echo $clientes["bairro_trans"];
           echo "</td>";

           echo "<td>";
           echo $clientes["cidade_trans"];
           echo "</td>";

           echo "<td>";
           echo $clientes["estado_trans"];
           echo "</td>";

           echo "<td>";
           echo $clientes["cep_trans"];
           echo "</td>";

           echo "<td>";
           echo "<a href='editatrans.php?cpf_cnpj=". $clientes["cpf_cnpj_trans"] ."' class='waves-effect waves-light btn-small amber lighten-2'>Alterar</a>";
           echo "</td>";
           
           echo "<td>";
           echo "<a href='excluitrans.php?cpf_cnpj=". $clientes["cpf_cnpj_trans"] ."' class='waves-effect waves-light btn-small red darken-4'>Excluir</a>";
           echo "</td>";

          echo "</tr>";
        }
        ?>
        </tbody>
      </table> <br> <br>
      <a href="../index.html" class='btn waves-effect waves-light grey darken-2'>início</a>
    </div>


</body>
</html>