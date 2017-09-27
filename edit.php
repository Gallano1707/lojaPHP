<?php
require_once 'init.php';
// resgata os valores do formulário
$name = isset($_POST['name']) ? $_POST['name'] : null;
$color = isset($_POST['color']) ? $_POST['color'] : null;
$price = isset($_POST['price']) ? $_POST['price'] : null;
$stardate = isset($_POST['stardate']) ? $_POST['stardate'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : null;
// validação (bem simples, mais uma vez)
if (empty($name) || empty($color) || empty($price) || empty($stardate) || empty($quantity) || empty($id));
{
    echo "Volte e preencha todos os campos";
    exit;
}
// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE products SET name = :name, color = :color, quantity = :quantity"
        . " price = :price, stardate = :stardate WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':color', $color);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':stardate', $stardate);
$stm->bindParam(':quantity', $quantity);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
if ($stmt->execute())
{
    header('Location: index.php');
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}