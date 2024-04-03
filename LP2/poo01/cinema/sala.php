<?php
class Sala {
	private $numero_sala;
	private $descricao_sala;
	private $capacidade_sala;

	function __construct($descricao_sala, $capacidade_sala, $numero_sala = null) {
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
?>