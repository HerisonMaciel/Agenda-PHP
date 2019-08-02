<div class="d-flex justify-content-center my-3">
    <h2>Adicionar contato</h2>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4>Formulário de contato</h4>
            <form action="../controllers/AdminController.php">
                <input type="hidden" name="action" value="create">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Telefone</label>
                    <input type="text" name="telefone" class="form-control" placeholder="Telefone" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>
            <a href="../controllers/AdminController.php?action=index" class="btn btn-primary mt-3">Voltar</a>
        </div>
        <div class="col-md-4">
            <img src="../assets/imagem.png" class="img-fluid">
        </div>
    </div><!--row-->
</div><!--container-->    