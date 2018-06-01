<?php
class tratamiento
{
	//Atributo para conexión a SGBD
	private $pdo;

		//Atributos del objeto proveedor
    public $tratamiento_id;
    public $creado_id;
    public $detalles;
    public $detalle_corto;
		public $fecha;
		public $foto;
		public $tipo_tratamiento_id;
		public $titulo;

	//Método de conexión a SGBD.
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

	//Este método selecciona todas las tuplas de la tabla
	//proveedor en caso de error se muestra por pantalla.
	public function Listar()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM tratamientos");
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}

	//Este método obtiene los datos del proveedor a partir del nit
	//utilizando SQL.
	public function Obtener($tratamiento_id)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el nit del proveedor.
			$stm = $this->pdo->prepare("SELECT * FROM tratamientos WHERE tratamiento_id = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro nit.
			$stm->execute(array($tratamiento_id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtenerPor($tipo_tratamiento_id)
	{
		try
		{
			$array = array();

			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el nit del proveedor.
			$stm = $this->pdo->prepare("SELECT * FROM tratamientos WHERE tipo_tratamiento_id = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro nit.
			$stm->execute(array($tipo_tratamiento_id));
			//PDO::FETCH_OBJ: devuelve un objeto anónimo con nombres de propiedades que corresponden a las columnas.

			// Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
			while($row = $stm->fetch(PDO::FETCH_OBJ)){
				$obj = new tratamiento();
    		$obj->tratamiento_id = $row->tratamiento_id;
    		$obj->titulo = $row->titulo;
				$obj->detalle_corto = $row->detalle_corto;
				$obj->foto = $row->foto;

				array_push($array, $obj);
			}
			return $array;
		} catch (Exception $e) 	{
			die($e->getMessage());
		}
	}

	public function VerDetalle($tratamiento_id)
	{
		try
		{
			$array = array();

			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el nit del proveedor.
			$stm = $this->pdo->prepare("SELECT * FROM tratamientos WHERE tratamiento_id = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro nit.
			$stm->execute(array($tratamiento_id));
			//PDO::FETCH_OBJ: devuelve un objeto anónimo con nombres de propiedades que corresponden a las columnas.

			// Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
			while($row = $stm->fetch(PDO::FETCH_OBJ)){
				$obj = new tratamiento();
    		$obj->tratamiento_id = $row->tratamiento_id;
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

	//Este método elimina la tupla proveedor dado un nit.
	public function Eliminar($tratamiento_id)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo->prepare("DELETE FROM tratamientos WHERE tratamiento_id = ?");

			$stm->execute(array($tratamiento_id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el nit del proveedor.
	public function Actualizar($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "UPDATE tratamientos SET
						creador_id          = ?,
						detalles        		= ?,
            detalle_corto       = ?,
						fecha        				= ?,
						foto        				= ?,
						tipo_tratamiento_id	= ?,
						titulo        			= ?
				    WHERE tratamiento_id = ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array($data->creador_id,
                 	$data->detalles,
                 	$data->detalle_corto,
                 	$data->fecha,
 									$data->foto,
 									$data->tipo_tratamiento_id,
 									$data->titulo,
									$data->tratamiento_id)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que registra un nuevo proveedor a la tabla.
	public function Registrar(tratamiento $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "INSERT INTO tratamientos (creador_id,detalles,detalle_corto,fecha,foto,tipo_tratamiento_id,titulo)
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
		     ->execute(
					 array($data->creador_id,
                $data->detalles,
                $data->detalle_corto,
                $data->fecha,
								$data->foto,
								$data->tipo_tratamiento_id,
								$data->titulo)
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
