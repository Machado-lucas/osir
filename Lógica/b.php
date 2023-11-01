<?php

$entrada = mostraOpcoesELeValor();
$lista = [];

while ($entrada != 0) {
    switch ($entrada) {
        case 1:
            $lista = adicionaValores($lista);
            break;
        case 2:
            listaOrdenada($lista);
            break;
        case 3:
            listaReversa($lista);
            break;
    
        case 0:
            echo "Saindo do programa...";
            exit();
            break;
    }

    $entrada = mostraOpcoesELeValor();
}

function mostraOpcoesELeValor () {
    $opcoes = "1 - Adicionar elemento
2 - Listas os elementos de forma crescente
3 - Listas os elementos de forma decrescente
0 - Sair do programa
\n";

    echo $opcoes;
    echo "Entre com um valor: ";
    $entrada = fgets(STDIN);

    return $entrada;
}


function adicionaValores ($lista = []) {
    echo "Entre com valores inteiros, digite 'parar' para parar esta função\n";

    while (true) {
        $entrada = inserirValores();
        $ehInteiro = verificaSeEhInteiro($entrada);

        if (trim($entrada) === "parar") {
            break; 
        }

        if (!$ehInteiro) {
            echo "Insira um valor inteiro.\n";
            continue; 
        }

        $lista[] = (int)$entrada;
    }

    return $lista;
}

function inserirValores () {
    $entrada = fgets(STDIN);
    return $entrada;
}

function verificaSeEhInteiro ($entrada) {
    $entrada = trim($entrada);

    if (preg_match('/^-?\d+$/', $entrada)) {
        return true;
    } 

    return false;
}

function listaOrdenada($lista) {
    $count = count($lista);
    for ($i = 0; $i < $count - 1; $i++) {
        for ($j = 0; $j < $count - $i - 1; $j++) {
            if ($lista[$j] > $lista[$j + 1]) {
                $temp = $lista[$j];
                $lista[$j] = $lista[$j + 1];
                $lista[$j + 1] = $temp;
            }
        }
    }

    echo "[" . implode(', ', $lista) . "]\n";
}

function listaReversa ($lista) {
    $count = count($lista);

    for ($i = 0; $i < $count - 1; $i++) {
        for ($j = $i + 1; $j < $count; $j++) {
            if ($lista[$i] < $lista[$j]) {
                $temp = $lista[$i];
                $lista[$i] = $lista[$j];
                $lista[$j] = $temp;
            }
        }
    }

    echo "[" . implode(', ', $lista) . "]\n";
}