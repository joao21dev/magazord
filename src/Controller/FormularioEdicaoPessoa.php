<?php

namespace Joao21dev\Magazord\Controller;

use Joao21dev\Magazord\Entity\Pessoa;
use Joao21dev\Magazord\Controller\InterfaceControladoraRequisicao;
use Joao21dev\Magazord\Infra\EntityManagerFactory;

class FormularioEdicaoPessoa implements InterfaceControladoraRequisicao
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

        if (is_null($id) || $id === false) {
            header('Location: /listar-pessoas');
            return;
        }

        $pessoa = $this->repositorioPessoas->find($id);
        $titulo = "Editar Pessoa " . $pessoa->getNome();
        require __DIR__ . '/../view/pessoas/cadastrar-pessoa.php';
    }
}
