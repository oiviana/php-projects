<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function conectar(){
	$dsn = "mysql:host=localhost;dbname=projetophp";
	$user = "root";
	$senha = "";
	$conn = new PDO($dsn,$user,$senha);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	return $conn;
}

Function erro_bd($erro) {
    $mensagem = $erro;
    if (stristr($erro,"primary")){
        $mensagem = "Atenção. Este registro já existe!";   
    }
    if (stristr($erro,"FOREIGN")){
        $mensagem = "Atenção. Outras informações "
                  . "dependem deste dado!";
    }
    return $mensagem;
}
?>