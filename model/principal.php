<?php
class principal
{
	private $pdo;

    public $principal_id;
    public $detalles;
    public $foto;
    public $titulo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::Conectar();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM principal");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($principal_id)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM principal WHERE principal_id = ?");
			$stm->execute(array($principal_id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function ObtenerInfo()
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT principal_id, titulo, detalles, foto FROM principal");
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE principal SET
						titulo      = ?,
						detalles    = ?,
            foto        = ?
				    WHERE principal_id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array($data->titulo,
                  $data->detalles,
                  $data->foto,
                  $data->principal_id)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}


}
