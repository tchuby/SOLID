<?php

require __DIR__ . '/vendor/autoload.php';

use Tchuby\AppCarrinhoCompras\Carrinho;
use Tchuby\AppCarrinhoCompras\Item;
use Tchuby\AppCarrinhoCompras\Pedido;
use Tchuby\AppCarrinhoCompras\EmailService;
use Tchuby\AppCarrinhoCompras\EstadosPedido;

echo "<h3>Meu Carrinho:</h3><br/>";


$item1 = new Item();
$item1->setDescricao('Mini Pc Wifi');
$item1->setValor(160.00);

$item2 = new Item();
$item2->setDescricao('Monitor 34"');
$item2->setValor(230.00);

$carrinho1 = new Carrinho();
$carrinho1->adicionarItem($item1);
$carrinho1->adicionarItem($item2);

$pedido = new Pedido($carrinho1);

echo "<pre>";
print_r($pedido);
echo "</pre>";

echo "<pre>";
print_r($pedido->pegarCarrinho()->getItens());
echo "</pre>";

echo "<pre>";
echo "<h4>Valor do Pedido</h4>";
print_r($pedido->pegarEstado() . ' ');
print_r($pedido->pegarValorPedido());
echo "</pre>";

$pedido->confirmar();
if ($pedido->pegarEstado() == EstadosPedido::PENDENTE) {
    EmailService::dispararEmail();
}

echo "<pre>";
echo "<h4>Valor do Pedido</h4>";
print_r($pedido->pegarEstado() . ' ');
print_r($pedido->pegarValorPedido());
echo "</pre>";
