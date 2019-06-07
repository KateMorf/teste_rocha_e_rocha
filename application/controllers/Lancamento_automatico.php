<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lancamento_automatico extends CI_Controller{
	function __construct(){
		parent::__construct();
    }
    
	function index(){			
        $data['clientes_cpf'] = $this->doctrine->em->getRepository("Entity\PessoaFisica")->findAll();
        $data['clientes_cnpj'] = $this->doctrine->em->getRepository("Entity\PessoaJuridica")->findAll();
        $data['clientes'] = $this->doctrine->em->getRepository("Entity\Pessoa")->findAll();
        $data['planos_conta'] = $this->doctrine->em->getRepository("Entity\PlanosConta")->findAll();
        $data['lancamento_automatico'] = $this->doctrine->em->getRepository("Entity\LancamentoAutomatico")->findAll();
        $this->load->view('lancamento_automatico/lancamento_automatico_view', $data);
    }

    function add_new(){
        $this->load->view('add_atividade_view');
    }

    function save(){
        $lancamento = new Entity\LancamentoAutomatico;
        $desc = $this->input->post('descricao');
        $valor = $this->input->post('valor');
        $tipo = $this->input->post('tipo');
        $pessoa_id = $this->input->post('cliente');
        $plano_id = $this->input->post('plano');
        // print_r($plano_id);die;
        $cliente = $this->doctrine->em->find("Entity\Pessoa",(int)$pessoa_id);
        $plano = $this->doctrine->em->find("Entity\PlanosConta",(int)$plano_id);

        $lancamento->setDescricao($desc);
        $lancamento->setTipo($tipo);
        $lancamento->setValor($valor);
        $lancamento->setIdCliente($cliente);
        $lancamento->setPlanoConta($plano);

        $this->doctrine->em->persist($lancamento);
        $this->doctrine->em->flush();
        redirect('lancamento_automatico');
    }

    function delete(){
        $atividade_id = $this->uri->segment(3);
        $atividade = $this->doctrine->em->find("Entity\Atividade",$atividade_id);
        $this->doctrine->em->remove($atividade);
        $this->doctrine->em->flush();
        redirect('atividades');
    }

    function get_edit(){
        $atividade_id = $this->uri->segment(3);
        $data['atividade'] = $this->doctrine->em->find("Entity\Atividade",$atividade_id);
        $this->load->view('edit_atividade_view', $data);
    }

    function update(){
        $atividade_id = $this->input->post('atividade_id');
        $atividade_desc = $this->input->post('atividade_desc');
        $projeto_id = $this->input->post('atividade_id_projeto');

        $atividade = $this->doctrine->em->find("Entity\Atividade",$atividade_id);
        $projeto = $this->doctrine->em->find("Entity\Projeto",$projeto_id);
        $atividade->setDescricao($atividade_desc);
        $atividade->setIdProjeto($projeto);

        $this->doctrine->em->merge($atividade);
        $this->doctrine->em->flush();
        redirect('atividades');
    }
	
}