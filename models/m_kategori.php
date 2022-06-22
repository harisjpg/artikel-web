<?php
class Katego
{

    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampil($id = null)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_kategori";
        if ($id != null) {
            $sql .= " WHERE id_kategori = $id";
        }
        $query = $db->query($sql) or die($db->error);
        return $query;
    }

    public function tambah($kategori, $gambar)
    {
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO tb_kategori VALUES ('', '$kategori', '$gambar')") or die($db->error);
    }

    public function edit($sql)
    {
        $db = $this->mysqli->conn;
        $db->query($sql) or die($db->error);
    }

    public function hapus($id)
    {
        $db = $this->mysqli->conn;
        $db->query("DELETE FROM tb_kategori WHERE id_kategori = '$id'") or die($db->error);
    }

    function __destruct()
    {
        $db = $this->mysqli->conn;
        $db->close();
    }
}
