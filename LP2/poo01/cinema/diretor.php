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