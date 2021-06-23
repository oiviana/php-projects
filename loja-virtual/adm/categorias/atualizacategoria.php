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
    isset($_POST["id"])){
   
     $nome = $_POST["nome"];
     $id = $_POST["id"];

    $sqlUpdate = "UPDATE categoria SET "
            . "nome = :nome "
            . "where id = :id";
    include_once '../../bancoDeDados.php';
    
    $conexaoBD = conectar();
    $sqlPreparado = $conexaoBD->prepare($sqlUpdate);
        
    $sqlPreparado->bindParam(":nome", $nome);
    $sqlPreparado->bindParam(":id", $id);
    echo $sqlUpdate;
    
    //iniciar uma transação atómica
    $conexaoBD->beginTransaction();
    $resultado = $sqlPreparado->execute();
    // efetivar a transação
    $conexaoBD->commit();
    $resultado = null;
    $sqlPreparado = null;
    $conexaoBD = null;
}

header("Location:listacategoria.php");
?>    
