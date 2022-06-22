<?php include "../models/m_kategori.php";

$ka = new Katego($connection);

if (@$_GET['act'] == '') {
?>

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">KATEGORI</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahKategori">
                Tambah Kategori
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kategori Artikel</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                        <?php $tampil = $ka->tampil();
                        while ($print = $tampil->fetch_object()) { ?>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $print->kategori; ?></td>
                            <td><img src="../assets/img/kategori/<?php echo $print->gambar; ?>" alt="Gambar Kategori" width="100px"></td>
                            <td align="center">
                                <a id="edit_kategori" data-toggle="modal" data-target="#editKategori" data-id="<?php echo $print->id_kategori; ?>" data-kategori="<?php echo $print->kategori; ?>" data-gam="<?php echo $print->gambar; ?>">
                                    <button class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</button>
                                </a>
                                <a href="?page=kategori&act=del&id=<?php echo $print->id_kategori; ?>" onclick="return confirm('Yakin anda ingin menghapus ?')">
                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
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
    <div class="modal fade" id="tambahKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="kategori">Kategori Artikel</label>
                            <input type="text" name="kategori" class="form-control" id="kategori" required>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar Kategori</label>
                            <input type="file" class="form-control" name="gambar" id="gambar" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="tambah" value="Tambah">Tambah</button>
                        </div>
                    </form>
                    <?php
                    if (@$_POST['tambah']) {
                        $kategori = $connection->conn->real_escape_string($_POST['kategori']);

                        $extensi = explode(".", $_FILES['gambar']['name']);
                        $gambar = "ka-" . round(microtime(true)) . "." . end($extensi);
                        $sumber = $_FILES['gambar']['tmp_name'];

                        $upload = move_uploaded_file($sumber, "../assets/img/kategori/" . $gambar);
                        if ($upload) {
                            $ka->tambah($kategori, $gambar);
                            echo "<script>alert('Data Berhasil Disimpan !')</script>";
                            echo "<script>window.location='?page=kategori';</script>";
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
    <div class="modal fade" id="editKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <label for="kategori">Kategori Artikel</label>
                            <input type="text" name="kategori" class="form-control" id="kategori" required>
                            <input type="hidden" name="id_kategori" id="id_kategori">
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar Kategori</label>
                            <div style="padding-bottom:9px">
                                <img src="" width="80px" id="pict" alt="Gambar Kategori">
                            </div>
                            <input type="file" class="form-control" name="gambar" id="gambar">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="tambah" value="Tambah">Tambah</button>
                        </div>
                    </form>
                </div>
                <script src="../assets/vendor/jquery/jquery.min.js"></script>
                <script type="text/javascript">
                    $(document).on("click", "#edit_kategori", function() {
                        var idkategori = $(this).data('id');
                        var namakate = $(this).data('kategori');
                        var gambare = $(this).data('gam');


                        $("#modal-edit #id_kategori").val(idkategori);
                        $("#modal-edit #kategori").val(namakate);
                        $("#modal-edit #pict").attr("src", "../assets/img/kategori/" + gambare);
                    })

                    $(document).ready(function(e) {
                        $("#form").on("submit", (function(e) {
                            e.preventDefault();
                            $.ajax({
                                url: '../models/proses_edit_kategori.php',
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

    <!-- Hapus -->
<?php
} else if (@$_GET['act'] == 'del') {
    $gbr_awal = $ka->tampil($_GET['id'])->fetch_object()->gambar;
    unlink("../assets/img/kategori/" . $gbr_awal);

    $ka->hapus($_GET['id']);
    echo "<script>window.location='?page=kategori';</script>";
}
?>