<?php
include("config/connect.php");
$plat = $_GET['plat'];
?>

<main class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php
                $queryData = mysqli_query($link, "SELECT * FROM `tbl_mobil_rikza` WHERE tbl_mobil_rikza.no_plat_rikza = '$plat'");
                while ($row = mysqli_fetch_assoc($queryData)) :
                ?>
                    <div class="card border border-0 shadow mb-3 bg-gradient">
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

                <div class="card border border-0 shadow bg-gradient">
                    <div class="card-body">
                        <h5>Form Rental Mobil</h5>
                        <form action="?logic=logic&crud=Rental" method="post">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="noTRX" class="form-label">No.Transaksi</label>
                                    <input type="text" name="noTRX" id="noTRX" class="form-control" value="RKZ-<?= str_replace(' ', '', $plat) . date('H-i-s') ?>" readonly="readonly">
                                </div>
                                <div class="col-md-12">
                                    <label for="pelanggan">Pelanggan</label>
                                    <select name="pelanggan" id="pelanggan" class="form-select">
                                        <?php
                                        $getDataPelanggan = mysqli_query($link, "SELECT * FROM `tbl_pelanggan_rikza`");
                                        while ($items = mysqli_fetch_assoc($getDataPelanggan)) :
                                        ?>
                                            <option value="<?= $items['nik_ktp_rikza'] ?>">
                                                <?= $items['nama_rikza'] ?>
                                                |
                                                <?= $items['no_hp_rikza'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="noPlat" class="form-label">NoPlat</label>
                                    <input type="text" class="form-control" name="noPlat" id="noPlat" aria-describedby="noPlat" value="<?= $plat ?>" readonly="readonly">
                                    <div id="noPlat" class="form-text">Pastikan Nomor Plat Sama</div>
                                </div>
                                <div class="col-md-12">
                                    <label for="tglRental" class="form-label">Tanggal Rental</label>
                                    <input type="date" name="tglRental" id="tglRental" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label for="JamRental" class="form-label">Jam Rental</label>
                                    <input type="time" class="form-control" name="JamRental" id="noPlat" min="09:00" max="18:00" aria-describedby="noPlat">
                                    <div id="noPlat" class="form-text">Office hours are 9am to 6pm</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="number" name="harga" id="harga" min="0" class="form-control" oninput="hitungTotal()">
                                </div>
                                <div class="col-md-6">
                                    <label for="lama" class="form-label">Lama</label>
                                    <div class="input-group">
                                        <input type="number" name="lama" id="lama" min="0" class="form-control" oninput="hitungTotal()">
                                        <label class="input-group-text" for="lama">Hari</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="total" class="form-label">Total</label>
                                    <input type="text" name="total" id="total" class="form-control" value="" readonly="readonly">
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" name="rental" class="btn btn-primary btn-md w-100">Simpan Data</button>
                                </div>
                            </div>
                        </form>
                        <script>
                            function hitungTotal() {
                                // Mengambil nilai harga tanpa simbol IDR
                                var harga = document
                                    .getElementById('harga')
                                    .value
                                    .replace('IDR ', '')
                                    .replace(',', '');

                                // Mengubah nilai harga menjadi angka
                                harga = parseFloat(harga) || 0;

                                var lama = document
                                    .getElementById('lama')
                                    .value;
                                var total = harga * lama;

                                // Mengubah nilai total menjadi format IDR
                                var formattedTotal = formatIDR(total);

                                // Menetapkan nilai total yang diformat ke elemen input dengan id 'total'
                                document
                                    .getElementById('total')
                                    .value = formattedTotal;
                            }

                            function formatIDR(number) {
                                return new Intl
                                    .NumberFormat('id-ID', {
                                        style: 'currency',
                                        currency: 'IDR'
                                    })
                                    .format(number);
                            }
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="fw-bold">! JIKA BELUM ADA DATA PENYEWA</h1>
                <div class="card border border-0 shadow bg-gradient">
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

                <section class="my-3">
                    <h4>Data Peminjaman <?= $plat ?></h4>
                    <div class="overflow-y-scroll" style="height: 400px;">
                        <?php
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
                                tbl_mobil_rikza ON tbl_mobil_rikza.no_plat_rikza = tbl_rental_rikza.no_plat_rikza
                            WHERE tbl_rental_rikza.no_plat_rikza = '$plat'
                            ORDER BY tgl DESC";
                        $trxs = mysqli_query($link, $query);
                        while ($row = mysqli_fetch_assoc($trxs)) :
                        ?>
                            <div class="card rounded-0 shadow">
                                <div class="card-body">
                                    <p><?= $row['trx'] ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4><?= $row['mobil'] ?></h4>
                                        <p><?= $row['peminjam'] ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small><?= $row['tgl'] . " | " . $row['jam'] ?></small>
                                        <h3><?= $row['bayar'] ?></h3>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>