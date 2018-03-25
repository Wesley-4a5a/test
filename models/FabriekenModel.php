<?php

require_once('ConnectionModel.php');

class FabriekenModel extends ConnectionModel
{

	public function getAll()
	{
		$conn  = $this->getDbConnection();
		$stmt = $conn->prepare("SELECT * FROM fabriek");
		$stmt->execute();
		$arr = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $arr;
	}

	public function delete($id)
	{
		$conn  = $this->getDbConnection();
		$stmt = $conn->prepare("DELETE FROM fabriek WHERE fabriek_id=:id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
	}

	public function addFabriek($naam)
	{
		$conn  = $this->getDbConnection();
		$stmt = $conn->prepare("INSERT INTO fabriek (naam) VALUES (:naam)");
		$stmt->bindParam(':naam', $naam);
		$stmt->execute();
	}

	public function update($id, $fabriek)
	{
		$conn  = $this->getDbConnection();
		$stmt = $conn->prepare("UPDATE fabriek SET naam = :naam WHERE fabriek_id=:id");
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':naam', $fabriek);
		$stmt->execute();
	}

}


?>
