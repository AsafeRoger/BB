<?php

require_once("Conta.php");

class ContaPoupanca extends Conta {

    private $investimento = 0;

    // Método para investir um valor, retirando-o do saldo principal
    public function investir($valor) {
        if ($valor > 0 && $this->saldo >= $valor) {
            $this->investimento += $valor;
            $this->saldo -= $valor; // Deduz do saldo principal
            echo "Investimento de R$ $valor realizado com sucesso!\n";
        } else {
            echo "Saldo insuficiente ou valor inválido para investimento.\n";
        }
    }

    // Método para calcular o rendimento diretamente
    public function calcularRendimento() {
        $percentualRendimento = 0.05; // 5% de rendimento
        return $this->investimento * $percentualRendimento;
    }

    /**
     * Get the value of investimento
     */ 
    public function getInvestimento()
    {
        return $this->investimento;


    }

       public function fazerPix($valor, $contaDestino) {
        echo "Conta poupança não pode realizar PIX.\n";
    }


}
