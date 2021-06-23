<?php
 include_once '../../bancoDeDados.php';

if (isset($_POST["nome"])){
    $nome = $_POST["nome"];    
    $sql = "insert into categoria"
            . "(nome) "
            . "values ('$nome')";
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