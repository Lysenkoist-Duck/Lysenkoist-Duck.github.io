<?php
class ConexaoMySQL {
	private $host;
	private $usuario;
	private $senha;
	private $banco;
	private $conexao;

	public function __construct($host, $usuario, $senha, $banco) {
		$this->host = $host;
		$this->usuario = $usuario;
		$this->senha = $senha;
		$this->banco = $banco;

		$this->conectar();
	}

	public function conectar() {
		$this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);
	
		if ($this->conexao->connect_error) {
            die("Erro na conexão: " . $this->conexao->connect_error);
        }
	}


	public function query($sql) {
		$resultado = $this->conexao->query($sql);

		echo "Resultado: " . $resultado . "<br>";

		if (!$resultado) {
            die("Erro na consulta: " . $this->conexao->error);
        }
	}

	public function fecharConexao()
    {
        $this->conexao->close();
    }
}

$conexao = new ConexaoMySQL("localhost", "root", "", "BDCinema");
?>