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
        <section class="my-4">
            <div class="card border border-0 shadow">
                <div class="card-body">
                    <h3>Data Penjualan</h3>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No.TRX</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Mobil</th>
                                <th scope="col">Tgl-Rental</th>
                                <th scope="col">Jam-Rental</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Lama</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include("config/connect.php");
                            $query = "SELECT
                                                tbl_rental_rikza.no_trx_rikza as trx,
                                                tbl_pelanggan_rikza.nama_rikza as peminjam,
                                                tbl_mobil_rikza.nama_mobil_rikza as mobil,
                                                tbl_rental_rikza.tgl_rental_rikza as tgl,
                                                tbl_rental_rikza.jam_rental_rikza as jam,
                                                tbl_rental_rikza.harga_rikza as harga,
                                                tbl_rental_rikza.lama_rikza as lama,
                                                tbl_rental_rikza.total_bayar_rikza as bayar
                                            FROM
                                                tbl_rental_rikza
                                            INNER JOIN
                                                tbl_pelanggan_rikza ON tbl_pelanggan_rikza.nik_ktp_rikza = tbl_rental_rikza.nik_ktp_rikza
                                            INNER JOIN
                                                tbl_mobil_rikza ON tbl_mobil_rikza.no_plat_rikza = tbl_rental_rikza.no_plat_rikza";
                            $trxs = mysqli_query($link, $query);
                            $no = 1;
                            while ($data = mysqli_fetch_assoc($trxs)) :
                            ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $data['trx'] ?></td>
                                    <td><?= $data['peminjam'] ?></td>
                                    <td><?= $data['mobil'] ?></td>
                                    <td><?= $data['tgl'] ?></td>
                                    <td><?= $data['jam'] ?></td>
                                    <td><?= $data['harga'] ?></td>
                                    <td><?= $data['lama'] ?></td>
                                    <td><?= $data['bayar'] ?></td>
                                </tr>
                            <?php
                            endwhile;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
</main>