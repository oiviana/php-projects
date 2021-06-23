

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>HOME - Techstore</title>
    <style>
    html { 
  background: url(img/bg.jpeg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
    
    </style>
</head>


<body>

<nav class="grey darken-3">
<div class="container">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo" style="font-size:280%;">TechStore</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
       <button style="width:100%; user-select: none;">Daniel Ricardo e Lucas Viana</button>          
      </ul>
    </div>
    </div>
  </nav>
   <div class="container-fluid" style="margin-top:300px; text-align:center;">
<h1 style=" font-size:500%; color: white; text-shadow: black 0.1em 0.1em 0.2em">Melhor Sistema para controle Ecommerce!</h1>
  </div>

<div class="container-fluid" style="background-color:white; margin-top:560px;">
  <div class="container">
  

  <?php
                    include_once 'bancoDeDados.php';
                    $conexao = conectar();
                    $sql = "SELECT * FROM produto order by nome_pro";
                    $resultado = $conexao->query($sql);
                    foreach ($resultado as $produtos){
    echo '<div class="row" style="text-align:center;">';                  
    echo '<div class="col m4"></div>';                       
    echo '<div class="col s12  m4">';
    echo  '<div class="card">';
    echo   '<div class="card-image">';
    echo    '<img src="adm/imgupload/'. $produtos["imgprincipal"] .'">';
    echo    '<span class="card-title" style="color:black; font-size:200%;">'.$produtos["nome_pro"].'</span>';
    echo   '</div>';
    echo   '<div class="card-content">';
    echo      '<p>'.$produtos["descricao"].'</p>';
    echo      '<p>R$ '.$produtos["valor_unitario"].'</p>';
    echo   '</div>';
    echo   '<div class="card-action">';
    echo   '<a href="#">Comprar</a>';
    echo   '</div>';
    echo   '</div>';
    echo   '</div>';
    echo   '<div class="col m4"></div>';
    echo   '</div>';
      }
      ?>
  </div>
  </div>
</div>







</body>
</html>