<div class="d-flex justify-content-center my-3">
    <h2>Detalhes do contato</h2>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">

            <h4>Formulário de contato</h4>
            <form action="../controllers/AdminController.php">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?= $contato->id ?>">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome" value="<?= $contato->nome ?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Telefone</label>
                    <input type="text" name="telefone" class="form-control" placeholder="Telefone" value="<?= $contato->telefone ?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?= $contato->email ?>" required>
                </div>
                <button type="submit" class="btn btn-primary" >Editar</button>
            </form>

            <br>
            <form action="../controllers/AdminController.php">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?= $contato->id ?>">
                <button type="submit" class="btn btn-primary">Remover</button>
            </form>
            <a href="../controllers/AdminController.php?action=index" class="btn btn-primary mt-3">Voltar</a>
        </div>
        <div class="col-md-4">
            <img src="../assets/imagem.png" class="img-fluid">
        </div>
    </div><!--row-->
</div><!--container-->    