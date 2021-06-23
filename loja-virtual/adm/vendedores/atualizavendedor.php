<?php
/*
 * 1 - receber parametros do form
 * 2 - conectar no BD
 * 3 - escrever o comando update em sql
 * 4 - executar o o comando
 * 5 - fechar a conexao
 * 6 - voltar para a lista
 */

if (isset($_POST["nomevendedor"]) && 
    isset($_POST["cpfvendedor"]) ){
   
     $nomevend = $_POST["nomevendedor"];
     $cpfvend = $_POST["cpfvendedor"];
 
    
    $sqlUpdate = "update vendedor "
            . "set nome_vend = :nomevendedor,"
            . "cpf_cnpj_vend = :cpfvendedor"
            . " where cpf_cnpj_vend = :cpfvendedor";
    //echo $sqlUpdate;
    include_once '../../bancoDeDados.php';
    
    $conexaoBD = conectar();
    $sqlPreparado = $conexaoBD->prepare($sqlUpdate);
        
    $sqlPreparado->bindParam(":nomevendedor", $nomevend);
    $sqlPreparado->bindParam(":cpfvendedor", $cpfvend);

    //iniciar uma transação atómica
    $conexaoBD->beginTransaction();
    $resultado = $sqlPreparado->execute();
    // efetivar a transação
    $conexaoBD->commit();
    $resultado = null;
    $sqlPreparado = null;
    $conexaoBD = null;
}

header("Location:listavendedores.php");
?>    
