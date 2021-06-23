<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Produtos- Techstore</title>
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
     <h2 style="font-size: 270%;">Cadastrar Produto</h2>
     
     <div class="row">
      <form class="col s12" action="insereproduto.php" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="input-field col s6">
            <input id="first_name" type="text" class="validate" name="nome" required>
            <label for="first_name">Nome</label>
          </div>
          <div class="input-field col s6">
            <input id="last_name" type="text"  class="validate" name="descri" required>
            <label for="last_name">Descrição</label>
          </div>
        </div>
    
        <div class="row">
          <div class="input-field col s4">
            <input id="last_name" type="number" min='0' name="valor" class="validate" required>
            <label for="last_name">Valor Unitário (R$)</label>
          </div>
          <div class="input-field col s4">
            <input id="last_name" type="number" min='0' name="quantidade" class="validate" required>
            <label for="last_name">Quantidade</label>
          </div>
          <div class="input-field col s4">
            <input id="last_name" type="number" min='0' name="codigo" class="validate" required>
            <label for="last_name">Código</label>
          </div>
        
        </div>
        <div class="row">
          <div class="input-field col s4">
            <input id="last_name" type="number" min='0' name="peso" class="validate" required>
            <label for="last_name">Peso</label>
          </div>
          <div class="input-field col s4">
            <input id="first_name" type="text" class="validate" name="dimen" required>
            <label for="first_name">Dimensões</label>
          </div>
          <div class="input-field col s4">
            <input id="first_name" type="text" class="validate" name="unidade" required>
            <label for="first_name">Unidade Venda</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <select name="categoriaprod">
            <?php
             include_once '../../bancoDeDados.php';
             $conexao = conectar();
             $sql = "SELECT * FROM categoria order by nome";
             $resultado = $conexao->query($sql);
             foreach ($resultado as $categoria){             
             echo'<option value="'.$categoria["id"].'">'.$categoria["nome"].'</option>';
             }
            
            
            ?>
            </select>
            <label>Categoria</label>
          </div> 
        <div class="file-field input-field col s6">
          <div class="btn orange lighten-2">
            <span>Inserir Imagem</span>
            <input type="file" required name="imgprincipal">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>
        </div>
        <div class="row">
          <button class="btn waves-effect waves-light grey darken-2" type="submit" name="action">Cadastrar
          </button>
        </div>
      </form>
    </div> 
       
    </div>


</body>
</html>





















