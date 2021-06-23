<?php
if (!isset($_REQUEST["cpf_cnpj"])){
    header("Location:listatrans.php");
}
else{
    include_once '../../bancoDeDados.php';
    $conexao = conectar();
    $sql = "SELECT * FROM transportadora WHERE cpf_cnpj_trans = :cpf_cnpj";
    $comandoPreparado = $conexao->prepare($sql);
    
    $comandoPreparado->bindParam(":cpf_cnpj", $_REQUEST["cpf_cnpj"]);
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
    <title>Transportadoras - Techstore</title>
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
     <h2 style="font-size: 240%;">Atualizar dados de <?php  echo $resultado["nome_trans"];?></h2>
     
     <div class="row">
      <form class="col s12" action="atualizatransportadora.php" method="POST">
        <div class="row">
          <div class="input-field col s6">
            <input id="first_name" type="text" class="validate" name="nome"  value="<?php  echo $resultado["nome_trans"];?>" required>
            <label for="first_name">Nome</label>
          </div>
          <div class="input-field col s6">
            <input id="last_name" type="number" min='0' class="validate" name="cpf" value="<?php  echo $resultado["cpf_cnpj_trans"];?>" required>
            <label for="last_name">CPF ou CNPJ</label>
          </div>
        </div>
    
        <div class="row">
          
          <div class="input-field col s6">
            <input id="first_name" type="text" class="validate" name="estado" value="<?php  echo $resultado["estado_trans"];?>" required>
            <label for="first_name">Estado</label>
          </div>
          <div class="input-field col s6">
            <input id="first_name" type="text" class="validate" name="cidade" value="<?php  echo $resultado["cidade_trans"];?>" required>
            <label for="first_name">Cidade</label>
          </div>
        </div>
        </div>
        <div class="row">
          
      
        <div class="row">
          <div class="input-field col s6">
            <input id="first_name" type="text" class="validate" name="endereco" value="<?php  echo $resultado["endereco_trans"];?>" required>
            <label for="first_name">Endereço</label>
          </div>
          <div class="input-field col s6">
            <input id="first_name" type="text" class="validate" name="bairro" value="<?php  echo $resultado["bairro_trans"];?>" required>
            <label for="first_name">Bairro</label>
          </div>
        
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input id="last_name" type="number" min='0' class="validate" name="cep" value="<?php  echo $resultado["cep_trans"];?>" required>
            <label for="last_name">CEP</label>
          </div>
          <div class="input-field col s6">
            <input id="last_name" type="number" min='0' class="validate" name="numero" value="<?php  echo $resultado["numero_trans"];?>" required>
            <label for="last_name">Número</label>
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