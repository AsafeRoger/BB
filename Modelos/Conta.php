<?php 

    class Conta {

        protected $saldo; 
        Private $nome; 
        private $cpf; 
        private $senha;
        private $chavePix;

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
         * Get the value of senha
         */ 
        public function getSenha()
        {
                return $this->senha;
        }

        /**
         * Set the value of senha
         *
         * @return  self
         */ 
        public function setSenha($senha)
        {
                $this->senha = $senha;

                return $this;
        }

        /**
         * Get the value of cpf
         */ 
        public function getCpf()
        {
                return $this->cpf;
        }

        /**
         * Set the value of cpf
         *
         * @return  self
         */ 
        public function setCpf($cpf)
        {
                $this->cpf = $cpf;

                return $this;
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