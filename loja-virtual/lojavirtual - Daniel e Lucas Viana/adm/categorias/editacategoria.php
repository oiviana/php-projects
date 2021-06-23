<?php
if (!isset($_REQUEST["id"])){
    header("Location:listacategoria.php");
}
else{
    include_once '../../bancoDeDados.php';
    $conexao = conectar();
    $sql = "SELECT * FROM categoria WHERE id = :id";
    $comandoPreparado = $conexao->prepare($sql);
    
    $comandoPreparado->bindParam(":id", $_REQUEST["id"]);
    $comandoPreparado->execute();
    $resultado = $comandoPreparado->fetch(); 
    
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Categorias - Techstore</title>
    <style>
      
 input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
  
</head>


<body>

    <div class="container" style="text-align: center;">
     <h2 style="font-size: 240%;">Editar categoria: <?php  echo $resultado["nome"];?></h2>
     
     <div class="row">
      <form class="col s12" action="atualizacategoria.php" method="POST">
        <div class="row">
          <div class="input-field col s6">
            <input id="first_name" type="text" class="validate" name="nome"  value="<?php  echo $resultado["nome"];?>" required>
            <label for="first_name">Nome</label>
          </div>
          <div class="input-field col s6">
            <input readonly id="last_name" type="number" min='0' class="validate" name="id" value="<?php  echo $resultado["id"];?>" required>
            <label for="last_name">Código</label>
          </div>
        </div>
        
        </div>
        <div class="row">
          <button class="btn waves-effect waves-light grey darken-2" type="submit" name="action">Atualizar
          </button>
        </div>
      </form>
    </div> 
    </div>


</body>
</html>