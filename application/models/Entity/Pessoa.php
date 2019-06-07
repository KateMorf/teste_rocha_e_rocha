<?php
namespace Entity;

/**
* Pessoa
*
* @Entity
* @Table(name="pessoa")
* @author Karoline Karol<kdemourafarias@gmail.com>
*/

class Pessoa{

    /**
     * @Id
     * @Column(type="bigint", nullable=false)
     * @GeneratedValue(strategy="IDENTITY")
     */
	public $id;

    /**
     * @Column(name="nome", type="string", nullable=false, length=255)
     */
	public $nome;


	public function getId(){
			return $this->id;
	}

	public function getNome(){				
			return $this->nome;
	}

	public function setNome($nome){				
			$this->nome = $nome;
			return $this->nome;
	}	
}