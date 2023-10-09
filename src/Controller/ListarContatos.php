<?php

namespace Joao21dev\Magazord\Controller;

use Joao21dev\Magazord\Entity\Contato;
use Joao21dev\Magazord\Entity\Pessoa;
use Joao21dev\Magazord\Infra\EntityManagerFactory;


class ListarContatos implements InterfaceControladoraRequisicao
{
    private $repositorioDeContatos;
    private $repositorioDePessoas;

    public function __construct()
    {
        $entityManager = (new EntityManagerFactory())
            ->getEntityManager();
        $this->repositorioDeContatos = $entityManager
            ->getRepository(Contato::class);
        $this->repositorioDePessoas = $entityManager
            ->getRepository(Pessoa::class);
    }

    public function processaRequisicao(): void
    {
        $nomeDaPessoa = filter_input(INPUT_GET, 'nome_da_pessoa', FILTER_SANITIZE_STRING);

        if (!empty($nomeDaPessoa)) {
            // Use o operador LIKE para buscar pessoas cujo nome contenha a substring pesquisada
            $pessoas = $this->repositorioDePessoas->createQueryBuilder('p')
                ->where('LOWER(p.nome) LIKE :nome')
                ->setParameter('nome', '%' . strtolower($nomeDaPessoa) . '%')
                ->getQuery()
                ->getResult();

            if (!empty($pessoas)) {
                // Se pelo menos uma pessoa foi encontrada, busque os contatos associados a essas pessoas
                $contatos = $this->repositorioDeContatos->createQueryBuilder('c')
                    ->where('c.pessoa IN (:pessoas)')
                    ->setParameter('pessoas', $pessoas)
                    ->getQuery()
                    ->getResult();
            } else {
                // Caso contrário, não há contatos para mostrar
                $contatos = [];
            }
        } else {
            // Caso contrário, liste todos os contatos
            $contatos = $this->repositorioDeContatos->findAll();
        }

        $nome = "Lista de Contatos";
        include_once __DIR__ . "/../view/contatos/listar-contatos.php";
    }
}
