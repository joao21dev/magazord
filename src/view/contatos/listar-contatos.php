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
                    <td>1</td>
                    <td>1</td>
                    <td>Joao Pedro</td>
                    <td>Telefone</td>
                    <td class="descricao-cell">
                        71 992525841
                    </td>
                    <td>
                        <a href="/editar-contato?id=1" class="btn btn-secondary">Editar</a>
                        <a href="/excluir-contato?id=1" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>





<?php include __DIR__ . '/../footer-html.php'; ?>