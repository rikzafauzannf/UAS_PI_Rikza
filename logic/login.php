<?php
include("config/connect.php");
session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($link, "SELECT * FROM tbl_user_rikza WHERE username_rikza = '$username'");
$data = mysqli_fetch_assoc($query);

if ($data) {
    if ($password == $data['password_rikza']) {
        session_start();
        $_SESSION['user_id']        = $data['id_user_rikza'];
        $_SESSION['username']       = $data['username_rikza'];
        $_SESSION['namalengkap']    = $data['nama_lengkap_rikza'];
        $_SESSION['role']          = $data['level_rikza'];

        if ($data['level_rikza'] == "admin") {
            header("location: ?role=admin");
        } elseif ($data['level_rikza'] == "user") {
            header("location: ?role=user");
        }

        exit();
    } else {
        // Password is incorrect
        echo "Invalid password";
    }
} else {
    // User not found
    echo "User not found";
}
