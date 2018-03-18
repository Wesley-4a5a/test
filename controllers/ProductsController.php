<?php

//Security tegen direct access
// if(defined('APP_PATH') === false){
// 	die();
// }
// //of in kort
// defined('APP_PATH') || die();

require_once('AppControllerAbstract.php');

class ProductsController extends AppControllerAbstract{
//		$email = filter_input(INPUT_POST, 'email' , FILTER_SANITIZE_STRING);
//		$id = filter_input(INPUT_GET, 'id' , FILTER_SANITIZE_NUMBER_INT);
  private $ProductModel;

  public function __construct(){
    require_once(APP_PATH . '/models/ProductsModel.php');
    $this->ProductsModel = new ProductsModel();
  }

public function overview(){
  $product = $this->ProductsModel->getAll();
  $this->loadCompleteView('products/overview', ['product' => $product]);
}


public function addForm(){
  require_once(APP_PATH . '/models/FabriekenModel.php');
  $FabriekenModel = new FabriekenModel;
  $fabriek = $FabriekenModel->getAll();
  $this->loadCompleteView('products/addForm', ['fabriek' => $fabriek]);
}

public function addProduct(){
  $product = filter_input(INPUT_POST, 'product' , FILTER_SANITIZE_STRING);
  $prijs = filter_input(INPUT_POST, 'prijs' , FILTER_SANITIZE_NUMBER_FLOAT);
  $fabriek = filter_input(INPUT_POST, 'fabriek' , FILTER_SANITIZE_STRING);;
  $this->ProductsModel->addProduct($product, $prijs, $fabriek);
  $this->internalRedirect('products', 'overview');
}

public function productDetails(){
  $id = filter_input(INPUT_GET, 'id' , FILTER_SANITIZE_NUMBER_INT);
  $product = $this->ProductsModel->getOne($id);
  $voorraad = $this->ProductsModel->getVoorraad($id);
  $this->loadCompleteView('details/details', ['product' => $product, 'voorraad' => $voorraad]);
}

public function update(){
  $this->loadCompleteView('products/updateForm');
}

public function updateProduct(){
  $id = filter_input(INPUT_POST, 'id' , FILTER_SANITIZE_NUMBER_INT);
  $product = filter_input(INPUT_POST, 'product' , FILTER_SANITIZE_STRING);
  $prijs = filter_input(INPUT_POST, 'prijs' , FILTER_SANITIZE_NUMBER_FLOAT);
  $this->ProductsModel->update($id, $product, $prijs);
  $this->internalRedirect('products', 'overview');

}

public function delete(){
  $id = $_GET['id'];
  $this->ProductsModel->delete($id);
  $this->internalRedirect('products', 'overview');

}


}





?>
