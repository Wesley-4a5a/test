<?php

require_once('ConnectionModel.php');

class ProductsModel extends ConnectionModel
{

	public function getAll()
	{
		$conn  = $this->getDbConnection();
		$stmt = $conn->prepare("SELECT * FROM Product INNER JOIN fabriek ON product.fabriek_id = fabriek.fabriek_id");
		$stmt->execute();
		$arr = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $arr;
	}


	public function getOne($id)
	{
		$conn  = $this->getDbConnection();
		$stmt = $conn->prepare("SELECT * FROM Product INNER JOIN fabriek ON product.fabriek_id = fabriek.fabriek_id WHERE product.product_id = $id");
		$stmt->execute();
		$arr = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $arr;
	}

	public function getVoorraad($id)
	{
		$conn  = $this->getDbConnection();
		$stmt = $conn->prepare("SELECT * FROM opslag_product INNER JOIN opslag ON opslag.opslag_id = opslag_product.opslag_id INNER JOIN product ON product.product_id = opslag_product.product_id WHERE product.product_id = $id");
		$stmt->execute();
		$arr = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $arr;
	}

	public function delete($id)
	{
		$conn  = $this->getDbConnection();
		$stmt = $conn->prepare("DELETE FROM Product WHERE product_id=:id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$affectedRows = $stmt->rowCount();
		return $affectedRows;
	}

	public function addProduct($product, $prijs, $fabriek)
	{
		$conn  = $this->getDbConnection();
		$stmt = $conn->prepare("INSERT INTO Product (fabriek_id, product, prijs) VALUES (:fabriek_id, :product, :prijs)");
		$stmt->bindParam(':fabriek_id', $fabriek);
		$stmt->bindParam(':product', $product);
		$stmt->bindParam(':prijs', $prijs);
		$stmt->execute();
		$affectedRows = $stmt->rowCount();
		return $affectedRows;
	}

	public function update($id, $product, $prijs)
	{
		$conn  = $this->getDbConnection();
		$stmt = $conn->prepare("UPDATE Product SET product = :product, prijs = :prijs WHERE product_id= :id");
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':product', $product);
		$stmt->bindParam(':prijs', $prijs);
		$stmt->execute();
		$affectedRows = $stmt->rowCount();
		return $affectedRows;
	}

}


?>
