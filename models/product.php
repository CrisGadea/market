<?php

class Product{
	private $id;
	private $category_id;
	private $name;
	private $description;
	private $price;
	private $stock;
	private $ofert;
	private $date;
	private $image;

	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}

	function getCategoryId() {
		return $this->category_id;
	}

	function getName() {
		return $this->name;
	}

	function getDescription() {
		return $this->description;
	}

	function getPrice() {
		return $this->price;
	}

	function getStock() {
		return $this->stock;
	}

	function getOfert() {
		return $this->ofert;
	}

	function getDate() {
		return $this->date;
	}

	function getImage() {
		return $this->image;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setCategoryId($category_id) {
		$this->category_id = $category_id;
	}

	function setname($name) {
		$this->name = $this->db->real_escape_string($name);
	}

	function setDescription($description) {
		$this->description = $this->db->real_escape_string($description);
	}

	function setPrice($price) {
		$this->price = $this->db->real_escape_string($price);
	}

	function setStock($stock) {
		$this->stock = $this->db->real_escape_string($stock);
	}

	function setOfert($ofert) {
		$this->ofert = $this->db->real_escape_string($ofert);
	}

	function setDate($date) {
		$this->date = $date;
	}

	function setImage($image) {
		$this->image = $image;
	}

	public function getAll(){
		$products = $this->db->query("SELECT * FROM products ORDER BY id DESC");
		return $products;
	}
	
	public function getAllCategory(){
		$sql = "SELECT p.*, c.name AS 'catname' FROM products p "
				. "INNER JOIN categorias c ON c.id = p.category_id "
				. "WHERE p.category_id = {$this->getCategoryId()} "
				. "ORDER BY id DESC";
		$products = $this->db->query($sql);
		return $products;
	}
	
	public function getRandom($limit){
		$products = $this->db->query("SELECT * FROM products ORDER BY RAND() LIMIT $limit");
		return $products;
	}
	
	public function getOne(){
		$producto = $this->db->query("SELECT * FROM products WHERE id = {$this->getId()}");
		return $producto->fetch_object();
	}
	
	public function save(){
		$sql = "INSERT INTO products VALUES(NULL, {$this->getCategoryId()}, '{$this->getName()}', '{$this->getDescription()}', {$this->getPrice()}, {$this->getStock()}, null, CURDATE(), '{$this->getImage()}');";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	public function edit(){
		$sql = "UPDATE products SET name='{$this->getName()}', description='{$this->getDescription()}', price={$this->getPrice()}, stock={$this->getStock()}, category_id={$this->getCategoryId()}  ";
		
		if($this->getImage() != null){
			$sql .= ", image='{$this->getImage()}'";
		}
		
		$sql .= " WHERE id={$this->id};";
		
		
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	public function delete(){
		$sql = "DELETE FROM products WHERE id={$this->id}";
		$delete = $this->db->query($sql);
		
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
	}
	
}