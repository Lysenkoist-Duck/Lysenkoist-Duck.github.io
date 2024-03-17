<?php
$moedas = array("R$", "£", "€", "¥");
$moeda = $moedas[array_rand($moedas)];
// echo "moeda é $moeda<br>";


class ContaBanco {
	protected $numConta;
	private $tipo;
	private $dono;
	protected $saldo;
	protected $status;

	public function __construct($dono, $numConta = null) {
		$this->dono = $dono;
		$this->numConta = ($numConta) ? $numConta : rand(0, 9) . rand(0, 9) . rand(0, 9) . "." . rand(0, 9) . rand(0, 9) . rand(0, 9) . "." . rand(0, 9) . rand(0, 9) . rand(0, 9). "-" . rand(0, 9);
		$this->tipo = null;
		$this->saldo = 0;
		$this->status = false;
	}

	// Getters & Setters
	public function getNumConta() {
		return $this->numConta;
	}

	public function setNumConta($numConta) {
		$this->numConta = $numConta;
	}

	public function getTipo() {
		return $this->tipo;
	}

	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}

	public function getDono() {
		return $this->dono;
	}

	public function setDono($dono) {
		$this->dono = $dono;
	}

	public function getSaldo() {
		return $this->saldo;
	}

	public function getStatus() {
		return $this->status;
	}
	
	public function abrirConta($tipo) {
		$this->tipo = $tipo;
		
		if ($tipo == 'CC') {  // Conta Corrente
			$this->saldo = 50;
		}
		elseif ($tipo == 'CP') {  // Conta Paupança
			$this->saldo = 100;
		}
	}

	public function fecharConta() {
		global $moeda;
		if ($this->saldo == 0) {
			$this->desativarConta();
		} else {
			echo "A conta não pode ser fechada, o saldo é diferente de {$moeda} 0.<br>";
		}
	}

	public function depositar($valor) {
		global $moeda;
		if ($this->status) {
			$this->saldo += $valor;
			echo "Depósito de valor {$moeda}{$valor} efetuado com sucesso.<br>";
		} else {
			echo "A conta está desativada, não é possível depositar.<br>";
		}
	}

	public function sacar($valor) {
		global $moeda;
		if ($this->status) {
			if ($this->saldo >= $valor) {
				$this->saldo -= $valor;
				echo "Saque de valor {$moeda}{$valor} efetuado com sucesso.<br>";
			} else {
				echo "Saldo insuficiente.<br>";
			}
		} else {
			echo "A conta está desativada, não é possível sacar.<br>";
		}
	}

	public function pagarMensal() {
		global $moeda;
		$mensalidade = ($this->tipo == 'CC') ? 10 : 12;

		if (!$this->status) {
			echo "A conta está desativada, não é possível pagar a mensalidade.<br>";
		}
		elseif ($this->saldo <= $mensalidade) {
			echo "Saldo insuficiente, não é possível pagar a mensalidade.<br>";
		}
		else {
			$this->saldo -= $mensalidade;
			echo "Mensalidade de valor {$moeda}{$mensalidade} paga com sucesso.<br>";
		}
	}

	public function ativarConta() {
		if ($this->status) {
			echo "A conta já está ativada, да блин!<br>";
		}
		else {
			$this->status = true;
			echo "A conta foi ativada com sucesso.<br>";
		}
	}

	protected function desativarConta() {
		global $moeda;
		if (!$this->status) {
			echo "A conta já foi desativada, да блин!<br>";
		}
		elseif ($this->saldo > 0) {
			echo "A conta não pode ser desativada, pois o saldo está positivo, saque {$moeda}{$this->getSaldo()} para poder desativar a conta.<br>";
		}
		elseif ($this->saldo < 0) {
			echo "A conta não pode ser desativada, pois o saldo está negativo, deposite {$moeda}{$this->getSaldo()} para poder desativar a conta.<br>";
		}
		else {
			$this->status = false;
			echo "A conta foi desativada com sucesso.<br>";
		}
	}

	public function imprimirSaldo() {
		global $moeda;
		if ($this->status) {
			echo "O saldo na conta é de: {$moeda}{$this->getSaldo()}<br>";
		} else {
			echo "A conta está desativada, não é possível imprimir o saldo.<br>";
		}
	}
}


