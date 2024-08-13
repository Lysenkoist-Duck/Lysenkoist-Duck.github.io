<?php

class Filme
{
    private $codigo;
    private $nome;
    private $ano;
    private $categoria;

    // Construtor da classe
    public function __construct($codigo, $nome, $ano, $categoria)
    {
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->ano = $ano;
        $this->categoria = $categoria;
    }

    // Métodos getters para obter os valores dos atributos
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getAno()
    {
        return $this->ano;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    // Métodos setters para modificar os valores dos atributos
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setAno($ano)
    {
        $this->ano = $ano;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
}

// Exemplo de uso da classe
$filme = new Filme(1, "O Filme", 2022, "Ação");

// Obtendo informações do filme
echo "Código: " . $filme->getCodigo() . "<br>";
echo "Nome: " . $filme->getNome() . "<br>";
echo "Ano: " . $filme->getAno() . "<br>";
echo "Categoria: " . $filme->getCategoria() . "<br>";

// Modificando informações do filme
$filme->setAno(2023);
$filme->setCategoria("Comédia");

// Exibindo as informações atualizadas
echo "<br>Informações atualizadas do filme:<br>";
echo "Ano: " . $filme->getAno() . "<br>";
echo "Categoria: " . $filme->getCategoria() . "<br>";

?>