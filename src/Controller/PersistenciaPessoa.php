<?php

namespace Joao21dev\Magazord\Controller;

use Joao21dev\Magazord\Infra\EntityManagerFactory;
use Joao21dev\Magazord\Entity\Pessoa;

class PersistenciaPessoa implements InterfaceControladoraRequisicao
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
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);

        $cpf = preg_replace("/[^0-9]/", "", $cpf);

      
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!is_null($id) && $id !== false) {
            $pessoa = $this->entityManager->find(Pessoa::class, $id);

            if ($pessoa !== null) {
                $pessoa->setNome($nome);
                $pessoa->setCpf($cpf);
            }
        } else {
            $pessoaRepository = $this->entityManager->getRepository(Pessoa::class);
            $existingPessoa = $pessoaRepository->findOneBy(['cpf' => $cpf]);

            if ($existingPessoa === null) {
                $pessoa = new Pessoa;
                $pessoa->setNome($nome);
                $pessoa->setCpf($cpf);

                $this->entityManager->persist($pessoa);
            } else {
                session_start();
                $_SESSION['errorMsg'] = "Já existe uma pessoa com o CPF: $cpf";
            }
        }

        $this->entityManager->flush();

        header('Location: /listar-pessoas', false, 302);
    }
}
