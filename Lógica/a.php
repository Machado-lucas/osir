<?php 

$entrada = mostraOpcoesELeValor();
$lista = [];

while ($entrada != 0) {
    switch ($entrada) {
        case 1:
            $lista = adicionaAoArray($lista);
            break;

        case 2: 
            print_r($lista);
            break;

        case 3:
            mostraQuantidadeDeElementos($lista);
            break;

        case 4:
            listaOrdemReversa($lista);
            break;
        case 5:
            $lista = excluiItemDaLista($lista);
            break;
        case 0:
            echo "Saindo do programa...";
            exit();
        case $entrada < 0:
            echo "Não aceitamos números negativos, tente novamente \n";
            break;

        default: 
            echo "Opção não encontrada, tente novamente \n";
            break;
    }

    $entrada = mostraOpcoesELeValor();
}

function mostraOpcoesELeValor () {
    $opcoes = "1 - Adicionar elemento
2 - Listas os elementos
3 - Ver quantidade de elementos registrados
4 - Listar elementos na ordem inversa
5 - Excluir elemento
0 - Sair do programa
\n";

    echo $opcoes;
    echo "Entre com um valor: ";
    $entrada = fgets(STDIN);

    return $entrada;
}

function adicionaAoArray ($lista) {
    echo "Digite um valor para adicionar ao array: ";
    $entrada = fgets(STDIN);
    array_push($lista, $entrada);
    return $lista;
}

function mostraQuantidadeDeElementos ($lista) {
    $quantidade = count($lista);
    echo "A quantidade de elementos do array: " . $quantidade . "\n";
}

function listaOrdemReversa ($lista) {
    $quantidade = count($lista);

    for ($i = $quantidade - 1; $i >= 0; $i--) {
        echo $lista[$i];
    }
}

function excluiItemDaLista($lista) {
    echo "Digite um valor para excluir do array: ";
    $itemParaExcluir = fgets(STDIN);

    return $lista = array_filter($lista, function ($elemento) use ($itemParaExcluir) {
        return $elemento !== $itemParaExcluir;
    });
}
