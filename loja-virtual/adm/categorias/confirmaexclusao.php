<?php
    $inputCodigo = $_REQUEST["id"];
    include_once '../../bancoDeDados.php';
    $conexao = conectar();
    $sql = "SELECT * FROM produto where id =".$inputCodigo." limit 1";
    $resultado = $conexao->query($sql);
    if(count($resultado->fetchAll()) != 0){
        echo'<h1 style="text-align:center;">Não é possível excluir. Essa categoria está sendo usada em um cadastro!</h1> <br>';
        echo'<a href ="listacategoria.php"  style="text-align:center;" >Voltar</a>'; 
    }
    else
    {
        $sql = "DELETE FROM categoria WHERE id =".$inputCodigo; 
        $conexao->query($sql);
        header("Location:listacategoria.php"); 
    }
?>
