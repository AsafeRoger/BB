<?php

require_once("Modelos/Conta.php");
require_once("Modelos/ContaCorrente.php");
require_once("Modelos/ContaPoupanca.php");

// Contas existentes
$conta1 = new ContaPoupanca("Asafe", 1000, "1234567890");
$conta2 = new ContaCorrente("João Antonio", 500, "0987654321");

$contas = [$conta1, $conta2];

// Menu
$opcao = 0;
$contaLogada = null;  // Inicializa como null fora do loop

do {
    echo "\n-----------MENU-----------\n";
    echo "1- Logar Conta\n";
    echo "2- Fazer Pix\n";
    echo "3- Fazer Investimento\n";
    echo "4- Ver Extrato\n";
    echo "0- SAIR\n";
    $opcao = readline("Escolha a opção: ");

    switch ($opcao) {
        case 1:
            $nomeInserido = readline("Digite o nome: ");

            $contaLogada = null;
            foreach ($contas as $conta) {
                if ($conta->getNome() == $nomeInserido) {
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

                    // Encontrar conta destino
                    $contaDestino = null;
                    foreach ($contas as $conta) {
                        if ($conta->getChavePix() == $chavePixDestino) {
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
                    // Fazer investimento
                    $valorInvestido = readline("Quanto você deseja investir em Bitcoin? R$ ");
                    $contaLogada->investir($valorInvestido);

                    echo "Bitcoin investido: R$ " . $contaLogada->getInvestimento() . "\n";
                    echo "Rendimento de Bitcoin (5% ao ano): R$ " . $contaLogada->calcularRendimento() . "\n";
                } else {
                    echo "Contas Corrente não podem investir.\n";
                }
            } else {
                echo "Você precisa logar primeiro!\n";
            }
            break;

        case 4:
            if ($contaLogada) {
                echo "Extrato da conta de " . $contaLogada->getNome() . ":\n";
                echo "Saldo atual: R$ " . $contaLogada->getSaldo() . "\n";

                // Caso seja conta poupança
                if ($contaLogada instanceof ContaPoupanca) {
                    echo "Investimento em Bitcoin: R$ " . $contaLogada->getInvestimento() . "\n";
                    echo "Rendimento de Bitcoin (5% ao ano): R$ " . $contaLogada->calcularRendimento() . "\n";
                }

                // Caso seja conta corrente
                if ($contaLogada instanceof ContaCorrente) {
                    $destinatariosPix = $contaLogada->getDestinatariosPix();
                    if (count($destinatariosPix) > 0) {
                        echo "Você fez Pix para:\n";
                        foreach ($destinatariosPix as $destinatario) {
                            echo $destinatario . "\n";
                        }
                    } else {
                        echo "Você ainda não fez nenhum Pix.\n";
                    }
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


