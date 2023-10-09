<?php include __DIR__ . '/../header-html.php'; ?>

<h1> Lista de Contatos </h1>

<a href="/cadastrar-contato" class="btn btn-success mb-3">Cadastrar Contato</a>

<form action="/listar-contatos" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" class="form-control" name="nome_da_pessoa" placeholder="Pesquisar por Nome da Pessoa">
        <button type="submit" class="btn btn-primary">Pesquisar</button>
    </div>
</form>



<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Id da Pessoa</th>
                <th>Nome da Pessoa</th>
                <th>Tipo</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contatos as $contato) : ?>
                <tr>
                    <td><?= $contato->getId() ?></td>
                    <td><?= $contato->getPessoa()->getId() ?></td>
                    <td><?= $contato->getPessoa()->getNome() ?></td>
                    <td><?= $contato->getTipo() ?></td>
                    <td class="descricao-cell" data-tipo="<?= $contato->getTipo() ?>">
                        <?= $contato->getDescricao() ?>
                    </td>
                    <td>
                        <a href="/editar-contato?id=<?= $contato->getId() ?>" class="btn btn-secondary">Editar</a>
                        <a href="/excluir-contato?id=<?= $contato->getId() ?>" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    const descricaoCells = document.querySelectorAll('.descricao-cell[data-tipo="Telefone"]');

    descricaoCells.forEach(function(cell) {
        const descricao = cell.textContent;
        const descricaoNumerica = descricao.replace(/\D/g, '');

        if (descricaoNumerica.length === 11) {
            cell.textContent = `(${descricaoNumerica.slice(0, 2)}) ${descricaoNumerica.slice(2, 7)}-${descricaoNumerica.slice(7)}`;
        } else if (descricaoNumerica.length >= 2) {
            cell.textContent = `(${descricaoNumerica.slice(0, 2)}) ${descricaoNumerica.slice(2)}`;
        }
    });
</script>



<?php include __DIR__ . '/../footer-html.php'; ?>