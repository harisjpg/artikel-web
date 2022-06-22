<?php

if (@$_GET['page'] == 'beranda' || @$_GET['page'] == '') {
    include "../view/beranda.php";
} else if (@$_GET['page'] == 'artikel') {
    include "../view/artikel.php";
} else if (@$_GET['page'] == 'kategori') {
    include "../view/kategori.php";
}
