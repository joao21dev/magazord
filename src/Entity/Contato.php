<?php

namespace Joao21dev\Magazord\Entity;

/**
 * @Entity
 */
class Contato
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /**
     * @Column(type="string")
     */
    private string $tipo;

    /**
     * @Column(type="string")
     */
    private string $descricao;

    /**
     * @ManyToOne(targetEntity="Pessoa")
     * @JoinColumn(name="id_pessoa", referencedColumnName="id")
     */
    private Pessoa $pessoa;

    public function getId(): int
    {
        return $this->id;
    }


    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function setTipo($tipo): self
    {
        $this->tipo = $tipo;
        return $this;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao($descricao): self
    {
        $this->descricao = $descricao;
        return $this;
    }


    public function getPessoa(): Pessoa
    {
        return $this->pessoa;
    }

    public function setPessoa(Pessoa $pessoa): self
    {
        $this->pessoa = $pessoa;
        return $this;
    }
}
