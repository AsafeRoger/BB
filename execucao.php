<?php

require_once("modelos/Conta.php");
require_once("modelos/ContaCorrente.php");
require_once("modelos/ContaPoupanca.php");

//Contas existentes no banco 

$conta1 = new Conta();
$conta1->setNome("Asafe");
$conta1->setSenha("asafe123");
$conta1->setCPF("123.234.345.56");
$poupança1 = new ContaPoupança;
$poupança1 ->setSaldo(10000);
$corrente1 = new ContaCorrente;
$corrente1 ->setSaldo(100000);
$contas[] = $conta1;

$conta2 = new Conta();
$conta2->setNome("João Antonio");
$conta2->setSenha("khateli123");
$conta2->setCPF("123.456.789.10");
$poupança2 = new ContaPoupança;
$poupança2 ->setSaldo(90000);
$corrente2 = new ContaCorrente;
$corrente2 ->setSaldo(200);
$contas[] = $conta2;




$opcao = 0;
do {
    echo "\n-----------MENU-----------\n";
    echo "1- Logar Conta\n";
    echo "2- Criar Conta\n";
    echo "0- SAIR\n";
    $opcao = readline("Escolha a opção: ");

    switch ($opcao) {
        case 0:
            echo "Programa encerrado!\n";
            break;
            $loginValido = false;
            while (!$loginValido) {
                $nomeInserido = readline("Digite o nome: ");
                $senhaInserida = readline("Digite sua senha: ");

                // Verifica as credenciais
                foreach ($contas as $conta) {
                    if ($conta->getNome() === $nomeInserido && $conta->getSenha() === $senhaInserida) {
                        echo "Login realizado com sucesso! Bem-vindo, {$conta->getNome()}!\n";
                        $loginValido = true;
                        break;
                    }
                }

                if (!$loginValido) {
                    echo "Nome ou senha inválidos.\n";
                    $tentarNovamente = readline("Deseja tentar novamente? (s/n): ");
                    if ($tentarNovamente !== 's') {
                        echo "Saindo...\n";
                        break;
                    }
                }
            }
            break;
            break;

        case 2:


            break;
        default:
    }
} while ($opcao != 0);
