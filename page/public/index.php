<?php
session_start();
$role = $_SESSION['role'];
if (!$role === "user") {
    header("Location: http://localhost:8000/UAS_PI_Rikza/");
}
?>
<div class="Hero shadow d-flex align-items-center">
    <div class="container">
        <h3>Selamat Datang</h3>
        <h1 class="fw-bold"><?= $_SESSION['namalengkap'] ?></h1>
        <p>Selamat Bekerja untuk kemajuan dealer <b>RentalMobil</b></p>
    </div>
</div>
<main class="my-5">
    <div class="container">
        <h2 class="fw-bold">*List Mobil</h2>
        <div class="row">
            <?php
            include("config/connect.php");
            $queryMobil = mysqli_query($link, "SELECT * FROM tbl_mobil_rikza");
            while ($row = mysqli_fetch_assoc($queryMobil)) :
            ?>
                <div class="col-md-4">
                    <div class="card border border-0 shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3><?= $row['nama_mobil_rikza'] ?></h3>
                                    <hr>
                                </div>
                                <div class="col-md-4 fs-5"><?= $row['no_plat_rikza'] ?></div>
                                <div class="col-md-4 fs-5"><?= $row['brand_mobil_rikza'] ?></div>
                                <div class="col-md-4 fs-5"><?= $row['tipe_transmisi_rikza'] ?></div>
                                <div class="col-md-12 mt-3">
                                    <a href="?role=user&rental=dataPelanggan&plat=<?= $row['no_plat_rikza'] ?>" class="btn btn-md btn-primary w-100">Rental</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endwhile; ?>
        </div>
    </div>
</main>