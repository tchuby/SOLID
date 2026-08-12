<?php

namespace Tchuby\AppCarrinhoCompras;

enum EstadosPedido: string
{
    case ABERTO = 'aberto';
    case PENDENTE = 'pendente';
    case PAGO = 'pago';
    case ENVIADO = 'enviado';
    case ENCERRADO = 'encerrado';
    case CANCELADO = 'cancelado';

    public function rotular(): string
    {
        return match ($this) {
            self::ABERTO => 'Novo carrinho',
            self::PENDENTE => 'Pendente de Pagamento',
            self::PAGO => 'Pagamento Aprovado',
            self::ENVIADO => 'Pedido Enviado',
            self::ENCERRADO => 'Carrinho encerrado',
            self::CANCELADO => 'Pedido Cancelado',
        };
    }
}
