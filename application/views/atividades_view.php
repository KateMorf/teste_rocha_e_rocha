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
        <h1><center>Lista de Atividades</center></h1>

        <form action="<?php echo site_url('atividades');?>" method="post">
                <div class="form-group">
                    <label>Id da Atividade</label>
                    <input type="text" class="form-control" name="atividade_id" placeholder="Id da Atividade">
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
        <br><br> 
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Id da Atividade</th>
            <th scope="col">Descrição da Atividade</th>
            <th scope="col">Data do Cadastro</th>
            <th scope="col">Id do Projeto</th>
            <th width="200">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($atividades as $at):
            ?>
                <tr>
                <th scope="row"><?=$at->id;?></th>
                <td><?=$at->descricao;?></td>
                <td><?=$at->dataCadastro;?></td>
                <td><?=$at->idProjeto->getId();?></td>
                <td>
                    <a href="atividades/get_edit/<?=$at->id?>" class="btn btn-sm btn-info">Alterar</a>
                    <a href="atividades/delete/<?=$at->id?>" class="btn btn-sm btn-danger">Deletar</a>
                </td>
                </tr>
            <?php endforeach;?>
        </tbody>
        </table>
        <a href="atividades/add_new" class="btn btn-sm btn-info">Adicionar</a>
        <a href="projetos" class="btn btn-sm btn-info">Lista de Projetos</a>
    </div>
		
    <!-- load jquery js file -->
    <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
    <!-- load bootstrap js file -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
             
</body>
</html>
