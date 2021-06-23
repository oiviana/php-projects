<?php
 include_once '../../bancoDeDados.php';

if (isset($_POST["nome"]) && 
    isset($_POST["descri"]) &&
    isset($_POST["valor"]) && 
    isset($_POST["quantidade"]) &&
    isset($_POST["codigo"]) &&
    isset($_POST["peso"]) &&
    isset($_POST["dimen"]) &&
    isset($_POST["unidade"]) && 
    isset($_POST["categoriaprod"]) &&
    isset($_FILES["imgprincipal"])){
    $nome = $_POST["nome"];
    $descri = $_POST["descri"];
    $valor = $_POST["valor"];
    $quantidade = $_POST["quantidade"];
    $codigo = $_POST["codigo"];
    $peso = $_POST["peso"];
    $dimen = $_POST["dimen"];
    $unidade = $_POST["unidade"];
    $categoriaprod = $_POST["categoriaprod"];
    $imgprincipal = $_FILES["imgprincipal"];
    
    //tratar a imagem
    $extensao = strtolower(substr($_FILES['imgprincipal']['name'], -4)); //Pegar extensão
    $novo_nome = md5(time()) . $extensao; //nome do arquivo sem repetições
    $diretorio = "../imgupload/"; //diretório de destino

    move_uploaded_file($_FILES['imgprincipal'] ['tmp_name'], $diretorio.$novo_nome); //Joga o arquivo no diretório específico


    
    $sql = "insert into produto"
            . "(codigo_prod,nome_pro,descricao,valor_unitario,quantidade,peso,dimensoes,unidade_Venda,id,imgprincipal) "
            . "values ('$codigo','$nome','$descri','$valor','$quantidade','$peso','$dimen','$unidade','$categoriaprod','$novo_nome')";
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
header("Location: listaprodutos.php");

?>    