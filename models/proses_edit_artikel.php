<?php

require_once('../config/koneksi.php');
require_once('../models/database.php');
include "../models/m_artikel.php";

$connection = new Database($host, $user, $pass, $database);
$art = new Artikel($connection);

$id_artikel = $connection->conn->real_escape_string($_POST['id_artikel']);
$judul_artikel = $connection->conn->real_escape_string($_POST['judul_artikel']);
$kategori = $connection->conn->real_escape_string($_POST['kategori']);
$isi_artikel = $connection->conn->real_escape_string($_POST['isi_artikel']);
$author = $connection->conn->real_escape_string($_POST['author']);
date_default_timezone_set("Asia/Bangkok");
$tanggal = date("Y-m-d");

$pict = $_FILES['gambar_artikel']['name'];
$extensi = explode(".", $_FILES['gambar_artikel']['name']);
$gambar_artikel = "art-" . round(microtime(true)) . "." . end($extensi);
$sumber = $_FILES['gambar_artikel']['tmp_name'];

if ($pict == '') {
    $art->edit("UPDATE tb_artikel SET judul_artikel = '$judul_artikel', kategori = '$kategori', isi_artikel = '$isi_artikel', author = '$author', tanggal = '$tanggal' WHERE id_artikel = '$id_artikel'");
    echo "<script>window.location='?page=artikel';</script>";
    echo "<script>alert('Data Berhasil Diedit !')</script>";
} else {
    $gbr_awal = $art->tampil($id_artikel)->fetch_object()->gambar_artikel;
    unlink("../assets/img/artikel/" . $gbr_awal);

    $upload = move_uploaded_file($sumber, "../assets/img/artikel/" . $gambar_artikel);
    if ($upload) {
        $art->edit("UPDATE tb_artikel SET judul_artikel = '$judul_artikel', kategori = '$kategori', isi_artikel = '$isi_artikel', author = '$author', tanggal = '$tanggal', gambar_artikel = '$gambar_artikel' WHERE id_artikel = '$id_artikel'");
        echo "<script>alert('Data Berhasil Diedit !')</script>";
        echo "<script>window.location='?page=artikel';</script>";
    } else {
        echo "<script>window.location='?page=artikel';</script>";
    }
}
