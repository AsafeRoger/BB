<?php

    require_once("Conta.php"); 


    Class ContaPoupança extends Conta{

          private $investimento;
          


          /**
           * Get the value of investimento
           */ 
          public function getInvestimento()
          {
                    return $this->investimento;
          }

          /**
           * Set the value of investimento
           *
           * @return  self
           */ 
          public function setInvestimento($investimento)
          {
                    $this->investimento = $investimento;

                    return $this;
          }
    }