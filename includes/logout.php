<?php
session_start();
if(isset($_SESSION['user'])) unset($_SESSION['user']);
if(isset($_SESSION['admin'])) unset($_SESSION['admin']);

header("Location: ../index.php");
