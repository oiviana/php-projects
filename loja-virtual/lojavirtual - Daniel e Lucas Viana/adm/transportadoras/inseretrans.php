<?php
 include_once '../../bancoDeDados.php';

if (isset($_POST["nome"]) && 
    isset($_POST["cpf"]) &&
    isset($_POST["endereco"]) &&
    isset($_POST["estado"]) &&
    isset($_POST["cidade"]) &&
    isset($_POST["cep"]) && 
    isset($_POST["bairro"]) &&
    isset($_POST["numero"])){
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $endereco = $_POST["endereco"];
    $estado = $_POST["estado"];
    $cidade = $_POST["cidade"];
    $cep = $_POST["cep"];
    $bairro = $_POST["bairro"];
    $numero = $_POST["numero"];
    
    $sql = "insert into transportadora"
            . "(cpf_cnpj_trans,nome_trans,endereco_trans,numero_trans,bairro_trans,cidade_trans,estado_trans,cep_trans) "
            . "values ('$cpf','$nome','$endereco','$numero','$bairro','$cidade','$estado','$cep')";
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