<?php
if (!isset($_REQUEST["cpf_cnpjvend"])){
    header("Location:listavendedores.php");
}
else{
    include_once '../../bancoDeDados.php';
    $conexao = conectar();
    $sql = "SELECT * FROM vendedor WHERE cpf_cnpj_vend = :cpf_cnpjvend";
    $comandoPreparado = $conexao->prepare($sql);
    
    $comandoPreparado->bindParam(":cpf_cnpjvend", $_REQUEST["cpf_cnpjvend"]);
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
    <title>Vendedores - Techstore</title>
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
     <h2 style="font-size: 240%;">Atualizar dados de <?php  echo $resultado["nome_vend"];?></h2>
     
     <div class="row">
      <form class="col s12" action="atualizavendedor.php" method="POST">
      <div class="row">
          <div class="input-field col s6">
            <input id="first_name" type="text" class="validate" name="nomevendedor" value="<?php  echo $resultado["nome_vend"];?>" required>
            <label for="first_name">Nome</label>
          </div>
          <div class="input-field col s6">
            <input id="last_name" type="number" min='0' class="validate" name="cpfvendedor" value="<?php  echo $resultado["cpf_cnpj_vend"];?>" required>
            <label for="last_name">CPF ou CNPJ</label>
          </div>
        </div>
  
        <div class="row">
          <button class="btn waves-effect waves-light grey darken-2" type="submit" name="action">Atualizar
          </button>
          <a href="listavendedores.php" class='btn waves-effect waves-light grey darken-2'>Voltar</a>
        </div>
      </form>
    </div> 
       
    </div>


</body>
</html>