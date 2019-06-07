<?php
namespace Entity;

/**
* PessoaFisica
*
* @Entity
* @Table(name="pessoa_fisica")
* @author Karoline Karol<kdemourafarias@gmail.com>
*/

class PessoaFisica{

    /**
     * @Id
     * @Column(type="bigint", nullable=false)
     * @GeneratedValue(strategy="IDENTITY")
     */
	public $id;

    /**
     * @Column(name="cpf", type="string", lenght=50, nullable=false)
     */
    public $cpf;
    
    /**
	* @OneToOne(targetEntity="Pessoa")
	* @JoinColumn(name="idPessoa", referencedColumnName="id")
    */
    
    public $idPessoa;


	public function getId(){
			return $this->id;
	}

	public function getCpf(){				
			return $this->cpf;
	}

	public function setCpf($cpf){				
			$this->cpf = $cpf;
			return $this->cpf;
    }
    
    public function getIdPessoa(){
        return $this->idPessoa;
    }

    public function setIdPessoa($idPessoa){
        $this->idPessoa = $idPessoa;
        return $this->idPessoa;
    }
}