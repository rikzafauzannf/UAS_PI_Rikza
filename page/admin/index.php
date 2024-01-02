<main class="my-4">
    <div class="container-fluid">
        <h3>DATA RENTAL MOBIL (<?= $_SESSION['username'] ?>)</h3>
        <section class="my-2">
            <div class="row">
                <div class="col-md-8">
                    <div class="card border border-0 shadow">
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead class="table-light">
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
                    <div class="card border border-0 shadow">
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

    </div>
</main>




<!-- modal -->
<!-- data User -->
<!-- Modal -->
<div class="modal fade" id="DataUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DataUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="DataUserLabel">Tambahkan Data User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="?logic=logic&crud=adduser" method="post">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" name="namaLengkap" id="namaLengkap" placeholder="Nama Lengkap" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" placeholder="password***" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <select name="level" class="form-select">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="insert" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>