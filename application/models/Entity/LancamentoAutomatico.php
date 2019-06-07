<?php
namespace Entity;

/**
* LancamentoAutomatico
*
* @Entity
* @Table(name="lancamento_automatico")
* @author Karoline Karol<kdemourafarias@gmail.com>
*/

class LancamentoAutomatico{

    /**
     * @Id
     * @Column(type="bigint", nullable=false)
     * @GeneratedValue(strategy="IDENTITY")
     */
	public $id;

    /**
     * @Column(name="tipo", type="string", length=50, nullable=true)
     */
    public $tipo;

    /**
     * @Column(name="valor", type="decimal", length=10, precision=0, nullable=true)
     */
    public $valor;

    /**
     * @Column(name="descricao", type="string", length=255, nullable=true)
     */
    public $descricao;

    /**
	* @ManyToOne(targetEntity="Pessoa")
	* @JoinColumn(name="idCliente", referencedColumnName="id")
    */
    public $idCliente;

    /**
	* @ManyToOne(targetEntity="PlanosConta")
	* @JoinColumn(name="planoConta", referencedColumnName="id")
    */
    public $planoConta;

	public function getId(){
			return $this->id;
    }
    
    public function getTipo(){				
        return $this->tipo;
    }

    public function setTipo($tipo){				
            $this->tipo = $tipo;
            return $this->tipo;
    }

    public function getValor(){				
        return $this->valor;
    }

    public function setValor($valor){				
            $this->valor = $valor;
            return $this->valor;
    }

	public function getDescricao(){				
        return $this->descricao;
    }

    public function setDescricao($descricao){				
            $this->descricao = $descricao;
            return $this->descricao;
    }	

    public function getIdCliente(){				
        return $this->idCliente;
    }

    public function setIdCliente($idCliente){				
            $this->idCliente = $idCliente;
            return $this->idCliente;
    }
    
    public function getPlanosConta(){				
        return $this->planoConta;
    }

    public function setPlanoConta($planoConta){				
            $this->planoConta = $planoConta;
            return $this->planoConta;
    }

}