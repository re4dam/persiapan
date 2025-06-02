<?php
require_once 'model/Boneka.class.php';
require_once 'model/TabelBoneka.class.php';

class BonekaViewModel
{
    // private $boneka;
    private $tabelBoneka;
    private $data = [];

    public function __construct()
    {
        // $this->boneka = new Boneka();
        $this->tabelBoneka = new TabelBoneka("localhost", "root", "", "db_boneka");
    }

    public function getBonekaList()
    {
        // encapsulation use
        $this->tabelBoneka->open();
        $this->tabelBoneka->getAll();

        while ($row = $this->tabelBoneka->getResult()) {
            $boneka = new Boneka();
            $boneka->setId($row['id']);
            $boneka->setNama($row['nama']);
            $boneka->setHarga($row['harga']);

            $this->data[] = $boneka;
        }
        // Tutup koneksi
        $this->tabelBoneka->close();

        // simplified use
        // return $this->tabelBoneka->getAll();
    }

    public function getBonekaById($id)
    {
        // encapsulation use
        $this->tabelBoneka->open();
        $this->tabelBoneka->getById($id);

        while ($row = $this->tabelBoneka->getResult()) {
            $boneka = new Boneka();
            $boneka->setId($row['id']);
            $boneka->setNama($row['nama']);
            $boneka->setHarga($row['harga']);

            $this->data[] = $boneka;
        }
        // Tutup koneksi
        $this->tabelBoneka->close();

        // simplified use
        // return $this->tabelBoneka->getById($id);
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
        return $this->tabelBoneka->delete($id);
        $this->tabelBoneka->close();
    }

    public function getId($i)
    {
        return $this->data[$i]->id;
    }

    public function getNama($i)
    {
        return $this->data[$i]->nama;
    }

    public function getHarga($i)
    {
        return $this->data[$i]->harga;
    }

    public function getSize()
    {
        return sizeof($this->data);
    }
}
