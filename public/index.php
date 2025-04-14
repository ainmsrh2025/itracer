<?php

// Autoload Composer
require __DIR__.'/../vendor/autoload.php';

// Menjalankan aplikasi Laravel
$app = require_once __DIR__.'/../bootstrap/app.php';

// Jalankan aplikasi
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

// Menghantar respons ke pelayar
$response->send();

$kernel->terminate($request, $response);
