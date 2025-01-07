<?php include "header.php"; ?>

<?php

// Uji jika tombol simpan diklik
if(isset($_POST['bsimpan'])) {
    $tgl = date('Y-m-d');

    $nama = htmlspecialchars( $_POST['nama'], ENT_QUOTES);
    $alamat = htmlspecialchars( $_POST['alamat'], ENT_QUOTES);
    $tujuan = htmlspecialchars( $_POST['tujuan'], ENT_QUOTES);
    $nope = htmlspecialchars( $_POST['nope'], ENT_QUOTES);

    $simpan = mysqli_query($koneksi, "INSERT INTO ttamu VALUES ('','$tgl','$nama','$alamat','$tujuan','$nope')");
    
    if($simpan) {
        echo "<script>alert('simpan data sukses, terimakasih..!');document.location='?'</script>";
    } else{
        echo "<script>alert('simpan data gagal!!!');document.location='?'</script>";
    }
}
?>



    <!-- head -->
    <div class="head text-center">
        <img src="assets/img/logo.png" width="350" height="250">
        <h2 class="text-white">Sistem Informasi Buku Tamu <br> Davincy</h2>
    </div>
    <!-- end head -->

    <!-- awal row -->
    <div class="row mt-2">
        <!-- col-lg-7 -->
        <div class="col-lg-7 mb-3">
            <div class="card shadow bg-gradient-light">
                <!-- card body -->
                <div class="card-body text-center">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Identitas Pengunjung</h1>
                            </div>
                            <form class="user" method="POST" action="">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama Pengunjung" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="alamat" placeholder="Alamat Pengunjung" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="tujuan" placeholder="Tujuan Pengunjung" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="nope" placeholder="NO.hp Pengunjung" required>
                                </div>

                                <button type="submit" name="bsimpan" class="btn btn-primary btn-user btn-block">Simpan Data</button>
                                <a href="logout.php" class="btn btn-danger btn-user btn-block"><i class="fa fa-sign-out-alt">Logout</i></a>
                                
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="#">By. Davincy | 2024 - <?=date('Y') ?> </a>
                            </div>
                </div>
                <!-- end card-body -->
            </div>
        </div>
        <!-- end col-lg-7 -->



    </div>
    <!-- end row -->

                        

    </div>

    <?php include "footer.php";?>