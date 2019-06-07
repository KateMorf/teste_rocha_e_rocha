<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>LancamentoAutomatico</title>
    <!-- load bootstrap css file -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body> 	

    <div class="container">
        <h1><center>Adicionar Novo Lancamento Automático</center></h1>
        <div class="col-md-6 offset-md-3">
            <form action="<?php echo site_url('lancamento_automatico/save');?>" method="post">
                <div class="form-group">
                    <label>Tipo</label>
                    <input type="text" class="form-control" name="tipo" placeholder="Tipo">
                    <br>
                    <label>Descrição</label>
                    <input type="text" class="form-control" name="descricao" placeholder="Descrição">
                    <br>
                    <label>Valor</label>
                    <input type="text" class="form-control" name="valor" placeholder="Valor">
                    <br>
                    <label>Clientes</label>
                    <!-- <input list="clientes" class="form-control"> -->
                    <select id ="clientes" name="cliente" placeholder="Selecione um cliente">
                        <?php foreach($clientes as $cliente):?>
                            <option value="<?=$cliente->id?>"><?=$cliente->nome?></option>
                        <?php endforeach;?>
                    </select>
                    <br>
                    <label>Plano</label>
                    <!-- <input list="plano" class="form-control"> -->
                    <select id="planos" name="plano" placeholder="Selecione um plano">
                    <?php foreach($planos_conta as $plano):?>
                            <option value="<?=$plano->id?>"><?=$plano->descricao?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>
        </div>
    </div>

    <!-- load jquery js file -->
    <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
    <!-- load bootstrap js file -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("input").click(function(){
            $(this).next().show();
            $(this).next().hide();
            });
        });
    </script>
            
</body>
</html>
