<?php

require_once('ConnectionModel.php');

class AccountsModel extends ConnectionModel
{

  function __contruct(){

  }

  public function register($email, $pass){
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $conn = $this->getDbConnection();
		$stmt = $conn->prepare("INSERT INTO accounts (email, password) VALUES (:email, :password)");
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $pass);
		$stmt->execute();
  }

  public function login($email, $pass){
    $conn = $this->getDbConnection();
    $stmt = $conn->prepare("SELECT email, password FROM accounts");
    $stmt->execute();
		$arr = $stmt->fetchAll(PDO::FETCH_OBJ);
    foreach($arr as $row){
      if($row->email == $email && $row->password == password_verify($pass, $row->password)){
        var_dump('flikker logged in');
        $_SESSION['email'] = $row->email;
        return true;
      }
    }
    return false;
  }

  public function getAll(){
    $conn = $this->getDbConnection();
    $stmt = $conn->prepare("SELECT account_id, email FROM accounts");
    $stmt->execute();
    $arr = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $arr;
  }

  public function delete($id){
    $conn = $this->getDbConnection();
    $stmt = $conn->prepare("DELETE FROM accounts WHERE account_id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }

}


?>
