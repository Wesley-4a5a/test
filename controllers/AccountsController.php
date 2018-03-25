<?php

//Security tegen direct access
// if(defined('APP_PATH') === false){
// 	die();
// }
// //of in kort
// defined('APP_PATH') || die();

require_once('AppControllerAbstract.php');

class AccountsController extends AppControllerAbstract{
//		$email = filter_input(INPUT_POST, 'email' , FILTER_SANITIZE_STRING);
//		$id = filter_input(INPUT_GET, 'id' , FILTER_SANITIZE_NUMBER_INT);
  private $AccountsModel;

  public function __construct(){
    require_once(APP_PATH . '/models/AccountsModel.php');
    $this->AccountsModel = new AccountsModel();
  }

  public function registreren(){
      $email = filter_input(INPUT_POST, 'username' , FILTER_SANITIZE_STRING);
      $pass = filter_input(INPUT_POST, 'password' , FILTER_SANITIZE_STRING);
      var_dump($email . $pass);
      $this->AccountsModel->register($email, $pass);
      $this->loadCompleteView('pages/home');
  }

  public function registreer(){
    var_dump('optyfen');
    $this->loadCompleteView('accounts/registreer');
  }

  public function login(){
    $email = filter_input(INPUT_POST, 'email' , FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST, 'pass' , FILTER_SANITIZE_STRING);
    $login = $this->AccountsModel->login($email, $pass);
    if($login === true){
      $_SESSION['login'] = true;
      $this->loadCompleteView('pages/home');
    }
    else{
      $this->internalRedirect('accounts', 'login');
    }
  }

  public function logout(){
    session_unset();
    $this->internalRedirect('pages', 'home');
  }

  public function gebruikers(){
    $gebruikers = $this->AccountsModel->getAll();
    $this->loadCompleteView('accounts/gebruikers', ['gebruikers' => $gebruikers]);

  }

  public function delete($id){
    $this->AccountsModel->delete($id);
    $this->internalRedirect('accounts', 'gebruikers');
  }



}





?>
