<?php

namespace Joao21dev\Magazord\Controller;


class Home implements InterfaceControladoraRequisicao
{

    public function processaRequisicao(): void
    {
        $titulo = "Gerenciador de Contatos";
        include_once __DIR__ . "/../view/home.php";
    }
}
