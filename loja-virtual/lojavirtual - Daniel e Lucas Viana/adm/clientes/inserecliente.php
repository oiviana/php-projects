<?php
 include_once '../../bancoDeDados.php';

if (isset($_POST["nome"]) && 
    isset($_POST["cpf"]) &&
    isset($_POST["telefone"]) && 
    isset($_POST["endereco"]) &&
    isset($_POST["estado"]) &&
    isset($_POST["cidade"]) &&
    isset($_POST["cep"]) && 
    isset($_POST["bairro"])){
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $estado = $_POST["estado"];
    $cidade = $_POST["cidade"];
    $cep = $_POST["cep"];
    $bairro = $_POST["bairro"];
    
    $sql = "insert into cliente"
            . "(cpf_cnpj_cli,nome_cli,numero_cli,bairro_cli,cidade_cli,cep_cli,estado_cli,endereco_cli) "
            . "values ('$cpf','$nome','$telefone','$bairro','$cidade','$cep','$estado','$endereco')";
    $conexaoBD = conectar();
    try{
        $incluiu = $conexaoBD->query($sql); // realiza a operação de inclusão
        $conexaoBD = null;
    }
    catch (Exception $e){
          header("Location:./erro.php?msgerro=" 
                  . erro_bd($e->getMessage()));
    }
    
}
header("Location: ../index.html");

?>    