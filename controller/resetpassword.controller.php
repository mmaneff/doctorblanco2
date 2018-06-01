<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/user.php';

class ResetPasswordController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new User();
    }

    public function showError($title, $message, $type) {
      if($type == "404") {
        include 'view/error404.php';
      }
      elseif ($type == "500") {
        include 'view/error.php';
      }
    }

    public function redirect($location) {
      header('Location: '.$location);
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/header2.php';
        require_once 'view/resetpassword/resetpassword.php';
        require_once 'view/footer2.php';
    }

    public function ResetPwd()
    {
      try {
        $resetToken = hash('SHA256', ($_GET['key']));
        $row = $this->model->ResetToken($resetToken);

        //if no token from db then kill the page
        if(empty($row['resetToken'])){
        	$stop = 'Invalid token provided, please use the link provided in the reset email.';
        } elseif($row['resetComplete'] == 'Yes') {
        	$stop = 'Your password has already been changed!';
        }

        //if form has been submitted process it
        if(isset($_POST['submit'])){
          if (!isset($_POST['password']) || !isset($_POST['passwordConfirm']))
            $error[] = 'Both Password fields are required to be entered';
          //basic validation
          if(strlen($_POST['password']) < 3){
            $error[] = 'Password is too short.';
          }
          if(strlen($_POST['passwordConfirm']) < 3){
            $error[] = 'Confirm password is too short.';
          }
          if($_POST['password'] != $_POST['passwordConfirm']){
            $error[] = 'Passwords do not match.';
          }
          //if no errors have been created carry on
          if(!isset($error)){
            //hash the password
            $hashedpassword = $this->model->password_hash($_POST['password'], PASSWORD_BCRYPT);
            try {
              $this->model->UpdatePassword($hashedpassword, $row['resetToken']);
              //redirect to index page
              header('Location: login.php');
              exit;
              //else catch the exception and show the error.
            } catch(PDOException $e) {
              $error[] = $e->getMessage();
            }
          }
        }
      } catch (Exception $e) {
        $this->showError("Unautorizer","Error", "500");
      }
    }

}
