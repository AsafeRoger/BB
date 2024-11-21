<?php

require_once("Conta.php");
require_once("IPix.php");

class ContaCorrente extends Conta implements IPix {

    private $destinatariosPix = [];


    public function Pix($valor, $contaDestino) {
        if ($valor <= 0) {
            echo "Valor inválido para o Pix.\n";
            return;
        }

        if ($this->saldo >= $valor) {
            //set q o saldo vai ser saldo menos valor do pix
            $this->setSaldo($this->saldo - $valor);
            //adiciona o saldo a conta destino 
            $contaDestino->setSaldo($contaDestino->getSaldo() + $valor);
            echo "Pix de R$ $valor realizado com sucesso para {$contaDestino->getNome()}.\n";
            $this->destinatariosPix[] = $contaDestino->getNome();
        
        } else {
            echo "Saldo insuficiente.\n";
        }
    }

    /**
     * Get the value of destinatariosPix
     */
    public function getDestinatariosPix()
    {
        return $this->destinatariosPix;
    }
}
