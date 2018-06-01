<?php
include('password.php');

class User extends Password{

  //Atributo para conexión a SGBD
  private $pdo;

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

	private function get_user_hash($username)
  {
		try {
			$stmt = $this->pdo->prepare('SELECT password, username, memberID FROM members WHERE username = :username AND active="S" ');
			$stmt->execute(array('username' => $username));

			return $stmt->fetch();
		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	public function isValidUsername($username)
  {
		if (strlen($username) < 3) return false;
		if (strlen($username) > 17) return false;
		if (!ctype_alnum($username)) return false;
		return true;
	}

	public function login($username,$password)
  {
		if (!$this->isValidUsername($username)) return false;
		if (strlen($password) < 3) return false;

		$row = $this->get_user_hash($username);

		if($this->password_verify($password,$row['password']) == 1){
		    $_SESSION['loggedin'] = true;
		    $_SESSION['username'] = $row['username'];
		    $_SESSION['memberID'] = $row['memberID'];
		    return true;
		}
	}

	public function logout()
  {
		session_destroy();
	}

	public function is_logged_in()
  {
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}

  public function ExisteUsuario($username)
  {
    try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el nit del proveedor.
			$stm = $this->pdo->prepare("SELECT username FROM members WHERE username = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro nit.
			$stm->execute(array($username));
			$row = $stm->fetch(PDO::FETCH_ASSOC);

      return $row['username'];
		} catch (Exception $e) {
			die($e->getMessage());
		}
  }

  public function ExisteMail($email)
  {
    try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el nit del proveedor.
			$stm = $this->pdo->prepare("SELECT email FROM members WHERE email = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro nit.
			$stm->execute(array($email));
			$row = $stm->fetch(PDO::FETCH_ASSOC);

      return $row['email'];
		} catch (Exception $e) {
			die($e->getMessage());
		}
  }

  public function ResetToken($resetToken)
  {
    try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el nit del proveedor.
			$stm = $this->pdo->prepare("SELECT resetToken, resetComplete FROM members WHERE resetToken = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro nit.
			$stm->execute(array($resetToken));
			$row = $stm->fetch(PDO::FETCH_ASSOC);

      return $row;
		} catch (Exception $e) {
			die($e->getMessage());
		}
  }

  public function UpdatePassword($hashedpassword, $resetToken)
  {
    try
    {
      //Sentencia SQL para selección de datos utilizando
      //la clausula Where para especificar el nit del proveedor.
      $stm = $this->pdo->prepare("UPDATE members SET password = ?, resetComplete = 'S'  WHERE resetToken = ?");
      //Ejecución de la sentencia SQL utilizando el parámetro nit.
      $stm->execute(array($hashedpassword, $resetToken));
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function CrearUsuario(User $data)
  {
    try
    {
      //Sentencia SQL.
      $sql = "INSERT INTO members (username,password,email,active) VALUES (?, ?, ?, ?)";

      $this->pdo->prepare($sql)
         ->execute(array($data->username,
                        $data->hashedpassword,
                        $data->email,
                        $data->activasion));

      $data->memberID = $this->pdo->lastInsertId('memberID');
      return $data;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

}


?>
