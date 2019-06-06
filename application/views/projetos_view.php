<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Projeto View</title>
<!-- load bootstrap css file -->
<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">

</head>
<body> 		

    <div class="container">
        <h1><center>Lista de Projetos</center></h1>

        <form action="<?php echo site_url('projetos');?>" method="post">
                <div class="form-group">
                    <label>Id do Projeto</label>
                    <input type="text" class="form-control" name="projeto_id" placeholder="Id do Projeto">
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
        <br><br> 
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Id do Projeto</th>
            <th scope="col">Descrição do Projeto</th>
            <th width="200">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($projetos as $pr):
            ?>
                <tr>
                <th scope="row"><?=$pr->id;?></th>
                <td><?=$pr->descricao;?></td>
                <td>
                    <a href="projetos/get_edit/<?=$pr->id?>" class="btn btn-sm btn-info">Alterar</a>
                    <a href="projetos/delete/<?=$pr->id?>" class="btn btn-sm btn-danger">Deletar</a>
                </td>
                </tr>
            <?php endforeach;?>
        </tbody>
        </table>
        <a href="projetos/add_new" class="btn btn-sm btn-info">Adicionar</a>
    </div>
		
    <!-- load jquery js file -->
    <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
    <!-- load bootstrap js file -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
             
</body>
</html>
