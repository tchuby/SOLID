<?php

namespace Tchuby\AppCarrinhoCompras;

class Pedido
{
    private EstadosPedido $estado;
    private Carrinho $carrinho;
    private float $valor;

    public function __construct(Carrinho $carrinho)
    {
        $this->estado = EstadosPedido::ABERTO;
        $this->carrinho = $carrinho;
        $this->valor = 0.0;
    }

    public function pegarCarrinho()
    {
        return $this->carrinho;
    }

    public function pegarEstado()
    {
        return $this->estado->rotular();
    }

    public function alterarEstado(EstadosPedido $estado)
    {
        $this->estado = $estado;
    }

    public function pegarValorPedido()
    {
        if ($this->estado == EstadosPedido::ABERTO)
            return 'Pedido ainda não confirmado.';

        return $this->valor;
    }

    public function confirmar()
    {
        if (!$this->carrinho->validarCarrinho()) {
            return false;
        }

        $this->valor = $this->carrinho->pegarValorCarrinho();

        $this->alterarEstado(EstadosPedido::PENDENTE);
        return true;
    }
}
