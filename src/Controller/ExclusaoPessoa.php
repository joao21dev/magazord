<?php

namespace Joao21dev\Magazord\Controller;

use Joao21dev\Magazord\Infra\EntityManagerFactory;
use Joao21dev\Magazord\Entity\Pessoa;

class ExclusaoPessoa implements InterfaceControladoraRequisicao
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
            header('Location: /listar-pessoas');
            return; 
        }

        // Iniciar uma transação
        $this->entityManager->beginTransaction();

        try {
            $pessoa = $this->entityManager->getReference(Pessoa::class, $id);

            $this->entityManager
                ->createQuery('DELETE FROM Joao21dev\Magazord\Entity\Contato c WHERE c.pessoa = :pessoa')
                ->setParameter('pessoa', $pessoa)
                ->execute();

            $this->entityManager->remove($pessoa);
            $this->entityManager->flush();

            $this->entityManager->commit();
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            throw $e;
        }

        header('Location: /listar-pessoas');
    }
}
