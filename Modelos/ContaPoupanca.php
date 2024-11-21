<?php

require_once("Conta.php");

class ContaPoupanca extends Conta {

    private $investimento = 0;

    //investe um valor tirando ele do saldo principal 
    public function investir($valor) {
        if ($valor > 0 && $this->saldo >= $valor) {
            $this->investimento += $valor;
            $this->saldo -= $valor; 
            echo "Investimento de R$ $valor realizado com sucesso!\n";
        } else {
            echo "Saldo insuficiente ou valor inválido para investimento.\n";
        }
    }

    //calcular quanto vai render ao ano 
    public function calcularRendimento() {
        $percentualRendimento = 0.05; 
        return $this->investimento * $percentualRendimento;
    }

    /**
     * Get the value of investimento
     */ 
    public function getInvestimento()
    {
        return $this->investimento;


    }




}
