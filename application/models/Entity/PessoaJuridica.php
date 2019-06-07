<?php
namespace Entity;

/**
* PessoaJuridica
*
* @Entity
* @Table(name="pessoa_juridica")
* @author Karoline Karol<kdemourafarias@gmail.com>
*/

class PessoaJuridica{

    /**
     * @Id
     * @Column(type="bigint", nullable=false)
     * @GeneratedValue(strategy="IDENTITY")
     */
	public $id;

    /**
     * @Column(name="cnpj", type="string", lenght=50, nullable=false)
     */
    public $cnpj;
    
    /**
	* @OneToOne(targetEntity="Pessoa")
	* @JoinColumn(name="idPessoa", referencedColumnName="id")
    */
    
    public $idPessoa;


	public function getId(){
			return $this->id;
	}

	public function getCnpj(){				
			return $this->cnpj;
	}

	public function setCnpj($cnpj){				
			$this->cnpj = $cnpj;
			return $this->cnpj;
    }
    
    public function getIdPessoa(){
        return $this->idPessoa;
    }

    public function setIdPessoa($idPessoa){
        $this->idPessoa = $idPessoa;
        return $this->idPessoa;
    }
}