<?php

class MinhaClasse
{
    // Método que soma dois números e retorna o resultado
    public function somar($a, $b)
    {
        $resultado = $a + $b;
        return $resultado;
    }
}

// Criar uma instância da classe
$minhaInstancia = new MinhaClasse();

// Definir valores para x e y
$x = 5;
$y = 3;

// Chamar o método somar
$resultadoSoma = $minhaInstancia->somar($x, $y);

// Imprimir o resultado
echo "A soma de x e y é: " . $resultadoSoma;

?>