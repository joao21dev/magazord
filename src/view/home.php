<?php include __DIR__ . '/header-html.php'; ?>

<div class="px-4 py-5 my-5 text-center">

    <h1 class="display-5 fw-bold"> <?= $titulo ?> </h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Sistema Gerenciador. Veja a listagem de pessoas, cadastre novos pessoas. Veja também a lista de Contatos.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="/listar-pessoas" class="btn btn-primary btn-lg px-4 gap-3">Pessoas</a>
            <a href="/listar-contatos" class="btn btn-outline-secondary btn-lg px-4">Contatos</a>
        </div>
    </div>
</div>

<?php include __DIR__ . '/footer-html.php'; ?>