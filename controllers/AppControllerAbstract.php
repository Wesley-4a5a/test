<?php
//Security tegen direct access
// if(defined('APP_PATH') === false){
// 	die();
// }
// //of in kort
// defined('APP_PATH') || die();


class AppControllerAbstract
{


  function __construct()
  {

  }

  function loadView($path , $vars = [])
  {
  	$viewPath = APP_PATH . '/views/' . $path . '.php';
  	extract($vars);
  	include $viewPath;
  }

  function loadCompleteView($contentView, $vars = [])
  {

    $this->loadView('theme/header');
    $this->loadView($contentView, $vars);
    $this->loadView('theme/footer');
  }

  function loginCheck(){
    if($_SESSION['login'] === true){
      return;
    }
    else{
		  $this->internalRedirect('pages', 'error');
      return;
    }
  }

	function redirect($url)
	{
		header('Location: '. $url);
		die;
	}

	function internalRedirect($controller, $action)
	{
		header('Location: ' . APP_BASE_URL . '/' . $controller . '/' . $action);
		die;
	}

}



 ?>
