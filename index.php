<?php 
require 'Cart.php';
require 'Produto.php';
session_start();


$produtos = [
    1 => ['id' => 1, 'nome' => 'geladeira', 'valor' => 2000, 'quantidade' => 1],
    2 => ['id' => 2, 'nome' => 'monitor', 'valor' => 500, 'quantidade' => 1],
    3 => ['id' => 3, 'nome' => 'teclado', 'valor' => 100, 'quantidade' => 1],
    4 => ['id' => 4, 'nome' => 'mouse', 'valor' => 100, 'quantidade' => 1],
  ];
if(isset($_GET["id"])){
    $id =strip_tags($_GET["id"]);
    $produtoInfo=$produtos[$id];
    $produto = new Produto;
    $produto->setId($produtoInfo['id']);
    $produto->setNome($produtoInfo['nome']);
    $produto->setValor($produtoInfo['valor']);
    $produto->setQuantidade($produtoInfo['quantidade']);
    $cart = new Cart;
    $cart->add($produto);
}
var_dump($_SESSION['cart']);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta nome="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
</head>
<body>
    <ul>
        <li>Geladeira <a href="?id=1">Add</a>R$2000</li>
        <li>Monitor <a href="?id=2">Add</a>R$500</li>
        <li>Teclado <a href="?id=3">Add</a>R$100</li>
        <li>Mouse <a href="?id=4">Add</a>R$30</li>
    </ul>
</body>
</html>