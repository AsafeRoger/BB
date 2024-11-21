<?php

require_once("Conta.php");
require_once("IPix.php");

class ContaCorrente extends Conta implements IPix {

    public function Pix($valor, $contaDestino) {
        if ($valor <= 0) {
            echo "Valor inválido para o Pix.\n";
            return;
        }

        if ($this->saldo >= $valor) {
            // Deduz do saldo da conta de origem
            $this->setSaldo($this->saldo - $valor);
            // Adiciona o valor à conta destino
            $contaDestino->setSaldo($contaDestino->getSaldo() + $valor);
            echo "Pix de R$ $valor realizado com sucesso para {$contaDestino->getNome()}.\n";
        } else {
            echo "Saldo insuficiente.\n";
        }
    }
}
