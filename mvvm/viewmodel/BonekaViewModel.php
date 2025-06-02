<?php
require_once 'model/Boneka.class.php';
require_once 'model/TabelBoneka.class.php';

class BonekaViewModel
{
    private $tabelBoneka;
    private $data = []; // For the list of all boneka
    public $bonekaToEdit = null; // For the single boneka being edited

    public function __construct()
    {
        $this->tabelBoneka = new TabelBoneka("localhost", "root", "", "db_boneka");
    }

    public function getBonekaList()
    {
        $this->data = []; // Clear previous list data
        $this->tabelBoneka->open();
        $this->tabelBoneka->getAll();

        while ($row = $this->tabelBoneka->getResult()) {
            $boneka = new Boneka();
            $boneka->setId($row['id']);
            $boneka->setNama($row['nama']);
            $boneka->setHarga($row['harga']);
            $this->data[] = $boneka;
        }
        $this->tabelBoneka->close();
    }

    public function getBonekaById($id)
    {
        $this->bonekaToEdit = null; // Reset
        $this->tabelBoneka->open();
        $this->tabelBoneka->getById($id); // Execute query for a single ID

        if ($row = $this->tabelBoneka->getResult()) { // Fetch the single row
            $boneka = new Boneka();
            $boneka->setId($row['id']);
            $boneka->setNama($row['nama']);
            $boneka->setHarga($row['harga']);
            $this->bonekaToEdit = $boneka; // Assign to the dedicated property
        }
        $this->tabelBoneka->close();
    }

    public function addBoneka($nama, $harga)
    {
        $this->tabelBoneka->open();
        $this->tabelBoneka->create($nama, $harga);
        $this->tabelBoneka->close();
    }

    public function updateBoneka($id, $nama, $harga)
    {
        $this->tabelBoneka->open();
        $this->tabelBoneka->update($id, $nama, $harga);
        $this->tabelBoneka->close();
    }

    public function deleteBoneka($id)
    {
        $this->tabelBoneka->open();
        $result = $this->tabelBoneka->delete($id); // Ensure to capture result if needed
        $this->tabelBoneka->close();
        return $result; // Return result of delete operation
    }

    // Methods for accessing the list data ($this->data)
    public function getId($i)
    {
        return $this->data[$i]->getId(); // Assuming Boneka object has getId()
    }

    public function getNama($i)
    {
        return $this->data[$i]->getNama(); // Assuming Boneka object has getNama()
    }

    public function getHarga($i)
    {
        return $this->data[$i]->getHarga(); // Assuming Boneka object has getHarga()
    }

    public function getSize()
    {
        return sizeof($this->data);
    }
}
