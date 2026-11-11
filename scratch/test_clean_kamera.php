<?php

use App\Models\Collection;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$col = Collection::where('slug', 'kamera-foto-dan-flash-kamera-jurnalis-antara')->first();
$desc = $col->description;
$desc = preg_replace('/[\r\n]+/', ' ', $desc);
$desc = preg_replace('/<\/p>\s*<p>/i', ' ', $desc);
echo $desc."\n";
