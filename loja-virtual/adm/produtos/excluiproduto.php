<?php
$Codigo = $_REQUEST["codigo"];
include_once '../../bancoDeDados.php';
        $conexao = conectar(); 
        $sql = "DELETE FROM produto WHERE codigo_prod = '$Codigo'"; 
        $conexao->query($sql);
header("Location:listaprodutos.php");
?>