<?php

namespace Joao21dev\Magazord\Controller;

use Joao21dev\Magazord\Entity\Contato;
use Joao21dev\Magazord\Controller\InterfaceControladoraRequisicao;
use Joao21dev\Magazord\Infra\EntityManagerFactory;

class FormularioEdicaoContato implements InterfaceControladoraRequisicao
{
    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $repositorioContatos;

    public function __construct()
    {
        $entityManager = (new EntityManagerFactory())
            ->getEntityManager();
        $this->repositorioContatos = $entityManager
            ->getRepository(Contato::class);
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if (is_null($id) || $id === false) {
            header('Location: /listar-contatos');
            return;
        }

        $contato = $this->repositorioContatos->find($id);
        $titulo = "Editar Contato de " . $contato->getPessoa()->getNome() . ' com descrição ' . $contato->getDescricao();
        $idPessoa = $contato->getPessoa()->getId();

        require __DIR__ . '/../../view/contatosk/cadastrar-contato.php';
    }
}
