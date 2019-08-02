<div class="d-flex justify-content-center my-3">
    <h2>Agenda de contatos</h2>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
        <?php if(isset($contatoAdicionado)){ ?>
            <div class="alert alert-success" role="alert">
                Contato adicionado com sucesso!
            </div>
            <?php } ?>
            <?php if(isset($contatoEditado)){ ?>
            <div class="alert alert-success" role="alert">
                Contato editado com sucesso!
            </div>
            <?php } ?>
            <?php if(isset($contatoRemovido)){ ?>
            <div class="alert alert-success" role="alert">
                Contato removido com sucesso!
            </div>
        <?php } ?>
            <form action="../controllers/AdminController.php">
                <input type="hidden" name="action" value="find">
                <div class="form-group">
                    <label for="exampleInputEmail1">Buscar por Nome:</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome" required>
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="../controllers/AdminController.php?action=new" class="btn btn-primary">Adicionar contato</a>
                <a href="../controllers/AdminController.php?action=index" class="btn btn-primary">Início</a>
                <br><br>

            </form>
            <form action="#" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="addArquivo">
                <input type="file" name="fileUpload">
                <input type="submit" value="Enviar"><br>
                <?php
                if(isset($_FILES['fileUpload']))
                {   $arquivo = $_FILES['fileUpload'];
                    adicionarPorArquivo($arquivo);
                }
                ?>

                <h7>*Arquitetura do arquivo com apenas 3
                    colunas por linha: nome, telefone, email.</h7>
        </div>
            <table class="table my-3">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Detalhe</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($listaDeContatos!=="Objeto não encontrado"){?>
                    <?php foreach($listaDeContatos as $contato){ ?>
                    <tr>
                    <th scope="row"><?= $contato->id ?></th>
                    <td><?= $contato->nome ?></td>
                    <td><?= $contato->telefone ?></td>
                    <td><?= $contato->email ?></td>
                    <td>
                        <a href="../controllers/AdminController.php?action=details&id=<?= $contato->id?>"><i class="fas fa-address-book"></i></a>
                    </td>
                    </tr>
                    <?php } ?>
                <?php } ?>
                </tbody>
            </table>
        </div>
    <br>

    <br>
    </div>
</div>
