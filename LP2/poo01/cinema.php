<?php

class Diretor {
	private $codigo_diretor;
	private $nome_diretor;

	function __construct($codigo_diretor, $nome_diretor) {
		$this->codigo_diretor = $codigo_diretor;
		$this->nome_diretor = $nome_diretor;
	}

	function getCodigoDiretor() {
		return $this->codigo_diretor;
	}

	function setCodigoDiretor($codigo_diretor) {
		$this->codigo_diretor = $codigo_diretor;
	}

	function getNomeDiretor() {
		return $this->nome_diretor;
	}

	function setNomeDiretor($nome_diretor) {
		$this->nome_diretor = $nome_diretor;
	}
}

class Filme {
	private $codigo_filme;
	private $nome_filme;
	private $ano_filme;
	private $categoria_filme;
	private $codigo_diretor;

	function __construct($codigo_filme, $nome_filme, $ano_filme, $categoria_filme, $codigo_diretor) {
		$this->codigo_filme = $codigo_filme;
		$this->nome_filme = $nome_filme;
		$this->ano_filme = $ano_filme;
		$this->categoria_filme = $categoria_filme;
		$this->codigo_diretor = $codigo_diretor;
	}

	function getCodigoFilme() {
		return $this->codigo_filme;
	}

	function setCodigoFilme($codigo_filme) {
		$this->codigo_filme = $codigo_filme;
	}

	function getNomeFilme() {
		return $this->nome_filme;
	}

	function setNomeFilme($nome_filme) {
		$this->nome_filme = $nome_filme;
	}

	function getAnoFilme() {
		return $this->ano_filme;
	}

	function setAnoFilme($ano_filme) {
		$this->ano_filme = $ano_filme;
	}

	function getCategoriaFilme() {
		return $this->categoria_filme;
	}

	function setCategoriaFilme($categoria_filme) {
		$this->categoria_filme = $categoria_filme;
	}

	function getCodigoDiretor() {
		return $this->codigo_diretor;
	}

	function setCodigoDiretor($codigo_diretor) {
		$this->codigo_diretor = $codigo_diretor;
	}
}


class Sala {
	private $numero_sala;
	private $descricao_sala;
	private $capacidade_sala;

	function __construct($numero_sala, $descricao_sala, $capacidade_sala) {
		$this->numero_sala = $numero_sala;
		$this->descricao_sala = $descricao_sala;
		$this->capacidade_sala = $capacidade_sala;
	}

	function getNumeroSala() {
		return $this->numero_sala;
	}

	function setNumeroSala($numero_sala) {
		$this->numero_sala = $numero_sala;
	}

	function getDescricaoSala() {
		return $this->descricao_sala;
	}

	function setDescricaoSala($descricao_sala) {
		$this->descricao_sala = $descricao_sala;
	}

	function getCapacidadeSala() {
		return $this->capacidade_sala;
	}

	function setCapacidadeSala($capacidade_sala) {
		$this->capacidade_sala = $capacidade_sala;
	}
}


class SalaFilme {
	private $numero_sala;
	private $data_salafilme;
	private $horario_salafilme;
	private $codigo_filme;

	function __construct($numero_sala, $data_salafilme, $horario_salafilme, $codigo_filme) {
		$this->numero_sala = $numero_sala;
		$this->data_salafilme = $data_salafilme;
		$this->horario_salafilme = $horario_salafilme;
		$this->codigo_filme = $codigo_filme;
	}

	function getNumeroSala() {
		return $this->numero_sala;
	}

	function setNumeroSala($numero_sala) {
		$this->numero_sala = $numero_sala;
	}

	function getDataSalaFilme() {
		return $this->data_salafilme;
	}

	function setDataSalaFilme($data_salafilme) {
		$this->data_salafilme = $data_salafilme;
	}

	function getHorarioSalaFilme() {
		return $this->horario_salafilme;
	}

	function setHorarioSalaFilme($horario_salafilme) {
		$this->horario_salafilme = $horario_salafilme;
	}

	function getCodigoFilme() {
		return $this->codigo_filme;
	}

	function setCodigoFilme($codigo_filme) {
		$this->codigo_filme = $codigo_filme;
	}
}

?>