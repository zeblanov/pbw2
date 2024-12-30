<?php
include "connection.php";
session_start();

if(!isset($_SESSION['isLoggedIn']))
{
    header("Location: login.php"); 
}
$id = $_GET['id'];

$dbh = $koneksi->prepare("UPDATE buku SET isdel = ?, deleted_by= ? , deleted_at= ? wHERE id =?");
$dbh->execute(
    [
        1,
        $_SESSION['username'],
        date("y-m-d H:i:s"),
        $id

    ]
    );

    header('Location: home.php');
    exit();
?>