<?php 
require 'Produto.php';
require 'Cart.php';

session_start();

$cart= new Cart();
$produtosInCart=$cart->getCart();

if (isset($_GET['id'])) {
  $id = strip_tags($_GET['id']);
  $cart->remove($id);
  header('Location: mycart.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Carrinho</title>
</head>
<body>
<ul>
    <?php if (count($produtosInCart) <= 0) : ?>
      Nenhum produto no carrinho
    <?php endif; ?>

  <?php foreach ($produtosInCart as $produto) : ?>
    <li>
      <?php echo $produto->getNome(); ?>
      <input type="text" value="<?php echo $produto->getQuantidade() ?>">
      Valor: R$ <?php echo number_format($produto->getValor(), 2, ',', '.') ?>
      Subtotal: R$ <?php echo number_format($produto->getValor() * $produto->getQuantidade(), 2, ',', '.') ?>
      <a href="?id=<?php echo $produto->getId(); ?>">remove</a>
    </li>
  <?php endforeach; ?>
    <li>Total: R$ <?php echo number_format($cart->getTotal(), 2, ',', '.'); ?></li>
  </ul>
</body>
</html>
