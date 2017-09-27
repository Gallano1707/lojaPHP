<?php
require 'init.php';
// pega o ID da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
// valida o ID
if (empty($id)) {
    echo "ID para alteração não definido";
    exit;
}
// busca os dados do usuário a ser editado
$PDO = db_connect();
$sql = "SELECT name, color, price, stardate, quantity FROM products WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$products = $stmt->fetch(PDO::FETCH_ASSOC);
// se o método fetch() não retornar um array, significa que o ID não corresponde 
// a um usuário válido
if (!is_array($products)) {
    echo "Nenhum usuário encontrado";
    exit;
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edição de Usuário</title>
    </head>
    <body>
        <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <script src="bootstrap/js/npm.js" type="text/javascript"></script>
        <div class="contaneir">
                <h1>Sistema de Cadastro</h1>
                <h2>Edição de Usuário</h2>
                <form action="edit.php" method="post">
                    <label for="name">Nome: </label>
                    <br>
                    <input type="text" name="name" id="name" value="<?php echo $products['name'] ?>">
                    <br><br>
                    <label for="color">Cor: </label>
                    <br>
                    <input type="text" name="color" id="color" value="<?php echo $products['color'] ?>">
                    <br><br>
                    <label for="stardate">Data de Inicio de Renda: </label>
                    <br>
                    <input type="date" name="stardate" id="stardate" value="<?php echo $products['stardate'] ?>">
                    <br><br>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="submit" value="Alterar">
                    </div>
                </form>
                </body>
                </html>