<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projetos extends CI_Controller{
	function __construct(){
		parent::__construct();
    }
    
	function index(){
        $projeto_id = $this->input->post('projeto_id');
        if(!empty($projeto_id)){
            $data['projetos'] = $this->doctrine->em->getRepository("Entity\Projeto")->findBy(array('id' => $projeto_id));
        }else{
            $data['projetos'] = $this->doctrine->em->getRepository("Entity\Projeto")->findAll();
        }				
        $this->load->view('projetos_view',$data);
    }

    function add_new(){
        $this->load->view('add_projeto_view');
    }

    function save(){
        $projeto = new Entity\Projeto;
        $projeto->setDescricao($this->input->post('projeto_desc'));
        $this->doctrine->em->persist($projeto);
        $this->doctrine->em->flush();
        redirect('projetos');
    }

    function delete(){
        $projeto_id = $this->uri->segment(3);
        $projeto = $this->doctrine->em->find("Entity\Projeto",$projeto_id);
        $this->doctrine->em->remove($projeto);
        $this->doctrine->em->flush();
        redirect('projetos');
    }

    function get_edit(){
        $projeto_id = $this->uri->segment(3);
        $data['projeto'] = $this->doctrine->em->find("Entity\Projeto",$projeto_id);
        $this->load->view('edit_projeto_view', $data);
    }

    function update(){
        $projeto_id = $this->input->post('projeto_id');
        $projeto = $this->doctrine->em->find("Entity\Projeto",$projeto_id);
        $projeto->setDescricao($this->input->post('projeto_desc'));
        $this->doctrine->em->merge($projeto);
        $this->doctrine->em->flush();
        redirect('projetos');
    }
	
}