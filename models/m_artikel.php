<?php
class Artikel
{

    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampil($id = null)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_artikel";
        if ($id != null) {
            $sql .= " WHERE id_artikel = $id";
        }
        $query = $db->query($sql) or die($db->error);
        return $query;
    }

    public function tambah($gambar_artikel, $judul_artikel, $kategori, $isi_artikel, $author, $tanggal)
    {
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO tb_artikel VALUES ('', '$gambar_artikel', '$judul_artikel', '$kategori', '$isi_artikel', '$author', '$tanggal')") or die($db->error);
    }

    public function edit($sql)
    {
        $db = $this->mysqli->conn;
        $db->query($sql) or die($db->error);
    }

    public function hapus($id)
    {
        $db = $this->mysqli->conn;
        $db->query("DELETE FROM tb_artikel WHERE id_artikel = '$id'") or die($db->error);
    }

    function __destruct()
    {
        $db = $this->mysqli->conn;
        $db->close();
    }
}
