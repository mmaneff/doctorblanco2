<?php
class noticia
{
		private $pdo;

    public $idNoticia;
    public $detalles;
    public $detalle_corto;
    public $fecha;
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

			$stm = $this->pdo->prepare("SELECT * FROM noticias");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function GetAll()
	{
		try
		{
			$array = array();

			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el nit del proveedor.
			$stm = $this->pdo->prepare("SELECT * FROM noticias ORDER BY fecha DESC");
			//Ejecución de la sentencia SQL utilizando el parámetro nit.
			$stm->execute();
			//PDO::FETCH_OBJ: devuelve un objeto anónimo con nombres de propiedades que corresponden a las columnas.

			// Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
			while($row = $stm->fetch(PDO::FETCH_OBJ)){
				$obj = new noticia();
				$obj->noticia_id = $row->noticia_id;
				$obj->titulo = $row->titulo;
				$obj->detalle_corto = $row->detalle_corto;
				$obj->foto = $row->foto;
				$obj->fecha = $row->fecha;
				$obj->detalles = $row->detalles;

				array_push($array, $obj);
			}
			return $array;
		} catch (Exception $e) 	{
			die($e->getMessage());
		}
	}

	public function VerDetalle($noticia_id)
	{
		try
		{
			$array = array();

			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el nit del proveedor.
			$stm = $this->pdo->prepare("SELECT * FROM noticias WHERE noticia_id = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro nit.
			$stm->execute(array($noticia_id));
			//PDO::FETCH_OBJ: devuelve un objeto anónimo con nombres de propiedades que corresponden a las columnas.

			// Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
			while($row = $stm->fetch(PDO::FETCH_OBJ)){
				$obj = new noticia();
				$obj->noticia_id = $row->noticia_id;
				$obj->titulo = $row->titulo;
				$obj->detalles = $row->detalles;
				$obj->foto = $row->foto;

				array_push($array, $obj);
			}
			return $array;
		} catch (Exception $e) 	{
			die($e->getMessage());
		}
	}

	public function ObtenerUltimasNoticias()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM noticias ORDER BY fecha DESC");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idNoticia)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM noticias WHERE noticia_id = ?");
			$stm->execute(array($idNoticia));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idNoticia)
	{
		try
		{
			$stm = $this->pdo->prepare("DELETE FROM noticias WHERE noticia_id = ?");

			$stm->execute(array($idNoticia));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE noticias SET
						detalles      = ?,
            detalle_corto = ?,
            fecha         = ?,
            foto          = ?,
            titulo        = ?
				    WHERE noticia_id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array($data->detalles,
                  $data->detalle_corto,
                  $data->fecha,
                  $data->foto,
                  $data->titulo,
                  $data->noticia_id)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(noticia $data)
	{
		try
		{
		$sql = "INSERT INTO noticias (detalles,detalle_corto,fecha,foto,titulo)
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
					 array($data->detalles,
                $data->detalle_corto,
                $data->fecha,
                $data->foto,
                $data->titulo)
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
