<?php

namespace Tchuby\AppCarrinhoCompras;

class Carrinho
{
    //atributos
    private array $itens;
    private string $status;
    private float $valorTotal;

    //métodos
    public function __construct()
    {
        $this->itens = [];
        $this->status = 'vazio';
        $this->valorTotal = 0;
    }

    public function exibirItens()
    {
        return $this->itens;
    }

    public function adicionarItem(string $item, float $valor)
    {
        array_push($this->itens, ["item" => $item, "valor" => $valor]);
        $this->valorTotal += $valor;
        $this->status = 'aberto';
        return true;
    }

    public function exibirValorTotal()
    {
        return $this->valorTotal;
    }

    public function exibirStatus()
    {
        return $this->status;
    }

    public function confirmarPedido()
    {
        if (!$this->validarCarrinho())
            return false;

        $this->status = 'confirmado';
        $this->enviarEmailConfirmacao();
        return true;
    }

    public function enviarEmailConfirmacao()
    {
        echo '<br/>... envia email de confirmação...<br/>';
    }

    public function validarCarrinho()
    {
        return count($this->itens) > 0;
    }
}
