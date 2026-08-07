<?php

require __DIR__ . '/vendor/autoload.php';

use Tchuby\AppCarrinhoCompras\Carrinho;

$carrinho = new Carrinho();
echo 'Carrinho: ';
print_r($carrinho->exibirItens());
echo "<br />";
echo 'Valor total: ' . $carrinho->exibirValorTotal();
echo "<br />";
echo 'Estado: ' . $carrinho->exibirStatus();

// $carrinho->adicionarItem('Bicicleta', 750.10);
// $carrinho->adicionarItem('Geladeira', 1950.15);
// $carrinho->adicionarItem('Tapete', 350.00);

echo "<br />";
echo "<br />";
echo 'Carrinho: ';
print_r($carrinho->exibirItens());
echo "<br />";
echo 'Valor total recalculado: ' . $carrinho->exibirValorTotal();
echo "<br />";
echo 'Estado: ' . $carrinho->exibirStatus();


echo "<br />";
echo "<br />";
if ($carrinho->confirmarPedido()) {
    echo 'Pedido realizado com sucesso';
} else {
    echo 'Erro na confirmação do pedido. Carrinho não possui itens.';
}

echo "<br />";
echo 'Estado: ' . $carrinho->exibirStatus();
