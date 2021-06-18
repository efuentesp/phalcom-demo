<?php

namespace App\Services;

use App\Models\Catalogo;

//use App\Models\Index; --> Indica una entidad.

class IndexService extends AbstractService {
	/**
	 * La finalidad de este método es generar un nuevo registro.
	 *
	 * @param array $userData
	 */
    public function createIndex(array $indexData)
	{
		try {
			$user   = new Users();
			$result = $user->setLogin($userData['login'])
			               ->setPass(password_hash($userData['password'], PASSWORD_DEFAULT))
			               ->setFirstName($userData['first_name'])
			               ->setLastName($userData['last_name'])
			               ->create();

			if (!$result) {
				throw new ServiceException('Unable to create user', self::ERROR_UNABLE_CREATE_CATALOGO);
			}

		} catch (\PDOException $e) {
			if ($e->getCode() == 23505) {
				throw new ServiceException('User already exists', self::ERROR_ALREADY_EXISTS, $e);
			} else {
				throw new ServiceException($e->getMessage(), $e->getCode(), $e);
			}
		}
	}
	
	/**
	 * Obtiene la información de un registro de Catalogo.
	 *
	 * @param int $catalogoId
	 */
	public function getCatalogo($catalogoId)
	{
		try {
			$catalogoModel = new Catalogo();
			$catalogo = $catalogoModel::findFirst(
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

	/**
	 * Obtiene lista con información de registros de Catalogo.
	 * 
	 * 
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
	 * Crea un nuevo registro en la tabla Catalogo.
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
	 * Actualiza la información de un registro en la tabla Catalogo.
	 *
	 * @param array $catalogoData
	 */
    public function updateCatalogo(array $catalogoData)
	{
		try {
			$catalogo   = new Catalogo();
			$catalogoFinded = Catalogo::findFirst(
				[
					'conditions' => 'id = :id:',
					'bind'       => [
						'id' => $catalogoData['id']
					]
				]
			);

			$result = $catalogoFinded->setClave($catalogoData['clave'])
			                   		 ->setDescripcion($catalogoData['descripcion'])
							   		 ->update();

			if (!$result) {
				throw new ServiceException('No se pudo actualizar el catálogo', self::ERROR_UNABLE_UPDATE_CATALOGO);
			}

		} catch (\PDOException $e) {
			throw new ServiceException($e->getMessage(), $e->getCode(), $e);
		}
	}	
	
	/**
	 * Elimina la información de un registro en la tabla Catalogo.
	 *
	 * @param int $catalogoId
	 */
    public function deleteCatalogo(int $catalogoId)
	{
		try {
			$catalogo   = new Catalogo();
			$catalogoFinded = Catalogo::findFirst(
				[
					'conditions' => 'id = :id:',
					'bind'       => [
						'id' => $catalogoId
					]
				]
			);

			if (!$catalogoFinded) {
				throw new ServiceException("Catalogo not found", self::ERROR_CATALOGO_NOT_FOUND);
			}

			$result = $catalogoFinded->delete();

			if (!$result) {
				throw new ServiceException('No se pudo generar el catálogo', self::ERROR_UNABLE_CREATE_CATALOGO);
			}

		} catch (\PDOException $e) {
			throw new ServiceException($e->getMessage(), $e->getCode(), $e);
		}
	}

	public function getIndex()
	{
		try {
			
			$catalogoModel = new Catalogo();
			$catalogos = $catalogoModel->findTest();

			if (!$catalogos) {
				return [];
			}
			
			//return $catalogos->toArray();
			return $catalogos;
			
		} catch (\PDOException $e) {
			throw new ServiceException($e->getMessage(), $e->getCode(), $e);
		}
	}	
}