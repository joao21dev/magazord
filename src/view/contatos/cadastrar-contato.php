<?php include __DIR__ . '/../header-html.php'; ?>

<h1> <?= $titulo ?> </h1>




<form action="/salvar-contato" method="POST">

    <div class="mb-3">
        <label for="idPessoa" class="form-label">Id da Pessoa</label>
        <input required type="number" class="form-control" id="idPessoa" name="idPessoa" autofocus>
    </div>


    <div class="mb-3">
        <label for="tipo" class="form-label">Tipo</label>
        <select required class="form-control" id="tipo" name="tipo">
            <option value="Email">Email</option>
            <option value="Telefone">Telefone</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <input required type="text" class="form-control" id="descricao" step="1" name="descricao">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary" id="btnSalvar">Salvar</button>
    </div>

</form>

<?php include __DIR__ . '/../footer-html.php'; ?>