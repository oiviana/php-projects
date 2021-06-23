<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Admin - Techstore</title>
    <style>
        td a {width: 100%;}
    </style>
</head>


<body>

    <div class="container" style="text-align: center;">
     <h2 style="font-size: 270%;">Produtos Cadastrados</h2>
     
     <table class="centered">
        <thead>
          <tr>
              <th>Nome</th>
              <th>Descrição</th>
              <th>Valor</th>
              <th>Peso</th>
              <th>Detalhes</th>
              <th>Alterar</th>
              <th>Excluir</th>
              
          </tr>
        </thead>

        <tbody>
        <?php
        include_once '../../bancoDeDados.php';
        $conexao = conectar();
        $sql = "SELECT * FROM produto order by nome_pro";
        $resultado = $conexao->query($sql);
        foreach ($resultado as $clientes){      
          echo "<tr>";

           echo "<td>";
           echo $clientes["nome_pro"];
           echo "</td>";

           echo "<td>";
           echo $clientes["descricao"];
           echo "</td>";

           echo "<td>";
           echo $clientes["valor_unitario"];
           echo "</td>";

           echo "<td>";
           echo $clientes["peso"];
           echo "</td>";

           echo "<td>";
           echo "<a href='detalhesproduto.php?codigo=". $clientes["codigo_prod"] ."' class='waves-effect waves-light btn-small amber lighten-2'>Detalhes</a>";
           echo "</td>";

           echo "<td>";
           echo "<a href='editaproduto.php?codigo=". $clientes["codigo_prod"] ."' class='waves-effect waves-light btn-small amber lighten-2'>Alterar</a>";
           echo "</td>";
           
           echo "<td>";
           echo "<a href='excluiproduto.php?codigo=". $clientes["codigo_prod"] ."' class='waves-effect waves-light btn-small red darken-4'>Excluir</a>";
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