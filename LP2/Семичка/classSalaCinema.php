<?php

class SalaDeCinema
{
    // Atributos
    private $numero;
    private $descricao;
    private $capacidade;

    // Construtor
    public function __construct($numero, $descricao, $capacidade)
    {
        $this->numero = $numero;
        $this->descricao = $descricao;
        $this->capacidade = $capacidade;
    }

    // Método para obter número da sala
    public function getNumero()
    {
        return $this->numero;
    }

    // Método para obter descrição da sala
    public function getDescricao()
    {
        return $this->descricao;
    }

    // Método para obter capacidade da sala
    public function getCapacidade()
    {
        return $this->capacidade;
    }
}

?>