// Exemplo de uso #1
// Antes de ativar a conta:
echo "Exemplo da conta do Bob da Silva:<br>";
$contaBob = new ContaBanco("Bob da Silva");
echo "Conta de número: " . $contaBob->getNumConta() . '<br>';
$contaBob->abrirConta("CP");
echo "Conta de tipo: " . $contaBob->getTipo() . "<br>";
echo "Dono da conta: " . $contaBob->getDono() . '<br><br>';

echo "<br>~~ANTES DA ATIVAÇÃO DA CONTA~~<br>";
echo "Tentativa de imprimir o saldo da conta:<br>";
$contaBob->imprimirSaldo();
// echo "Saldo na conta: " . $contaBob->getSaldo() . "<br>";
echo "Tentativa de depósito no valor de {$moeda}200:<br>";
$contaBob->depositar(200);
echo "Tentativa de saque no valor de {$moeda}50000:<br>";
$contaBob->sacar(50000);
echo "Tentativa de saque no valor de {$moeda}50:<br>";
$contaBob->sacar(50);
$contaBob->pagarMensal();

// Depois de ativar a conta:
echo "<br>~~DURANTE E APÓS A ATIVAÇÃO DA CONTA~~<br>";
echo "Tentativa de ativação de conta:<br>";
$contaBob->ativarConta();
echo "Tentativa de ativação de conta:<br>";
$contaBob->ativarConta();
$contaBob->imprimirSaldo();
echo "Tentativa de depósito no valor de {$moeda}300:<br>";
$contaBob->depositar(300);
echo "Tentativa de imprimir o saldo da conta:<br>";
$contaBob->imprimirSaldo();
echo "Tentativa de saque no valor de {$moeda}50000:<br>";
$contaBob->sacar(50000);
$contaBob->imprimirSaldo();
echo "Tentativa de saque no valor de {$moeda}50:<br>";
$contaBob->sacar(50);
$contaBob->imprimirSaldo();
$contaBob->pagarMensal();
echo "Tentativa de imprimir o saldo da conta:<br>";
$contaBob->imprimirSaldo();

// Exemplo 2: Deutsch Stinkt Edition
echo "<br><br>Exemplo da conta da Agostinha Slavostć:<br>";
$contaAgostinha = new ContaBanco("Agostinha Slavostć");  // Clériga
echo "Conta de número: " . $contaAgostinha->getNumConta() . '<br>';
$contaAgostinha->abrirConta("CC");
echo "Conta de tipo: " . $contaAgostinha->getTipo() . "<br>";
echo "Dono da conta: " . $contaAgostinha->getDono() . '<br><br>';
$contaAgostinha->ativarConta();
$contaAgostinha->imprimirSaldo();
echo "Tentativa de depósito no valor de {$moeda}500:<br>";
$contaAgostinha->depositar(500);
$contaAgostinha->imprimirSaldo();
echo "Tentativa de saque no valor de {$moeda}345:<br>";
$contaAgostinha->sacar(345);
$contaAgostinha->imprimirSaldo();
$contaAgostinha->pagarMensal();
$contaAgostinha->imprimirSaldo();
$contaAgostinha->fecharConta();
echo "Tentativa de saque no valor de {$moeda}200:<br>";
$contaAgostinha->sacar(200);
echo "Tentativa de saque no valor de {$moeda}195:<br>";
$contaAgostinha->sacar(195);
$contaAgostinha->imprimirSaldo();
echo "Tentativa de fechamento de conta:<br>";
$contaAgostinha->fecharConta();
echo "Tentativa de fechamento de conta:<br>";
$contaAgostinha->fecharConta();
?>
