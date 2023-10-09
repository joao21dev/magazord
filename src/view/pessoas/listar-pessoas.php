<?php include __DIR__ . '/../header-html.php'; ?>

<h1> Lista de Pessoas </h1>

<a href="/cadastrar-pessoa" class="btn btn-success mb-3">Cadastrar Pessoa</a>

<form action="/listar-pessoas" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" class="form-control" name="cpf" placeholder="Pesquisar por CPF">
        <button type="submit" class="btn btn-primary">Pesquisar</button>
    </div>
</form>


<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>João Massarra</td>
                <td>039.653.235-71</td>
                <td>
                    <a href="editar-pessoa?id=1" class="btn btn-secondary">Editar</a>

                    <a href="excluir-pessoa?id=1" class="btn btn-danger">Excluir</a>

                    <a href="/cadastrar-contato?id=1" class="btn btn-success">Cadastrar Contato</a>
                </td>
            </tr>

        </tbody>
    </table>
</div>


<?php include __DIR__ . '/../footer-html.php'; ?>