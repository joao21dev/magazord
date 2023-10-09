<?php

namespace Joao21dev\Magazord\Controller;

use Joao21dev\Magazord\Infra\EntityManagerFactory;
use Joao21dev\Magazord\Entity\Contato;

class ExclusaoContato implements InterfaceControladoraRequisicao
{

    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerFactory())
            ->getEntityManager();
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (is_null($id) || $id === false) {
            header('Location: /listar-contatos');
            return; 
        }

        $contato = $this->entityManager->getReference(Contato::class, $id);

        $this->entityManager->remove($contato);
        $this->entityManager->flush();

        header('Location: /listar-contatos');
    }
}
