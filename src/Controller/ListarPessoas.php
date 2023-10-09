<?php

namespace Joao21dev\Magazord\Controller;

use Joao21dev\Magazord\Infra\EntityManagerFactory;
use Joao21dev\Magazord\Entity\Pessoa;

class ListarPessoas implements InterfaceControladoraRequisicao
{
    private $repositorioDePessoas;

    public function __construct()
    {
        $entityManager = (new EntityManagerFactory())
            ->getEntityManager();
        $this->repositorioDePessoas = $entityManager
            ->getRepository(Pessoa::class);
    }

    public function processaRequisicao(): void
    {
        $cpf = filter_input(INPUT_GET, 'cpf', FILTER_SANITIZE_STRING);
        $cpf = preg_replace("/[^0-9]/", "", $cpf);

        if (!empty($cpf)) {
            // Se o CPF foi fornecido na consulta, filtre as pessoas por CPF usando LIKE
            $pessoas = $this->repositorioDePessoas->createQueryBuilder('p')
                ->where('p.cpf LIKE :cpf')
                ->setParameter('cpf', $cpf . '%')
                ->getQuery()
                ->getResult();
        } else {
            // Caso contrário, liste todas as pessoas
            $pessoas = $this->repositorioDePessoas->findAll();
        }

        $nome = "Lista de Pessoas";
        include_once __DIR__ . "/../view/pessoas/listar-pessoas.php";
    }
}
