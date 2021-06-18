<?php

namespace App\Services;

use App\Models\Catalogo;

class IndexService extends AbstractService {
	/** Unable to create user */
	const ERROR_UNABLE_CREATE_CATALOGO = 11001;

	/** User not found */
	const ERROR_CATALOGO_NOT_FOUND = 11002;

	/** No such user */
	const ERROR_INCORRECT_CATALOGO = 11003;

	/** Unable to update user */
	const ERROR_UNABLE_UPDATE_CATALOGO = 11004;

	/** Unable to delete user */
	const ERROR_UNABLE_DELETE_CATALOGO = 1105;


	/**
	 * La finalidad de este servicio es generar un nuevo registro en la entidad Catalogo.
	 *
	 * @param array $catalogoData
	 */
    public function createCatalogo(array $catalogoData)
	{
		try {
			$catalogo   = new Catalogo();
			$result = $catalogo->setClave($catalogoData['clave'])
			                   ->setDescripcion($catalogoData['descripcion'])
							   ->create();

			if (!$result) {
				throw new ServiceException('No se pudo generar el catálogo', self::ERROR_UNABLE_CREATE_CATALOGO);
			}

		} catch (\PDOException $e) {
			throw new ServiceException($e->getMessage(), $e->getCode(), $e);
		}
	}

	/**
	 * La finalidad de este servicio es obtener información de los catálogos.
	 *
	 * @return array
	 */
	public function getCatalogoList()
	{
		try {
			$catalogos = Catalogo::find(
				[
					'conditions' => '',
					'bind'       => [],
					'columns'    => "id, clave, descripcion",
				]
			);

			if (!$catalogos) {
				return [];
			}

			return $catalogos->toArray();
		} catch (\PDOException $e) {
			throw new ServiceException($e->getMessage(), $e->getCode(), $e);
		}
	}

	/**
	 * Delete an existing user
	 *
	 * @param int $userId
	 */
	public function getCatalogo($catalogoId)
	{
		try {
			$catalogo = Catalogo::findFirst(
				[
					'conditions' => 'id = :id:',
					'bind'       => [
						'id' => $catalogoId
					]
				]
			);

			if (!$catalogo) {
				throw new ServiceException("Catalogo not found", self::ERROR_CATALOGO_NOT_FOUND);
			}
			
			return $catalogo; 

		} catch (\PDOException $e) {
			throw new ServiceException($e->getMessage(), $e->getCode(), $e);
		}
	}

	public function getCatalogo()
	{
		try {
			/*
			$catalogoModel = new Catalogo();
			$catalogos = $catalogoModel->findTest();

			if (!$catalogos) {
				return [];
			}
			*/	
			//return $catalogos->toArray();
			//return $catalogos;
			return "HOLAAAA";
		} catch (\PDOException $e) {
			throw new ServiceException($e->getMessage(), $e->getCode(), $e);
		}
	}	
}