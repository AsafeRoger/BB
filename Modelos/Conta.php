<?php

class Conta {
    protected $nome;
    protected $saldo;
    protected $chavePix;

    public function __construct($nome, $saldo, $chavePix) {
        $this->nome = $nome;
        $this->saldo = $saldo;
        $this->chavePix = $chavePix;
    }


    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of saldo
     */ 
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * Set the value of saldo
     *
     * @return  self
     */ 
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;

        return $this;
    }

    /**
     * Get the value of chavePix
     */ 
    public function getChavePix()
    {
        return $this->chavePix;
    }

    /**
     * Set the value of chavePix
     *
     * @return  self
     */ 
    public function setChavePix($chavePix)
    {
        $this->chavePix = $chavePix;

        return $this;
    }
}
