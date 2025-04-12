<?php
function cal($itens) {
    if (count($itens) <= 1) {
        return [$itens];
    }

    $resultado = [];
    foreach ($itens as $chave => $valor) {
        $restante = $itens;
        array_splice($restante, $chave, 1);
        foreach (cal($restante) as $permutacao) {
            array_unshift($permutacao, $valor);
            $resultado[] = $permutacao;
        }
    }
    return $resultado;
}


$N = intval(trim(fgets(STDIN)));
$matrizConfianca = [];

for ($i = 0; $i < $N; $i++) {
    $matrizConfianca[] = array_map('intval', explode(' ', trim(fgets(STDIN))));
}

$permutacoes = cal(range(0, $N - 1));

$melhorOrdem = [];
$confimax = 0;

foreach ($permutacoes as $ordem) {
    $confi = 1;
    for ($i = 0; $i < $N; $i++) {
        $confi *= $matrizConfianca[$i][$ordem[$i]];
    }
    
    if ($confi > $confimax) {
        $confimax = $confi;
        $melhorOrdem = $ordem;
    }
}

$resultado = array_map(function($x) { return $x + 1; }, $melhorOrdem);
echo implode(' ', $resultado) . PHP_EOL;
?>