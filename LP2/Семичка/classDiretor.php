<?php

class Diretor
{
    // Atributos
    private $codigo_diretor;
    private $nome_diretor;

    // Construtor
    public function __construct($codigo_diretor, $nome_diretor)
    {
        $this->cod = $codigo_diretor;  # TODO: Make it get a list of the current codes so it can auto fix any error
        $this->nome = $nome_diretor;
    }

    // Método para obter codigo do diretor
    public function getCodigoDiretor()
    {
        return $this->cod;
    }

    // Método para obter nome do diretor
    public function getNome()
    {
        return $this->nome;
    }

    # TODO: Add code to make a method for saving it in the db

}

?>