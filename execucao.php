<?php

require_once("Modelos/Conta.php");
require_once("Modelos/ContaCorrente.php");
require_once("Modelos/ContaPoupanca.php");

// Criando algumas contas
$conta1 = new ContaPoupanca("Asafe", 1000, "1234567890"); // Conta 1
$conta2 = new ContaCorrente("João Antonio", 500, "0987654321"); // Conta 2

// Colocando as contas em um array
$contas = [$conta1, $conta2];

// Menu Principal
$opcao = 0;
do {
    echo "\n-----------MENU-----------\n";
    echo "1- Logar Conta\n";
    echo "2- Fazer Pix\n";
    echo "3- Fazer Investimento\n";
    echo "0- SAIR\n";
    $opcao = readline("Escolha a opção: ");

    switch ($opcao) {
        case 1:
            $nomeInserido = readline("Digite o nome: ");

            $contaLogada = null;
            foreach ($contas as $conta) {
                if ($conta->getNome() === $nomeInserido) {
                    $contaLogada = $conta;
                    break;
                }
            }

            if ($contaLogada) {
                echo "Bem-vindo!\n";
            } else {
                echo "Conta não encontrada.\n";
            }
            break;

        case 2:
            if ($contaLogada) {
                if ($contaLogada instanceof ContaCorrente) {
                    // Fazer Pix
                    $chavePixDestino = readline("Digite a chave Pix do destinatário: ");
                    $valorPix = readline("Digite o valor do Pix: ");

                    // Procurar a conta destino pela chave Pix
                    $contaDestino = null;
                    foreach ($contas as $conta) {
                        if ($conta->getChavePix() === $chavePixDestino) {
                            $contaDestino = $conta;
                            break;
                        }
                    }

                    if ($contaDestino) {
                        $contaLogada->Pix($valorPix, $contaDestino);
                    } else {
                        echo "Chave Pix não encontrada.\n";
                    }
                } else {
                    echo "Contas Poupança não podem fazer Pix.\n";
                }
            } else {
                echo "Você precisa logar primeiro!\n";
            }
            break;

        case 3:
            if ($contaLogada) {
                if ($contaLogada instanceof ContaPoupanca) {
                    // Fazer Investimento
                    $valorInvestido = readline("Quanto você deseja investir em Bitcoin? R$ ");
                    $contaLogada->investir($valorInvestido);

                    // Exibe o rendimento do Bitcoin
                    echo "Bitcoin investido: R$ " . $contaLogada->getInvestimento() . "\n";
                    echo "Rendimento de Bitcoin (5% ao ano): R$ " . $contaLogada->calcularRendimento() . "\n";
                } else {
                    echo "Contas Corrente não podem investir.\n";
                }
            } else {
                echo "Você precisa logar primeiro!\n";
            }
            break;

        case 0:
            echo "Programa encerrado!\n";
            break;

        default:
            echo "Opção inválida.\n";
            break;
    }
} while ($opcao != 0);
