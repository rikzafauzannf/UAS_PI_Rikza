<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rental Mobil Rikza Fauzan N</title>
    <link rel="shortcut icon" href="assets/img/20863876_6387972.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/myStyle.css">
</head>

<body>

    <?php
    @session_start();
    if ($_GET['role'] == "admin") :
    ?>
        <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="?role=admin"><img src="assets/img/20863876_6387972.svg" alt="" class="w-50"> RentalMobil<sup class="text-danger">admin</sup></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav mx-auto">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        <a class="nav-link" href="#datatransaksi">Data Transaksi</a>
                        <a class="nav-link" href="#dataUser">Data User</a>
                        <a class="nav-link" href="#dataMobil">Data mobil</a>
                        <a class="nav-link" href="#dataPelanggan">Data Pelanggan</a>

                    </div>
                    <div class="navbar-text">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['username'] ?>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?logic=logic&logout=logout">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    <?php
    elseif ($_GET['role'] == "user") :
    ?>
        <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="?role=user"><img src="assets/img/20863876_6387972.svg" alt="" class="w-50"> RentalMobil<sup class="text-danger">Dealer</sup></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav mx-auto">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        <a class="nav-link" href="#">Features</a>
                        <a class="nav-link" href="#">Pricing</a>
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </div>
                    <div class="navbar-text">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['username'] ?>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?logic=logic&logout=logout">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    <?php
    endif;
    ?>

    <?php
    include("./linkManager.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>