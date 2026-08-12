<?php

namespace Tchuby\AppCarrinhoCompras;

class Carrinho
{
    /** @var Item[] */
    private array $itens;

    public function __construct()
    {
        $this->itens = [];
    }

    public function getItens()
    {
        return $this->itens;
    }

    public function adicionarItem(Item $item)
    {
        array_push($this->itens, $item);
        return true;
    }

    public function validarCarrinho()
    {
        return count($this->itens) > 0;
    }

    public function pegarValorCarrinho(): float
    {
        $total = 0.0;

        foreach ($this->getItens() as $item) {
            $total += $item->getValor();
        }

        return $total;
    }
}
