<?php

require_once 'model/DB.class.php';

class TabelBoneka extends DB
{
    function getAll()
    {
        $query = "SELECT * FROM boneka";

        return $this->execute($query);
    }

    function getById($id)
    {
        $query = "SELECT * FROM boneka WHERE id = '$id'";

        return $this->execute($query);
    }

    function create($nama, $harga)
    {
        $query = "INSERT INTO boneka (nama, harga) VALUES ('$nama', '$harga')";

        return $this->execute($query);
    }

    function update($id, $nama, $harga)
    {
        $query = "UPDATE boneka SET nama = '$nama', harga = '$harga' WHERE id = '$id'";

        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM boneka WHERE id = '$id'";

        return $this->execute($query);
    }
}
