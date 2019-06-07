<?php
namespace Entity;

/**
* PlanosConta
*
* @Entity
* @Table(name="planos_conta")
* @author Karoline Karol<kdemourafarias@gmail.com>
*/

class PlanosConta{

    /**
     * @Id
     * @Column(type="bigint", nullable=false)
     * @GeneratedValue(strategy="IDENTITY")
     */
	public $id;

    /**
     * @Column(name="descricao", type="string", length=50, nullable=false)
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