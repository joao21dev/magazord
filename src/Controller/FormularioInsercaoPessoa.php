<?php

namespace Joao21dev\Magazord\Controller;

class FormularioInsercaoPessoa implements InterfaceControladoraRequisicao
{

    public function processaRequisicao(): void
    {
        $titulo = "Cadastro de Pessoa";
        include_once __DIR__ . "/../view/pessoas/cadastrar-pessoa.php";
    }
}
