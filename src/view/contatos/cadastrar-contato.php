<?php include __DIR__ . '/../header-html.php'; ?>

<h1> <?= $titulo ?> </h1>




<form action="/salvar-contato<?= isset($contato) ? '?id=' . $contato->getId() : ""; ?>" method="POST">

    <div class="mb-3">
        <label for="idPessoa" class="form-label">Id da Pessoa</label>
        <input required type="number" class="form-control" id="idPessoa" name="idPessoa" value="<?= !empty($idPessoa) ? $idPessoa : (isset($contato) ? $contato->getPessoa()->getId() : '') ?>">
    </div>


    <?php
    session_start();
    if (!empty($_SESSION['errorMsgId'])) {
        $errorMsgId = $_SESSION['errorMsgId'];
        unset($_SESSION['errorMsgId']);
        echo '<div class="alert alert-danger" role="alert">' . $errorMsgId . '</div>';
    }
    ?>

    <div class="mb-3">
        <label for="tipo" class="form-label">Tipo</label>
        <select required class="form-control" id="tipo" name="tipo">
            <option value="Email">Email</option>
            <option value="Telefone">Telefone</option>
        </select>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tipoSelect = document.getElementById("tipo");
            const descricaoInput = document.getElementById("descricao");

            tipoSelect.addEventListener("change", function() {
                descricaoInput.value = "";
                descricaoInput.placeholder = "";
            });

            descricaoInput.addEventListener("input", function() {
                if (tipoSelect.value === "Telefone") {
                    const value = descricaoInput.value.replace(/\D/g, "");
                    if (value.length === 11) {
                        descricaoInput.value = `(${value.slice(0, 2)}) ${value.slice(2, 7)}-${value.slice(7)}`;
                    } else if (value.length >= 2) {
                        descricaoInput.value = `(${value.slice(0, 2)}) ${value.slice(2)}`;
                    }
                }
            });
        });
    </script>

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <input required type="text" class="form-control" id="descricao" step="1" name="descricao">
    </div>









    <?php
    session_start();
    if (!empty($_SESSION['errorMsgDescricao'])) {
        $errorMsgDescricao = $_SESSION['errorMsgDescricao'];
        unset($_SESSION['errorMsgDescricao']);
        echo '<div class="alert alert-danger" role="alert">' . $errorMsgDescricao . '</div>';
    }
    ?>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary" id="btnSalvar">Salvar</button>
    </div>

</form>

<?php include __DIR__ . '/../footer-html.php'; ?>