<?php

require_once('../config/koneksi.php');
require_once('../models/database.php');
include "../models/m_kategori.php";

$connection = new Database($host, $user, $pass, $database);
$ka = new Katego($connection);

$id_kategori = $connection->conn->real_escape_string($_POST['id_kategori']);
$kategori = $connection->conn->real_escape_string($_POST['kategori']);

$pict = $_FILES['gambar']['name'];
$extensi = explode(".", $_FILES['gambar']['name']);
$gambar = "ka-" . round(microtime(true)) . "." . end($extensi);
$sumber = $_FILES['gambar']['tmp_name'];

if ($pict == '') {
    $ka->edit("UPDATE tb_kategori SET kategori = '$kategori' WHERE id_kategori = '$id_kategori'");
    echo "<script>window.location='?page=kategori';</script>";
    echo "<script>alert('Data Berhasil Diedit !')</script>";
} else {
    $gbr_awal = $ka->tampil($id_kategori)->fetch_object()->gambar;
    unlink("../assets/img/kategori/" . $gbr_awal);

    $upload = move_uploaded_file($sumber, "../assets/img/kategori/" . $gambar);
    if ($upload) {
        $ka->edit("UPDATE tb_kategori SET kategori = '$kategori', gambar = '$gambar' WHERE id_kategori = '$id_kategori'");
        echo "<script>alert('Data Berhasil Diedit !')</script>";
        echo "<script>window.location='?page=kategori';</script>";
    } else {
        echo "<script>window.location='?page=kategori';</script>";
    }
}
