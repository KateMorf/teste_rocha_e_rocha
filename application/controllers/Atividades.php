<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Atividades extends CI_Controller{
	function __construct(){
		parent::__construct();
    }
    
	function index(){
        $atividade_id = $this->input->post('atividade_id');
        if(!empty($atividade_id)){
            $data['atividades'] = $this->doctrine->em->getRepository("Entity\Atividade")->findBy(array('id' => $atividade_id));
        }else{
            $data['atividades'] = $this->doctrine->em->getRepository("Entity\Atividade")->findAll();
        }				
        $this->load->view('atividades_view',$data);
    }

    function add_new(){
        $this->load->view('add_atividade_view');
    }

    function save(){
        $atividade = new Entity\Atividade;
        $atividade_desc = $this->input->post('atividade_desc');
        $projeto_id = $this->input->post('atividade_id_projeto');
        $projeto = $this->doctrine->em->find("Entity\Projeto",$projeto_id);
        
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d H:i');
        $atividade->setDescricao($atividade_desc);
        $atividade->setDataCadastro($date);
        $atividade->setIdProjeto($projeto);

        $this->doctrine->em->persist($atividade);
        $this->doctrine->em->flush();
        redirect('atividades');
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