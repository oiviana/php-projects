<?php
 include_once '../../bancoDeDados.php';

if (isset($_POST["nomevendedor"]) && 
    isset($_POST["cpfvendedor"])  ){
    $nomevend = $_POST["nomevendedor"];
    $cpfvend = $_POST["cpfvendedor"];

    
    $sql = "insert into vendedor"
            . "(cpf_cnpj_vend,nome_vend) "
            . "values ('$cpfvend','$nomevend')";
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