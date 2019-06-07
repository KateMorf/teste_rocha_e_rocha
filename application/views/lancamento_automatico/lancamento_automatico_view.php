<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>LancamentoAutomatico</title>
    <!-- load bootstrap css file -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
</head>
<body> 	

    <div class="container">
        <h1><center>Adicionar Novo Lancamento Automático</center></h1>
        <div class="col-md-8 offset-md-2">
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
                    <select id="tipo_cliente" class="form-control" onchange="tipoCliente(this);">
                        <option value="">Selecione</option>
                        <option value="cpf">Pessoa Física</option>
                        <option value="cnpj">Pessoa Jurídica</option>
                    </select>
                    <br>
                    <!-- <input list="clientes" class="form-control"> -->
                    <select style="width:500px; display: none;" id="fisica" name="cliente" placeholder="Selecione um cliente">
                        <?php foreach($clientes_cpf as $cliente):?>
                            <option value="<?=$cliente->idPessoa->getId();?>"><?=$cliente->idPessoa->getNome();?></option>
                        <?php endforeach;?>
                    </select>

                    <select style="width:500px; display: none;" id="juridica" name="cliente" placeholder="Selecione um cliente">
                        <?php foreach($clientes_cnpj as $cliente):?>
                            <option value="<?=$cliente->idPessoa->getId();?>"><?=$cliente->idPessoa->getNome();?></option>
                        <?php endforeach;?>
                    </select>

                    <br>

                    <label>Plano</label>
                    <!-- <input list="plano" class="form-control"> -->
                    <select class="chosen" style="width:500px;" name="plano" placeholder="Selecione um plano">
                    <?php foreach($planos_conta as $plano):?>
                            <option value="<?=$plano->id?>"><?=$plano->descricao?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>

            <br>
            <h2><center>Listagem de Lançamentos</center></h2>
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Id Lançamento Automático</th>
                <th scope="col">Tipo</th>
                <th scope="col">Valor</th>
                <th scope="col">Descrição</th>
                <th scope="col">Cliente</th>
                <th scope="col">Plano</th>
                <th width="200">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($lancamento_automatico as $la):
                ?>
                    <tr>
                    <th scope="row"><?=$la->id;?></th>
                    <td><?=empty($la->tipo)? '' : $la->tipo?></td>
                    <td><?=empty($la->valor)? '' : $la->valor?></td>
                    <td><?=empty($la->descricao)? '' : $la->descricao?></td>
                    <td><?=$la->idCliente->getNome();?></td>
                    <td><?=$la->planoConta->getDescricao();?></td>
                    <td>
                        <a href="" class="btn btn-sm btn-info">Alterar</a>
                        <a href="" class="btn btn-sm btn-danger">Deletar</a>
                    </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
            </table>
        </div>
    </div>

    <!-- load jquery js file -->
    <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
    <!-- load bootstrap js file -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

    <script type="text/javascript">
        $(".chosen").chosen();
        function tipoCliente(that) {
            if (that.value == "cpf") {
                document.getElementById("fisica").style.display = "block";
                document.getElementById("juridica").style.display = "none";
            } else {
                document.getElementById("fisica").style.display = "none";
            }
            if (that.value == "cnpj") {
                document.getElementById("juridica").style.display = "block";
                document.getElementById("fisica").style.display = "none";
            } else {
                document.getElementById("juridica").style.display = "none";
            }
        }
    </script>
            
</body>
</html>
