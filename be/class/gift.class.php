<?php
include 'conexion.class';

class Gift extends DB {
    private $id;
    private $gift;
    private $gifted;
    private $gifted_by;

    public function __construct() {
		echo "Hello World";
    }

    public function addGift($gift) {
        $query = "INSERT INTO lista_regalos (gift) VALUES ({$gift})";
        $conexionDB->exec($query);
    }

    public function freeGift() {
        $query = "UPDATE lista_regalos set gifted = 1, gifted_by = '" . $_POST['name'] . "' WHERE gift = '" . $_POST['gift'] . "'";
        $conexionDB->exec($query);
    }

    public function editGift() {

    }

    public function deleteGift() {

    }

    public function selectAll() {
        $this->select();
        $this->select("SELECT gift, gifted FROM lista_regalos");
    }

}