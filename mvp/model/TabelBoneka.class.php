<?php

class TabelBoneka extends DB
{
    function getBoneka()
    {
        $query = "SELECT * FROM boneka";

        return $this->execute($query);
    }

    function getBonekaById($id)
    {
        $query = "SELECT * FROM boneka WHERE id = '$id'";

        return $this->execute($query);
    }

    function createBoneka($id, $nama, $harga)
    {
        $query = "INSERT INTO boneka (nama, harga) VALUES ('$nama', '$harga')";

        return $this->execute($query);
    }

    function updateBoneka($id, $nama, $harga)
    {
        $query = "UPDATE boneka SET nama = '$nama', harga = '$harga' WHERE id = '$id'";

        return $this->execute($query);
    }

    function deleteBoneka($id)
    {
        $query = "DELETE FROM boneka WHERE id = '$id'";

        return $this->execute($query);
    }
}
