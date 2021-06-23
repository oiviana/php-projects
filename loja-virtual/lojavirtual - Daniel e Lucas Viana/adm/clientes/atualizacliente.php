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
    
    $sqlUpdate = "update cliente "
            . "set nome_cli = :nome,"
            . "cpf_cnpj_cli = :cpf,"
            . "numero_cli = :telefone,"
            . "bairro_cli = :bairro,"
            . "cidade_cli = :cidade, "
            . "cep_cli = :cep, "
            . "estado_cli = :estado, "
            . "endereco_cli = :endereco "
            . " where cpf_cnpj_cli = :cpf";
    //echo $sqlUpdate;
    include_once '../../bancoDeDados.php';
    
    $conexaoBD = conectar();
    $sqlPreparado = $conexaoBD->prepare($sqlUpdate);
        
    $sqlPreparado->bindParam(":nome", $nome);
    $sqlPreparado->bindParam(":cpf", $cpf);
    $sqlPreparado->bindParam(":telefone", $telefone);
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

header("Location:listaclientes.php");
?>    
