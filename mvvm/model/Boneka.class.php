<?php

class Boneka
{
    var $id = '';
    var $nama = '';
    var $harga = 0;

    function __construct($id = '', $nama = '', $harga = 0) // Pastikan tipe data harga konsisten (misal: integer)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->harga = $harga;
    }

    // Getter untuk id
    function getId()
    {
        return $this->id;
    }

    // Setter untuk id
    function setId($id)
    {
        $this->id = $id;
    }

    // Getter untuk nama
    function getNama()
    {
        return $this->nama;
    }

    // Setter untuk nama
    function setNama($nama)
    {
        $this->nama = $nama;
    }

    // Getter untuk harga
    function getHarga()
    {
        return $this->harga;
    }

    // Setter untuk harga
    function setHarga($harga)
    {
        $this->harga = $harga;
    }
}
