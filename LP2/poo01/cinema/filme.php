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