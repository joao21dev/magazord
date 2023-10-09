<?php include __DIR__ . '/../header-html.php'; ?>



<h1> <?= $titulo ?> </h1>

<form action="/salvar-pessoa<?= isset($pessoa) ? '?id=' . $pessoa->getId() : ""; ?>" method="POST">

    <div class="mb-3">
        <label for="nome" class="form-label">Nome da Pessoa</label>
        <input required type="text" class="form-control" id="nome" name="nome" autofocus>
    </div>

    <div class="mb-3">
        <label for="cpf" class="form-label">CPF</label>
        <input required type="text" class="form-control" id="cpf" name="cpf">
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cpfInput = document.getElementById("cpf");

            cpfInput.addEventListener("input", function() {
                let value = cpfInput.value.replace(/\D/g, "");
                let formattedValue = '';

                for (let i = 0; i < value.length; i++) {
                    if (i === 3 || i === 6) {
                        formattedValue += ".";
                    } else if (i === 9) {
                        formattedValue += "-";
                    }
                    formattedValue += value[i];
                }

                cpfInput.value = formattedValue;
            });
        });
    </script>






    <div class="mb-3">
        <button type="submit" class="btn btn-primary" id="btnSalvar">Salvar</button>
    </div>

</form>

<?php include __DIR__ . '/../footer-html.php'; ?>