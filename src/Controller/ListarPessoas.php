<?php

namespace Joao21dev\Magazord\Controller;

class ListarPessoas implements InterfaceControladoraRequisicao
{

    public function processaRequisicao(): void
    {

        $nome = "Lista de Pessoas";
        include_once __DIR__ . "/../view/pessoas/listar-pessoas.php";
    }
}
