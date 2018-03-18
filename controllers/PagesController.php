<?php
//Security tegen direct access
// if(defined('APP_PATH') === false){
// 	die();
// }
// //of in kort
// defined('APP_PATH') || die();
require_once('AppControllerAbstract.php');

class PagesController extends AppControllerAbstract
{
	public function home()
	{
		// loginCheck();
		$this->loadCompleteView('pages/home');
	}

	public function error()
	{
		// loginCheck();
		$this->loadCompleteView('pages/error');
	}


	public function about()
	{
		// loginCheck();
		$this->loadCompleteView('pages/about');
	}

}

?>
