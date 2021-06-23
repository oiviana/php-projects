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

    <div class="container-fluid" style="text-align: center;">
    <?php
                 include_once '../../bancoDeDados.php';
                $Codigo = $_REQUEST["codigo"];
                $conexao = conectar();
                $sql = "SELECT * FROM produto WHERE codigo_prod =".$Codigo;
                $resultado = $conexao->query($sql);
                
                $sql = "SELECT * FROM categoria";
                $resultado2 = $conexao->query($sql);

            



    echo '<h2 style="font-size: 270%;">Detalhes do produto</h2>';
     foreach ($resultado as $produtos){
   echo '<div class="container" style="border-style:ridge; border-radius: 10px;">';
       echo '<div class="row">';
           echo '<div class="col s6">';
               echo '<h3>'.$produtos["nome_pro"].'</h3>';
              echo '</div>';

              echo '<div class="col s6" style="text-align: left;">';
              echo '<h4>'.$produtos["descricao"].'</h4>';
              echo '</div>';
       echo '</div>';

       echo '<div class="row">';
           echo '<div class="col s5">';
               echo '<img src="../imgupload/'.$produtos["imgprincipal"].'" alt="" style="width: 70%;">';
              echo '</div>';

               echo '<div class="col s7" style="text-align: left;">';
                echo '<table class="centered">';
                 echo '<thead>';
                  echo '<tr>';
                  echo '<th>Valor</th>';
                  echo '<th>Peso</th>';
                  echo '<th>Dimensões</th>';
                  echo '<th>Categoria</th>';
                  echo '</tr>';
                  echo '<thead>';

                  echo '<tbody>';
                  echo '<tr>';

                    echo '<td>';
                     echo $produtos["valor_unitario"];
                    echo '</td>';
                    echo '<td>';
                     echo $produtos["peso"];
                    echo '</td>';
                    echo '<td>';
                     echo $produtos["dimensoes"];
                    echo '</td>';
                     foreach($resultado2 as $categoria){
                         if($categoria["id"] == $produtos["id"]){
                           echo '<td>';
                            echo $categoria["nome"];
                           echo '</td>';  
                         }
                     }

                  echo '<tr>';
                  echo '</tbody>';
                echo '</table>';
                 
               echo '</div>';
       echo '</div>';
   
   echo '</div>';
                }
      ?>
    </div>


</body>
</html>