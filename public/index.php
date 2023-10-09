<?php

use Joao21dev\Magazord\Controller\FormularioInsercaoContato;
use Joao21dev\Magazord\Controller\FormularioInsercaoPessoa;
use Joao21dev\Magazord\Controller\Home;
use Joao21dev\Magazord\Controller\ListarContatos;
use Joao21dev\Magazord\Controller\ListarPessoas;
use Joao21dev\Magazord\Controller\PersistenciaContato;
use Joao21dev\Magazord\Controller\PersistenciaPessoa;

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

    case '/salvar-pessoa':
        $controlador = new PersistenciaPessoa();
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

    case '/salvar-contato':
        $controlador = new PersistenciaContato();
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
