<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Categorias - Techstore</title>
    <style>
        td a {width: 100%;}
    </style>
</head>


<body>

    <div class="container" style="text-align: center;">
     <h2 style="font-size: 270%;">Todas as Categorias</h2>
     
     <table class="centered">
        <thead>
          <tr>
              <th>Categoria</th>
              <th>Código</th>
              <th>Alterar</th>
              <th>Excluir</th>
    
          </tr>
        </thead>

        <tbody>
        <?php
        include_once '../../bancoDeDados.php';
        $conexao = conectar();
        $sql = "SELECT * FROM categoria order by nome";
        $resultado = $conexao->query($sql);
        foreach ($resultado as $clientes){      
          echo "<tr>";

           echo "<td>";
           echo $clientes["nome"];
           echo "</td>";

           echo "<td>";
           echo $clientes["id"];
           echo "</td>";

           echo "<td>";
           echo "<a href='editacategoria.php?id=". $clientes["id"] ."' class='waves-effect waves-light btn-small amber lighten-2'>Alterar</a>";
           echo "</td>";
           
           echo "<td>";
           echo "<a href='excluicategoria.php?id=". $clientes["id"] ."' class='waves-effect waves-light btn-small red darken-4'>Excluir</a>";
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