<?php 
class Produto {
private int $id;
private string $nome;
private int $valor;
private int $quantidade;

public function setId(int $id){
    $this->id = $id;
}
public function getId(){
    return $this->id;
}
public function setNome(string $nome){
    $this->nome = $nome;
}
public function getNome(){
    return $this->nome;
}
public function setValor(int $valor){
    $this->valor=$valor;
}
public function getValor(){
    return $this->valor;
}
public function getquantidade(){
    return $this->quantidade;
}  
public function setQuantidade(int $quantidade){
    $this->quantidade = $quantidade;
}
}


