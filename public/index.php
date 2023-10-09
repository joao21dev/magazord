<?php

use Joao21dev\Magazord\Controller\ExclusaoContato;
use Joao21dev\Magazord\Controller\ExclusaoPessoa;
use Joao21dev\Magazord\Controller\FormularioEdicaoContato;
use Joao21dev\Magazord\Controller\FormularioEdicaoPessoa;
use Joao21dev\Magazord\Controller\FormularioInsercaoContato;
use Joao21dev\Magazord\Controller\FormularioInsercaoPessoa;
use Joao21dev\Magazord\Controller\Home;
use Joao21dev\Magazord\Controller\ListarContatos;
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

    case '/editar-pessoa':
        $controlador = new FormularioEdicaoPessoa();
        $controlador->processaRequisicao();
        break;

    case '/excluir-pessoa':
        $controlador = new ExclusaoPessoa();
        $controlador->processaRequisicao();
        break;

    case '/listar-contatos':
        $controlador = new ListarContatos();
        $controlador->processaRequisicao();
        break;

    case '/cadastrar-contato':
        $controlador = new FormularioInsercaoContato();
        $controlador->processaRequisicao();
        break;

    case '/editar-contato':
        $controlador = new FormularioEdicaoContato();
        $controlador->processaRequisicao();
        break;

    case '/excluir-contato':
        $controlador = new ExclusaoContato();
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
