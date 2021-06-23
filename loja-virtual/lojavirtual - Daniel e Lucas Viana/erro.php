<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>
        <?php
        if(isset($_GET["msgerro"])){
           echo $_GET["msgerro"];
        }
        else{
            echo "Erro geral.";
        }
        ?>           
        </h2>
        <br>
            <a href="javascript:history.back()">Voltar</a>
    </body>
</html>
