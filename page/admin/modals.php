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

<!-- data Mobil -->
<!-- Modal -->
<div class="modal fade" id="DataMobil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DataMobilLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="DataMobilLabel">Tambahkan Data Mobil</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="?logic=logic&crud=addMobil" method="post">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="" class="form-label"></label>
                        </div>
                        <div class="col-md-12"></div>
                        <div class="col-md-12"></div>
                        <div class="col-md-12"></div>
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