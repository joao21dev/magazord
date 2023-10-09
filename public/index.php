<?php

use Joao21dev\Magazord\Controller\FormularioInsercaoPessoa;
use Joao21dev\Magazord\Controller\Home;
use Joao21dev\Magazord\Controller\ListarPessoas;

require __DIR__ . '/../vendor/autoload.php';



switch (@$_SERVER['PATH_INFO']) {

    case '/listar-pessoas':
        $controlador = new ListarPessoas();
        $controlador->processaRequisicao();
        break;

    case '/cadastrar-pessoa':
        $controlador = new FormularioInsercaoPessoa();
        $controlador->processaRequisicao();
        break;

    case '':
    case '/':
    case '/index':
        $controlador = new Home();
        $controlador->processaRequisicao();
        break;

    default:
        echo "Erro 404 - Página não encontrada";
        break;
}
