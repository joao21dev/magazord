<?php

namespace Joao21dev\Magazord\Controller;

class ListarContatos implements InterfaceControladoraRequisicao
{

    public function processaRequisicao(): void
    {

        $nome = "Lista de Contatos";
        include_once __DIR__ . "/../view/contatos/listar-contatos.php";
    }
}
