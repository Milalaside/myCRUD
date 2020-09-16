<?php
$link     = mysqli_connect('localhost','root','','arkademy');
$perpage_produk  = 5;
$page_produk     = isset($_GET['pageconf']) ? (int)$_GET['pageconf'] : 1;
$start_produk    = ($page_produk > 1) ? ($page_produk * $perpage_produk) - $perpage_produk :0;     
$result_produk   = mysqli_query ($link, "SELECT * FROM produk");
$total_produk    = mysqli_num_rows($result_produk);
$pages_produk    = ceil($total_produk/$perpage_produk);
$articles_produk = "SELECT * FROM produk ORDER BY id ASC LIMIT $start_produk, $perpage_produk";
$tampil_produk   = mysqli_query($link,$articles_produk);
$id_produk	   = $start_produk + 1;

?>