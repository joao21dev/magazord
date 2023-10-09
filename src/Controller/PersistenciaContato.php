<?php

namespace Joao21dev\Magazord\Controller;

use Joao21dev\Magazord\Entity\Contato;
use Joao21dev\Magazord\Entity\Pessoa;
use Joao21dev\Magazord\Infra\EntityManagerFactory;

class PersistenciaContato implements InterfaceControladoraRequisicao
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
        $idPessoa = filter_input(INPUT_POST, 'idPessoa', FILTER_VALIDATE_INT);
        $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);

        if ($tipo === "Telefone") {
            $descricao = preg_replace("/[^0-9]/", "", $descricao);
        }

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);


        if (!is_null($id) && $id !== false) {
            $contato = $this->entityManager->find(Contato::class, $id);

            if ($contato !== null && $contato->getPessoa()->getId() == $idPessoa) {
                $contato->setTipo($tipo);
                $contato->setDescricao($descricao);
            }
        } else {
            $contatoRepository = $this->entityManager->getRepository(Contato::class);
            $existingContato = $contatoRepository->findOneBy(['descricao' => $descricao]);

            $pessoaRepository = $this->entityManager->getRepository(Pessoa::class);
            $pessoa = $pessoaRepository->find($idPessoa);

            if ($pessoa === null) {
                echo "Não existe uma Pessoa com o ID fornecido: $idPessoa";
                sleep(4);
                echo '<script>window.location = "listar-contatos";</script>';
            } elseif ($existingContato === null) {
                $contato = new Contato;
                $contato->setTipo($tipo);
                $contato->setDescricao($descricao);
                $contato->setPessoa($pessoa);

                $this->entityManager->persist($contato);
            } else {
                echo "Já existe um contato criado com essa descrição: $descricao";
                sleep(4);
                echo '<script>window.location = "listar-contatos";</script>';
            }
        }

        $this->entityManager->flush();

        header('Location: /listar-contatos', false, 302);
    }
}
