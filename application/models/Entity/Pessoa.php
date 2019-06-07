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
     * @Column(name="descricao", type="string", nullable=false, lenght=255)
     */
	public $descricao;


	public function getId(){
			return $this->id;
	}

	public function getDescricao(){				
			return $this->descricao;
	}

	public function setDescricao($descricao){				
			$this->descricao = $descricao;
			return $this->descricao;
	}	
}