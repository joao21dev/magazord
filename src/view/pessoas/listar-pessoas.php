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
        <th>Ações</th> <!-- Nova coluna para as ações -->
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pessoas as $pessoa) : ?>
        <tr>
          <td><?= $pessoa->getId() ?></td>
          <td><?= $pessoa->getNome() ?></td>
          <td><?= substr_replace(substr_replace(substr_replace($pessoa->getCpf(), '-', 9, 0), '.', 6, 0), '.', 3, 0) ?></td>
          <td>
            <!-- Botão para Editar -->
            <a href="editar-pessoa?id=<?= $pessoa->getId() ?>" class="btn btn-secondary">Editar</a>

            <!-- Botão para Excluir -->
            <a href="excluir-pessoa?id=<?= $pessoa->getId() ?>" class="btn btn-danger">Excluir</a>

            <!-- Botão para Adicionar novo Contato -->
            <a href="/cadastrar-contato?id=<?= $pessoa->getId() ?>" class="btn btn-success">Cadastrar Contato</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>


<?php include __DIR__ . '/../footer-html.php'; ?>