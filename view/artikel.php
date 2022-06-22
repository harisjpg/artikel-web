<?php include "../models/m_artikel.php";

$art = new Artikel($connection);

if (@$_GET['act'] == '') {
?>

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">ARTIKEL</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahArtikel">
                Tambah Artikel
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Judul Artikel</th>
                            <th>Kategori</th>
                            <th>Author</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                        <?php $tampil = $art->tampil();
                        while ($print = $tampil->fetch_object()) { ?>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="../assets/img/artikel/<?php echo $print->gambar_artikel; ?>" alt="Gambar Artikel" width="100px"></td>
                            <td><?php echo $print->judul_artikel; ?></td>
                            <td><?php echo $print->kategori; ?></td>
                            <td><?php echo $print->author; ?></td>
                            <td><?php echo $print->tanggal; ?></td>
                            <td align="center">
                                <a id="edit_artikel" data-toggle="modal" data-target="#editArtikel" data-id="<?php echo $print->id_artikel; ?>" data-gambar="<?php echo $print->gambar_artikel; ?>" data-judul="<?php echo $print->judul_artikel; ?>" data-isi="<?php echo $print->isi_artikel; ?>" data-author="<?php echo $print->author; ?>" data-tanggal="<?php echo $print->tanggal; ?>" data-kategori="<?php echo $print->kategori; ?>">
                                    <button class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</button>
                                </a>
                                <a href="?page=artikel&act=del&id=<?php echo $print->id_artikel; ?>" onclick="return confirm('Yakin anda ingin menghapus ?')">
                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                                </a>
                                <a data-toggle="modal" id="detail_artikel" data-target="#detailArtikel" data-id="<?php echo $print->id_artikel; ?>" data-judul="<?php echo $print->judul_artikel; ?>" data-isi="<?php echo $print->isi_artikel; ?>">
                                    <button class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Detail</button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <!-- START MODAL TAMBAH -->
    <div class="modal fade" id="tambahArtikel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Artikel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="gambar_artikel">Gambar</label>
                            <input type="file" class="form-control" name="gambar_artikel" id="gambar_artikel" required>
                        </div>
                        <div class="form-group">
                            <label for="judul_artikel">Judul Artikel</label>
                            <input type="text" name="judul_artikel" class="form-control" id="judul_artikel" required>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <?php
                            $data_kategori = array();
                            $ambil = $conn->query("SELECT * FROM tb_kategori");
                            while ($pecah = $ambil->fetch_array()) {
                                $data_kategori[] = $pecah;
                            }
                            ?>
                            <select name="kategori" class="form-control" required="">
                                <option value="">--- Pilih Kategori ---</option>
                                <?php foreach ($data_kategori as $key => $value) : ?>
                                    <option value="<?php echo $value['kategori']; ?>"><?php echo $value['kategori']; ?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="author" class="control-label">Author</label>
                            <input type="text" name="author" class="form-control" id="author" required>
                        </div>
                        <div class="form-group">
                            <label for="isi_artikel" class="control-label">Isi Artikel</label>
                            <textarea class="form-control html-editor" name="isi_artikel" id="isi_artikel"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="tambah" value="Tambah">Tambah</button>
                        </div>
                    </form>
                    <?php
                    if (@$_POST['tambah']) {
                        $judul_artikel = $connection->conn->real_escape_string($_POST['judul_artikel']);
                        $kategori = $connection->conn->real_escape_string($_POST['kategori']);
                        $isi_artikel = $connection->conn->real_escape_string($_POST['isi_artikel']);
                        $author = $connection->conn->real_escape_string($_POST['author']);
                        date_default_timezone_set("Asia/Bangkok");
                        $tanggal = date("Y-m-d");

                        $extensi = explode(".", $_FILES['gambar_artikel']['name']);
                        $gambar_artikel = "art-" . round(microtime(true)) . "." . end($extensi);
                        $sumber = $_FILES['gambar_artikel']['tmp_name'];

                        $upload = move_uploaded_file($sumber, "../assets/img/artikel/" . $gambar_artikel);
                        if ($upload) {
                            $art->tambah($gambar_artikel, $judul_artikel, $kategori, $isi_artikel, $author, $tanggal);
                            echo "<script>alert('Data Berhasil Disimpan !')</script>";
                            echo "<script>window.location='?page=artikel';</script>";
                        } else {
                            echo "<script>alert('Upload Gambar Gagal!')</script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL TAMBAH -->

    <!-- STAR MODAL EDIT -->
    <div class="modal fade" id="editArtikel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Artikel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-edit">
                    <form id="form" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="gambar_artikel">Gambar</label>
                            <input type="hidden" name="id_artikel" id="id_artikel">
                            <div style="padding-bottom:9px">
                                <img src="" width="80px" id="pict" alt="Gambar Artikel">
                            </div>
                            <input type="file" class="form-control" name="gambar_artikel" id="gambar_artikel">
                        </div>
                        <div class="form-group">
                            <label for="judul_artikel">Judul Artikel</label>
                            <input type="text" name="judul_artikel" class="form-control" id="judul_artikel" required>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <?php
                            $data_kategori = array();
                            $ambil = $conn->query("SELECT * FROM tb_kategori");
                            while ($pecah = $ambil->fetch_array()) {
                                $data_kategori[] = $pecah;
                            }
                            ?>
                            <select name="kategori" class="form-control" required="" id="kategori">
                                <option value="">--- Pilih Kategori ---</option>
                                <?php foreach ($data_kategori as $key => $value) : ?>
                                    <option value="<?php echo $value['kategori']; ?>"><?php echo $value['kategori']; ?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="author" class="control-label">Author</label>
                            <input type="text" name="author" class="form-control" id="author" required>
                        </div>
                        <div class="form-group">
                            <label for="isi_artikel" class="control-label">Isi Artikel</label>
                            <textarea class="form-control html-editor" name="isi_artikel" id="isi_artikel"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="edit" value="Ubah">Ubah</button>
                        </div>
                    </form>
                </div>
                <script src="../assets/vendor/jquery/jquery.min.js"></script>
                <script type="text/javascript">
                    $(document).on("click", "#edit_artikel", function() {
                        var idartikel = $(this).data('id');
                        var gambarartikel = $(this).data('gambar');
                        var judulartikel = $(this).data('judul');
                        var kategori = $(this).data('kategori');
                        var isiartikel = $(this).data('isi');
                        var author = $(this).data('author');


                        $("#modal-edit #pict").attr("src", "../assets/img/artikel/" + gambarartikel);
                        $("#modal-edit #id_artikel").val(idartikel);
                        $("#modal-edit #judul_artikel").val(judulartikel);
                        $("#modal-edit #kategori").val(kategori);
                        $("#modal-edit #author").val(author);
                        $("#modal-edit #isi_artikel").val(isiartikel);
                        $("#modal-edit #author").val(author);

                    })

                    $(document).ready(function(e) {
                        $("#form").on("submit", (function(e) {
                            e.preventDefault();
                            $.ajax({
                                url: '../models/proses_edit_artikel.php',
                                type: 'POST',
                                data: new FormData(this),
                                contentType: false,
                                cache: false,
                                processData: false,
                                success: function(msg) {
                                    $('.table').html(msg);
                                }
                            })
                        }))
                    })
                </script>
            </div>
        </div>
    </div>
    <!-- END MODAL EDIT -->

    <!-- STAR MODAL DETAIL -->
    <div class="modal fade" id="detailArtikel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Artikel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-detail">
                    <form enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="judul_artikel">Judul Artikel</label>
                            <input type="text" name="judul_artikel" class="form-control" id="judul_artikel" disabled>
                        </div>
                        <div class="form-group">
                            <label for="isi_artikel" class="control-label">Isi Artikel</label>
                            <textarea class="form-control html-editor" name="isi_artikel" id="isi_artikel" disabled></textarea>
                        </div>
                    </form>
                </div>
                <script src="../assets/vendor/jquery/jquery.min.js"></script>
                <script type="text/javascript">
                    $(document).on("click", "#detail_artikel", function() {
                        var idartikel = $(this).data('id');
                        var judulartikel = $(this).data('judul');
                        var isiartikel = $(this).data('isi');

                        $("#modal-detail #id_artikel").val(idartikel);
                        $("#modal-detail #judul_artikel").val(judulartikel);
                        $("#modal-detail #isi_artikel").val(isiartikel);
                    })
                </script>
            </div>
        </div>
    </div>
    <!-- END MODAL DETAIL -->

    <!-- Hapus -->
<?php
} else if (@$_GET['act'] == 'del') {
    $gbr_awal = $art->tampil($_GET['id'])->fetch_object()->gambar_artikel;
    unlink("../assets/img/artikel/" . $gbr_awal);

    $art->hapus($_GET['id']);
    echo "<script>window.location='?page=artikel';</script>";
}
?>