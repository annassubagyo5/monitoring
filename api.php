<?php

require 'koneksi.php';

$ambildata = mysqli_query($koneksi,"SELECT * FROM curah_hujan ORDER BY id DESC");

$fetch = mysqli_fetch_row($ambildata);

