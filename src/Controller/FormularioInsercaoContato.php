<?php

namespace Joao21dev\Magazord\Controller;

class FormularioInsercaoContato implements InterfaceControladoraRequisicao
{

    public function processaRequisicao(): void
    {
        $titulo = "Cadastro de Contato";
        include_once __DIR__ . "/../view/contatos/cadastrar-contato.php";
    }
}
