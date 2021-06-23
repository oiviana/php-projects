<?php

/*
 * 1 - receber parametros do form
 * 2 - conectar no BD
 * 3 - escrever o comando delete em sql
 * 4 - executar o o comando
 * 5 - fechar a conexao
 * 6 - voltar para a lista
 */

if (isset($_POST["cpf"])){
    $cpf = $_POST["cpf"];
    $sqlUpdate = "delete from transportadora "
            . " where cpf_cnpj_trans = :cpf";
    //echo $sqlUpdate;
    include_once '../../bancoDeDados.php';
    $conexaoBD = conectar();
    $sqlPreparado = $conexaoBD->prepare($sqlUpdate);
    
    $sqlPreparado->bindParam(":cpf", $cpf);
    //iniciar uma transação atómica
    try{
        $conexaoBD->beginTransaction();
        $resultado = $sqlPreparado->execute();
        // efetivar a transação
        $conexaoBD->commit();
        
        $resultado = null;
        $sqlPreparado = null;
        $conexaoBD = null;
        header("Location:listatrans.php");
    }
    catch (Exception $e){
     //$conexaoBD->roolback();
      header("Location:../../erro.php?msgerro=" 
              . erro_bd($e->getMessage()));
    }
    
}

?>    