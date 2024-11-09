
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adicionar Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script>
        window.onload = function(){
            var dropdown = document.getElementById("example");
            var textbox = document.getElementById("textbox");
        dropdown.addEventListener("change", function() {
            if(dropdown.value == 7){
                textbox.style.display = "block";
            }else{
                textbox.style.display = "none";
                }
            });
        }
</script>
  </head>
  <body>
    <?php include('navbars/navbar-create.php'); ?>
    <div class="container mt=5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Adicionar tarefa <i class="bi bi-clipboard-minus-fill"></i>
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div  class="card=body">
                        <form action="acoes.php" method="POST">
                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Descrição</label>
                                <input type="text" name="descricao" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                    <select id="status" name="status">
                                        <option value="Não realizado" class="btn btn-secondary btn-sm">Não Realizado</option>
                                        <option value="Desenvolvimento"  class="btn btn-warning btn-sm">Desenvolvimento</option>
                                        <option value="Concluido"  class="btn btn-success btn-sm">Concluido</option>
                                    </select>
                            </div>
                            <div class="mb-3">
                                <label>Data Limite</label>
                                <input type="date" name="data_limite" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="create_tarefa" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>