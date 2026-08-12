<?php

namespace Tchuby\AppCarrinhoCompras\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tchuby\AppCarrinhoCompras\Item;
use Tchuby\AppCarrinhoCompras\Carrinho;

class CarrinhoTest extends TestCase
{
    public function testDeveAdicionarItemEcalcularValorTotal()
    {
        $carrinho = new Carrinho();

        $item = new Item();
        $item->setDescricao('Livro de PHP');
        $item->setValor(50.0);

        $carrinho->adicionarItem($item);

        $this->assertTrue($carrinho->validarCarrinho());
        $this->assertEquals(50.0, $carrinho->pegarValorCarrinho());
    }

    #[DataProvider('dataValores')]
    public function testDevePegarValorTotalDoCarrinho($valor1, $valor2)
    {
        $carrinho = new Carrinho();
        $valorComparado = $valor1 + $valor2;

        $item1 = new Item();
        $item1->setDescricao('Livro de PHP');
        $item1->setValor($valor1);

        $item2 = new Item();
        $item2->setDescricao('Livro de VB6');
        $item2->setValor($valor2);

        $carrinho->adicionarItem($item1);
        $carrinho->adicionarItem($item2);

        $this->assertEquals($valorComparado, $carrinho->pegarValorCarrinho());
    }

    public static function dataValores()
    {
        return [
            [50, 75],
            [200.5, 10.5],
            [5, 6]
        ];
    }
}
