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