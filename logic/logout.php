<?php
session_start();
session_destroy();
include("config/connect.php");
header("Location: /UAS_PI_Rikza/");
