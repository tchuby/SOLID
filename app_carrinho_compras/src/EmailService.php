<?php

namespace Tchuby\AppCarrinhoCompras;

class EmailService
{
    private $remetente;
    private $destinatario;
    private $assunto;
    private $conteudo;

    public function __construct(
        string $remetente,
        string $destinatario,
        string $assunto,
        string $conteudo
    ) {
        $this->remetente = $remetente;
        $this->destinatario = $destinatario;
        $this->assunto = $assunto;
        $this->conteudo = $conteudo;
    }

    public static function dispararEmail()
    {
        echo "<p>...envia email...</p>";
    }
}
