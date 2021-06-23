<?php
/*
 * 1 - receber parametros do form
 * 2 - conectar no BD
 * 3 - escrever o comando update em sql
 * 4 - executar o o comando
 * 5 - fechar a conexao
 * 6 - voltar para a lista
 */

if (isset($_POST["nome"]) && 
    isset($_POST["cpf"]) &&
    isset($_POST["numero"]) && 
    isset($_POST["endereco"]) &&
    isset($_POST["estado"]) &&
    isset($_POST["cidade"]) &&
    isset($_POST["cep"]) && 
    isset($_POST["bairro"])){
   
     $nome = $_POST["nome"];
     $cpf = $_POST["cpf"];
     $numero = $_POST["numero"];
     $endereco = $_POST["endereco"];
     $estado = $_POST["estado"];
     $cidade = $_POST["cidade"];
     $cep = $_POST["cep"];
     $bairro = $_POST["bairro"];
    
    $sqlUpdate = "update transportadora "
            . "set nome_trans = :nome,"
            . "cpf_cnpj_trans = :cpf,"
            . "numero_trans = :numero,"
            . "bairro_trans = :bairro,"
            . "cidade_trans = :cidade, "
            . "cep_trans = :cep, "
            . "estado_trans = :estado, "
            . "endereco_trans = :endereco "
            . " where cpf_cnpj_trans = :cpf";
    //echo $sqlUpdate;
    include_once '../../bancoDeDados.php';
    
    $conexaoBD = conectar();
    $sqlPreparado = $conexaoBD->prepare($sqlUpdate);
        
    $sqlPreparado->bindParam(":nome", $nome);
    $sqlPreparado->bindParam(":cpf", $cpf);
    $sqlPreparado->bindParam(":numero", $numero);
    $sqlPreparado->bindParam(":endereco", $endereco);
    $sqlPreparado->bindParam(":estado", $estado);
    $sqlPreparado->bindParam(":cidade", $cidade);
    $sqlPreparado->bindParam(":cep", $cep);
    $sqlPreparado->bindParam(":bairro", $bairro);
    //iniciar uma transação atómica
    $conexaoBD->beginTransaction();
    $resultado = $sqlPreparado->execute();
    // efetivar a transação
    $conexaoBD->commit();
    $resultado = null;
    $sqlPreparado = null;
    $conexaoBD = null;
}

header("Location:listatrans.php");
?>    
