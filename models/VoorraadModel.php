<?php

require_once('ConnectionModel.php');

class VoorraadModel extends ConnectionModel
{

	public function getAll()
	{
		$conn  = $this->getDbConnection();
		$stmt = $conn->prepare("SELECT *, opslag_product.voorraad AS OPvoorraad FROM ((opslag_product INNER JOIN product ON product.product_id = opslag_product.product_id) INNER JOIN opslag ON opslag.opslag_id = opslag_product.opslag_id)");
		$stmt->execute();
		$arr = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $arr;
	}

	public function delete($id)
	{
		$conn  = $this->getDbConnection();
		$stmt = $conn->prepare("DELETE FROM Product WHERE id=:id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$affectedRows = $stmt->rowCount();
		return $affectedRows;
	}

	public function addProduct($product, $voorraad, $prijs, $fabriek)
	{
		$conn  = $this->getDbConnection();
		$stmt = $conn->prepare("INSERT INTO Product (fabriek_id, product, voorraad, prijs) VALUES (:fabriek_id, :product, :voorraad, :prijs)");
		$stmt->bindParam(':fabriek_id', $fabriek);
		$stmt->bindParam(':product', $product);
		$stmt->bindParam(':voorraad', $voorraad);
		$stmt->bindParam(':prijs', $prijs);
		$stmt->execute();
		$affectedRows = $stmt->rowCount();
		return $affectedRows;
	}

	public function update($id, $product, $voorraad, $prijs)
	{
		$conn  = $this->getDbConnection();
		$stmt = $conn->prepare("UPDATE Product SET product = :product WHERE id=:id");
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':product', $product);
		// $stmt->bindParam(':voorraad', $voorraad);
		// $stmt->bindParam(':prijs', $prijs);
		$stmt->execute();
		$affectedRows = $stmt->rowCount();
		return $affectedRows;
	}

}


?>
