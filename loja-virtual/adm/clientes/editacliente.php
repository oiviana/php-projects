<?php
if (!isset($_REQUEST["cpf_cnpj"])){
    header("Location:listaclientes.php");
}
else{
    include_once '../../bancoDeDados.php';
    $conexao = conectar();
    $sql = "SELECT * FROM cliente WHERE cpf_cnpj_cli = :cpf_cnpj";
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
    <title>Clientes - Techstore</title>
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
     <h2 style="font-size: 240%;">Atualizar dados de <?php  echo $resultado["nome_cli"];?></h2>
     
     <div class="row">
      <form class="col s12" action="atualizacliente.php" method="POST">
        <div class="row">
          <div class="input-field col s6">
            <input id="first_name" type="text" class="validate" name="nome" value="<?php  echo $resultado["nome_cli"];?>" required>
            <label for="first_name">Nome</label>
          </div>
          <div class="input-field col s6">
            <input id="last_name" type="number" min='0' class="validate" name="cpf" value="<?php  echo $resultado["cpf_cnpj_cli"];?>" required>
            <label for="last_name">CPF ou CNPJ</label>
          </div>
        </div>
    
        <div class="row">
          <div class="input-field col s6">
            <input id="last_name" type="number" min='0' name="telefone" class="validate" value="<?php  echo $resultado["numero_cli"];?>" required>
            <label for="last_name">Telefone</label>
          </div>
          <div class="input-field col s6">
            <input id="first_name" type="text" class="validate" name="endereco" value="<?php  echo $resultado["endereco_cli"];?>" required>
            <label for="first_name">Endereço</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input id="first_name" type="text" class="validate" name="estado" value="<?php  echo $resultado["estado_cli"];?>" required>
            <label for="first_name">Estado</label>
          </div>
          <div class="input-field col s6">
            <input id="first_name" type="text" class="validate" name="cidade" value="<?php  echo $resultado["cidade_cli"];?>" required>
            <label for="first_name">Cidade</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input id="last_name" type="number" min='0' class="validate" name="cep" value="<?php  echo $resultado["cep_cli"];?>" required>
            <label for="last_name">CEP</label>
          </div>
          <div class="input-field col s6">
            <input id="first_name" type="text" class="validate" name="bairro" value="<?php  echo $resultado["bairro_cli"];?>" required>
            <label for="first_name">Bairro</label>
          </div>
        </div>
        <div class="row">
          <button class="btn waves-effect waves-light grey darken-2" type="submit" name="action">Atualizar
          </button>
          <a href="listaclientes.php" class='btn waves-effect waves-light grey darken-2'>Voltar</a>
        </div>
      </form>
    </div> 
       
    </div>


</body>
</html>