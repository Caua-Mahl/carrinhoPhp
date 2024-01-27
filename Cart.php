<?php 
class Cart{
    public function add(Produto $produto){
        $inCart = false;
        if (count($this->getCart())>0){
            foreach ($this->getCart() as $produtoInCart){
                if ($produtoInCart === $produto->getID()){
                    $quantidade = $produtoInCart->getQuantidade() + $produto->getQuantidade();
                    $produtoInCart->setQuantidade($quantidade);
                    $inCart = true;
                    break;
                }
            }
        }
        if (!$inCart){
            $this->setProdutoInCart($produto);
        }
    } 

    public function setProdutoInCart(Produto $produto){
        $_SESSION['cart']['produtos'] = $produto;
    }

    private function setTotal(Produto $produto){
        $_SESSION['cart']['total'] += $produto->getValor()*$produto->getQuantidade();
    }

    public function remove(Produto $produto){

    }

    public function getCart(){
        return $_SESSION['cart']['produtos'] ?? [];
    }
}
