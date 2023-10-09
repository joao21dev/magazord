<?php

namespace Joao21dev\Magazord\Controller;

use Joao21dev\Magazord\Entity\Pessoa;
use Joao21dev\Magazord\Controller\InterfaceControladoraRequisicao;
use Joao21dev\Magazord\Infra\EntityManagerFactory;

class FormularioInsercaoContato implements InterfaceControladoraRequisicao
{

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $repositorioPessoas;

    public function __construct()
    {
        $entityManager = (new EntityManagerFactory())
            ->getEntityManager();
        $this->repositorioPessoas = $entityManager
            ->getRepository(Pessoa::class);
    }

    public function processaRequisicao(): void
    {

        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        $pessoa = $this->repositorioPessoas->find($id);
        $idPessoa = $pessoa->getId();


        $titulo = "Cadastro de Contato";
        include_once __DIR__ . "/../view/contatos/cadastrar-contato.php";
    }
}
