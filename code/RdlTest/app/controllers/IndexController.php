<?php

use App\Services\AbstractService;
use App\Services\ServiceException;
use App\Services\CatalogoService;
use App\Services\IndexService;


class IndexController extends ControllerBase
{

    //protected indexService = new IndexService();

    public function indexAction()
    {
        
    }

    public function consultarAction(){
        $data = [];

        
        $data['login'] = $this->request->getPost('login');
        
        if( $this->request->isPost() ){
            echo "Peticion de tipo POST \n\n";
        }else if( $this->request->isGet() ){
            echo "Peticion de tipo GET \n\n";
        }else{
            echo "Peticion indefinida";
        }
        
        return "<p><label>Información del servicio REST.</label></p>";
    }

    /**
     * Regresa registro de catalogo.
     *
     * @return array
     */
    public function consultarCatalogoAction()
    {
        try {
            //$indexList = $this->indexService->getIndexList();
            //$indexS = new IndexService();
            //$indexList = $indexS->getIndexList();

            $indexS = new IndexService();
            $catalogo = $indexS->getCatalogo(1);
            
            echo "<h4>" . $catalogo->getId() . " | " . $catalogo->getClave() . " | " . $catalogo->getDescripcion() . "</h4>";
        } catch (ServiceException $e) {
            throw new Http500Exception(_('Internal Server Error'), $e->getCode(), $e);
        }

        return $catalogo;
    }
    
    /**
     * Regresa una lista de registros de catalogo.
     *
     * @return array
     */
    public function consultarCatalogoListAction()
    {
        try {
            $indexS = new IndexService();
            $catalogoList = $indexS->getCatalogoList();

            $catalogoListLength = count($catalogoList);
            for( $index=0; $index<$catalogoListLength; $index++ ){
                $catalogoIndex = $catalogoList[$index];
                echo "<h4>" . $catalogoIndex["id"] . " | " . $catalogoIndex["clave"] . " | " . $catalogoIndex["descripcion"] . "</h4>";
            }

        } catch (ServiceException $e) {
            throw new Http500Exception(_('Internal Server Error'), $e->getCode(), $e);
        }

        return $catalogoList;
    }    

    /**
     * Crea un nuevo registro en la tabla catalogo.
     *
     * @return array
     */
    public function crearCatalogoAction()
    {
        try {
            $catalogoData = array('clave' => "Clave 3",
                                  'descripcion' => "Registro 3");

            $indexS = new IndexService();
            $indexS->createCatalogo($catalogoData);
        } catch (ServiceException $e) {
            throw new Http500Exception(_('Internal Server Error'), $e->getCode(), $e);
        }

        return "El registro se inserto exitosamente!!!";
    }

    /**
     * Actualiza un registro de catalogo.
     *
     * @return array
     */
    public function actualizarCatalogoAction()
    {
        try {
            $catalogoData = array('id' => "5",
                                  'clave' => "Clave 5-5",
                                  'descripcion' => "Registro 5-5");

            $indexS = new IndexService();
            $indexS->updateCatalogo($catalogoData);
        } catch (ServiceException $e) {
            throw new Http500Exception(_('Internal Server Error'), $e->getCode(), $e);
        }

        return "El registro se inserto exitosamente!!!";
    }

    /**
     * Elimina un registro de catalogo.
     *
     * @return array
     */
    public function eliminarCatalogoAction()
    {
        try {
            $indexS = new IndexService();
            $indexS->deleteCatalogo(5);
        } catch (ServiceException $e) {
            throw new Http500Exception(_('Internal Server Error'), $e->getCode(), $e);
        }

        return "El registro se inserto exitosamente!!!";
    }    


    public function currentDate() {
        echo date('Y-m-d');
    }
}

