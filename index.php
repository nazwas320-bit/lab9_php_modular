<?php

require_once 'helpers/functions.php';

// Daftar halaman yang boleh dibuka
$routes = [
    'dashboard'   => 'views/dashboard.php',
    'about'       => 'views/about.php',
    'kontak'      => 'views/kontak.php',
    'user'        => 'modules/user/list.php',
    'user_add'    => 'modules/user/add.php',
    'user_edit'   => 'modules/user/edit.php',
    'user_delete' => 'modules/user/delete.php',
];
// Ambil halaman dari URL
$page = $_GET['page'] ?? 'dashboard';

// Cek apakah halaman tersedia
if (!array_key_exists($page, $routes)) {
    $page = '404';
    $routes['404'] = 'views/404.php';
}

// Tampilkan header
require_once 'views/header.php';

// Tampilkan halaman sesuai route
require_once $routes[$page];

// Tampilkan footer
require_once 'views/footer.php';

?>