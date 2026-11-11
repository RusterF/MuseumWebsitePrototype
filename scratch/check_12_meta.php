<?php

use App\Models\Collection;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$order = [
    1 => 39, 2 => 44, 3 => 55, 4 => 81, 5 => 138, 6 => 56,
    7 => 67, 8 => 123, 9 => 18, 10 => 147, 11 => 146, 12 => 57,
];

foreach ($order as $i => $id) {
    $c = Collection::find($id);
    if ($c) {
        echo "[$i] {$c->title}\n";
        echo "    Reg: {$c->registration_number} | Year: {$c->registration_year} | Inv: {$c->inventory_number}\n";
        echo "    Bahan: {$c->bahan} | Ukuran: {$c->ukuran} | Asal: {$c->contributor}\n";
    }
}
