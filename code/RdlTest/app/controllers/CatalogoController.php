<?php

namespace App\Controllers;

use App\Controllers\HttpExceptions\Http400Exception;
use App\Controllers\HttpExceptions\Http422Exception;
use App\Controllers\HttpExceptions\Http500Exception;

use App\Services\AbstractService;
use App\Services\ServiceException;
use App\Services\CatalogoService;


class CatalogoController extends AbstractController
{
    /**
     * Regresa una lista de catalogo.
     *
     * @return array
     */
    public function getCatalogoListAction()
    {
        try {
            $catalogoList = $this->catalogoService->getCatalogoList();
        } catch (ServiceException $e) {
            throw new Http500Exception(_('Internal Server Error'), $e->getCode(), $e);
        }

        return $catalogoList;
    }    

    public function catalogoAction()
    {
        try {
            $catalogoList = $this->catalogoService->getCatalogoList();
        } catch (ServiceException $e) {
            throw new Http500Exception(_('Internal Server Error'), $e->getCode(), $e);
        }

        return $catalogoList;
    }
}