<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Alterar Projeto</title>
    <!-- load bootstrap css file -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
</head>
<body> 	

    <div class="container">
        <h1><center>Alterar Projeto</center></h1>
        <div class="col-md-6 offset-md-3">
            <form action="<?php echo site_url('projetos/update');?>" method="post">
                <div class="form-group">
                    <label>Descrição do Projeto</label>
                    <input type="text" class="form-control" name="projeto_desc" value="<?php echo $projeto->descricao;?>">
                </div>
                <input type="hidden" name="projeto_id" value="<?php echo $projeto->id;?>">
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
