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
     * @Column(name="tipo", type="string", lenght=50, nullable=true)
     */
    public $tipo;

    /**
     * @Column(name="valor", type="decimal", lenght=10, precision=0, nullable=true)
     */
    public $valor;

    /**
     * @Column(name="descricao", type="string", lenght=255, nullable=true)
     */
    public $descricao;

    /**
	* @ManyToOne(targetEntity="Pessoa")
	* @JoinColumn(name="idPessoa", referencedColumnName="id")
    */
    public $idCliente;

    /**
	* @ManyToOne(targetEntity="PlanosConta")
	* @JoinColumn(name="planosConta", referencedColumnName="id")
    */
    public $planosConta;

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
        return $this->planosConta;
    }

    public function setPlanosConta($planosConta){				
            $this->planosConta = $planosConta;
            return $this->planosConta;
    }

}