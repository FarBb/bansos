<?php
require 'connection.php';
require './function.php';

unset($_SESSION["login"]);
echo "<script>window.location='" . base_url('login.php?logout') . "' </script>";
