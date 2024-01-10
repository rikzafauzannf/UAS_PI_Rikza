<?php
include("config/connect.php");
$plat = $_GET['plat'];
?>

<main class="my-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <?php
                $queryData = mysqli_query($link, "SELECT * FROM `tbl_mobil_rikza` WHERE tbl_mobil_rikza.no_plat_rikza = '$plat'");
                while ($row = mysqli_fetch_assoc($queryData)) :
                ?>
                    <div class="card border border-0 shadow mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3><?= $row['nama_mobil_rikza'] ?></h3>
                                    <hr>
                                </div>
                                <div class="col-md-4 fs-5"><?= $row['no_plat_rikza'] ?></div>
                                <div class="col-md-4 fs-5"><?= $row['brand_mobil_rikza'] ?></div>
                                <div class="col-md-4 fs-5"><?= $row['tipe_transmisi_rikza'] ?></div>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
                ?>

                <div class="card border border-0 shadow">
                    <div class="card-body">
                        <h5>Form Rental Mobil</h5>
                        <form action="" method="post">
                            
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="fw-bold">! JIKA BELUM ADA DATA PENYEWA</h1>
                <div class="card border border-0 shadow">
                    <div class="card-body">
                        <h5>Form Pengisian Data Diri</h5>
                        <form action="?logic=logic&crud=addPenyewa" method="post">
                            <div class="row g-3">
                                <input type="hidden" name="plat" value="<?= $plat ?>">
                                <div class="col-md-12">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="number" name="nik" id="nik" min="0" maxlength="16" class="form-control" placeholder="Masukan NIK sesuai dengan KTP">
                                </div>
                                <div class="col-md-12">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama sesuai dengan KTP">
                                </div>
                                <div class="col-md-12">
                                    <label for="noHP" class="form-label">Nomor HP</label>
                                    <input type="number" name="noHP" id="noHP" min="0" maxlength="12" class="form-control" placeholder="Masukan nomor handphone aktif">
                                </div>
                                <div class="col-md-12">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea name="alamat" id="alamar" rows="5" class="form-control" placeholder="Masukan Alamat seusia dengan KTP"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" name="dataPengguna" class="btn btn-md btn-primary w-100">Daftar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>