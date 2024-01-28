<?php 
class Cart{
    public function add(Produto $produto){
        $inCart = false;
        $this->setTotal($produto);
        if (count($this->getCart())>0){
            foreach ($this->getCart() as $produtoInCart){
                if ($produtoInCart->getId() === $produto->getId()){
                    $quantidade = $produtoInCart->getQuantidade() + $produto->getQuantidade();
                    $produtoInCart->setQuantidade($quantidade);
                    $inCart = true;
                    break;
                }
            }
        }
        if (!$inCart){
            $this->setProdutosInCart($produto);
        }
    } 

    public function setProdutosInCart(Produto $produto){
        $_SESSION['cart']['produtos'][] = $produto;
    }

    private function setTotal(Produto $produto){
        $_SESSION['cart']['total'] += $produto->getValor()*$produto->getQuantidade();
    }

    public function getTotal(){
        return $_SESSION['cart']['total'] ?? 00;
    }

    public function remove(int $id){
        if (isset($_SESSION['cart']['produtos'])) {
            foreach ($this->getCart() as $index => $produto) {
                if ($produto->getId() === $id) {
                    unset($_SESSION['cart']['produtos'][$index]);
                    $_SESSION['cart']['total'] -= $produto->getValor() * $produto->getQuantidade();
                }
            }
        }
    }

    public function getCart(){
        return $_SESSION['cart']['produtos'] ?? [];
    }
}
