<?php 

namespace App\Models;

class Catalogo extends \Phalcon\Mvc\Model 
{
// --------------------------------------    
// - Definicion de atributos del Model. -
// --------------------------------------
    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=32, nullable=false)
     */
    protected $id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $clave;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */    
    protected $descripcion;

//    protected $fechaAlta;

//    protected $fechaActualizacion;

//    protected $fechaBaja;


// ---------------------------------------
// - Definición de metodos getter/setter -
// ---------------------------------------
    /**
     * Asigna un valor al campo id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Obtiene el valor del campo id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }    

    /**
     * Asigna un valor al campo clave
     *
     * @param string $clave
     * @return $this
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Obtiene el valor del campo clave
     *
     * @return string
     */
    public function getClave()
    {
        return $this->clave;
    }    

    /**
     * Asigna un valor al campo descripcion
     *
     * @param string $descripcion
     * @return $this
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Obtiene el valor del campo descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

// ---------------------------------------------------------    
// - Mapeo con Base de datos y definicion de funcionalidad -
// ---------------------------------------------------------

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
	    $this->setSchema("docker");
    }

	/**
	 * Returns table name mapped in the model.
	 *
	 * @return string
	 */
    public function getSource()
    {
        return 'Catalogo';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     *
     * @return Catalogo[]|Catalogo
     */
	public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

	/**
	 * Allows to query the first record that match the specified conditions
	 *
	 * @param mixed $parameters
	 * @return Catalogo
	 */
	public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }    


	public static function findTest()
    {
        $catalogo = new Catalogo();
        $catalogo->setId(1)
                 ->setClave("Clave 1")
                 ->setDescripcion("Catalogo - Clave 1");

        return $catalogo;
    }      
}


