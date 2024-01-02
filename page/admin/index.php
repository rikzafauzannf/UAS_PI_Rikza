<main class="my-4">
    <div class="container-fluid">
        <h3>DATA RENTAL MOBIL (<?= $_SESSION['username'] ?>)</h3>
        <section class="my-2">
            <div class="row">
                <div class="col-md-8">
                    <div class="card border border-0 shadow" id="datatransaksi">
                        <div class="card-body">
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
                </div>
                <div class="col-md-4">
                    <div class="card border border-0 shadow" id="dataUser">
                        <div class="card-body">
                            <div class="w-100 d-flex justify-content-between align-items-center">
                                <h3 class="text-secondary fw-bold">Data User</h3>
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#DataUser">
                                    Tambahkan User
                                </button>
                            </div>
                            <hr class="text-primary">
                            <div class="row">
                                <?php
                                $queryUser = mysqli_query($link, "SELECT * FROM `tbl_user_rikza` ORDER BY level_rikza DESC");
                                while ($row = mysqli_fetch_assoc($queryUser)) :
                                ?>
                                    <div class="col-md-12 my-2">
                                        <div class="card
                                        <?php
                                        if ($row['level_rikza'] == 'admin') {
                                            echo 'border-primary';
                                        } else {
                                            echo 'border-success';
                                        }
                                        ?> shadow-sm">
                                            <div class="card-body">
                                                <span class="badge <?php
                                                                    if ($row['level_rikza'] == 'admin') {
                                                                        echo 'text-bg-primary';
                                                                    } else {
                                                                        echo 'text-bg-success';
                                                                    }
                                                                    ?>"><?= $row['level_rikza'] ?></span>
                                                <p class="fw-bold"><span class="text-secondary fw-light">Username >> </span><?= $row['username_rikza'] ?><br><span class="text-secondary fw-light">Nama Lengkap >> </span><?= $row['nama_lengkap_rikza'] ?></p>
                                                <a href="?logic=logic&crud=deluser&idfxt=<?= $row['id_user_rikza'] ?>" class="btn btn-md btn-warning mt-1 w-100">Block</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- data mobil dan pelanggan -->
        <section class="my-4">
            <div class="row g-3">
                <div class="col-md-12">
                    <div class="card border border-0 shadow" id="dataMobil">
                        <div class="card-body">
                            <div class="w-100 d-flex justify-content-between align-items-center mb-3">
                                <h3 class="text-secondary fw-bold">Data Mobil</h3>
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#DataMobil">
                                    Tambahkan Mobil
                                </button>
                            </div>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">No-Plat</th>
                                        <th scope="col">Mobil</th>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Type Transmisi</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $queryMobil = mysqli_query($link, "SELECT * FROM tbl_mobil_rikza");
                                    $no = 1;
                                    while ($row = mysqli_fetch_assoc($queryMobil)) :
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $row['no_plat_rikza'] ?></td>
                                            <td><?= $row['nama_mobil_rikza'] ?></td>
                                            <td><?= $row['brand_mobil_rikza'] ?></td>
                                            <td><?= $row['tipe_transmisi_rikza'] ?></td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-warning">Update</a>
                                                <a href="" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                    endwhile;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card border border-0 shadow" id="dataPelanggan">
                        <div class="card-body">
                            <h3 class="text-secondary fw-bold">Data Pelanggan</h3>

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">NIK</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">No.Hp</th>
                                        <th scope="col">Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $queryPelanggan = mysqli_query($link, "SELECT * FROM tbl_pelanggan_rikza");
                                    $no = 1;
                                    while ($row = mysqli_fetch_assoc($queryPelanggan)) :
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $row['nik_ktp_rikza'] ?></td>
                                            <td><?= $row['nama_rikza'] ?></td>
                                            <td><?= $row['no_hp_rikza'] ?></td>
                                            <td><?= $row['alamat_rikza'] ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>




<!-- modal -->
<?php
include("./page/admin/modals.php");
?>