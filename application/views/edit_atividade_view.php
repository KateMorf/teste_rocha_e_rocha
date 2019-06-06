<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Editar Atividade</title>
    <!-- load bootstrap css file -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
</head>
<body> 	

    <div class="container">
        <h1><center>Editar Atividade</center></h1>
        <div class="col-md-6 offset-md-3">
            <form action="<?php echo site_url('atividades/update');?>" method="post">
                <div class="form-group">
                    <label>Descrição da Atividade</label>
                    <input type="text" class="form-control" name="atividade_desc" value="<?php echo $atividade->descricao;?>" placeholder="Descrição da Atividade">
                    <br>
                    <label>Id do Projeto</label>
                    <input type="text" class="form-control" name="atividade_id_projeto" value="<?php echo $atividade->idProjeto->getId();?>" placeholder="Id do Projeto">
                </div>

                <input type="hidden" name="atividade_id" value="<?php echo $atividade->id;?>">
                <button type="submit" class="btn btn-primary">Alterar</button>
            </form>
        </div>
    </div>

    <!-- load jquery js file -->
    <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
    <!-- load bootstrap js file -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
            
</body>
</html>
