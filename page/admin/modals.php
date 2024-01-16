<!-- data User -->
<!-- Modal -->
<div class="modal fade" id="DataUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DataUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border border-0 bg-gradient">
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

<!-- data Mobil -->
<!-- Modal -->
<div class="modal fade" id="DataMobil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DataMobilLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border border-0 bg-gradient">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="DataMobilLabel">Tambahkan Data Mobil</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="?logic=logic&crud=addMobil" method="post">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="noplat" class="form-label">No-Plat</label>
                            <input type="text" name="noplat" id="noplat" placeholder="Masukan Nomor Plat Mobil" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="mobil" class="form-label">Mobil</label>
                            <input type="text" name="mobil" id="mobil" placeholder="Masukan Nama Mobil" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="brand" class="form-label">Brand</label>
                            <input type="text" name="brand" id="brand" placeholder="Masukan Brand Mobil" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="transmisi" class="form-label">Type Transmisi</label>
                            <select name="transmisi" id="transmisi" class="form-select">
                                <option value="Manual">Manual</option>
                                <option value="Matic">Matic</option>
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


<!-- update Mobil -->
<!-- Modal -->
<?php

$queryLoopdata = mysqli_query($link, "SELECT * FROM `tbl_mobil_rikza` ");
while ($data = mysqli_fetch_assoc($queryLoopdata)) :
?>
    <div class="modal fade" id="UpdateMobile<?= str_replace(' ', '', $data['no_plat_rikza']) ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="UpdateMobile<?= str_replace(' ', '', $data['no_plat_rikza']) ?>Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border border-0 bg-gradient">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="UpdateMobile<?= str_replace(' ', '', $data['no_plat_rikza']) ?>Label">Update Data Mobil <?= $data['no_plat_rikza'] ?> </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="?logic=logic&crud=editMobil" method="post">
                        <input type="hidden" name="idPlat" class="form-conteol" value="<?= $data['no_plat_rikza'] ?>">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="noplat" class="form-label">No-Plat</label>
                                <input type="text" name="noplat" id="noplat" placeholder="Masukan Nomor Plat Mobil" class="form-control" value="<?= $data['no_plat_rikza'] ?>">
                            </div>
                            <div class="col-md-12">
                                <label for="mobil" class="form-label">Mobil</label>
                                <input type="text" name="mobil" id="mobil" placeholder="Masukan Nama Mobil" class="form-control" value="<?= $data['nama_mobil_rikza'] ?>">
                            </div>
                            <div class="col-md-12">
                                <label for="brand" class="form-label">Brand</label>
                                <input type="text" name="brand" id="brand" placeholder="Masukan Brand Mobil" class="form-control" value="<?= $data['brand_mobil_rikza'] ?> ">
                            </div>
                            <div class="col-md-12">
                                <label for="transmisi" class="form-label">Type Transmisi</label>
                                <select name="transmisi" id="transmisi" class="form-select">

                                    <option value="Manual" <?php if ($data['tipe_transmisi_rikza'] == "Manual") {
                                                                echo ("selected");
                                                            } ?>>Manual</option>
                                    <option value="Matic" <?php if ($data['tipe_transmisi_rikza'] == "Matic") {
                                                                echo ("selected");
                                                            } ?>>Matic</option>
                                </select>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
endwhile;
?>