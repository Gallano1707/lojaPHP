<?php
require 'init.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro de Usuário</title>
    </head>
    <body>
        <h1>Sistema de Cadastro</h1>
        <h2>Cadastro de Usuário</h2>
        <form action="add.php" method="post">
            <label for="name">Nome: </label>
            <br>
            <input type="text" name="name" id="name">
            <br><br>
            <label for="cor">Cor: </label>
            <br>
            <input type="text" name="color" id="color">
            <br><br>
            <label for="stardate">Data de Inicio de Renda:</label>
            <br>
            <input type="date" name="stardate" id="stardate">
            <br><br>
            <label for="quantity">Quantidade:</label>
            <br>
            <input type="text" name="quantity" id="quantity">
            <br><br>
             <label for="price">Preço:</label>
             <br>
             <input type="text" name="price" id="price">
             <br><br>
            <input type="submit" value="Cadastrar">
        </form>
    </body>
</html>