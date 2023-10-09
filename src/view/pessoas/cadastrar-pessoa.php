<?php include __DIR__ . '/../header-html.php'; ?>

<h1> <?= $titulo ?> </h1>

<form action="/salvar-pessoa" method="POST">

    <div class="mb-3">
        <label for="nome" class="form-label">Nome da Pessoa</label>
        <input required type="text" class="form-control" id="nome" name="nome" autofocus>
    </div>

    <div class="mb-3">
        <label for="cpf" class="form-label">CPF</label>
        <input required type="text" class="form-control" id="cpf" name="cpf">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary" id="btnSalvar">Salvar</button>
    </div>

</form>

<?php include __DIR__ . '/../footer-html.php'; ?>